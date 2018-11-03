<?php

class Mdocument extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // User

    function getListMerchant() {
        $this->db->order_by('MerchantCode', 'ASC');
        return $this->db->get('ms_merchant')->result();
    } 

    function getListDocument($userid) {
        
        $getDocumentName = "SELECT trdocdet.DocumentName, trdocdet.Note, msmrc.MerchantName
                  FROM tr_document trdoc 
                  JOIN tr_document_detail trdocdet 
                        ON trdoc.DocumentId = trdocdet.DocumentId
                  JOIN ms_merchant msmrc
                        ON trdoc.MerchantId = msmrc.MerchantId
                  WHERE trdoc.UserId = ? 
                        AND trdoc.DocumentId = trdocdet.DocumentId
                  GROUP BY trdocdet.DocumentName";
        $executeDocumentName = $this->db->query($getDocumentName, array($userid))->result();

        $getJoinDocument = "SELECT * FROM tr_document trdoc 
                  JOIN tr_document_detail trdocdet 
                  ON trdoc.DocumentId = trdocdet.DocumentId
                  WHERE trdoc.UserId = ? 
                        AND trdoc.DocumentId = trdocdet.DocumentId";
        $executeJoinDocument = $this->db->query($getJoinDocument, array($userid))->result();

        $data = null;
        foreach($executeDocumentName as $doc) {
            foreach($executeJoinDocument as $joinDoc) {
                if ($doc->DocumentName == $joinDoc->DocumentName) {
                    // print_r($doc->DocumentName);
                    $docDetail[] = $joinDoc;
                }
            }
            
            // print_r(json_encode($docDetail));
            $data[] = array(
                'DocumentName'   => $doc->DocumentName,
                'MerchantName'   => $doc->MerchantName,
                'Note'           => $doc->Note,
                'DocumentDetail' => $docDetail
            );
        }
        return $data;
    } 

    function uploadDocDetail($data) {
        return $this->db->insert('tr_document_detail', $data);
    }

    function uploadDoc($data) {
        return $this->db->insert('tr_document', $data);
    }  

    function getCurrentBatchMerchant($merchantId) {
        $this->db->select('MerchantQueueNumber');
        return $this->db->get_where('ms_batch_merchant', array('MerchantId'=>$merchantId))->result();
    } 

    function createBatchMerchant($data) {
        return $this->db->insert('ms_batch_merchant', $data);
    }  

    function updateBatchMerchant($merchantId, $queueNumber) {
        $this->db->where('MerchantId', $merchantId);
        $this->db->update('ms_batch_merchant', array('MerchantQueueNumber'=>$queueNumber)); 
    }  

    //   Merchant

    function getRequestedDocument() {
        $getReqDocument = "SELECT * FROM tr_document trdoc 
                  JOIN tr_document_detail trdocdet 
                    ON trdoc.DocumentId = trdocdet.DocumentId
                  JOIN ms_user msu 
                    ON msu.UserId = trdoc.UserId
                  WHERE trdoc.DocumentId = trdocdet.DocumentId
                    AND trdoc.Status = ?";
        $executeJoinDocument = $this->db->query($getReqDocument, array('requested'))->result();
        return $executeJoinDocument;
    }

    function getProcessedDocument() {
        $getProcDocument = "SELECT * FROM tr_document trdoc 
                  JOIN tr_document_detail trdocdet 
                    ON trdoc.DocumentId = trdocdet.DocumentId
                  JOIN ms_user msu 
                    ON msu.UserId = trdoc.UserId
                  WHERE trdoc.DocumentId = trdocdet.DocumentId
                    AND trdoc.Status = ?";
        $executeJoinDocument = $this->db->query($getProcDocument, array('inprogress'))->result();
        return $executeJoinDocument;
    }

    function getFinishedDocument() {
        $getFinDocument = "SELECT * FROM tr_document trdoc 
                  JOIN tr_document_detail trdocdet 
                    ON trdoc.DocumentId = trdocdet.DocumentId
                  JOIN ms_user msu 
                    ON msu.UserId = trdoc.UserId
                  WHERE trdoc.DocumentId = trdocdet.DocumentId
                    AND trdoc.Status = ?";
        $executeJoinDocument = $this->db->query($getFinDocument, array('finished'))->result();
        return $executeJoinDocument;
    }

    function updateStatusDoc($documentId, $status, $message) {
        $this->db->where('DocumentId', $documentId);
        $this->db->update('tr_document', array('Status' => $status));
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success fade in\" id=\"alert\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&#9679;</a>&nbsp; " .$message. " &nbsp;</div>");          
    }  
    
    function updateStatusDoc_group($status, $message) {
        $items = $this->input->post('item');
        foreach($items as $item){
            $this->db->where('DocumentId', $item);
            if($this->db->update('tr_document', array('Status' => $status))){
                $this->session->set_flashdata("pesan", "<div class=\"alert alert-success fade in\" id=\"alert\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&#9679;</a>&nbsp; ". count($items) ." ". $message ." &nbsp;</div>");                 
            }
        }      
    }

    // ------------------------------------------------------

    function getResume() {
        $this->db->order_by('RsumId', 'DESC');
        return $this->db->get('ms_resume')->result();
    } 

    public function checking( $data ) {
        return $this->db->get_where('ms_project', $data);
    }   

    function getResumeRows() {
        $this->db->order_by('RsumId', 'DESC');
        return $this->db->get('ms_resume')->num_rows();
    }

    function asignMember( $id ) {
        $asign = "SELECT * from ms_resume WHERE RsumId NOT in (SELECT RsumId from ms_resume_project where ProId=?)";
        $query = $this->db->query($asign, array($id));
        return $query;
    }           

    function ProName( $proid ) {
        $this->db->select('ProName');
        return $this->db->get_where('ms_project', array('ProId'=>$proid));
    }

    function RsumName( $rsumid ) {
        $this->db->select('RsumName');
        return $this->db->get_where('ms_resume', array('RsumId'=>$rsumid))->result();
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

    function getArtikel() {
        $this->db->order_by('ArtclId', 'DESC');
        return $this->db->get('ms_article')->result();
    }

    function getNews() {
        $this->db->order_by('NewsId', 'DESC');
        return $this->db->get('ms_news')->result();
    }     

    function gems_yId( $id ) {
        return $this->db->get_where('ms_project', array('ProId' => $id))->row();
    }          

    function getJoinRsum( $id ) {
        $joinRsum = "SELECT * from ms_resume WHERE RsumId in (SELECT RsumId FROM ms_resume_project WHERE ProId=? AND AsignStatus=?)";
        $query = $this->db->query($joinRsum, array($id,1));
        return $query;
    }  

    function getJoinRsumConf( $id ) {
        $joinRsumConf = "SELECT * from ms_resume WHERE RsumId in (SELECT RsumId FROM ms_resume_project WHERE ProId=? AND AsignStatus=?)";
        $query = $this->db->query($joinRsumConf, array($id,0));
        return $query;
    }         

    function getRole( $userid ) {
        $getRole = "SELECT * from ms_role WHERE RoleId in (SELECT RoleId FROM ms_user WHERE UserId=?)";
        $query = $this->db->query($getRole, array($userid));
        return $query->row();
    }     

    function updateproject( $data ) {
        $rsumid = $this->input->post('item');
        $proid = $this->input->post('ProId');        

        foreach($rsumid as $item){
            //Delete RsumId Where ProId
            $this->db->delete('ms_resume_project', array('RsumId'=>$item,'ProId'=>$proid));
        } 

        //Update Data Project      
        $this->db->where('ProId', $proid);
        $this->db->update('ms_project', $data); 
    }  

    function confirm( $rsumid, $proid ) {
        $data = array('AsignStatus' => "1");      

        $this->db->where(array('RsumId'=>$rsumid, 'ProId'=>$proid));
        $this->db->update('ms_resume_project', $data);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Members Confirmed</div>");          
    }  
    
    function confirm_group() {
        $proid = $this->input->post('ProId');
        $members = $this->input->post('members');
        $data = array('AsignStatus' => "1");
                
        foreach($members as $item){
            $this->db->where(array('RsumId'=>$item, 'ProId'=>$proid));
            if($this->db->update('ms_resume_project', $data)){

                $rsumname = $this->mproject->RsumName($item); 
                $proname = $this->mproject->ProName($proid);
                helper_log("confirm", "confirm member ".$rsumname[0]->RsumName." to ".$proname[0]->ProName);
                $this->session->set_flashdata("pesan", "<div class=\"alert alert-success fade in\" id=\"alert\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&#9679;</a>&nbsp; Members Confirmed &nbsp;</div>");                 
            }
        }      
    }    

    function delete( $id ) {
        return $this->db->delete('ms_project', array('ProId'=>$id));
    }       

}