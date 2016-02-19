<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_dataExport
 *
 * @author chaowalit
 */
class m_dataexport extends CI_Model{
    //put your code here
    function registration_create($data){
        $this->db->trans_start();
        $this->db->insert('registration_create_number',$data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return  $insert_id;
    }
    function report_detail_registration_create($registration_create_number_id){
        $this -> db -> select('*');
        $this -> db -> from('registration_create_number');
        $this -> db -> where('id', $registration_create_number_id);
        $query = $this -> db -> get();
        return $query->result();
    }
    function registration_create_upload_file($data){
        $this->db->insert('registration_create_number_file_upload',$data);
    }
    function check_registration_create_number_of_run($level_institution_id, $level_institution, $registration_type){
        $this->db->select_max('number_of_run');
        $this -> db -> where('level_institution_id', $level_institution_id);
        $this -> db -> where('level_institution', $level_institution);
        $this -> db -> where('registration_type', $registration_type);
        $query = $this->db->get('registration_create_number_of_run');
        return $query->result_array();
    }
    function save_registration_create_number_of_run($registration_create_number_id, $level_institution_id, $level_institution, $registration_type, $number_of_run){
        $data = array(
            "registration_create_number_id" => $registration_create_number_id,
            "level_institution_id" => $level_institution_id,
            "level_institution" => $level_institution,
            "registration_type" => $registration_type,
            "number_of_run" => $number_of_run
        );
        $this->db->trans_start();
        $this->db->insert('registration_create_number_of_run',$data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return  $insert_id;
    }
    function update_registration_create($registration_create_number_id, $registration_create_number_of_run_id){
        $data = array(
               'registration_create_number_of_run_id' => $registration_create_number_of_run_id
            );

        $this->db->where('id', $registration_create_number_id);
        $this->db->update('registration_create_number', $data); 
    }
    
    function get_number_of_run($registration_create_number_id){
        $this -> db -> select('*');
        $this -> db -> from('registration_create_number_of_run');
        $this -> db -> where('registration_create_number_id', $registration_create_number_id);
        $this -> db -> where('active', 1);
        $query = $this -> db -> get();
        return $query->result_array();
    }
    function get_data_department_of_instutition($province_id, $level_institution_id, $level_institution){
        $this -> db -> select('*');
        $this -> db -> from('department_of_instutition');
        $this -> db -> where('province_id', $province_id);
        $this -> db -> where('instutition_id', $level_institution_id);
        $this -> db -> where('instutition_level', $level_institution);
        $query = $this -> db -> get();
        return $query->result_array();
    }
    function get_image_update_registration_create($registration_create_number_id){
        $this -> db -> select('*');
        $this -> db -> from('registration_create_number_file_upload');
        $this -> db -> where('registration_create_number_id', $registration_create_number_id);
        
        $query = $this -> db -> get();
        return $query->result_array();
    }
    public function delete_file_upload_registration($registration_create_number_file_upload_id){
        $this->db->select('*');
        $this->db->from('registration_create_number_file_upload');
        $this->db->where('id', $registration_create_number_file_upload_id);
        
        $query = $this -> db -> get();
        $temp = $query->result_array();
        
        unlink('uploads/registration_create_file/'.$temp[0]['file_upload_name']);
        
        $this->db->where('id', $registration_create_number_file_upload_id);
        $this->db->delete('registration_create_number_file_upload'); 
    }
}
