<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/nm_saraban_lib.php';

class bookCommand extends nm_saraban_lib{
      function __construct() {
        parent::__construct();
        $this->load->model('m_booksend');
        $this->load->library('pagination');
    }
    public function index($offset = 0){
        //------ Pagination Config------//
        /* This Application Must Be Used With BootStrap 3 *  */
        $config['base_url'] = base_url().'index.php/bookCommand/bookCommand/index';
        
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        
        //---------------------------------------------------------
        
        $check_data_instutition_main = $this->session->userdata('data_instutition_main');
        if($check_data_instutition_main)
        {
            $config['total_rows'] = count($this->m_booksend->CountAll_Command_center());
            $this->pagination->initialize($config);
            
            $data['result'] = $this->m_booksend->getAll_Command_center($config['per_page'], $offset);
        }
        else
        {
            $config['total_rows'] = count($this->m_booksend->CountAll_Command());
            $this->pagination->initialize($config);
            
            $data['result'] = $this->m_booksend->getAll_Command($config['per_page'], $offset);
        }
        
        
        $data['type_data'] = "คำสั่ง";
        $this->session->set_userdata('re_page','bookCommand/bookCommand');
        $this->load->view('include/header');
        $this->load->view('bookSend/bookCommand',$data);
        $this->load->view('include/footer');
    }
    public function search_word($offset = 0) {
        if($this->input->post('search')){
            $search = $this->input->post('search');
            $this->session->set_userdata('search_word', $search);
        }else{
            if($this->session->userdata('search_word')){
                $search = $this->session->userdata('search_word');
            }else{
                $search = '';
            }
        }
        //------ Pagination Config------//
        /* This Application Must Be Used With BootStrap 3 *  */
        $config['base_url'] = base_url().'index.php/bookCommand/bookCommand/search_word';
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        
        //---------------------------------------------------------
        $check_data_instutition_main = $this->session->userdata('data_instutition_main');
        if($check_data_instutition_main){
            $config['total_rows'] = count($this->m_booksend->CountAll_Command_center_search($search));
            $this->pagination->initialize($config);
            
            $data['result'] = $this->m_booksend->getAll_Command_center_search($search, $config['per_page'], $offset);
            
        }else{
            $config['total_rows'] = count($this->m_booksend->CountAll_Command_search($search));
            $this->pagination->initialize($config);
            
            $data['result'] = $this->m_booksend->getAll_Command_search($search, $config['per_page'], $offset);
        }
        
        //$txt = $this->input->post('search');
        //$data['result'] = $this->m_booksend->getAll_Command_search($txt);
        //$data['result_center'] = $this->m_booksend->getAll_Command_center_search($txt);
        
        $data['search_word'] = $search;
        $data['type_data'] = "คำสั่ง";
        $this->load->view('include/header');
        $this->load->view('bookSend/bookCommand',$data);
        $this->load->view('include/footer');
    }
    public function search_date($offset = 0)
    {
        if($this->input->post('start_date') && $this->input->post('end_date')){
            $start_date = date("Y-m-d", strtotime($this->input->post('start_date')));
            $end_date = date("Y-m-d", strtotime($this->input->post('end_date')));
            $array_search_date = array(
                "start_date" => $start_date,
                "end_date" => $end_date
            );
            $this->session->set_userdata('search_date', $array_search_date);
        }else{
            if($this->session->userdata('search_date')){
                $search_date = $this->session->userdata('search_date');
                $start_date = $search_date['start_date'];
                $end_date = $search_date['end_date'];
            }else{
                $start_date = date("Y-m-d");
                $end_date = date("Y-m-d");
            }
        }
        
        //------ Pagination Config------//
        /* This Application Must Be Used With BootStrap 3 *  */
        $config['base_url'] = base_url().'index.php/bookCommand/bookCommand/search_date';
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        
        //---------------------------------------------------------
        $check_data_instutition_main = $this->session->userdata('data_instutition_main');

        if($check_data_instutition_main){
            $config['total_rows'] = count($this->m_booksend->CountAll_Command_center_search_date($start_date , $end_date));
        
            $this->pagination->initialize($config);
            $data['result'] = $this->m_booksend->getAll_Command_center_search_date($start_date , $end_date, $config['per_page'], $offset);
        }else{
            $config['total_rows'] = count($this->m_booksend->CountAll_Command_search_date($start_date , $end_date));
        
            $this->pagination->initialize($config);
            $data['result'] = $this->m_booksend->getAll_Command_search_date($start_date , $end_date, $config['per_page'], $offset);
        }
       //$data['result'] = $this->m_booksend->getAll_Command_search_date($startdate , $enddate);
       //$data['result_center'] = $this->m_booksend->getAll_Command_center_search_date($startdate , $enddate);
       
       $data['start_date'] = date("d-m-Y", strtotime($start_date));
        $data['end_date'] = date("d-m-Y", strtotime($end_date));
       $data['type_data'] = "คำสั่ง";
       $this->load->view('include/header');
       $this->load->view('bookSend/bookCommand',$data);
       $this->load->view('include/footer');
    }
}
