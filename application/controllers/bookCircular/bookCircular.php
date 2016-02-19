<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/nm_saraban_lib.php';
class bookCircular extends nm_saraban_lib{
      function __construct() {
        parent::__construct();
        $this->load->model('m_booksend');
        $this->load->library('pagination');
    }
    public function index($offset = 0){
        //------ Pagination Config------//
        /* This Application Must Be Used With BootStrap 3 *  */
        $config['base_url'] = base_url().'index.php/bookCircular/bookCircular/index';
        
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        
        //---------------------------------------------------------
        
        $check_data_instutition_main = $this->session->userdata('data_instutition_main');
        if($check_data_instutition_main)
        {   
            $config['total_rows'] = count($this->m_booksend->CountAll_Circular_center());
            $this->pagination->initialize($config);
            
            $data['result'] = $this->m_booksend->getAll_Circular_center($config['per_page'], $offset);
        }
        else
        {
            
            $config['total_rows'] = count($this->m_booksend->CountAll_Circular());
            $this->pagination->initialize($config);
            
            $data['result'] = $this->m_booksend->getAll_Circular($config['per_page'], $offset);
        }
        
        
        $data['type_data'] = "เวียน";
        $this->session->set_userdata('re_page','bookCircular/bookCircular');
        $this->load->view('include/header');
        $this->load->view('bookSend/bookCircular',$data);
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
        $config['base_url'] = base_url().'index.php/bookCircular/bookCircular/search_word';
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        
        //---------------------------------------------------------
        $check_data_instutition_main = $this->session->userdata('data_instutition_main');
        if($check_data_instutition_main){
            $config['total_rows'] = count($this->m_booksend->CountAll_Circular_search_center($search));
            $this->pagination->initialize($config);
            
            $data['result'] = $this->m_booksend->getAll_Circular_search_center($search, $config['per_page'], $offset);
            
        }else{
            $config['total_rows'] = count($this->m_booksend->CountAll_Circular_search($search));
            $this->pagination->initialize($config);
            
            $data['result'] = $this->m_booksend->getAll_Circular_search($search, $config['per_page'], $offset);
        }
        
        
        $data['search_word'] = $search;
        $data['type_data'] = "เวียน";
        $this->load->view('include/header');
        $this->load->view('bookSend/bookCircular', $data);
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
        $config['base_url'] = base_url().'index.php/bookCircular/bookCircular/search_date';
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        
        //---------------------------------------------------------
        $check_data_instutition_main = $this->session->userdata('data_instutition_main');

        if($check_data_instutition_main){
            $config['total_rows'] = count($this->m_booksend->CountAll_Circular_center_search_date($start_date , $end_date));
        
            $this->pagination->initialize($config);
            $data['result'] = $this->m_booksend->getAll_Circular_center_search_date($start_date , $end_date, $config['per_page'], $offset);
        }else{
            $config['total_rows'] = count($this->m_booksend->CountAll_Circular_search_date($start_date , $end_date));
        
            $this->pagination->initialize($config);
            $data['result'] = $this->m_booksend->getAll_Circular_search_date($start_date , $end_date, $config['per_page'], $offset);
        }
        
        //$data['result'] = $this->m_booksend->getAll_Circular_search_date($startdate , $enddate);
        //$data['result_center'] = $this->m_booksend->getAll_Circular_center_search_date($startdate , $enddate);
        
        $data['start_date'] = date("d-m-Y", strtotime($start_date));
        $data['end_date'] = date("d-m-Y", strtotime($end_date));
        $data['type_data'] = "เวียน";
        $this->load->view('include/header');
        $this->load->view('bookSend/bookCircular', $data);
        $this->load->view('include/footer');
    }
}
