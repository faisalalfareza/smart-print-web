<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    
	public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('mdocument'));
        $this->load->library(array('Bcrypt','user_agent'));
        $this->load->helper(array('url','form','log'));
    }
    
	public function index()
	{
        if(isset($this->session->userdata('sc_sess')['UserId'])) {
            $userid = $this->session->userdata('sc_sess')['UserId'];
            $data['role']         =  $this->mdocument->getRole($userid);

            switch($data['role']->RoleId) {
                case "1":
                break;

                case "2":
                    $data['title']        =  "Print Document(s)";	
                    $data['merchant']      =  $this->mdocument->getListMerchant();
                    $data['document']      =  $this->mdocument->getListDocument($userid);
                    $this->load->view('users/upload-document/portfolio-project', $data);
                break;

                case "3":
                    $data['title']         =  "Manage Document(s)";	
                    $data['merchant']      =  $this->mdocument->getListMerchant();
                    $data['document']      =  $this->mdocument->getListDocument($userid);
                    
                    $data['requested']     =  $this->mdocument->getRequestedDocument();
                    $data['processed']     =  $this->mdocument->getProcessedDocument();
                    $data['finished']      =  $this->mdocument->getFinishedDocument();

                    $this->load->view('merchant/manage-document/manage-document', $data);
                break;
            }
            
        }
        else {
            $this->session->set_flashdata("regMsg", "<div class=\"alert alert-danger fade in\" id=\"alert\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&#9679;</a>&nbsp; Can't access. Please login &nbsp;</div>");              
            redirect(base_url());
        }
    } 

	public function projectDetails($id) {
        if(isset($this->session->userdata('sc_sess')['UserId'])) {  
            $userid = $this->session->userdata('sc_sess')['UserId'];

            $id =  $this->encrypt->decode($id);
            
            $head['ProName']      =  $this->mdocument->ProName($id)->row();
            $data['title']        =  $head['ProName']->ProName;	  
            $data['role']         =  $this->mdocument->getRole($userid);
            $data['hasil']        =  $this->mdocument->getById($id);
            $data['news']         =  $this->mdocument->getNews();
            $data['project']      =  $this->mdocument->getProject();
            $data['asignMember']  =  $this->mdocument->asignMember($id)->result();           
            $data['getJoinRsum']  =  $this->mdocument->getJoinRsum($id)->result();
            $data['rowsJoinRsum'] =  $this->mdocument->getJoinRsum($id)->num_rows();
            $data['getJoinRsumConf']  =  $this->mdocument->getJoinRsumConf($id)->result();
            $data['rowsJoinRsumConf'] =  $this->mdocument->getJoinRsumConf($id)->num_rows();        
            $this->load->view('users/upload-document/project-details', $data);
        }
        else {
            $this->session->set_flashdata("regMsg", "<div class=\"alert alert-danger fade in\" id=\"alert\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&#9679;</a>&nbsp; Can't access. Please login &nbsp;</div>");              
            redirect(base_url());
        }           
    }     
    
	function uploadDocument() {        
        if(!empty($_FILES['userfile']['name'])) {
            $uploadData = array();
            $merchant = explode('|', $this->input->post('MerchantId'));
            $merchantId = $merchant[0]; $merchantCode = $merchant[1];

            $specificName = $merchantCode .$this->session->userdata('sc_sess')['UserId']. '-' .date("dmY"). '-' .date("His");
            $path = './assets/images/uploads/upload-documents/' .$specificName;
            if(!is_dir($path)) //create the folder if it's not already exists 
            {
                mkdir($path, 0755, TRUE);
            }

            $config['upload_path']          = $path;
            $config['allowed_types']        = 'gif|jpg|jpeg|png|docx|xlsx|csv|pdf';
            $config['overwrite']            = 1;
            $config['max_size']             = 2048;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $filesCount = count($_FILES['userfile']['name']);
            for($i = 0; $i < $filesCount; $i++) {

                // File upload configuration
                $_FILES['file']['name']         = $_FILES['userfile']['name'][$i];
                $_FILES['file']['type']         = $_FILES['userfile']['type'][$i];
                $_FILES['file']['tmp_name']     = $_FILES['userfile']['tmp_name'][$i];
                $_FILES['file']['error']        = $_FILES['userfile']['error'][$i];
                $_FILES['file']['size']         = $_FILES['userfile']['size'][$i];

                $batch = $this->mdocument->getCurrentBatchMerchant($merchantId);
                    
                $queueNumber = 0;
                if (!empty($batch)) {
                    $queueNumber = ($batch[0]->MerchantQueueNumber + 1);
                    $this->mdocument->updateBatchMerchant($merchantId, $queueNumber);
                } else {
                    $queueNumber += 1;
                    $reqMsBatchMerchant = array(
                        'MerchantId'             =>  $merchantId,
                        'MerchantQueueNumber'    =>  $queueNumber
                    );
                    $this->mdocument->createBatchMerchant($reqMsBatchMerchant);
                }

                // Upload file to server
                if ($this->upload->do_upload('file'))
                {
                    // Uploaded file data
                    $data = $this->upload->data();
                    $uploadData[$i]['file_name'] = $data['file_name'];
                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");

                    $reqTrDocumentDetail = array(
                        'DocumentName'    =>  $this->input->post('DocumentName'),
                        'DocumentType'    =>  $data['file_ext'],
                        'LinkFileUrl'     =>  $data['full_path'],
                        'FileName'        =>  $data['file_name'],
                        'Note'            =>  $this->input->post('Note'),
                        'EstimationTime'  =>  $this->input->post('EstimationTime')
                    );
                    $this->mdocument->uploadDocDetail($reqTrDocumentDetail);
                    $documentId = $this->db->insert_id();

                    $reqTrDocument = array(
                        'QueueNumber'     =>  $merchantCode .'-'. 
                                              $this->session->userdata('sc_sess')['UserId'] .'-'. 
                                              date("dmY") .'-'.
                                              date("His") .'-'.
                                              $queueNumber,
                        'DocumentId'      =>  $documentId,
                        'MerchantId'      =>  $merchantId,
                        'UserId'          =>  $this->session->userdata('sc_sess')['UserId'],
                        'Status'          =>  'requested',
                        'UploadedOn'      =>  date("l, d M Y H:i:s")
                    );
                    $this->mdocument->uploadDoc($reqTrDocument);
                }

            }
        }

        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Upload Document \"" .$this->input->post('DocumentName'). "\" Successfully</div>");
        redirect($this->agent->referrer());
	}

    function setAsRejectedDoc($documentId) {
        $this->mprojectmanage->activate($ProId);          
        redirect('home/projectmanage');
    }

    public function updateStatusInMessage($status) {
        $message = "";
        if ($status == "finished") $message = 'Document Completed';
        else if ($status == "inprogress") $message = 'Document has been Queued'; 
        else if ($status == "requested") $message = 'Document has been Rollback to Request Document';
        return $message;
    }
    function updateStatusDoc($documentId, $status) {
        $this->mdocument->updateStatusDoc($documentId, $status, $this->updateStatusInMessage($status));          
        redirect($this->agent->referrer());
    }	
    function updateStatusDoc_group($status) {
        $this->mdocument->updateStatusDoc_group($status, $this->updateStatusInMessage($status));          
        redirect($this->agent->referrer());
    }
    
    function updateproject() {
        $data = array(
            'ProName'             => $this->input->post('ProName'),
            'ProSites'            => $this->input->post('ProSites'),
            'ProDesc'             => $this->input->post('ProDesc'),
            'ProStatus'           => $this->input->post('ProStatus')
        );  
        $data = $this->security->xss_clean($data);
        $this->mdocument->updateproject($data); 

        helper_log("update", "update project ".$this->input->post('ProName')); 
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Updating project success</div>");           
        redirect('users/upload-document/project');  
    }
    
	function updateteam() {                
        $rsumid = $this->input->post('item');
        $proid  = $this->input->post('ProId');

        
        foreach($rsumid as $item){                
            $rsumpro = array(
                'RsumId'      => $item,
                'ProId'       => $proid,
                'AsignStatus' => 0
            );    

            $rsumname = $this->mdocument->RsumName($item);
            $proname = $this->mdocument->ProName($proid)->result();
            helper_log("asign", "asign member ".$rsumname[0]->RsumName." to project ".$proname[0]->ProName);
            $this->db->insert('tbresume_project', $rsumpro);
        }    
        
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Asign Member Success. Wait for confirmation</div>");
        redirect('users/upload-document/project/projectDetails/'.$this->encrypt->encode($proid));             
	}    

    function confirm( $rsumid, $proid ) {
        $rsumid =  $this->encrypt->decode($rsumid);
        $proid  =  $this->encrypt->decode($proid);
        $this->mdocument->confirm($rsumid, $proid);  

        $rsumname = $this->mdocument->RsumName($rsumid); 
        $proname = $this->mdocument->ProName($proid)->result();
        helper_log("confirm", "confirm member ".$rsumname[0]->RsumName." to ".$proname[0]->ProName); 
        redirect($this->agent->referrer());       
    }   

    function confirm_group() {
        $this->mdocument->confirm_group();  
        redirect($this->agent->referrer());        
    }    
    
    function delete($id) {
        $proname = $this->mdocument->ProName($id)->result();
        helper_log("delete", "delete project ".$proname[0]->ProName);

        $this->mdocument->delete($id);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-warning\" id=\"alert\">Deleting Project Success</div>");        
        redirect("users/upload-document/project");
    }      
    
    public function do_upload() {
        if(!empty($_FILES['userfile']['name'])) {
            $uploadData = array();
            $specificName = 'MKT-' .$this->session->userdata('sc_sess')['UserId']. '-' .date("dmY"). '-' .date("His");
            $path = './assets/images/uploads/upload-documents/' .$specificName;
            if(!is_dir($path)) //create the folder if it's not already exists 
            {
                mkdir($path, 0755, TRUE);
            }

            $filesCount = count($_FILES['userfile']['name']);
            for($i = 0; $i < $filesCount; $i++) {

                // File upload configuration
                $_FILES['file']['name']         = $_FILES['userfile']['name'][$i];
                $_FILES['file']['type']         = $_FILES['userfile']['type'][$i];
                $_FILES['file']['tmp_name']     = $_FILES['userfile']['tmp_name'][$i];
                $_FILES['file']['error']        = $_FILES['userfile']['error'][$i];
                $_FILES['file']['size']         = $_FILES['userfile']['size'][$i];

                $config['upload_path']          = $path;
                $config['allowed_types']        = 'gif|jpg|jpeg|png|docx|xlsx|csv|pdf';
                $config['overwrite']            = 1;
                $config['max_size']             = 2048;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                // Upload file to server
                if ($this->upload->do_upload('file'))
                {
                    // Uploaded file data
                    $data = $this->upload->data();
                    $uploadData[$i]['file_name'] = $data['file_name'];
                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
                    print_r($uploadData);
                    // $this->load->view('upload/upload_success', $data);
                }

            }
        }
	}
}
