<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/nm_saraban_lib.php';
class reportReturn extends nm_saraban_lib{
    
     function __construct() {
        parent::__construct();
        $this->load->model('m_booksend');
        $this->load->model('m_dataexport');
    }
    public function index(){

        
    }
    public function return_detail()
    {   
    	$data['result'] = $this->m_booksend->getContact_return();
        // echo "<pre>";
        // print_r($data['result']);
        // echo "</pre>";
        // exit;
        $this->load->view('include/header');
        $this->load->view('reportReturn/reportReturn',$data);
        $this->load->view('include/footer');
    }
    public function accept_return($outside_id = '')
    {
        $this->db->set('active',0);
        $this->db->where('id',$outside_id);
        $this->db->update('registration_send_document_outside');
        $this->session->set_flashdata('insert_dep1', 'Value');
        redirect('reportReturn/reportReturn/return_detail','refresh');

    }

    public function accept_return2($outside_id = '' , $id_re = '')
    {
        $this->db->set('active',0);
        $this->db->where('id',$outside_id);
        $this->db->update('registration_send_document_outside');

        $this->session->set_flashdata('insert_dep1', 'Value');

        redirect('bookSend/bookSend/followUp/'.$id_re,'refresh');

    }
}

