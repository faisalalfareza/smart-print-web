<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
	public function __construct() {
        parent::__construct(); 
        $this->load->database();
        $this->load->model(array('mdocument', 'mwelcome', 'mprofile'));
        $this->load->library(array('Bcrypt','user_agent'));
    }
    
	public function detail($userId)
	{
        if(isset($this->session->userdata('sc_sess')['UserId'])) {
            $userid = $this->session->userdata('sc_sess')['UserId'];
            $data['role'] = $this->mdocument->getRole($userid);

            // switch($data['role']->RoleId) {
            //     case "1":
            //     break;

            //     case "2":
            //         // $data['title']        =  "Print Document(s)";	
            //         // $data['merchant']      =  $this->mdocument->getListMerchant();
            //         // $data['document']      =  $this->mdocument->getListDocument($userid);
            //         // $this->load->view('users/upload-document/portfolio-project', $data);
            //     break;

            //     case "3":
            //         // $data['title']         =  "Manage Document(s)";	
            //         // $data['merchant']      =  $this->mdocument->getListMerchant();
            //         // $data['document']      =  $this->mdocument->getListDocument($userid);
                    
            //         // $data['requested']     =  $this->mdocument->getRequestedDocument();
            //         // $data['processed']     =  $this->mdocument->getProcessedDocument();
            //         // $data['finished']      =  $this->mdocument->getFinishedDocument();

            //         // $this->load->view('merchant/manage-document/manage-document', $data);
            //     break;
            // }
        }   


        $data['document'] = $this->mdocument->getListDocument($userid);
        $data['merchant'] = $this->mprofile->getMerchantByUserId($userid);
        $data['title'] =  "Merchant Profile";
		$this->load->view('merchant/profile/profile-details', $data);
    }
    
    public function updateProfile() {
        $data = array(
            'MerchantCode'      => $this->input->post('MerchantCode'),
            'MerchantName'      => $this->input->post('MerchantName'),
            'MerchantAddress'   => $this->input->post('MerchantAddress'),
            'MerchantDesc'      => $this->input->post('MerchantDesc'),
            'EstablishedDate'   => $this->input->post('EstablishedDate'),
            'MerchantTelp'       => $this->input->post('MerchantTelp'),
            'MerchantEmail'      => $this->input->post('MerchantEmail')            
        );  
        $data = $this->security->xss_clean($data);
        $this->mprofile->updateProfile($this->input->post('MerchantId'), $data); 
        redirect($this->agent->referrer());
    }
}
