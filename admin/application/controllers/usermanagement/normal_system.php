<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once APPPATH . 'libraries/sarabanflow_lib.php';

class normal_system extends sarabanflow_lib {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('usermanagement/m_usermanagement');
        $this->load->model('usermanagement/m_normal_system');
        
        
    }
    public function index() {
        
        $data['province'] = $this->m_normal_system->getDataProvinceAll();
        $this->load->view('usermanager/normal_system/normal_system',$data);
        
    }
    //----------------------------------------------------------------------------------------------
    public function show_page_institution_province($province_id){
        $data['institution_province'] = $this->m_normal_system->getDataInstitutionProvince($province_id);
        
        $this->load->view('usermanager/normal_system/institution_province_page',$data, FALSE);
    }
    public function list_user_institution_province(){
        $province_id = $this->input->post('province_id');
        $level_institution_id = $this->input->post('institution_province_id');
        $level_institution = "institution_province";
        
        $data["user_province"] = $this->m_normal_system->getDataListUserInstitution($province_id, $level_institution_id, $level_institution);
        $this->load->view('usermanager/normal_system/list_user_institution_province',$data, FALSE);
    }
    public function add_user_institution_province(){
        $username_of_province = $this->input->post('username_of_province');
        $password_of_province = $this->input->post('password_of_province');
        $fullname_of_province = $this->input->post('fullname_of_province');
        $user_detail_of_province = $this->input->post('user_detail_of_province');
        $permission_level_of_province = $this->input->post('permission_level_of_province');
        $province_id_of_province = $this->input->post('province_id_of_province');
        $institution_province_id_of_province = $this->input->post('institution_province_id_of_province');
        $designation_of_province = $this->input->post('designation_of_province');
        $department_of_province = $this->input->post('department_of_province');
        $normal_account_id = $this->input->post('normal_account_id');
        
        if(!$normal_account_id){
            $permission_level = 1;
            foreach($permission_level_of_province as $key => $val){
                $permission_level = ($val > $permission_level)? $val:$permission_level;
            }
            
            $data = array(
                "province_id" => $province_id_of_province,
                "department_of_instutition_id" => $department_of_province,
                "level_institution_id" => $institution_province_id_of_province,
                "level_institution" => "institution_province",
                "designation" => $designation_of_province,
                "username" => $username_of_province,
                "password" => $password_of_province,
                "fullname" => $fullname_of_province,
                "user_detail" => $user_detail_of_province,
                "permission_level" => $permission_level,
                "cdate" => date("Y-m-d H:i:s"),
                "udate" => date("Y-m-d H:i:s"),
                "active" => 1
            );
            $this->m_normal_system->add_user_institution_provinceDB($data);
            echo "success";
        }else{
            $permission_level = 1;
            foreach($permission_level_of_province as $key => $val){
                $permission_level = ($val > $permission_level)? $val:$permission_level;
            }
            
            $data = array(
                "province_id" => $province_id_of_province,
                "department_of_instutition_id" => $department_of_province,
                "level_institution_id" => $institution_province_id_of_province,
                "level_institution" => "institution_province",
                "designation" => $designation_of_province,
                "username" => $username_of_province,
                "password" => $password_of_province,
                "fullname" => $fullname_of_province,
                "user_detail" => $user_detail_of_province,
                "permission_level" => $permission_level,
                //"cdate" => date("Y-m-d H:i:s"),
                "udate" => date("Y-m-d H:i:s"),
                "active" => 1
            );
            $this->m_normal_system->update_user_institution_provinceDB($data,$normal_account_id);
            echo "success";
        }
    }
    public function remove_user_institution_province(){
        $normal_account_id = $this->input->post('normal_account_id');
        $this->m_normal_system->remove_user_institution_provinceDB($normal_account_id);
        echo "success";
    }
    public function edit_user_institution_province(){
        $normal_account_id = $this->input->post('normal_account_id');
        $result = $this->m_normal_system->edit_user_institution_provinceDB($normal_account_id);
        echo json_encode($result);
    }
    //---------------------------------------------------------------------------------------------
    public function show_page_institution_amphur(){
        $province_id = $this->input->post('province_id');
        $institution_province_id = $this->input->post('institution_province_id');
        
        $data['institution_amphur'] = $this->m_normal_system->getDataInstitutionAmphur($province_id, $institution_province_id);
        $this->load->view('usermanager/normal_system/institution_amphur_page',$data, FALSE);
    }
    public function list_user_institution_amphur(){
        $province_id = $this->input->post('province_id');
        $level_institution_id = $this->input->post('institution_amphur_id');
        $level_institution = "institution_amphur";
        
        $data["user_amphur"] = $this->m_normal_system->getDataListUserInstitution($province_id, $level_institution_id, $level_institution);
        $this->load->view('usermanager/normal_system/list_user_institution_amphur',$data, FALSE);
    }
    public function add_user_institution_amphur(){
        $username_of_amphur = $this->input->post('username_of_amphur');
        $password_of_amphur = $this->input->post('password_of_amphur');
        $fullname_of_amphur = $this->input->post('fullname_of_amphur');
        $user_detail_of_amphur = $this->input->post('user_detail_of_amphur');
        $permission_level_of_amphur = $this->input->post('permission_level_of_amphur');
        $province_id_of_amphur = $this->input->post('province_id_of_amphur');
        $institution_amphur_id_of_amphur = $this->input->post('institution_amphur_id_of_amphur');
        $designation_of_amphur = $this->input->post('designation_of_amphur');
        $department_of_amphur = $this->input->post('department_of_amphur');
        $normal_account_id = $this->input->post('normal_account_id_of_amphur');
        
        if(!$normal_account_id){
            $permission_level = 1;
            foreach($permission_level_of_amphur as $key => $val){
                $permission_level = ($val > $permission_level)? $val:$permission_level;
            }
            
            $data = array(
                "province_id" => $province_id_of_amphur,
                "department_of_instutition_id" => $department_of_amphur,
                "level_institution_id" => $institution_amphur_id_of_amphur,
                "level_institution" => "institution_amphur",
                "designation" => $designation_of_amphur,
                "username" => $username_of_amphur,
                "password" => $password_of_amphur,
                "fullname" => $fullname_of_amphur,
                "user_detail" => $user_detail_of_amphur,
                "permission_level" => $permission_level,
                "cdate" => date("Y-m-d H:i:s"),
                "udate" => date("Y-m-d H:i:s"),
                "active" => 1
            );
            $this->m_normal_system->add_user_institution_amphurDB($data);
            echo "success";
        }else{
            $permission_level = 1;
            foreach($permission_level_of_amphur as $key => $val){
                $permission_level = ($val > $permission_level)? $val:$permission_level;
            }
            
            $data = array(
                "province_id" => $province_id_of_amphur,
                "department_of_instutition_id" => $department_of_amphur,
                "level_institution_id" => $institution_amphur_id_of_amphur,
                "level_institution" => "institution_amphur",
                "designation" => $designation_of_amphur,
                "username" => $username_of_amphur,
                "password" => $password_of_amphur,
                "fullname" => $fullname_of_amphur,
                "user_detail" => $user_detail_of_amphur,
                "permission_level" => $permission_level,
                //"cdate" => date("Y-m-d H:i:s"),
                "udate" => date("Y-m-d H:i:s"),
                "active" => 1
            );
            $this->m_normal_system->update_user_institution_amphurDB($data,$normal_account_id);
            echo "success";
        }
    }
    public function edit_user_institution_amphur(){
        $normal_account_id = $this->input->post('normal_account_id');
        $result = $this->m_normal_system->edit_user_institution_amphurDB($normal_account_id);
        echo json_encode($result);
    }
    public function remove_user_institution_amphur(){
        $normal_account_id = $this->input->post('normal_account_id');
        $this->m_normal_system->remove_user_institution_amphurDB($normal_account_id);
        echo "success";
    }
    //---------------------------------------------------------------------------------------------------
    public function show_page_institution_district(){
        $province_id = $this->input->post('province_id');
        $institution_province_id = $this->input->post('institution_province_id');
        $institution_amphur_id = $this->input->post('institution_amphur_id');
        
        $data['institution_district'] = $this->m_normal_system->getDataInstitutionDistrict($province_id, $institution_province_id, $institution_amphur_id);
        $this->load->view('usermanager/normal_system/institution_district_page',$data, FALSE);
    }
    public function list_user_institution_district(){
        $province_id = $this->input->post('province_id');
        $level_institution_id = $this->input->post('institution_district_id');
        $level_institution = "institution_district";
        
        $data["user_district"] = $this->m_normal_system->getDataListUserInstitution($province_id, $level_institution_id, $level_institution);
        $this->load->view('usermanager/normal_system/list_user_institution_district',$data, FALSE);
    }
    public function add_user_institution_district(){
        $username_of_district = $this->input->post('username_of_district');
        $password_of_district = $this->input->post('password_of_district');
        $fullname_of_district = $this->input->post('fullname_of_district');
        $user_detail_of_district = $this->input->post('user_detail_of_district');
        $permission_level_of_district = $this->input->post('permission_level_of_district');
        $province_id_of_district = $this->input->post('province_id_of_district');
        $institution_district_id_of_district = $this->input->post('institution_district_id_of_district');
        $designation_of_district = $this->input->post('designation_of_district');
        $department_of_district = $this->input->post('department_of_district');
        $normal_account_id = $this->input->post('normal_account_id_of_district');
        
        if(!$normal_account_id){
            $permission_level = 1;
            foreach($permission_level_of_district as $key => $val){
                $permission_level = ($val > $permission_level)? $val:$permission_level;
            }
            
            $data = array(
                "province_id" => $province_id_of_district,
                "department_of_instutition_id" => $department_of_district,
                "level_institution_id" => $institution_district_id_of_district,
                "level_institution" => "institution_district",
                "designation" => $designation_of_district,
                "username" => $username_of_district,
                "password" => $password_of_district,
                "fullname" => $fullname_of_district,
                "user_detail" => $user_detail_of_district,
                "permission_level" => $permission_level,
                "cdate" => date("Y-m-d H:i:s"),
                "udate" => date("Y-m-d H:i:s"),
                "active" => 1
            );
            $this->m_normal_system->add_user_institution_districtDB($data);
            echo "success";
        }else{
            $permission_level = 1;
            foreach($permission_level_of_district as $key => $val){
                $permission_level = ($val > $permission_level)? $val:$permission_level;
            }
            
            $data = array(
                "province_id" => $province_id_of_district,
                "department_of_instutition_id" => $department_of_district,
                "level_institution_id" => $institution_district_id_of_district,
                "level_institution" => "institution_district",
                "designation" => $designation_of_district,
                "username" => $username_of_district,
                "password" => $password_of_district,
                "fullname" => $fullname_of_district,
                "user_detail" => $user_detail_of_district,
                "permission_level" => $permission_level,
                //"cdate" => date("Y-m-d H:i:s"),
                "udate" => date("Y-m-d H:i:s"),
                "active" => 1
            );
            $this->m_normal_system->update_user_institution_districtDB($data,$normal_account_id);
            echo "success";
        }
    }
    public function edit_user_institution_district(){
        $normal_account_id = $this->input->post('normal_account_id');
        $result = $this->m_normal_system->edit_user_institution_districtDB($normal_account_id);
        echo json_encode($result);
    }
    public function remove_user_institution_district(){
        $normal_account_id = $this->input->post('normal_account_id');
        $this->m_normal_system->remove_user_institution_districtDB($normal_account_id);
        echo "success";
    }
    //--------------------------------------------------------------------------------------------------
    
    public function get_data_department_of_province(){
        $institution_id = $this->input->post('institution_id');
        $instutition_level = $this->input->post('instutition_level');
        
        $result = $this->m_normal_system->get_data_department_of_province($institution_id, $instutition_level);
        echo "<option value=\"\">เลือกสังกัดแผนก</option>";
        foreach($result as $row){
            echo "<option value='".$row->id."'>".$row->department_name."</option>";
        }
        
    }
    
    public function check_user_normal_existing(){
        $username = $this->input->post('username');
        
        $this->db->select('*');
        $this->db->from('normal_account');
        $this->db->where('username', $username);
        $this->db->where('active', 1);
        $query = $this->db->get();
        $temp = $query->result_array();
        
        if(count($temp) > 0){
            echo "no";
        }else{
            echo "yes";
        }
    }
}
