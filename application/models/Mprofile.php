<?php

class Mprofile extends CI_Model {
    
    function __construct() {
        parent::__construct();  
    }
    
    function getMerchantByUserId($userid) {
        return $this->db->get_where('ms_merchant', array('UserId' => $userid))->row();
    } 

    function updateProfile($merchantId, $data) {  
        $this->db->where('MerchantId', $merchantId);
        $this->db->update('ms_merchant', $data); 
    } 
}