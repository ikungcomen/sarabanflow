<?php

class m_reciept_book extends CI_Model{
    //put your code here
    function getDataReceive_accept($limit = 30, $offset = 0){
        
        $this->db->select('receive_document_department.*, registration_receive_document.*, receive_document_department_of_run.*, registration_receive_document.id as registration_receive_document_id');
        $this->db->from('receive_document_department');
        $this->db->join('registration_receive_document', 'registration_receive_document.id = receive_document_department.registration_receive_document_id');
        $this->db->join('receive_document_department_of_run', 'receive_document_department_of_run.receive_document_department_id = receive_document_department.id');
        
        $this->db->where('receive_document_department.department_of_instutition_id', $this->department_of_instutition_id);
        $this->db->where('receive_document_department.status_receive', 'yes');
        $this->db->where('receive_document_department.status_return_document', 'no');
        $this->db->where('receive_document_department.active', 1);
        
        $this->db->order_by('receive_document_department_of_run.id', 'desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function CountDataReceive_accept(){
        $this->db->select('receive_document_department.*, registration_receive_document.*, receive_document_department_of_run.*');
        $this->db->from('receive_document_department');
        $this->db->join('registration_receive_document', 'registration_receive_document.id = receive_document_department.registration_receive_document_id');
        $this->db->join('receive_document_department_of_run', 'receive_document_department_of_run.receive_document_department_id = receive_document_department.id');
        
        $this->db->where('receive_document_department.department_of_instutition_id', $this->department_of_instutition_id);
        $this->db->where('receive_document_department.status_receive', 'yes');
        $this->db->where('receive_document_department.status_return_document', 'no');
        $this->db->where('receive_document_department.active', 1);
        
        $this->db->order_by('receive_document_department_of_run.id', 'desc');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function getDataReceive_accept_search_word($search, $limit = 30, $offset = 0){
        $this->db->select('receive_document_department.*, registration_receive_document.*, receive_document_department_of_run.*, registration_receive_document.id as registration_receive_document_id');
        $this->db->from('receive_document_department');
        $this->db->join('registration_receive_document', 'registration_receive_document.id = receive_document_department.registration_receive_document_id');
        $this->db->join('receive_document_department_of_run', 'receive_document_department_of_run.receive_document_department_id = receive_document_department.id');
        
        $this->db->where('receive_document_department.department_of_instutition_id', $this->department_of_instutition_id);
        $this->db->where('receive_document_department.status_receive', 'yes');
        $this->db->where('receive_document_department.status_return_document', 'no');
        $this->db->where('receive_document_department.active', 1);
        
        $this->db->like('registration_receive_document.subject', $search);
        $this->db->or_like('registration_receive_document.from', $search); 
        $this->db->or_like('registration_receive_document.to_receive', $search);
        
        $this->db->order_by('receive_document_department_of_run.id', 'desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function CountDataReceive_accept_search_word($search){
        $this->db->select('receive_document_department.*, registration_receive_document.*, receive_document_department_of_run.*, registration_receive_document.id as registration_receive_document_id');
        $this->db->from('receive_document_department');
        $this->db->join('registration_receive_document', 'registration_receive_document.id = receive_document_department.registration_receive_document_id');
        $this->db->join('receive_document_department_of_run', 'receive_document_department_of_run.receive_document_department_id = receive_document_department.id');
        
        $this->db->where('receive_document_department.department_of_instutition_id', $this->department_of_instutition_id);
        $this->db->where('receive_document_department.status_receive', 'yes');
        $this->db->where('receive_document_department.status_return_document', 'no');
        $this->db->where('receive_document_department.active', 1);
        
        $this->db->like('registration_receive_document.subject', $search);
        $this->db->or_like('registration_receive_document.from', $search); 
        $this->db->or_like('registration_receive_document.to_receive', $search);
        
        $this->db->order_by('receive_document_department_of_run.id', 'desc');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function getDataReceive_accept_search_date($start_date , $end_date, $limit = 30, $offset = 0){
        $this->db->select('receive_document_department.*, registration_receive_document.*, receive_document_department_of_run.*, registration_receive_document.id as registration_receive_document_id');
        $this->db->from('receive_document_department');
        $this->db->join('registration_receive_document', 'registration_receive_document.id = receive_document_department.registration_receive_document_id');
        $this->db->join('receive_document_department_of_run', 'receive_document_department_of_run.receive_document_department_id = receive_document_department.id');
        
        $this->db->where('receive_document_department.department_of_instutition_id', $this->department_of_instutition_id);
        $this->db->where('receive_document_department.status_receive', 'yes');
        $this->db->where('receive_document_department.status_return_document', 'no');
        $this->db->where('receive_document_department.active', 1);
        
        $this->db->where('receive_document_department.dep_receive_date >=', $start_date); 
        $this->db->where('receive_document_department.dep_receive_date <=', $end_date); 
        
        $this->db->order_by('receive_document_department_of_run.id', 'desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function CountDataReceive_accept_search_date($start_date , $end_date){
        $this->db->select('receive_document_department.*, registration_receive_document.*, receive_document_department_of_run.*, registration_receive_document.id as registration_receive_document_id');
        $this->db->from('receive_document_department');
        $this->db->join('registration_receive_document', 'registration_receive_document.id = receive_document_department.registration_receive_document_id');
        $this->db->join('receive_document_department_of_run', 'receive_document_department_of_run.receive_document_department_id = receive_document_department.id');
        
        $this->db->where('receive_document_department.department_of_instutition_id', $this->department_of_instutition_id);
        $this->db->where('receive_document_department.status_receive', 'yes');
        $this->db->where('receive_document_department.status_return_document', 'no');
        $this->db->where('receive_document_department.active', 1);
        
        $this->db->where('receive_document_department.dep_receive_date >=', $start_date); 
        $this->db->where('receive_document_department.dep_receive_date <=', $end_date); 
        
        $this->db->order_by('receive_document_department_of_run.id', 'desc');
        
        $query = $this->db->get();
        return $query->result_array();
    }
}
