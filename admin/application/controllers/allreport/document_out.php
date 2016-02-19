<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/sarabanflow_lib.php';

class document_out extends sarabanflow_lib {
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
    }
    public function index()
    {
        
        $this->load->view('include/header');
        $this->load->view('allreport/document_out');
        $this->load->view('include/footer');
    }
        

}
