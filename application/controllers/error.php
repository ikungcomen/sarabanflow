<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once APPPATH . 'libraries/nm_saraban_lib.php';

class error extends nm_saraban_lib {
    //put your code here
    public function __construct() {
        parent::__construct();
        
    }
    public function index($error_type = "") {
        $this->session->unset_userdata('data_account_normal');
        @$this->session->unset_userdata('data_instutition_main');
        
        
        if($error_type == "no_instutition_number"){
            $data['no_instutition_number'] = "no_instutition_number";
        }else{
            $data['error'] = "error";
        }
        
        $this->load->view('error/error_404', $data);
    }
}
