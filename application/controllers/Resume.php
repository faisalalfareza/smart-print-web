<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resume extends CI_Controller {

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
        $this->load->model('mresume');
        $this->load->library(array('Bcrypt','user_agent'));
        $this->load->helper(array('url','form','log'));
    }
    
	public function index()
	{
        if(isset($this->session->userdata('sc_sess')['UserId'])) {
            $userid = $this->session->userdata('sc_sess')['UserId'];
            
            $data                 =  array();
            $data['title']        =  "Curriculum Vitae";
            $data['resume']       =  $this->mresume->getResume(); 
                $data['job']      =  $this->mresume->getJob();
                $data['skill']    =  $this->mresume->getSkill();
            $data['project']      =  $this->mresume->getProject();
            $data['artikel']      =  $this->mresume->getArtikel();
            $data['news']         =  $this->mresume->getNews();
            $data['role']         =  $this->mresume->getRole($userid);
            $this->load->view('home/portfolio-cv', $data);            
        }
        else {
            $this->session->set_flashdata("regMsg", "<div class=\"alert alert-danger fade in\" id=\"alert\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&#9679;</a>&nbsp; Can't access. Please login &nbsp;</div>");             
            redirect(base_url());
        }
       
    } 

	public function cvDetails($id)
	{
        if(isset($this->session->userdata('sc_sess')['UserId'])) {
            $userid = $this->session->userdata('sc_sess')['UserId'];
            
            $id =  $this->encrypt->decode($id);
            
            $head['RsumName']     =  $this->mresume->RsumName($id)->row();
            $data['title']        =  $head['RsumName']->RsumName;	  
            $data['role']         =  $this->mresume->getRole($userid);
            $data['hasil']        =  $this->mresume->getById($id);
            $data['news']         =  $this->mresume->getNews();
            $data['project']      =  $this->mresume->getProject();
            $data['asignProject'] =  $this->mresume->asignProject($id)->result(); 
            $data['getJoinPro']   =  $this->mresume->getJoinPro($id)->result();
            $data['rowsJoinPro']  =  $this->mresume->getJoinPro($id)->num_rows();    
            $this->load->view('home/cv-details', $data);
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
        
        $proid = $this->input->post('item');
        
            //upload
            $config['upload_path']          = 'assets/images/resume/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2400;
            $config['max_width']            = 1200;
            $config['max_height']           = 1200;
            $config['min_width']            = 165;
            $config['min_height']           = 114;
            $config['file_name']            = 'resume-'.trim(str_replace(" ","",date('dmYHisu')));

            $this->load->library('upload', $config);
            $upload_img = $this->upload->do_upload('image');    
        
            if(!$upload_img){
              $photo = $this->upload->data();
              $data = array(
                    'RsumName'         => $this->input->post('RsumName'),
                    'RsumTelp'         => $this->input->post('RsumTelp'),
                    'RsumJob'          => $this->input->post('RsumJob'),
                    'RsumImage'        => null,
                    'RsumSkill1'       => $this->input->post('RsumSkill1'),
                    'RsumSkill2'       => $this->input->post('RsumSkill2'),
                    'RsumSkill3'       => $this->input->post('RsumSkill3'),
                    'RsumSkill4'       => $this->input->post('RsumSkill4'),
                    'RsumSkill5'       => $this->input->post('RsumSkill5'),
                    'SkillPercent'     => $this->input->post('SkillPercent'),
                    'LastEducation1'   => $this->input->post('LastEducation1'),
                    'LastEducation2'   => $this->input->post('LastEducation2'),
                    'LastEducation3'   => $this->input->post('LastEducation3'),
                    'Achieve1'         => $this->input->post('Achieve1'),
                    'Achieve2'         => $this->input->post('Achieve2'),
                    'Achieve3'         => $this->input->post('Achieve3'),
                    'BirthDate'        => $this->input->post('BirthDate'),
                    'Gender'           => $this->input->post('Gender'),
                    'Religion'         => $this->input->post('Religion'),
                    'CreatedOn'        => date("l, d M Y"),
                    'UserId'           => $this->input->post('UserId')
              );
            }
            elseif($upload_img){
              $photo = $this->upload->data();
              $data = array(
                    'RsumName'         => $this->input->post('RsumName'),
                    'RsumTelp'         => $this->input->post('RsumTelp'),
                    'RsumJob'          => $this->input->post('RsumJob'),
                    'RsumImage'        => base_img().'resume/'.$photo['file_name'], 
                    'RsumSkill1'       => $this->input->post('RsumSkill1'),
                    'RsumSkill2'       => $this->input->post('RsumSkill2'),
                    'RsumSkill3'       => $this->input->post('RsumSkill3'),
                    'RsumSkill4'       => $this->input->post('RsumSkill4'),
                    'RsumSkill5'       => $this->input->post('RsumSkill5'),
                    'SkillPercent'     => $this->input->post('SkillPercent'),
                    'LastEducation1'   => $this->input->post('LastEducation1'),
                    'LastEducation2'   => $this->input->post('LastEducation2'),
                    'LastEducation3'   => $this->input->post('LastEducation3'),
                    'Achieve1'         => $this->input->post('Achieve1'),
                    'Achieve2'         => $this->input->post('Achieve2'),
                    'Achieve3'         => $this->input->post('Achieve3'),
                    'BirthDate'        => $this->input->post('BirthDate'),
                    'Gender'           => $this->input->post('Gender'),
                    'Religion'         => $this->input->post('Religion'),
                    'CreatedOn'        => date("l, d M Y"),
                    'UserId'           => $this->input->post('UserId')
              );
            }            
        
        $checkRole   = $this->mresume->checkRole($userid);
        $checkResume = $this->mresume->checkResume($userid);

        if($checkRole[0]->RoleId == 1){
            $data = $this->security->xss_clean($data);
            $this->mresume->add_record($data);
            $resumid = $this->db->insert_id();

            foreach($proid as $item){                
                $rsumpro = array(
                    'RsumId'  => $resumid,
                    'ProId'   => $item
                );    
                 $this->db->insert('tbresume_project', $rsumpro);
            } 

            helper_log("add", "create resume ".$this->input->post('RsumName'));
            $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Adding resume success</div>");
            redirect('home/resume');    
        }
        else {
            if($checkResume != null){
                $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">You've been filling resume before</div>");
                redirect('home/resume'); 
            }
            else {
                $data = $this->security->xss_clean($data);
                $this->mresume->add_record($data);
                $resumid = $this->db->insert_id();
                foreach($proid as $item){                
                    $rsumpro = array(
                        'RsumId'  => $resumid,
                        'ProId'   => $item
                    );    
                     $this->db->insert('tbresume_project', $rsumpro);
                } 

                helper_log("add", "create resume ".$this->input->post('RsumName'));
                $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Adding resume success</div>");
                redirect('home/resume');
            }
        }
        
	}  
    
    public function updateresume()
    {
            //upload
            $config['upload_path']          = 'assets/images/resume/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2400;
            $config['max_width']            = 1200;
            $config['max_height']           = 1200;
            $config['min_width']            = 165;
            $config['min_height']           = 114;
            $config['file_name']            = 'resume-'.trim(str_replace(" ","",date('dmYHisu')));

            $this->load->library('upload', $config);
            $upload_img = $this->upload->do_upload('image');    
        
            if(!$upload_img){
            $photo = $this->upload->data();
            $data = array(
                    'RsumName'             => $this->input->post('RsumName'),
                    'RsumTelp'             => $this->input->post('RsumTelp'),
                    'RsumJob'              => $this->input->post('RsumJob'),
                    'RsumSkill1'           => $this->input->post('RsumSkill1'),
                    'RsumSkill2'           => $this->input->post('RsumSkill2'),
                    'RsumSkill3'           => $this->input->post('RsumSkill3'),
                    'RsumSkill4'           => $this->input->post('RsumSkill4'),
                    'RsumSkill5'           => $this->input->post('RsumSkill5'),
                    'SkillPercent'         => $this->input->post('SkillPercent'),
                    'LastEducation1'       => $this->input->post('LastEducation1'),
                    'LastEducation2'       => $this->input->post('LastEducation2'),
                    'LastEducation3'       => $this->input->post('LastEducation3'),
                    'Achieve1'             => $this->input->post('Achieve1'),
                    'Achieve2'             => $this->input->post('Achieve2'),
                    'Achieve3'             => $this->input->post('Achieve3'),
                    'BirthDate'            => $this->input->post('BirthDate'),
                    'Gender'               => $this->input->post('Gender'),
                    'Religion'             => $this->input->post('Religion')
            );   
            }elseif($upload_img){
              $photo = $this->upload->data();
              $data = array(
                    'RsumName'             => $this->input->post('RsumName'),
                    'RsumTelp'             => $this->input->post('RsumTelp'),
                    'RsumJob'              => $this->input->post('RsumJob'),
                    'RsumSkill1'           => $this->input->post('RsumSkill1'),
                    'RsumSkill2'           => $this->input->post('RsumSkill2'),
                    'RsumSkill3'           => $this->input->post('RsumSkill3'),
                    'RsumSkill4'           => $this->input->post('RsumSkill4'),
                    'RsumSkill5'           => $this->input->post('RsumSkill5'),
                    'SkillPercent'         => $this->input->post('SkillPercent'),
                    'LastEducation1'       => $this->input->post('LastEducation1'),
                    'LastEducation2'       => $this->input->post('LastEducation2'),
                    'LastEducation3'       => $this->input->post('LastEducation3'),
                    'Achieve1'             => $this->input->post('Achieve1'),
                    'Achieve2'             => $this->input->post('Achieve2'),
                    'Achieve3'             => $this->input->post('Achieve3'),
                    'BirthDate'            => $this->input->post('BirthDate'),
                    'Gender'               => $this->input->post('Gender'),
                    'Religion'             => $this->input->post('Religion'),
                    'RsumImage'            => base_img().'resume/'.$photo['file_name']
                    );
                }
        $data = $this->security->xss_clean($data);
        $this->mresume->updateresume($data); 

        helper_log("update", "update resume ".$this->input->post('RsumName')); 
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Updating resume success</div>"); 
        $this->load->view('home', $data); 
        redirect('home/resume');  
    }

	function updateproject()
	{                
        $proid = $this->input->post('item');
        $resumid = $this->input->post('RsumId');

        foreach($proid as $item){                
            $rsumpro = array(
                'RsumId'      => $resumid,
                'ProId'       => $item,
                'AsignStatus' => 0
            );

            $rsumname = $this->mproject->RsumName($resumid)->result();
            $proname = $this->mproject->ProName($item);
            helper_log("asign", "asign project ".$proname[0]->ProName." to member ".$rsumname[0]->RsumName);    
            $this->db->insert('tbresume_project', $rsumpro);
        } 
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Asign Project Success</div>");
        redirect($this->agent->referrer());
	}    
    
    function delete() {
        $id = $this->input->post('rsumid');
        $rsumname = $this->mproject->RsumName($id)->result();
        helper_log("delete", "delete resume ".$rsumname[0]->RsumName);
        $this->mresume->delete($id);
        
        $photo = $this->input->post('rsumimage');
        $path = str_replace('//localhost','D:\xampp\htdocs',$photo);
            
        $image =  str_replace('/','\\',$path);
        $ava =  str_replace(array('http:','https:'),'',$image);
        unlink($ava);
        
        var_dump($photo);
        
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-warning\" id=\"alert\">Deleting Resume Success</div>");        
        redirect("home/resume");
    }     
    
   
    
}
