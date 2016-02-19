
<?php

class m_detailreceiveoutsite extends CI_Model {
    

    public function get_type_receive($id_receive = '')
    {
        $sql = "
            select receive_type from registration_receive_document where id  = $id_receive
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function depart_list()
    {
        $id    = $this->level_institution_id;
        $level = $this->level_institution;
        $province_id = $this->province_id;
        $sql = "
            select * from department_of_instutition a
            where a.instutition_id =  $id
            and a.instutition_level = '$level'
            and a.province_id = $province_id 
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function getDetail($registration_receive_document_id = "") {
        $this->db->select('*');
        $this->db->from('registration_receive_document');
        $this->db->join('registration_receive_document_of_run', 'registration_receive_document_of_run.registration_receive_document_id = registration_receive_document.id');
        $this->db->where('registration_receive_document.id', $registration_receive_document_id);
        $query = $this -> db -> get();
        return $query->result_array();
    }
    
    function get_attach_file_old($registration_create_number_id){
        $this->db->select('*');
        $this->db->from('registration_create_number_file_upload');
        
        $this->db->where('registration_create_number_id', $registration_create_number_id);
        
        $query = $this -> db -> get();
        return $query->result_array();
    }
    
    function get_attach_file_new($registration_receive_document_id){
        $this->db->select('*');
        $this->db->from('registration_receive_document_file_upload');
        
        $this->db->where('registration_receive_document_id', $registration_receive_document_id);
        
        $query = $this -> db -> get();
        return $query->result_array();
    }
    
    function registration_receive_upload_file($data){
        $this->db->insert('registration_receive_document_file_upload',$data);
    }
    
    function delete_file_upload_registration($registration_receive_document_file_upload_id){
        $this->db->select('*');
        $this->db->from('registration_receive_document_file_upload');
        $this->db->where('id', $registration_receive_document_file_upload_id);
        
        $query = $this -> db -> get();
        $temp = $query->result_array();
        
        unlink('uploads/registration_create_file/'.$temp[0]['file_upload_name']);
        
        $this->db->where('id', $registration_receive_document_file_upload_id);
        $this->db->delete('registration_receive_document_file_upload'); 
    }
    
    function check_receive_document($registration_create_number_id){
        $this->db->select('*');
        $this->db->from('receive_document_department');
        $this->db->where('registration_create_number_id', $registration_create_number_id);
        $this->db->where('status_receive', 'yes');
        $this->db->where('active', 1);
        $query = $this -> db -> get();
        return $query->result_array();
    }
    
    function update_registration_recieve_number($data, $registration_receive_document_id){
        $this->db->where('id', $registration_receive_document_id);
        $this->db->update('registration_receive_document', $data);
    }
    
    function check_number_of_run_for_update($instutition_receiver_id, $instutition_receiver_level, $ducument_number_new){
        $this->db->select('*');
        $this->db->from('registration_receive_document_of_run');
        $this->db->where('level_institution_id', $instutition_receiver_id);
        $this->db->where('level_institution', $instutition_receiver_level);
        $this->db->where('number_of_run', $ducument_number_new);
        $query = $this -> db -> get();
        return $query->result_array();
    }
    
    function update_number_of_run($number_data, $registration_receive_document_id){
        $this->db->where('registration_receive_document_id', $registration_receive_document_id);
        $this->db->update('registration_receive_document_of_run', $number_data);
    }
}

?>