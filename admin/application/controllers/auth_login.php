<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/sarabanflow_lib.php';

class auth_login extends sarabanflow_lib {
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
    }
        
    public function index()
    {  
        if($this->input->post(NULL)){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $result = $this->m_login->check_login($username,$password);
            
            if(!empty($result)){
                $data_account = array();
                foreach($result as $row){
                    $data_account = array(
                        'account_id' => $row->id,
                        'username' => $row->user_name,
                        'password' => $row->password,
                        'fullname' => $row->fullname,
                        'email' => $row->email,
                        'tel' => $row->tel,
                        'detail' => $row->detail
                    );
                }
                $this->session->set_userdata('data_account',$data_account);
                $this->__login();
                //create_log_activity($this->account_id, date("Y-m-d H:i:s"));
                redirect('welcome', 'refresh');
                exit;
            }else{
                $this->load->view('login');
            }
        }else if($this->session->userdata('data_account')){
            redirect('welcome', 'refresh');
            exit;
        }else{
            $this->load->view('login');
        }
    }
    
    public function logout(){
        
        $this->session->unset_userdata('data_account');
        redirect('','refresh');
    }
}
