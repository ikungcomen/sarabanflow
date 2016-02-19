<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/nm_saraban_lib.php';
class recieptBook extends nm_saraban_lib{
      function __construct() {
        parent::__construct();
        $this->load->model('m_booksend');
        $this->load->model('m_reciept_book');
        $this->load->model('m_detailreceiveoutsite');
        $this->load->library('pagination');
    }
    public function index($offset = 0){
        //------ Pagination Config------//
        /* This Application Must Be Used With BootStrap 3 *  */
        $config['base_url'] = base_url().'index.php/recieptBook/recieptBook/index';
        
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        
        //---------------------------------------------------------
        $check_data_instutition_main = $this->session->userdata('data_instutition_main');
        if($check_data_instutition_main){
            $config['total_rows'] = count($this->m_booksend->CountDataReceive_accept_center());
            $this->pagination->initialize($config);

            $data['recieve_doc'] = $this->m_booksend->getDataReceive_accept_center($config['per_page'], $offset);
        }else{
            $config['total_rows'] = count($this->m_booksend->CountDataReceive_accept());
            $this->pagination->initialize($config);

            $data['recieve_doc'] = $this->m_booksend->getDataReceive_accept($config['per_page'], $offset);
        }   
        
        // echo "<pre>";
        // print_r($data['recieve_doc']);
        // echo "</pre>";
        // exit;

        $this->load->view('include/header');
        $this->load->view('recieptBook/recieptBook_accept',$data);
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
        $config['base_url'] = base_url().'index.php/recieptBook/recieptBook/search_word';
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        
        //---------------------------------------------------------
        $check_data_instutition_main = $this->session->userdata('data_instutition_main');
        if($check_data_instutition_main){
            $config['total_rows'] = count($this->m_booksend->CountDataReceive_accept_search_word_center($search));
            $this->pagination->initialize($config);

            $data['recieve_doc'] = $this->m_booksend->getDataReceive_accept_search_word_center($search, $config['per_page'], $offset);
        }else{
            $config['total_rows'] = count($this->m_booksend->CountDataReceive_accept_search_word($search));
            $this->pagination->initialize($config);

            $data['recieve_doc'] = $this->m_booksend->getDataReceive_accept_search_word($search, $config['per_page'], $offset);
        }
        
        
        $data['search_word'] = $search;
        $this->load->view('include/header');
        $this->load->view('recieptBook/recieptBook_accept',$data);
        $this->load->view('include/footer');
    }
    
    public function search_date($offset = 0){
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
        $config['base_url'] = base_url().'index.php/recieptBook/recieptBook/search_date';
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        
        //---------------------------------------------------------
        $check_data_instutition_main = $this->session->userdata('data_instutition_main');
        if($check_data_instutition_main){
            $config['total_rows'] = count($this->m_booksend->CountDataReceive_accept_search_date_center($start_date , $end_date));
            $this->pagination->initialize($config);
            
            $data['recieve_doc'] = $this->m_booksend->getDataReceive_accept_search_date_center($start_date , $end_date, $config['per_page'], $offset);
        }else{
            $config['total_rows'] = count($this->m_booksend->CountDataReceive_accept_search_date($start_date , $end_date));
            $this->pagination->initialize($config);
            
            $data['recieve_doc'] = $this->m_booksend->getDataReceive_accept_search_date($start_date , $end_date, $config['per_page'], $offset);
        }
        
        
        $data['start_date'] = date("d-m-Y", strtotime($start_date));
        $data['end_date'] = date("d-m-Y", strtotime($end_date));
        $this->load->view('include/header');
        $this->load->view('recieptBook/recieptBook_accept',$data);
        $this->load->view('include/footer');
    }
    
    public function recieptBookForDepartment($offset = 0){
        //------ Pagination Config------//
        /* This Application Must Be Used With BootStrap 3 *  */
        $config['base_url'] = base_url().'index.php/recieptBook/recieptBook/recieptBookForDepartment';
        
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        
        //---------------------------------------------------------
        $config['total_rows'] = count($this->m_reciept_book->CountDataReceive_accept());
        $this->pagination->initialize($config);

        $data['recieve_doc'] = $this->m_reciept_book->getDataReceive_accept($config['per_page'], $offset);
        
        $this->load->view('include/header');
        $this->load->view('recieptBook/recieptBookForDepartment',$data);
        $this->load->view('include/footer');
    }
    
    public function search_word_dep($offset = 0){
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
        $config['base_url'] = base_url().'index.php/recieptBook/recieptBook/search_word_dep';
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        
        //---------------------------------------------------------
        $config['total_rows'] = count($this->m_reciept_book->CountDataReceive_accept_search_word($search));
        $this->pagination->initialize($config);

        $data['recieve_doc'] = $this->m_reciept_book->getDataReceive_accept_search_word($search, $config['per_page'], $offset);
        
        $data['search_word'] = $search;
        $this->load->view('include/header');
        $this->load->view('recieptBook/recieptBookForDepartment',$data);
        $this->load->view('include/footer');
    }
    
    public function search_date_dep($offset = 0){
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
        $config['base_url'] = base_url().'index.php/recieptBook/recieptBook/search_date_dep';
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        
        //---------------------------------------------------------
        $config['total_rows'] = count($this->m_reciept_book->CountDataReceive_accept_search_date($start_date , $end_date));
        $this->pagination->initialize($config);
            
        $data['recieve_doc'] = $this->m_reciept_book->getDataReceive_accept_search_date($start_date , $end_date, $config['per_page'], $offset);
        
        $data['start_date'] = date("d-m-Y", strtotime($start_date));
        $data['end_date'] = date("d-m-Y", strtotime($end_date));
        $this->load->view('include/header');
        $this->load->view('recieptBook/recieptBookForDepartment',$data);
        $this->load->view('include/footer');
    }
    
    public function show_detail($registration_receive_document_id = '' , $registration_create_number_id = ''){
        $data['result'] = $this->m_detailreceiveoutsite->getDetail($registration_receive_document_id);
        
        $data['registration_receive_document_id'] = $registration_receive_document_id;
        $data['registration_create_number_id'] = $registration_create_number_id;
        
        $data['attach_file_old'] = $this->m_detailreceiveoutsite->get_attach_file_old($registration_create_number_id);
        $data['attach_file_new'] = $this->m_detailreceiveoutsite->get_attach_file_new($registration_receive_document_id);
        
        $this->load->view('include/header');
        $this->load->view('recieptBook/detail_dep', $data);
        $this->load->view('include/footer');
    }
}
