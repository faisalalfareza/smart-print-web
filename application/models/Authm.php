<?php

class Authm extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->library(array('encrypt', 'email', 'Bcrypt'));
    }

    function checking_unique( $email ) {  
        return $this->db->get_where('tbuser', array('UserEmail'=>$email));
    }       

    /* BCrypte Hashing */
    function getUserByLogin($UserEmail, $UserPass) {  
        $this->db->where('UserEmail', $UserEmail);
        $result = $this->getUsers($UserPass);

        if (!empty($result)) {
            return $result;
        } else {
            return null;
        }
    }
    function getUsers($UserPass) {
        $query = $this->db->get('tbuser');

        if ($query->num_rows() > 0) {

            $result = $query->row_array();

            if ($this->bcrypt->check_password($UserPass, $result['UserPass'])) {
                //We're good
                return $result;
            } else {
                //Wrong password
                return array();
            }

        } else {
            return array();
        }
    }
    /* Hasing End */ 

   
    function get_records() {
        return $this->db->get('tbuser')->result();
    }

    function add_record( $data ) {
        return $this->db->insert('tbuser', $data);
    }   

    function add_to_userrole() {
        $userrole = array(
            'UserId'  => $this->db->insert_id(),            
            'RoleId'  => '2'
        );             
        $this->db->insert('tbuser_role', $userrole);
        return;
    } 

    function changeActiveState( $id ) {
        $data = array('UserStatus' => 1);

        $this->db->where('UserId', $id);
        $this->db->update('tbuser', $data);
    }    

    function add_responden( $data ) {
        return $this->db->insert('tbresponden', $data);
    } 

    function add_collaborate( $data ) {
        return $this->db->insert('tbcollaborate', $data);
    } 

}