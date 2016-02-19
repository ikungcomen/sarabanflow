<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once APPPATH . 'libraries/nm_saraban_lib.php';

class central_registration extends nm_saraban_lib {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('m_auth_login');
    }
    public function index(){
        $temp_institution = $this->m_auth_login->getDataInstitutionForLogin($this->instutition_main_id, $this->province_id, $this->instutition_main_level);
        
        if(count($temp_institution) > 0){
            $institution_name = $temp_institution[0][$this->instutition_main_level.'_name'];
            $institution_detail = $temp_institution[0][$this->instutition_main_level.'_detail'];	
            
            $temp_instutition_number = $this->m_auth_login->getData_number_of_institution($this->instutition_main_id, $this->instutition_main_level);
            
            $array_instutition_main = array(
                "instutition_main_name" => $institution_name,
                "instutition_main_detail" => $institution_detail,
                
                "nornal_type" => $temp_instutition_number[0]['nornal_type'],
                "nornal_text" => $temp_instutition_number[0]['nornal_text'],
                "vian_type" => $temp_instutition_number[0]['vian_type'],
                "vian_text" => $temp_instutition_number[0]['vian_text'],
                "command_type" => $temp_instutition_number[0]['command_type'],
                "command_text" => $temp_instutition_number[0]['command_text'],
                "radio_type" => $temp_instutition_number[0]['radio_type'],
                "radio_text" => $temp_instutition_number[0]['radio_text'],
                "receive_type" => $temp_instutition_number[0]['receive_type'],
                "txt_receive" => $temp_instutition_number[0]['txt_receive']
                
            );
            $this->session->set_userdata('data_instutition_main', $array_instutition_main);
            redirect('welcome','refresh');
        }else{
            redirect('error', 'refresh');
            exit;
        }
    }
    public function logout(){
        $this->session->unset_userdata('data_instutition_main');
        redirect('welcome','refresh');
    }
}
