<?php


class sarabanflow_lib extends CI_Controller {
    //put your code here
    private $CI;
    //--------------------------------
    public $account_id;
    public $username;
    public $password;
    public $fullname;
    public $email;
    public $tel;
    public $detail;
    
    //-------------------------------
    
    public $controller;
    public $method;
    
    function __construct($id = null)
    {
        parent::__construct($id);
        $this->CI =& get_instance();
        $this->CI->load->model('m_login');	
        $this->__login();
        
        $this->getControllerAndMethod();
        $this->__updateDataLogin();
        //$this->load_js();
    }
    
    public function getControllerAndMethod(){
        $this->controller = $this->router->class;
        $this->method = $this->router->method;
    }
    
    public function __login()
    {
        $data_login = $this->session->userdata('data_account');
        if($data_login){
            $this->account_id = $data_login['account_id'];
            $this->username = $data_login['username'];
            $this->password = $data_login['password'];
            $this->fullname = $data_login['fullname'];
            $this->email = $data_login['email'];
            $this->tel = $data_login['tel'];
            $this->detail = $data_login['detail'];
        }else{
//            $message = "No Data Profile Account Please contact the system administrator";
//            echo "<script type='text/javascript'>alert('$message');</script>";
//            $this->session->unset_userdata('data_account');
//            redirect('auth_login','refresh');
//            exit;
        }
    }
    public function __updateDataLogin(){
        $result = $this->CI->m_login->getDataUpdateLogin($this->account_id);
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
        }else{
            
        }
    }
    public function load_js(){
       //return script_tag(base_url().'assets/myjs/normal_system.js',true);
    }
}
