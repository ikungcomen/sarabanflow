<?php

class m_receive_document_orther extends CI_Model{
    //put your code here
    function create_receive_document_other($data){
        $this->db->trans_start();
        $this->db->insert('registration_receive_document',$data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return  $insert_id;
    }
    
    function save_registration_receive_number_of_run($registration_receive_document_id, $level_institution_id, $level_institution, $custom_registration_receive_number){
        $data = array(
            "registration_receive_document_id" => $registration_receive_document_id,
            "level_institution_id" => $level_institution_id,
            "level_institution" => $level_institution,
            "number_of_run" => $custom_registration_receive_number
        );
        $this->db->trans_start();
        $this->db->insert('registration_receive_document_of_run',$data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return  $insert_id;
    }
    
    function update_registration_receive_document_other($registration_receive_document_id, $registration_receive_document_of_run_id){
        $data = array(
               'registration_receive_document_of_run_id' => $registration_receive_document_of_run_id
            );

        $this->db->where('id', $registration_receive_document_id);
        $this->db->update('registration_receive_document', $data); 
    }
    
    function check_registration_receive_number_of_run($level_institution_id, $level_institution){
        $this->db->select_max('number_of_run');
        $this -> db -> where('level_institution_id', $level_institution_id);
        $this -> db -> where('level_institution', $level_institution);
        $query = $this->db->get('registration_receive_document_of_run');
        return $query->result_array();
    }
    
    function check_exist_document_no($document_no,$level_institution_id = '',$level_institution = ''){
        $this->db->select('*');
        $this->db->from('registration_receive_document');
        $this->db->where('document_no', $document_no);
        $this->db->where('instutition_receiver_id', $level_institution_id);
        $this->db->where('instutition_receiver_level', $level_institution);
        
        $query = $this -> db -> get();
        return $query->result_array();
    }
    
    function get_data_registration_receive_document($registration_receive_document_id){
        $this->db->select('*');
        $this->db->from('registration_receive_document');
        $this->db->where('id', $registration_receive_document_id);
        
        $query = $this -> db -> get();
        return $query->result();
    }
    
    function get_data_number_of_run($registration_receive_document_id){
        $this->db->select('*');
        $this->db->from('registration_receive_document_of_run');
        $this->db->where('registration_receive_document_id', $registration_receive_document_id);
        
        $query = $this -> db -> get();
        return $query->result_array();
    }
    
    function get_data_file_upload($registration_receive_document_id){
        $this->db->select('*');
        $this->db->from('registration_receive_document_file_upload');
        $this->db->where('registration_receive_document_id', $registration_receive_document_id);
        
        $query = $this -> db -> get();
        return $query->result_array();
    }
    
    function registration_receive_upload_file($data){
        $this->db->insert('registration_receive_document_file_upload',$data);
    }
    
    function delete_file_upload_registration($id){
        $this->db->select('*');
        $this->db->from('registration_receive_document_file_upload');
        $this->db->where('id', $id);
        
        $query = $this -> db -> get();
        $temp = $query->result_array();
        
        unlink('uploads/registration_create_file/'.$temp[0]['file_upload_name']);
        
        $this->db->where('id', $id);
        $this->db->delete('registration_receive_document_file_upload'); 
    }
}
