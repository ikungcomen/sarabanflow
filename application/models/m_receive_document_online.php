<?php

class m_receive_document_online extends CI_Model{
    //put your code here
    public function getDataReceive()
    {     
        $id    = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = " 
            select * , a.id AS document_outside,b.id AS id_create_number ,b.registration_type as regis_type_for_create  from registration_send_document_outside a
            left join registration_create_number b  on a.registration_create_number_id = b.id
            left join registration_create_number_of_run d on b.id = d.registration_create_number_id
            left join department_of_instutition e on b.department_of_instutition_id = e.id
            where a.institution_id_for_send = $id 
            and a.institution_level_for_send = '$level'
            and a.status_receive = 'no'
            and a.status_return_document = 'no'
            ORDER BY b.implementation_date DESC, b.implementation_time DESC , b.id DESC
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function getDataReceive_center(){
        $id    = $this->instutition_main_id;
        $level = $this->instutition_main_level;
        $sql = " 
            select * , a.id AS document_outside,b.id AS id_create_number ,b.registration_type as regis_type_for_create  from registration_send_document_outside a
            left join registration_create_number b  on a.registration_create_number_id = b.id
            left join registration_create_number_of_run d on b.id = d.registration_create_number_id
            left join department_of_instutition e on b.department_of_instutition_id = e.id
            where a.institution_id_for_send = $id 
            and a.institution_level_for_send = '$level'
            and a.status_receive = 'no'
            and a.status_return_document = 'no'
            ORDER BY b.implementation_date DESC, b.implementation_time DESC , b.id DESC
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function getDataReceiveOnlineDep(){
        $this->db->select('receive_document_department.*, registration_receive_document.*, receive_document_department.id as receive_document_department_id');
        $this->db->from('receive_document_department');
        
        $this->db->join('registration_receive_document', 'registration_receive_document.id = receive_document_department.registration_receive_document_id');
        
        $this->db->where('receive_document_department.department_of_instutition_id', $this->department_of_instutition_id);
        $this->db->where('receive_document_department.status_receive', 'no');
        $this->db->where('receive_document_department.status_return_document', 'no');
        
        $this->db->where('receive_document_department.active', 1);
        
        $this->db->order_by('registration_receive_document.implementation_date', 'desc');
        $this->db->order_by('registration_receive_document.implementation_time', 'desc');
        $this->db->order_by('receive_document_department.id', 'desc');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getDetail($receive_document_department_id){
        $this->db->select('receive_document_department.*, registration_receive_document.*, receive_document_department.id as receive_document_department_id');
        $this->db->from('receive_document_department');
        
        $this->db->join('registration_receive_document', 'registration_receive_document.id = receive_document_department.registration_receive_document_id');
        
        $this->db->where('receive_document_department.department_of_instutition_id', $this->department_of_instutition_id);
        $this->db->where('receive_document_department.status_receive', 'no');
        $this->db->where('receive_document_department.status_return_document', 'no');
        $this->db->where('receive_document_department.id', $receive_document_department_id);
        
        $this->db->where('receive_document_department.active', 1);
        $this->db->order_by('receive_document_department.id', 'desc');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getDataFileOld($registration_create_number_id){
        $this->db->select('*');
        $this->db->from('registration_create_number_file_upload');
        $this->db->where('registration_create_number_id', $registration_create_number_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDataFileNew($registration_receive_document_id){
        $this->db->select('*');
        $this->db->from('registration_receive_document_file_upload');
        $this->db->where('registration_receive_document_id', $registration_receive_document_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_number_of_run_old($department_of_instutition_id){
        $this->db->select_max('number_of_run');
        $this -> db -> where('department_of_instutition_id', $department_of_instutition_id);
        
        $query = $this->db->get('receive_document_department_of_run');
        return $query->result_array();
    }
    
    public function save_number_of_run_dep($data){
        $this->db->insert('receive_document_department_of_run',$data);
    }
}
