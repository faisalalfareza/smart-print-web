<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

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
        $this->load->model('mproject');
        $this->load->library(array('Bcrypt','user_agent'));
        $this->load->helper(array('url','form','log'));
    }
    
	public function index()
	{
        if(isset($this->session->userdata('sc_sess')['UserId'])) {
            $userid = $this->session->userdata('sc_sess')['UserId'];
            $data['title']        =  "Print Document(s)";	
            $data['resume']       =  $this->mproject->getResume();
            $data['project']      =  $this->mproject->getProject();
            $data['artikel']      =  $this->mproject->getArtikel();
            $data['news']         =  $this->mproject->getNews();
            $data['role']         =  $this->mproject->getRole($userid);
            $this->load->view('users/upload-document/portfolio-project', $data);
        }
        else {
            $this->session->set_flashdata("regMsg", "<div class=\"alert alert-danger fade in\" id=\"alert\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&#9679;</a>&nbsp; Can't access. Please login &nbsp;</div>");              
            redirect(base_url());
        }
    } 

	public function projectDetails($id)
	{
        if(isset($this->session->userdata('sc_sess')['UserId'])) {  
            $userid = $this->session->userdata('sc_sess')['UserId'];

            $id =  $this->encrypt->decode($id);
            
            $head['ProName']      =  $this->mproject->ProName($id)->row();
            $data['title']        =  $head['ProName']->ProName;	  
            $data['role']         =  $this->mproject->getRole($userid);
            $data['hasil']        =  $this->mproject->getById($id);
            $data['news']         =  $this->mproject->getNews();
            $data['project']      =  $this->mproject->getProject();
            $data['asignMember']  =  $this->mproject->asignMember($id)->result();           
            $data['getJoinRsum']  =  $this->mproject->getJoinRsum($id)->result();
            $data['rowsJoinRsum'] =  $this->mproject->getJoinRsum($id)->num_rows();
            $data['getJoinRsumConf']  =  $this->mproject->getJoinRsumConf($id)->result();
            $data['rowsJoinRsumConf'] =  $this->mproject->getJoinRsumConf($id)->num_rows();        
            $this->load->view('users/upload-document/project-details', $data);
        }
        else {
            $this->session->set_flashdata("regMsg", "<div class=\"alert alert-danger fade in\" id=\"alert\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&#9679;</a>&nbsp; Can't access. Please login &nbsp;</div>");              
            redirect(base_url());
        }           
    }     
    
	function create()
	{        
        if(isset($this->session->userdata('sc_sess')['UserId'])) {
            $userid = $this->session->userdata('sc_sess')['UserId'];
        }  
        
        $rsumid = $this->input->post('item');
		$data = array(
        	'ProName'             =>  $this->input->post('ProName'),
			'ProSites'            =>  $this->input->post('ProSites'),
            'ProDesc'             =>  $this->input->post('ProDesc'),
            'ProStatus'           =>  $this->input->post('ProStatus'),
            'CreatedOn'           =>  date("l, d M Y"),
            'CreatedBy'           =>  $this->input->post('CreatedBy'),
            'Privilage'           =>  "0"
		);
        $data = $this->security->xss_clean($data);
        $this->mproject->add_record($data);
        $proid = $this->db->insert_id();

        foreach($rsumid as $item){                
            $rsumpro = array(
                'RsumId'      => $item,
                'ProId'       => $proid,
                'AsignStatus' => 1
            );    
            $this->db->insert('tbresume_project', $rsumpro);
        }  

        helper_log("add", "create project ".$this->input->post('ProName'));        
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Project has been registered in the list. wait for confirmation of project</div>");
        redirect('users/upload-document/project');                 
	}
    
    public function updateproject()
    {
        $data = array(
            'ProName'             => $this->input->post('ProName'),
            'ProSites'            => $this->input->post('ProSites'),
            'ProDesc'             => $this->input->post('ProDesc'),
            'ProStatus'           => $this->input->post('ProStatus')
        );  
        $data = $this->security->xss_clean($data);
        $this->mproject->updateproject($data); 

        helper_log("update", "update project ".$this->input->post('ProName')); 
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Updating project success</div>");           
        redirect('users/upload-document/project');  
    }
    
	function updateteam()
	{                
        $rsumid = $this->input->post('item');
        $proid  = $this->input->post('ProId');

        
        foreach($rsumid as $item){                
            $rsumpro = array(
                'RsumId'      => $item,
                'ProId'       => $proid,
                'AsignStatus' => 0
            );    

            $rsumname = $this->mproject->RsumName($item);
            $proname = $this->mproject->ProName($proid)->result();
            helper_log("asign", "asign member ".$rsumname[0]->RsumName." to project ".$proname[0]->ProName);
            $this->db->insert('tbresume_project', $rsumpro);
        }    
        
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Asign Member Success. Wait for confirmation</div>");
        redirect('users/upload-document/project/projectDetails/'.$this->encrypt->encode($proid));             
	}    

    function confirm( $rsumid, $proid ) {
        $rsumid =  $this->encrypt->decode($rsumid);
        $proid  =  $this->encrypt->decode($proid);
        $this->mproject->confirm($rsumid, $proid);  

        $rsumname = $this->mproject->RsumName($rsumid); 
        $proname = $this->mproject->ProName($proid)->result();
        helper_log("confirm", "confirm member ".$rsumname[0]->RsumName." to ".$proname[0]->ProName); 
        redirect($this->agent->referrer());       
    }   

    function confirm_group() {
        $this->mproject->confirm_group();  
        redirect($this->agent->referrer());        
    }    
    
    function delete($id) {
        $proname = $this->mproject->ProName($id)->result();
        helper_log("delete", "delete project ".$proname[0]->ProName);

        $this->mproject->delete($id);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-warning\" id=\"alert\">Deleting Project Success</div>");        
        redirect("users/upload-document/project");
    }      
    

    
}
