<?php


class m_normal_system extends CI_Model{
    //put your code here
    function getDataProvinceAll(){
        $this->db->select('*');
        $this->db->from('province');
        $this->db->order_by('province_name','asc');
        $result = $this->db->get();
        return $result->result();
    }
    function getDataInstitutionProvince($province_id){
        $this->db->select('*');
        $this->db->from('institution_province');
        $this->db->where('province_id',$province_id);
        $this->db->where('active',1);
        $this->db->order_by('institution_province_name','asc');
        $result = $this->db->get();
        return $result->result();
    }
    function getDataInstitutionAmphur($province_id, $institution_province_id){
        $this->db->select('*');
        $this->db->from('institution_amphur');
        $this->db->where('province_id',$province_id);
        $this->db->where('institution_province_id',$institution_province_id);
        $this->db->where('active',1);
        $this->db->order_by('institution_amphur_name','asc');
        $result = $this->db->get();
        return $result->result();
    }
    function getDataInstitutionDistrict($province_id, $institution_province_id, $institution_amphur_id){
        $this->db->select('*');
        $this->db->from('institution_district');
        $this->db->where('province_id',$province_id);
        $this->db->where('institution_province_id',$institution_province_id);
        $this->db->where('institution_amphur_id',$institution_amphur_id);
        $this->db->where('active',1);
        $this->db->order_by('institution_district_name','asc');
        $result = $this->db->get();
        return $result->result();
    }
    function getDataListUserInstitution($province_id, $level_institution_id, $level_institution){
        $this->db->select('*');
        $this->db->from('normal_account');
        $this->db->where('province_id',$province_id);
        $this->db->where('level_institution_id',$level_institution_id);
        $this->db->where('level_institution',$level_institution);
        $this->db->order_by('fullname','asc');
        $result = $this->db->get();
        return $result->result();
    }
    //-----------------------------------------------------------------------------
    function add_user_institution_provinceDB($data){
        $this->db->insert('normal_account', $data);
    }
    function remove_user_institution_provinceDB($normal_account_id){
        $this->db->where('id', $normal_account_id);
        $this->db->delete('normal_account'); 
    }
    function edit_user_institution_provinceDB($normal_account_id){
        $this->db->select('*');
        $this->db->from('normal_account');
        $this->db->where('id',$normal_account_id);
        
        $result = $this->db->get();
        return $result->result_array();
    }
    function update_user_institution_provinceDB($data,$normal_account_id){
        $this->db->where('id', $normal_account_id);
        $this->db->update('normal_account', $data); 

    }
    //---------------------------------------------------------------------------
    function add_user_institution_amphurDB($data){
        $this->db->insert('normal_account', $data);
    }
    function update_user_institution_amphurDB($data,$normal_account_id){
        $this->db->where('id', $normal_account_id);
        $this->db->update('normal_account', $data); 
    }
    function edit_user_institution_amphurDB($normal_account_id){
        $this->db->select('*');
        $this->db->from('normal_account');
        $this->db->where('id',$normal_account_id);
        
        $result = $this->db->get();
        return $result->result_array();
    }
    function remove_user_institution_amphurDB($normal_account_id){
        $this->db->where('id', $normal_account_id);
        $this->db->delete('normal_account'); 
    }
    //----------------------------------------------------------------------------
    function add_user_institution_districtDB($data){
        $this->db->insert('normal_account', $data);
    }
    function update_user_institution_districtDB($data,$normal_account_id){
        $this->db->where('id', $normal_account_id);
        $this->db->update('normal_account', $data); 
    }
    function edit_user_institution_districtDB($normal_account_id){
        $this->db->select('*');
        $this->db->from('normal_account');
        $this->db->where('id',$normal_account_id);
        
        $result = $this->db->get();
        return $result->result_array();
    }
    function remove_user_institution_districtDB($normal_account_id){
        $this->db->where('id', $normal_account_id);
        $this->db->delete('normal_account'); 
    }
    function get_data_department_of_province($institution_id , $instutition_level){
        $this->db->select('*');
        $this->db->from('department_of_instutition');
        $this->db->where('instutition_id',$institution_id);
        $this->db->where('instutition_level', $instutition_level);
        $this->db->where('active',1);
        $result = $this->db->get();
        return $result->result();
    }
}
