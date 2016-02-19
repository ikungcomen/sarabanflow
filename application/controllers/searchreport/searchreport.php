<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once APPPATH . 'libraries/nm_saraban_lib.php';

class searchreport extends nm_saraban_lib {

    public function __construct() {
        parent::__construct();
        $this->load->model("m_search_report");
        $this->load->model("m_booksend");
        $this->load->model("m_dataexport");
    }

    public function index() {
        $this->load->view('include/header');
        $this->load->view('searchreport/receive_report');
        $this->load->view('include/footer');
    }

    public function send_report() {
        $this->load->view('include/header');
        $this->load->view('searchreport/send_report');
        $this->load->view('include/footer');
    }

    public function search_send_report() {
        $level_institution_id = $this->level_institution_id;
        $level_institution = $this->level_institution;
        $typeSelect = $this->input->post('typeSelect');
        $from_number_of_run = $this->input->post('from_number_of_run');
        $to_number_of_run = $this->input->post('to_number_of_run');
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');
        $subject = $this->input->post('subject');
        $to_receive = $this->input->post('to_receive');
         $form_send = $this->input->post('form_send');
        $number_of_run_1 = $this->input->post('number_of_run_1');
        $number_of_run_2 = $this->input->post('number_of_run_2');
        $number_of_run_3 = $this->input->post('number_of_run_3');
        $number_of_run_4 = $this->input->post('number_of_run_4');
        $number_of_run_5 = $this->input->post('number_of_run_5');
        $number_of_run_6 = $this->input->post('number_of_run_6');
        $number_of_run_7 = $this->input->post('number_of_run_7');
        $number_of_run_8 = $this->input->post('number_of_run_8');
        if ($startDate != "") {
            $newStartDate = date("Y-m-d", strtotime($startDate));
        } else {
            $newStartDate = "";
        }
        if ($endDate != "") {
            $newEndDate = date("Y-m-d", strtotime($endDate));
        } else {
            $newEndDate = "";
        }
         $data['result'] = $this->m_search_report->search_send_report($level_institution_id, $level_institution, $typeSelect, $typeSelect, $from_number_of_run, $to_number_of_run, $newStartDate, $newEndDate, $subject, $to_receive, $number_of_run_1, $number_of_run_2, $number_of_run_3, $number_of_run_4, $number_of_run_5, $number_of_run_6, $number_of_run_7, $number_of_run_8,$form_send);
        
        $this->session->set_userdata('dataSearchbookSend',$data['result']);
        $this->load->view('include/header');
        $this->load->view('searchreport/send/show_booksend', $data);
        $this->load->view('include/footer');
    }

    public function show_booksend_detail($id = "") {
        $level_institution_id = $this->level_institution_id;
        $level_institution    = $this->level_institution;
        $this->session->set_userdata('id_select',$id);
        $data['result'] = $this->m_search_report->show_booksend_detail($id,$level_institution_id,$level_institution);
        $this->session->set_userdata('id_uploadfile',$data['result'][0]['registration_create_number_id']);
        $this->load->view('include/header');
        $this->load->view('searchreport/send/show_booksend_detail',$data);
        $this->load->view('include/footer');
    }
    public function backtoShowbookSend(){
        $data['result'] = $this->session->userdata('dataSearchbookSend');
        $this->load->view('include/header');
        $this->load->view('searchreport/send/show_booksend', $data);
        $this->load->view('include/footer');
    }
    public function deleteBookSend($id = '') {
        $this->db->where('id', $id);
        $this->db->delete('registration_create_number');
        redirect('searchreport/searchreport/send_report', 'refresh');
    }
     public function upload_document_attach_file($registration_create_number_id = ""){
        $data['result']      = $this->m_booksend->getDetail($registration_create_number_id);
        $data['attach_file'] = $this->m_booksend->get_attach_file($registration_create_number_id);
        $this->load->view('include/header');
        $this->load->view('searchreport/send/document_attach_file_booksend', $data);
        $this->load->view('include/footer');
    }
    public function registration_create_upload_file(){
        $registration_create_number_id = $this->input->post('registration_create_number_id');
        if (!empty($_FILES['images']['name'][0])) {
            $array_file = upload_files($_FILES['images'], './uploads/registration_create_file');
            foreach($array_file as $val){
                $data = array(
                    "registration_create_number_id" => $registration_create_number_id,
                    "file_upload_name" => $val,
                    "created" => date("Y-m-d H:i:s"),
                    "updated" => date("Y-m-d H:i:s")
                );
                $this->m_dataexport->registration_create_upload_file($data);
            }
        }
        $this->session->set_flashdata('array_file_result', $array_file);
        redirect('searchreport/searchreport/upload_document_attach_file/'.$this->session->userdata('id_select'), 'refresh');
    }
    public function delete_file_upload_registration($registration_create_number_file_upload_id, $registration_create_number_id){
        $this->m_booksend->delete_file_upload_registration($registration_create_number_file_upload_id);
        redirect('searchreport/searchreport/upload_document_attach_file/'.$this->session->userdata('id_select'), 'refresh');
    }
    
