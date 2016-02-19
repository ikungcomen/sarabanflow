<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/nm_saraban_lib.php';

class receiveDocumentOrther extends nm_saraban_lib{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_receive_document_orther');
    }
    
    public function index(){
        $this->load->view('include/header');
        
        
        $this->load->view('receiveDocumentOrther/receiveDocumentOrther');
        
        $this->load->view('include/footer');
    }
    
    public function create_receive_document_other(){
        

        $check_data_instutition_main = $this->session->userdata('data_instutition_main');
        if($check_data_instutition_main){
            $level_institution_id = $this->instutition_main_id;
            $level_institution = $this->instutition_main_level;
            $this->receive_type = $check_data_instutition_main['receive_type'];
        }else{
            $level_institution_id = $this->level_institution_id;
            $level_institution = $this->level_institution;
        }

        $temp = $this->m_receive_document_orther->check_exist_document_no($this->input->post('document_no'),$level_institution_id,$level_institution);

        if(count($temp) == 0){
            $data = array(
                "instutition_receiver_id" => $level_institution_id,
                "instutition_receiver_level" => $level_institution,
                "receive_type" => "other",
                "document_no" => $this->input->post('document_no'),
                "receive_date" => date("Y-m-d", strtotime($this->input->post('receive_date'))),
                "from" => $this->input->post('from'),
                "subject" => $this->input->post('subject'),
                "to_receive" => $this->input->post('to_receive'),
                "attach_detail" => $this->input->post('attach_detail'),
                "reference_to" => $this->input->post('reference_to'),
                "offer_the_operating" => $this->input->post('offer_the_operating'),
                "detail" => $this->input->post('detail'),
                "layer_priority_id" => $this->input->post('layer_priority_id'),
                "layer_secret_id" => $this->input->post('layer_secret_id'),
                "objective_id" => $this->input->post('objective_id'),
                "implementation_date" => date("Y-m-d", strtotime($this->input->post('implementation_date'))),
                "implementation_time" => $this->input->post('implementation_time'),
                "cdate" => date("Y-m-d H:i:s"),
                "udate" => date("Y-m-d H:i:s")
            );

            $custom_registration_receive_number = trim($this->input->post('custom_registration_receive_number'));
            if($custom_registration_receive_number != '' && $this->receive_type == 2){  //---- ใช้ในกรณีที่มีการกำหนด เลขทะเบียนรับเอง
                if($this->check_custom_registration_receive_number($custom_registration_receive_number, $level_institution_id, $level_institution)){

                    $registration_receive_document_id = $this->m_receive_document_orther->create_receive_document_other($data);
                    $registration_receive_document_of_run_id = $this->m_receive_document_orther->save_registration_receive_number_of_run($registration_receive_document_id, $level_institution_id, $level_institution, $custom_registration_receive_number);
                    $this->m_receive_document_orther->update_registration_receive_document_other($registration_receive_document_id, $registration_receive_document_of_run_id);
                
                    redirect('receiveDocumentOrther/receiveDocumentOrther/reportReceiveOrther/'.$registration_receive_document_id, 'refresh');
                }else{
                    $this->session->set_flashdata('error', 'limit');
                    redirect('receiveDocumentOrther/receiveDocumentOrther', 'refresh');
                }
            }else if($custom_registration_receive_number == '' && $this->receive_type == 1){ //--- ใช้ในกรณีที่ไม่มีการกำหนดเลขทะเบียนส่ง คือ run auto เลย

                $registration_receive_document_id = $this->m_receive_document_orther->create_receive_document_other($data);
                $this->made_number_of_run_registration_receive($registration_receive_document_id);
                redirect('receiveDocumentOrther/receiveDocumentOrther/reportReceiveOrther/'.$registration_receive_document_id, 'refresh');
            }else{
                //redirect('error', 'refresh');
                //exit;
                $this->session->set_flashdata('error', 'on-number-of-run');
                redirect('receiveDocumentOrther/receiveDocumentOrther', 'refresh');
            }
            
        }else{
            $this->session->set_flashdata('exist_document_no', '1');
            redirect('receiveDocumentOrther/receiveDocumentOrther', 'refresh');
        }
        
    }
    
    public function made_number_of_run_registration_receive($registration_receive_document_id){

        $check_data_instutition_main = $this->session->userdata('data_instutition_main');
        if($check_data_instutition_main){
            $this->txt_receive = $check_data_instutition_main['txt_receive'];
            $level_institution_id = $this->instutition_main_id;
            $level_institution = $this->instutition_main_level;
        }
        else
        {
            $level_institution_id = $this->level_institution_id;
            $level_institution = $this->level_institution;
        }


        $number_of_run = $this->m_receive_document_orther->check_registration_receive_number_of_run($level_institution_id, $level_institution);
        
        $temp_number_of_run = ($number_of_run[0]['number_of_run']+1);
        if($temp_number_of_run >= $this->txt_receive){
            $new_number_of_run = $temp_number_of_run;
        }else{
            $new_number_of_run = $this->txt_receive;
        }
        
        $registration_receive_document_of_run_id = $this->m_receive_document_orther
                                                    ->save_registration_receive_number_of_run($registration_receive_document_id, $level_institution_id, $level_institution, $new_number_of_run);
        
        $this->m_receive_document_orther->update_registration_receive_document_other($registration_receive_document_id, $registration_receive_document_of_run_id);
    }
    
    public function check_custom_registration_receive_number($custom_registration_receive_number, $level_institution_id, $level_institution){
            
        $check_data_instutition_main = $this->session->userdata('data_instutition_main');
        if($check_data_instutition_main){
            $this->txt_receive = $check_data_instutition_main['txt_receive'];
        }
        $this -> db -> select('*');
        $this -> db -> from('registration_receive_document_of_run');
        $this -> db -> where('level_institution_id', $level_institution_id);
        $this -> db -> where('level_institution', $level_institution);
        $this -> db -> where('number_of_run', $custom_registration_receive_number);
        $query = $this -> db -> get();
        $result = $query->result_array();
        
        if(count($result) > 0 || $this->txt_receive <  $custom_registration_receive_number){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    
    public function reportReceiveOrther($registration_receive_document_id){
        $data['registration_receive_document_id'] = $registration_receive_document_id;
        $data['registration_receive_document'] = $this->m_receive_document_orther->get_data_registration_receive_document($registration_receive_document_id);
        $data['number_of_run'] = $this->m_receive_document_orther->get_data_number_of_run($registration_receive_document_id);
        $data['attach_file'] = $this->m_receive_document_orther->get_data_file_upload($registration_receive_document_id);
        
        $this->load->view('receiveDocumentOrther/reportReceiveOrther', $data);
    }
    
    public function registration_receive_upload_file(){
        $registration_receive_document_id = $this->input->post('registration_receive_document_id');
        if (!empty($_FILES['images1']['name'][0])) {
            $array_file = upload_files($_FILES['images1'], './uploads/registration_create_file');
            foreach($array_file as $val){
                $data = array(
                    "registration_receive_document_id" => $registration_receive_document_id,
                    "file_upload_name" => $val,
                    "cdate" => date("Y-m-d H:i:s"),
                    "udate" => date("Y-m-d H:i:s")
                );
                $this->m_receive_document_orther->registration_receive_upload_file($data);
            }
        }
        if (!empty($_FILES['images2']['name'][0])) {
            $array_file = upload_files($_FILES['images2'], './uploads/registration_create_file');
            foreach($array_file as $val){
                $data = array(
                    "registration_receive_document_id" => $registration_receive_document_id,
                    "file_upload_name" => $val,
                    "cdate" => date("Y-m-d H:i:s"),
                    "udate" => date("Y-m-d H:i:s")
                );
                $this->m_receive_document_orther->registration_receive_upload_file($data);
            }
        }
        if (!empty($_FILES['images3']['name'][0])) {
            $array_file = upload_files($_FILES['images3'], './uploads/registration_create_file');
            foreach($array_file as $val){
                $data = array(
                    "registration_receive_document_id" => $registration_receive_document_id,
                    "file_upload_name" => $val,
                    "cdate" => date("Y-m-d H:i:s"),
                    "udate" => date("Y-m-d H:i:s")
                );
                $this->m_receive_document_orther->registration_receive_upload_file($data);
            }
        }
        if (!empty($_FILES['images4']['name'][0])) {
            $array_file = upload_files($_FILES['images4'], './uploads/registration_create_file');
            foreach($array_file as $val){
                $data = array(
                    "registration_receive_document_id" => $registration_receive_document_id,
                    "file_upload_name" => $val,
                    "cdate" => date("Y-m-d H:i:s"),
                    "udate" => date("Y-m-d H:i:s")
                );
                $this->m_receive_document_orther->registration_receive_upload_file($data);
            }
        }
        if (!empty($_FILES['images5']['name'][0])) {
            $array_file = upload_files($_FILES['images5'], './uploads/registration_create_file');
            foreach($array_file as $val){
                $data = array(
                    "registration_receive_document_id" => $registration_receive_document_id,
                    "file_upload_name" => $val,
                    "cdate" => date("Y-m-d H:i:s"),
                    "udate" => date("Y-m-d H:i:s")
                );
                $this->m_receive_document_orther->registration_receive_upload_file($data);
            }
        }
        $this->session->set_flashdata('array_file_result', $array_file);
        redirect('receiveDocumentOrther/receiveDocumentOrther/reportReceiveOrther/'.$registration_receive_document_id, 'refresh');
    }
    
    public function delete_file_upload_registration($id, $registration_receive_document_id){
        $this->m_receive_document_orther->delete_file_upload_registration($id);
        redirect('receiveDocumentOrther/receiveDocumentOrther/reportReceiveOrther/'.$registration_receive_document_id, 'refresh');
    }
}

