<?php


class m_auth_login extends CI_Model{
    //put your code here
    function check_login($username,$password){
        $this -> db -> select('*');
        $this -> db -> from('normal_account');
        $this -> db -> where('username', $username);
        $this -> db -> where('password', $password);
        $this -> db -> limit(1);
        
        $query = $this -> db -> get();
        return $query->result();
    }
    function getDataProvinceOnly($province_id){
        $this -> db -> select('*');
        $this -> db -> from('province');
        $this -> db -> where('province_id', $province_id);
        
        $this -> db -> limit(1);
        
        $query = $this -> db -> get();
        return $query->result_array();
    }
    function getDataInstitutionForLogin($level_institution_id, $province_id, $level_institution){
        $this -> db -> select('*');
        $this -> db -> from($level_institution);
        $this -> db -> where('id', $level_institution_id);
        $this -> db -> where('province_id', $province_id);
        $this -> db -> limit(1);
        
        $query = $this -> db -> get();
        return $query->result_array();
    }
    function getAllDataLayerPriority(){
        $this -> db -> select('*');
        $this -> db -> from('layer_priority');
        
        $query = $this -> db -> get();
        return $query->result();
    }
    function getAllDataLayerSecret(){
        $this -> db -> select('*');
        $this -> db -> from('layer_secret');
        
        $query = $this -> db -> get();
        return $query->result();
    }
    function getAllDataObjective(){
        $this -> db -> select('*');
        $this -> db -> from('objective');
        
        $query = $this -> db -> get();
        return $query->result();
    }
    function getDataDepartment_of_instutition($department_of_instutition_id){
        $this -> db -> select('*');
        $this -> db -> from('department_of_instutition');
        $this -> db -> where('id', $department_of_instutition_id);
        $query = $this -> db -> get();
        return $query->result_array();
    }
    function getData_number_of_institution($level_institution_id, $level_institution){
        $this -> db -> select('*');
        $this -> db -> from('number_of_institution');
        $this -> db -> where('instutition_id', $level_institution_id);
        $this -> db -> where('instutition_level', $level_institution);
        $query = $this -> db -> get();
        return $query->result_array();
    }
    function getAllDataProvince(){
        $this -> db -> select('*');
        $this -> db -> from('province');
        
        $query = $this -> db -> get();
        return $query->result();
    }
}
