<?php

class Mresume extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function checking( $data ) {
        return $this->db->get_where('tbresume', $data);
    }

    function checkResume( $userid ) {
        $this->db->where('UserId', $userid);
        return $this->db->get('tbresume')->row();
    }     

    function checkRole( $userid ) {
        $check = "SELECT RoleId from tbrole WHERE RoleId in (SELECT RoleId from tbuser_role where UserId=?)";
        $query = $this->db->query($check, array($userid));
        return $query->result();
    }          
    
    function getResume() {
        $this->db->order_by('RsumId', 'DESC');
        return $this->db->get('tbresume')->result();
    }

    function ProName( $proid ) {
        $this->db->select('ProName');
        return $this->db->get_where('tbproject', array('ProId'=>$proid))->result();
    }

    function RsumName( $rsumid ) {
        $this->db->select('RsumName');
        return $this->db->get_where('tbresume', array('RsumId'=>$rsumid));
    }     

    function getJob() {
        $this->db->distinct();
        $this->db->select('RsumJob');
        $this->db->order_by('RsumId', 'DESC');
        return $this->db->get('tbresume')->result();
    }

    function getSkill() {
        $this->db->distinct();
        $this->db->select('RsumSkill1');
        $this->db->order_by('RsumId', 'DESC');
        return $this->db->get('tbresume')->result();
    }  

    function getProject() {
        $this->db->where('Privilage', 1);
        $this->db->order_by('ProId', 'DESC');
        return $this->db->get('tbproject')->result();
    }

    function asignProject( $id ) {
        $asign = "SELECT * from tbproject WHERE Privilage=? AND ProId NOT in (SELECT ProId from tbresume_project where RsumId=?)";
        $query = $this->db->query($asign, array(1,$id));
        return $query;
    }  

    function getArtikel() {
        $this->db->order_by('ArtclId', 'DESC');
        return $this->db->get('tbarticle')->result();
    }   

    function getNews() {
        $this->db->order_by('NewsId', 'DESC');
        return $this->db->get('tbnews')->result();
    }       

    function add_record( $data ) {
        return $this->db->insert('tbresume', $data);
    }   

    function getById( $id ) {
        return $this->db->get_where('tbresume', array('RsumId' => $id))->row();
    }  

    function getJoinPro( $id ) {
        $joinPro = "SELECT * from tbproject WHERE ProId in (SELECT ProId from tbresume_project where RsumId=?)";
        $query = $this->db->query($joinPro, array($id));
        return $query;
    }    

    function getRole( $userid ) {
        $getRole = "SELECT * from tbrole WHERE RoleId in (SELECT RoleId FROM tbuser_role WHERE UserId=?)";
        $query = $this->db->query($getRole, array($userid));
        return $query->row();
    }   

    function updateresume( $data ){
        $proid = $this->input->post('item');
        $rsumid = $this->input->post('RsumId');        

        foreach($proid as $item){
            $this->db->delete('tbresume_project', array('ProId'=>$item,'RsumId'=>$rsumid));
        } 
        $this->db->where('RsumId', $rsumid);
        $this->db->update('tbresume', $data);
    }

    function delete( $id ) {
        return $this->db->delete('tbresume', array('RsumId'=>$id));
    }       

}