    public function recieve_report() {
        $this->load->view('include/header');
        $this->load->view('searchreport/receive_report');
        $this->load->view('include/footer');
    }

    public function search_recieve_report() {
        $level_institution_id = $this->level_institution_id;
        $level_institution = $this->level_institution;
        $typeSelect = $this->input->post('typeSelect');
        $from_number_of_run = $this->input->post('from_number_of_run');
        $to_number_of_run = $this->input->post('to_number_of_run');
        $department_id = $this->input->post('department_id');
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');
        $subject = $this->input->post('subject');
       
        $to_receive = $this->input->post('to_receive');
        //$from_send_id    = "";
       // $from_send_level = "";
        $form_send = trim($this->input->post('form_send'));
        
        /*
        $data['province'] = $this->m_search_report->checkProvince($form_send);
        foreach ($data['province'] as $row){
            $from_send_id    = $row['instutition_id'];
            $from_send_level = $row['instutition_level'];
        }
        if ($from_send_id == ""){
            $data['amphur'] = $this->m_search_report->checkAmphur($form_send);
            foreach ($data['amphur'] as $row){
                $from_send_id    = $row['instutition_id'];
                $from_send_level = $row['instutition_level'];
            }
        }
        if ($from_send_id == ""){
            $data['district'] = $this->m_search_report->checkDistrict($form_send);
            foreach ($data['district'] as $row){
                $from_send_id    = $row['instutition_id'];
                $from_send_level = $row['instutition_level'];
            }
        }
        */
        
        $number_of_run_1 = $this->input->post('number_of_run_1');
        $number_of_run_2 = $this->input->post('number_of_run_2');
        $number_of_run_3 = $this->input->post('number_of_run_3');
        $number_of_run_4 = $this->input->post('number_of_run_4');
        $number_of_run_5 = $this->input->post('number_of_run_5');
        $number_of_run_6 = $this->input->post('number_of_run_6');
        $number_of_run_7 = $this->input->post('number_of_run_7');
        $number_of_run_8 = $this->input->post('number_of_run_8');
        
        
        if ($startDate != "") {
            $newStartDate = date("Y-m-d", strtotime($startDate));
        } else {
            $newStartDate = "";
        }
        if ($endDate != "") {
            $newEndDate = date("Y-m-d", strtotime($endDate));
        } else {
            $newEndDate = "";
        }
        
        $data['result']  = $this->m_search_report->search_recieve_report($department_id,$level_institution_id,$level_institution,$typeSelect,$from_number_of_run,$to_number_of_run,$newStartDate,$newEndDate,$subject,$to_receive,$number_of_run_1,$number_of_run_2,$number_of_run_3,$number_of_run_4,$number_of_run_5,$number_of_run_6,$number_of_run_7,$number_of_run_8,/*$from_send_id,$from_send_level*/$form_send);
        $this->load->view('include/header');
        $this->load->view('searchreport/receive/show_bookreceive',$data);
        $this->load->view('include/footer');
    }
    
    public function getLevelAuto(){
         $level_institution_id = $this->level_institution_id;
        $level_institution = $this->level_institution;
      $myarray = array();
      $province['institution_province_name'] = "<<----------- หน่วยงานระดับจังหวัด ----------->>";
      $amphur['institution_province_name']   = "<<----------- หน่วยงานระดับอำเภอ ----------->>";
      $distinct['institution_province_name'] = "<<----------- หน่วยงานระดับตำบล ------------>>";
      $orther['institution_province_name'] = "<<----------------- อื่นๆ ---------------->>";
      $under = "-----------------------";
      $data['province']  = $this->m_search_report->getLevelProvince();
      $data['amphur']  = $this->m_search_report->getLevelAmphur();
      $data['district']  = $this->m_search_report->getLevelDistrict();
       $data['orther']     = $this->m_search_report->getLevelFrom($level_institution_id,$level_institution);
      array_push($myarray, $province);
      array_push($myarray, $under);
      foreach ($data['province'] as $row){
          array_push($myarray, $row);
      }
      array_push($myarray, $under);
      array_push($myarray, $amphur);
      array_push($myarray, $under);
      foreach ($data['amphur'] as $row){
          array_push($myarray, $row);
      }
      array_push($myarray, $under);
      array_push($myarray, $distinct);
      array_push($myarray, $under);
      foreach ($data['district'] as $row){
          array_push($myarray, $row);
      }
       array_push($myarray, $under);
        array_push($myarray, $orther);
        array_push($myarray, $under);
        foreach ($data['orther'] as $row) {
            array_push($myarray, $row);
        }
      echo json_encode($myarray);
    }
    
    public function getDocumentNo(){
       $level_institution_id =  $this->level_institution_id;
       $level_institution    =  $this->level_institution;
      $data['result']        = $this->m_search_report->getDocumentNo($level_institution_id,$level_institution);
      echo json_encode($data['result']);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */