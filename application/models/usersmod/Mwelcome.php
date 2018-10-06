<?php

class Mwelcome extends CI_Model {
    
    function __construct() {
        parent::__construct();  
    }
    
    function listSnippets() {
        $this->db->order_by('idsnippet', 'DESC');
        return $this->db->get('tbsnippets')->result();
    }  

    function getRole( $userid ) {
        $getRole = "SELECT * from tbrole WHERE RoleId in (SELECT RoleId FROM tbuser_role WHERE UserId=?)";
        $query = $this->db->query($getRole, array($userid));
        return $query->row();
    }  

    // function listNews() {
    //     $this->db->order_by('NewsId', 'DESC');
    //     return $this->db->get('tbnews')->result();
    // }

    // function listArtikel() {
    //     $this->db->order_by('ArtclId', 'DESC');
    //     return $this->db->get('tbarticle')->result();
    // }       
    
}