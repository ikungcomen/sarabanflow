<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/nm_saraban_lib.php';

class auth_login extends nm_saraban_lib{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_auth_login');
    }
    public function index(){
        if($this->input->post(NULL)){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $result = $this->m_auth_login->check_login($username,$password);
            
            if(!empty($result)){
                $data_account = array();
                foreach($result as $row){
                    $data_account = array(
                        'normal_account_id' => $row->id,
                        'department_of_instutition_id' => $row->department_of_instutition_id,
                        'province_id' => $row->province_id,
                        'level_institution_id' => $row->level_institution_id,
                        'level_institution' => $row->level_institution,
                        'designation' => $row->designation,
                        'username' => $row->username,
                        'password' => $row->password,
                        'fullname' => $row->fullname,
                        'user_detail' => $row->user_detail,
                        'permission_level' => $row->permission_level
                        
                    );
                }
                $this->session->set_userdata('data_account_normal',$data_account);
                $this->__login();
                //create_log_activity($this->account_id, date("Y-m-d H:i:s"));
                redirect('welcome', 'refresh');
                exit;
            }else{
                $this->load->view('login');
            }
        }else if($this->session->userdata('data_account_normal')){
            redirect('welcome', 'refresh');
            exit;
        }else{
            $this->load->view('login');
        }
    }
    
    public function logout(){
        $this->session->unset_userdata('data_account_normal');
        @$this->session->unset_userdata('data_instutition_main');
        redirect('','refresh');
    }
}
