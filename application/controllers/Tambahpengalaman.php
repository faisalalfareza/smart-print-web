<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambahpengalaman extends CI_Controller {
    
	public function __construct() {
        parent::__construct(); 
        $this->load->database();
    }
    
	public function index()
	{
        if(isset($this->session->userdata('sc_sess')['UserId'])) {
            $userid = $this->session->userdata('sc_sess')['UserId'];
            $data['role'] = $this->mwelcome->getRole($userid);
        }   

        $data['listsnippets'] = $this->mwelcome->listSnippets();
		$this->load->view('users/tambahpengalaman', $data);
    }
    
    
}
