<?php

class Mwelcome extends CI_Model {
    
    function __construct() {
        parent::__construct();  
    }
    
    function listSnippets() {
        $this->db->order_by('idsnippet', 'DESC');
        return $this->db->get('ms_snippets')->result();
    }  

    function getRole( $userid ) {
        $getRole = "SELECT RoleId from ms_user WHERE UserId = ?";
        $query = $this->db->query($getRole, array($userid));
        return $query->row();
    }

    function getNews() {
        $this->db->order_by('NewsId', 'DESC');
        return $this->db->get('ms_news')->result();
    }
    
    function getArtikel() {
        $this->db->order_by('ArtclId', 'DESC');
        return $this->db->get('ms_article')->result();
    }       
    
}