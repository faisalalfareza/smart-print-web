<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
        parent::__construct();
    }   
    
    public function enc($data) {    
        $library =& get_instance();
        $library->load->library('encrypt');    
        $enc = $library->encrypt->encode($data);
        $enc = str_replace(array('+', '/', '='), array('-', '_', '~'), $enc);
        return $enc;
    }

    public function dec($data) {
        $library =& get_instance();             
        $library->load->library('encrypt');    
        $dec = str_replace(array('-', '_', '~'), array('+', '/', '='), $data);
        $dec = $library->encrypt->decode($dec);
        return $dec;
    }  

    public function antiInjection($data){  
        $con =  new mysqli($db); 
        $filter_sql = mysqli_escape_string($con, stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
        return $filter_sql;   
    }    
    
	public function index() 
	{
		$data['title'] = "Home";	
		$this->load->view('users/welcome', $data);
	}

	public function login() {
        if (($this->input->post('UserEmail', TRUE) && $this->input->post('UserPass', TRUE)) != null) {

            $UserEmail = $this->security->xss_clean($this->input->post('UserEmail', TRUE));
            $UserPass  = $this->security->xss_clean($this->antiInjection($this->input->post('UserPass', TRUE)));
            $Remember  = $this->security->xss_clean($this->input->post('remember', TRUE));
            $user      = $this->security->xss_clean($this->authm->getUserByLogin($UserEmail, $UserPass));
            
        }

        if ($user != null) {
            if($user['UserStatus'] == 1) {
                $sess_data['UserId']    = $user['UserId'];
                $sess_data['UserEmail'] = $user['UserEmail'];
                $sess_data['UserPass']  = $user['UserPass'];
                $sess_data['Remember']  = $Remember;
                $this->session->set_userdata('sc_sess', $sess_data);
                //helper_log("login", "logged in"); 

                $this->session->set_flashdata("regMsg", "<div class=\"alert alert-info fade in\" id=\"alert\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&#9679;</a>&nbsp; See our resume collection &nbsp;</div>");             
                redirect($this->agent->referrer());                
            }         
            else {    
                $this->session->set_flashdata("regMsg", "<div class=\"alert alert-warning fade in\" id=\"alert\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&#9679;</a>&nbsp; Akun anda belum aktif &nbsp;</div>");             
                redirect($this->agent->referrer());                  
            }                    
            
        }
        else { 
            $this->session->set_flashdata("regMsg", "<div class=\"alert alert-danger fade in\" id=\"alert\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&#9679;</a>&nbsp; Login failed. Try again &nbsp;</div>");  
            redirect($this->agent->referrer()); 
        }


	}    

	public function logout()
	{
        //helper_log("logout", "logged out");
		$this->session->unset_userdata('sc_sess');
		$this->session->sess_destroy();
		redirect($this->agent->referrer());
	}

    public function interested() {
        $data = array(
            'RespondenEmail' => $this->security->xss_clean($this->input->post('RespondenEmail'))    
        );

        $this->authm->add_responden($data);
        redirect($this->agent->referrer());
    }    

    public function collaboration() {
        $data = array(
            'CollaborateName' => $this->input->post('CollaborateName'),
            'CollaborateEmail' => $this->input->post('CollaborateEmail'),
            'CollaborateContact' => $this->input->post('CollaborateContact'),
            'CollaborateDescription' => $this->input->post('CollaborateDescription'),
            'CollaborateStatus' => $this->input->post('CollaborateStatus')   
        );

        $this->authm->add_collaborate( $this->security->xss_clean($data) );
        redirect($this->agent->referrer());
    }       
    
	public function register() {
        $email =  $this->security->xss_clean($this->input->post('UserEmail'));
        $pass  =  $this->security->xss_clean($this->input->post('UserPass'));
        $UserRole  =  $this->security->xss_clean($this->input->post('UserRole'));
        
        if ($UserRole == 'User') $RoleId = '2'; //User
        else $RoleId = '3'; //Merchant
        
        $data = array(
            'UserStatus'   => '1',
            'UserEmail'    => $email,  
            'UserPass'     => $this->bcrypt->hash_password($pass),
            'RoleId'       => $RoleId         
        );

        $data = $this->security->xss_clean($data);
        $unique = $this->authm->checking_unique($email);
        if ($unique->num_rows() == 0) {
            $this->authm->add_record_to_msuser($data);
            $userId = $this->db->insert_id();
            if ($RoleId == '3') {
                $this->authm->add_record_to_msmerchant($userId, $email);
            }

            $config = array(
                'charset'       => 'utf-8',
                'useragent'     => 'Codeigniter',
                'protocol'      => "smtp",
                'mailtype'      => "html",
                'smtp_host'     => "ssl://smtp.gmail.com", //pengaturan smtp
                'smtp_port'     => 465,
                'smtp_timeout'  => 400,
                'smtp_user'     => "mumiichaell@gmail.com", // isi dengan email kamu
                'smtp_pass'     => "muhammad16111997", // isi dengan password kamu
                'crlf'          => "\r\n",  
                'wordwrap'      => TRUE            
            );

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");

            //memanggil library email dan set konfigurasi untuk pengiriman email
            $this->email->initialize($config);

            //konfigurasi pengiriman
            $this->email->from($config['smtp_user']);
            $this->email->to($email);
            $this->email->subject("[Neogeeks] New Account");
            $this->email->message(
             "Your registration is successful. Wait for the confirmation email <br>".
             site_url("home")
            );

            $result = $this->email->send();
            $this->email->print_debugger();

            $this->session->set_flashdata("regMsg", "<div class=\"alert alert-success fade in\" id=\"alert\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&#9679;</a>&nbsp; Success. Check your email &nbsp;</div>");
            redirect(base_url());	
        }
        else{
            $this->session->set_flashdata("regMsg", "<div class=\"alert alert-warning fade in\" id=\"alert\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&#9679;</a>&nbsp; User already exists &nbsp;</div>");
             redirect(base_url());	
        }                 
				
	} 
    
    public function verification($id)
    {   
        $id = $this->dec($this->uri->segment(3));
        $query = $this->authm->changeActiveState($id);
        $this->session->set_flashdata("regMsg", "<div class=\"alert alert-success fade in\" id=\"alert\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&#9679;</a>&nbsp; Email activated. Please login &nbsp;</div>");
        redirect(base_url());  
    }
    
    public function requestforget()
    {    
        $email =  $this->security->xss_clean($this->input->post('UserEmail'));
        $unique = $this->authm->checking_unique($email);
        if ($email = $unique) {   
            //enkrispi id
            $encrypted_email = $this->enc($this->input->post('UserEmail'));

            $config = array(
                'charset'       => 'utf-8',
                'useragent'     => 'Codeigniter',
                'protocol'      => "smtp",
                'mailtype'      => "html",
                'smtp_host'     => "ssl://smtp.gmail.com", //pengaturan smtp
                'smtp_port'     => 465,
                'smtp_timeout'  => 400,
                'smtp_user'     => "mumiichaell@gmail.com", // isi dengan email kamu
                'smtp_pass'     => "muhammad16111997", // isi dengan password kamu
                'crlf'          => "\r\n",  
                'wordwrap'      => TRUE            
            );
        
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");

            //memanggil library email dan set konfigurasi untuk pengiriman email
            $this->email->initialize($config);

            //konfigurasi pengiriman
            $this->email->from($config['smtp_user']);
            $this->email->to($this->input->post('UserEmail'));
            $this->email->subject("[Neogeeks] New Account");
            $this->email->message("Please verify your password by clicking on the following url <br>".
            site_url("home/changePassword?email=".$encrypted_email)
            );

            if (!$this->email->send())
            {
                $this->session->set_flashdata("regMsg", "<div class=\"alert alert-danger fade in\" id=\"alert\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&#9679;</a>&nbsp; Send link failed &nbsp;</div>");
                redirect("home");   
            }else { 
                $this->session->set_flashdata("regMsg", "<div class=\"alert alert-success fade in\" id=\"alert\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&#9679;</a>&nbsp; Send Link Succsess &nbsp;</div>");
                redirect("home");
            }              
        }else{
             $this->session->set_flashdata("regMsg", "<div class=\"alert alert-warning fade in\" id=\"alert\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&#9679;</a>&nbsp; Incorrect email &nbsp;</div>");
            redirect(base_url());
        }
    }
    
}

?>