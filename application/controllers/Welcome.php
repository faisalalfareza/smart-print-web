<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
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

        $data['news'] =  $this->mwelcome->getNews();
        $data['artikel'] =  $this->mwelcome->getArtikel();

        // $url = 'http://jsonplaceholder.typicode.com/users';
        // $result = $this->curl->native_curl($url);
        // var_dump($result[0]->name);
        // $data['news'] =  $this->mwelcome->listNews();
        // $data['artikel'] =  $this->mwelcome->listArtikel();
		$this->load->view('welcome', $data);
    }
    
    
}
