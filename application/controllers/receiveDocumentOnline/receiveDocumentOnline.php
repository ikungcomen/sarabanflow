<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/nm_saraban_lib.php';
class receiveDocumentOnline extends nm_saraban_lib{

    function __construct() {
        parent::__construct();
        //$this->load->model('m_booksend');
        $this->load->model('m_receive_document_online');
    }
    public function index(){
        $check_data_instutition_main = $this->session->userdata('data_instutition_main');
        if($check_data_instutition_main){
            $data['result'] = $this->m_receive_document_online->getDataReceive_center();
        }else{
            $data['result'] = $this->m_receive_document_online->getDataReceive();
        }
        
        $this->load->view('include/header');
        $this->load->view('recieptBook/recieptBook',$data);
        $this->load->view('include/footer');
    }
    
    public function receiveDocumentOnlineForDepartment(){
        $data['result'] = $this->m_receive_document_online->getDataReceiveOnlineDep();
        // echo "<pre>";print_r($data['result']);
        // exit;
        //var_dump($this->m_receive_document_online->getDataReceiveOnlineDep()); exit;
        $this->load->view('include/header');
        $this->load->view('online_receive_dep/online_receive_dep',$data);
        $this->load->view('include/footer');
    }
    
    public function acceptBookkeep_document($receive_document_department_id){
        $data['result'] = $this->m_receive_document_online->getDetail($receive_document_department_id);
        $data['receive_document_department_id'] = $receive_document_department_id;
        
        
        
        $this->load->view('include/header');
        $this->load->view('online_receive_dep/show_document',$data);
        //$this->load->view('acceptBook/acceptBook',$data);
        $this->load->view('include/footer');
    }
    
    public function get_content_file($registration_create_number_id, $registration_receive_document_id, $receive_document_department_id){
        $data['file_old'] = $this->m_receive_document_online->getDataFileOld($registration_create_number_id);
        $data['file_new'] = $this->m_receive_document_online->getDataFileNew($registration_receive_document_id);
        $data['receive_document_department_id'] = $receive_document_department_id;
        
        $this->load->view('online_receive_dep/content_doc_file',$data);
    }
    
    public function see_doc(){
        $receive_document_department_id = $this->input->post('receive_document_department_id');
        $this->db->set('status_reading', 'yes');
        $this->db->where('id', $receive_document_department_id);
        $this->db->update('receive_document_department');
    }
    
    public function receivce_document_dep($receive_document_department_id){
        $data['result'] = $this->m_receive_document_online->getDetail($receive_document_department_id);
        $data['receive_document_department_id'] = $receive_document_department_id;
        
        
        
        $this->load->view('include/header');
        $this->load->view('online_receive_dep/show_receivce_document_dep',$data);
        //$this->load->view('acceptBook/acceptBook',$data);
        $this->load->view('include/footer');
    }
    
    public function save_data_receive_document_online_dep(){
        $number_of_run = $this->input->post('number_of_run');
        $receive_document_department_id = $this->input->post('receive_document_department_id');
        $registration_create_number_id = $this->input->post('registration_create_number_id');
        $registration_receive_document_id = $this->input->post('registration_receive_document_id');
        
        if($this->check_receive_document_online_dep($registration_create_number_id, $registration_receive_document_id)){
            if($number_of_run == ""){ //---- auto
                
                $temp = $this->m_receive_document_online->get_number_of_run_old($this->department_of_instutition_id);
                $number_of_run_old = $temp[0]['number_of_run'];
                
                $data = array(
                    "receive_document_department_id" => $receive_document_department_id,
                    "department_of_instutition_id" => $this->department_of_instutition_id,
                    "number_of_run" => ($number_of_run_old + 1),
                    "created" => date("Y-m-d H:i:s")
                );
                $this->m_receive_document_online->save_number_of_run_dep($data);
                
                $data2 = array(
                    "status_receive" => "yes",
                    "dep_receive_date" => date("Y-m-d"),
                    "dep_receive_time" => date("H:i")
                );
                $this->db->where('id', $receive_document_department_id);
                $this->db->update('receive_document_department', $data2); 
                
                
                redirect('recieptBook/recieptBook/recieptBookForDepartment', 'refresh');
            }else{
                echo "error.............";
                exit;
            }
        }else{
            //-- เลขทะเบียนซ้ำเคยรับแล้ว
            $this->session->set_flashdata('error', 'exist');
            redirect('receiveDocumentOnline/receiveDocumentOnline/receivce_document_dep/'.$receive_document_department_id, 'refresh');
        }
    }
    
    public function check_receive_document_online_dep($registration_create_number_id, $registration_receive_document_id){
        $check = true;
        $this->db->select('*');
        $this->db->from('receive_document_department');
        $this->db->where('registration_receive_document_id', $registration_receive_document_id);
        $this->db->where('registration_create_number_id', $registration_create_number_id);
        $this->db->where('department_of_instutition_id', $this->department_of_instutition_id);
        $this->db->where('status_receive', 'yes');
        $this->db->where('active', 1);
        $query = $this -> db -> get();
        $temp = $query->result_array();
        
        if(count($temp) > 0){
            $check = FALSE;
        }
        
        return $check;
    }
    
    public function return_document($receive_document_department_id){
        
        $data['receive_document_department_id'] = $receive_document_department_id;
        
        $this->load->view('include/header');
        $this->load->view('online_receive_dep/return_document',$data);
        $this->load->view('include/footer');
    }
    
    public function accept_return_document(){
        $data = array(
            "status_return_document" => 'yes',
            "reason_return_document" => $this->input->post('messages'),
            "udate" => date('Y-m-d H:i:s')
        );
        
        $this->db->where('id', $this->input->post('receive_document_department_id'));
        $this->db->update('receive_document_department', $data); 
        
        redirect('receiveDocumentOnline/receiveDocumentOnline/receiveDocumentOnlineForDepartment', 'refresh');
    }
}
