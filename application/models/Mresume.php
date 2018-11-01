<?php

class Mresume extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function checking( $data ) {
        return $this->db->get_where('ms_resume', $data);
    }

    function checkResume( $userid ) {
        $this->db->where('UserId', $userid);
        return $this->db->get('ms_resume')->row();
    }     

    function checkRole( $userid ) {
        $check = "SELECT RoleId from ms_role WHERE RoleId in (SELECT RoleId from ms_user_role where UserId=?)";
        $query = $this->db->query($check, array($userid));
        return $query->result();
    }          
    
    function getResume() {
        $this->db->order_by('RsumId', 'DESC');
        return $this->db->get('ms_resume')->result();
    }

    function ProName( $proid ) {
        $this->db->select('ProName');
        return $this->db->get_where('ms_project', array('ProId'=>$proid))->result();
    }

    function RsumName( $rsumid ) {
        $this->db->select('RsumName');
        return $this->db->get_where('ms_resume', array('RsumId'=>$rsumid));
    }     

    function getJob() {
        $this->db->distinct();
        $this->db->select('RsumJob');
        $this->db->order_by('RsumId', 'DESC');
        return $this->db->get('ms_resume')->result();
    }

    function getSkill() {
        $this->db->distinct();
        $this->db->select('RsumSkill1');
        $this->db->order_by('RsumId', 'DESC');
        return $this->db->get('ms_resume')->result();
    }  

    function getProject() {
        $this->db->where('Privilage', 1);
        $this->db->order_by('ProId', 'DESC');
        return $this->db->get('ms_project')->result();
    }

    function asignProject( $id ) {
        $asign = "SELECT * from ms_project WHERE Privilage=? AND ProId NOT in (SELECT ProId from ms_resume_project where RsumId=?)";
        $query = $this->db->query($asign, array(1,$id));
        return $query;
    }  

    function getArtikel() {
        $this->db->order_by('ArtclId', 'DESC');
        return $this->db->get('ms_article')->result();
    }   

    function getNews() {
        $this->db->order_by('NewsId', 'DESC');
        return $this->db->get('ms_news')->result();
    }       

    function add_record( $data ) {
        return $this->db->insert('ms_resume', $data);
    }   

    function gems_yId( $id ) {
        return $this->db->get_where('ms_resume', array('RsumId' => $id))->row();
    }  

    function getJoinPro( $id ) {
        $joinPro = "SELECT * from ms_project WHERE ProId in (SELECT ProId from ms_resume_project where RsumId=?)";
        $query = $this->db->query($joinPro, array($id));
        return $query;
    }    

    function getRole( $userid ) {
        $getRole = "SELECT * from ms_role WHERE RoleId in (SELECT RoleId FROM ms_user_role WHERE UserId=?)";
        $query = $this->db->query($getRole, array($userid));
        return $query->row();
    }   

    function updateresume( $data ){
        $proid = $this->input->post('item');
        $rsumid = $this->input->post('RsumId');        

        foreach($proid as $item){
            $this->db->delete('ms_resume_project', array('ProId'=>$item,'RsumId'=>$rsumid));
        } 
        $this->db->where('RsumId', $rsumid);
        $this->db->update('ms_resume', $data);
    }

    function delete( $id ) {
        return $this->db->delete('ms_resume', array('RsumId'=>$id));
    }       

}