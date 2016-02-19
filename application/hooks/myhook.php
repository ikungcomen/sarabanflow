<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class myhook {
 
    private $CI;
    function __construct()
    {
        $this->CI =& get_instance();
    }
    
    public function check_login() {
        $controller = $this->CI->router->class;
        $method = $this->CI->router->method;
        if($this->CI->session->userdata('data_account_normal') && date("Y-m-d") < date("Y-m-d",  strtotime("2017-04-28"))){
          if($controller == "auth_login" && $method == "index"){
              //redirect('welcome', 'refresh');
              //exit;
          }
        }else{
          if($controller != "auth_login"){
              redirect('auth_login','refresh');
              exit;
          }
        }
    }
}
?>