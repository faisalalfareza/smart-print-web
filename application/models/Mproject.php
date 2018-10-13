<?php

class Mproject extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }

    public function checking( $data ) {
        return $this->db->get_where('tbproject', $data);
    }   
    
    function getResume() {
        $this->db->order_by('RsumId', 'DESC');
        return $this->db->get('tbresume')->result();
    } 

    function getResumeRows() {
        $this->db->order_by('RsumId', 'DESC');
        return $this->db->get('tbresume')->num_rows();
    }

    function asignMember( $id ) {
        $asign = "SELECT * from tbresume WHERE RsumId NOT in (SELECT RsumId from tbresume_project where ProId=?)";
        $query = $this->db->query($asign, array($id));
        return $query;
    }           

    function ProName( $proid ) {
        $this->db->select('ProName');
        return $this->db->get_where('tbproject', array('ProId'=>$proid));
    }

    function RsumName( $rsumid ) {
        $this->db->select('RsumName');
        return $this->db->get_where('tbresume', array('RsumId'=>$rsumid))->result();
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

    function getArtikel() {
        $this->db->order_by('ArtclId', 'DESC');
        return $this->db->get('tbarticle')->result();
    }

    function getNews() {
        $this->db->order_by('NewsId', 'DESC');
        return $this->db->get('tbnews')->result();
    }     

    function add_record( $data ) {
        return $this->db->insert('tbproject', $data);
    }  

    function getById( $id ) {
        return $this->db->get_where('tbproject', array('ProId' => $id))->row();
    }          

    function getJoinRsum( $id ) {
        $joinRsum = "SELECT * from tbresume WHERE RsumId in (SELECT RsumId FROM tbresume_project WHERE ProId=? AND AsignStatus=?)";
        $query = $this->db->query($joinRsum, array($id,1));
        return $query;
    }  

    function getJoinRsumConf( $id ) {
        $joinRsumConf = "SELECT * from tbresume WHERE RsumId in (SELECT RsumId FROM tbresume_project WHERE ProId=? AND AsignStatus=?)";
        $query = $this->db->query($joinRsumConf, array($id,0));
        return $query;
    }         

    function getRole( $userid ) {
        $getRole = "SELECT * from tbrole WHERE RoleId in (SELECT RoleId FROM tbuser_role WHERE UserId=?)";
        $query = $this->db->query($getRole, array($userid));
        return $query->row();
    }     

    function updateproject( $data ) {
        $rsumid = $this->input->post('item');
        $proid = $this->input->post('ProId');        

        foreach($rsumid as $item){
            //Delete RsumId Where ProId
            $this->db->delete('tbresume_project', array('RsumId'=>$item,'ProId'=>$proid));
        } 

        //Update Data Project      
        $this->db->where('ProId', $proid);
        $this->db->update('tbproject', $data); 
    }  

    function confirm( $rsumid, $proid ) {
        $data = array('AsignStatus' => "1");      

        $this->db->where(array('RsumId'=>$rsumid, 'ProId'=>$proid));
        $this->db->update('tbresume_project', $data);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Members Confirmed</div>");          
    }  
    
    function confirm_group() {
        $proid = $this->input->post('ProId');
        $members = $this->input->post('members');
        $data = array('AsignStatus' => "1");
                
        foreach($members as $item){
            $this->db->where(array('RsumId'=>$item, 'ProId'=>$proid));
            if($this->db->update('tbresume_project', $data)){

                $rsumname = $this->mproject->RsumName($item); 
                $proname = $this->mproject->ProName($proid);
                helper_log("confirm", "confirm member ".$rsumname[0]->RsumName." to ".$proname[0]->ProName);
                $this->session->set_flashdata("pesan", "<div class=\"alert alert-success fade in\" id=\"alert\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&#9679;</a>&nbsp; Members Confirmed &nbsp;</div>");                 
            }
        }      
    }    

    function delete( $id ) {
        return $this->db->delete('tbproject', array('ProId'=>$id));
    }       

}