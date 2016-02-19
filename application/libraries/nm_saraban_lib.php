<?php


class nm_saraban_lib extends CI_Controller{
    //put your code here
    private $CI;
    public $controller_name;
    public $method_name;
    //----------------------------------------
    public $normal_account_id;
    public $province_id;
    public $level_institution_id;
    public $level_institution;
    public $username;
    public $password;
    public $fullname;
    public $user_detail;
    public $permission_level;
    //---------------------------------------
    public $province_name;
    public $institution_name;
    public $institution_detail;
    //---------------------------------------
    public $department_of_instutition_id;
    public $designation;
    public $department_name;
    public $department_number;
    //---------------------------------------
    public $instutition_number;
    public $instutition_main_id;
    public $instutition_main_level;
    public $number_recieve;
    public $number_internal;
    public $number_external;
    public $setup_instutition_number1;
    public $setup_instutition_number2;
    public $setup_instutition_number3;
    public $set2_val;
    public $set3_val;
    public $active_center;
    
    public $nornal_type;
    public $nornal_text;
    public $vian_type;
    public $vian_text;
    public $command_type;
    public $command_text;
    public $radio_type;
    public $radio_text;
    public $receive_type;
    public $txt_receive;
    
    function __construct($id = null)
    {
        parent::__construct($id);
        $this->CI =& get_instance();
        $this->CI->load->model('m_auth_login');	
        $this->__login();
        
        $this->getControllerAndMethod();
        //$this->__updateDataLogin();
        //$this->load_js();
    }
    public function __login(){
        
        if($this->session->userdata('data_account_normal')){
            $data_login = $this->session->userdata('data_account_normal');
            
            $this->normal_account_id = $data_login['normal_account_id'];
            $this->department_of_instutition_id = $data_login['department_of_instutition_id'];
            $this->province_id = $data_login['province_id'];
            $this->level_institution_id = $data_login['level_institution_id'];
            $this->level_institution = $data_login['level_institution'];
            $this->designation = $data_login['designation'];
            $this->username = $data_login['username'];
            $this->password = $data_login['password'];
            $this->fullname = $data_login['fullname'];
            $this->user_detail = $data_login['user_detail'];
            $this->permission_level = $data_login['permission_level'];
            
            $temp_province = $this->CI->m_auth_login->getDataProvinceOnly($data_login['province_id']);
            $this->province_name = $temp_province[0]['province_name'];
            
            $temp_institution = $this->CI->m_auth_login->getDataInstitutionForLogin($this->level_institution_id, $this->province_id, $this->level_institution);
            $this->institution_name = $temp_institution[0][$this->level_institution.'_name'];
            $this->institution_detail = $temp_institution[0][$this->level_institution.'_detail'];
            
            $temp_department = $this->CI->m_auth_login->getDataDepartment_of_instutition($this->department_of_instutition_id);
            $this->department_name = $temp_department[0]['department_name'];
            $this->department_number = $temp_department[0]['department_id'];
            
            $temp_instutition_number = $this->CI->m_auth_login->getData_number_of_institution($this->level_institution_id, $this->level_institution);
            if(count($temp_instutition_number) > 0){
                $this->instutition_number = $temp_instutition_number[0]['instutition_number'];
                $this->instutition_main_id = $temp_instutition_number[0]['instutition_main_id'];
                $this->instutition_main_level = $temp_instutition_number[0]['instutition_main_level'];
                $this->number_recieve = $temp_instutition_number[0]['number_recieve'];
                $this->number_internal = $temp_instutition_number[0]['number_internal'];
                $this->number_external = $temp_instutition_number[0]['number_external'];
                $this->setup_instutition_number1 = $temp_instutition_number[0]['setup_instutition_number1'];
                $this->setup_instutition_number2 = $temp_instutition_number[0]['setup_instutition_number2'];
                $this->setup_instutition_number3 = $temp_instutition_number[0]['setup_instutition_number3'];
                $this->set2_val = $temp_instutition_number[0]['set2_val'];
                $this->set3_val = $temp_instutition_number[0]['set3_val'];
                $this->active_center = $temp_instutition_number[0]['active_center'];
                
                $this->nornal_type = $temp_instutition_number[0]['nornal_type'];
                $this->nornal_text = $temp_instutition_number[0]['nornal_text'];
                $this->vian_type = $temp_instutition_number[0]['vian_type'];
                $this->vian_text = $temp_instutition_number[0]['vian_text'];
                $this->command_type = $temp_instutition_number[0]['command_type'];
                $this->command_text = $temp_instutition_number[0]['command_text'];
                $this->radio_type = $temp_instutition_number[0]['radio_type'];
                $this->radio_text = $temp_instutition_number[0]['radio_text'];
                
                $this->receive_type = $temp_instutition_number[0]['receive_type'];
                $this->txt_receive = $temp_instutition_number[0]['txt_receive'];
            }else{
                redirect('error/index/no_instutition_number', 'refresh');
            }
        }else{
            
        }
    }
    public function getControllerAndMethod(){
        $this->controller_name = $this->router->class;
        $this->method_name = $this->router->method;
    }
    
}
