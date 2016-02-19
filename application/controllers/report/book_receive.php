<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once APPPATH . 'libraries/nm_saraban_lib.php';

class book_receive extends nm_saraban_lib {

    function __construct() {
        parent::__construct();
        $this->load->model('m_printreport');
    }

    public function index() {
        $this->load->view('include/header');
        $this->load->view('bookreceive/book_receive');
        $this->load->view('include/footer');
    }

    public function bookReceive() {
        $this->load->view('include/header');
        $this->load->view('bookreceive/book_receive');
        $this->load->view('include/footer');
    }

    public function bookSend() {
        $this->load->view('include/header');
        $this->load->view('bookreceive/book_send');
        $this->load->view('include/footer');
    }

    public function printReport() {
        $this->load->view('include/header');
        $this->load->view('bookreceive/print_report');
        $this->load->view('include/footer');
    }

    public function getDocumentNo() {
        $level_institution_id = $this->level_institution_id;
        $level_institution = $this->level_institution;
        $data['result'] = $this->m_printreport->getDocumentNo($level_institution_id, $level_institution);
        echo json_encode($data['result']);
    }

    public function getLevelAuto() {
        $level_institution_id = $this->level_institution_id;
        $level_institution = $this->level_institution;
        $myarray = array();
        $province['institution_province_name'] = "<<----------- หน่วยงานระดับจังหวัด ----------->>";
        $amphur['institution_province_name']   = "<<----------- หน่วยงานระดับอำเภอ ----------->>";
        $distinct['institution_province_name'] = "<<----------- หน่วยงานระดับตำบล ------------>>";
        $orther['institution_province_name']   = "<<----------------- อื่นๆ ---------------->>";
        $under = "-----------------------";
        $data['province'] = $this->m_printreport->getLevelProvince();
        $data['amphur']   = $this->m_printreport->getLevelAmphur();
        $data['district'] = $this->m_printreport->getLevelDistrict();
        $data['orther']     = $this->m_printreport->getLevelFrom($level_institution_id,$level_institution);
        
        array_push($myarray, $province);
        array_push($myarray, $under);
        foreach ($data['province'] as $row) {
            array_push($myarray, $row);
        }
        array_push($myarray, $under);
        array_push($myarray, $amphur);
        array_push($myarray, $under);
        foreach ($data['amphur'] as $row) {
            array_push($myarray, $row);
        }
        array_push($myarray, $under);
        array_push($myarray, $distinct);
        array_push($myarray, $under);
        foreach ($data['district'] as $row) {
            array_push($myarray, $row);
        }
        array_push($myarray, $under);
        array_push($myarray, $orther);
        array_push($myarray, $under);
        foreach ($data['orther'] as $row) {
            array_push($myarray, $row);
        }
       // array_push($myarray, $under);
        
        echo json_encode($myarray);
    }

    public function confirmBookReceive() {
        $level_institution_id = $this->level_institution_id;
        $level_institution = $this->level_institution;
        $typeSelect = $this->input->post('typeSelect');
        $from_number_of_run = $this->input->post('from_number_of_run');
        $to_number_of_run = $this->input->post('to_number_of_run');
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');
        $department_id = $this->input->post('department_id');
        
        //$from_send_id    = "";
        //$from_send_level = "";
        
        $form_send = $this->input->post('form_send');
        
        /*$data['province'] = $this->m_printreport->checkProvince($form_send);
        foreach ($data['province'] as $row){
            $from_send_id    = $row['instutition_id'];
            $from_send_level = $row['instutition_level'];
        }
        if ($from_send_id == ""){
            $data['amphur'] = $this->m_printreport->checkAmphur($form_send);
            foreach ($data['amphur'] as $row){
                $from_send_id    = $row['instutition_id'];
                $from_send_level = $row['instutition_level'];
            }
        }
        if ($from_send_id == ""){
            $data['district'] = $this->m_printreport->checkDistrict($form_send);
            foreach ($data['district'] as $row){
                $from_send_id    = $row['instutition_id'];
                $from_send_level = $row['instutition_level'];
            }
        }
        */
        
        $subject = $this->input->post('subject');
        $to_receive = $this->input->post('to_receive');
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
        $data['receive'] = $this->m_printreport->getDataFromPrintReportBookReceive($department_id, $level_institution_id, $level_institution, $typeSelect, $from_number_of_run, $to_number_of_run, $newStartDate, $newEndDate, $subject, $to_receive, $number_of_run_1, $number_of_run_2, $number_of_run_3, $number_of_run_4, $number_of_run_5, $number_of_run_6, $number_of_run_7, $number_of_run_8,/*$from_send_id,$from_send_level*/$form_send);
        $this->session->unset_userdata('mydataSearch');
        $this->session->set_userdata('mydataSearch', $data['receive']);
        $this->load->view('include/header');
        $this->load->view('bookreceive/confirm_book_receive', $data);
        $this->load->view('include/footer');
    }

    public function toDocReceive() {
        $ses['receive'] = $this->session->userdata('mydataSearch');
        $this->load->view('bookreceive/book_receive_print_report', $ses);
        //$this->session->unset_userdata('mydataSearch');
    }

    //พิมพ์รายงานสมุดทะเบียนส่ง
    public function confirmBookSend() {
        $level_institution_id = $this->level_institution_id;
        $level_institution    = $this->level_institution;
        $typeSelect           = $this->input->post('typeSelect');
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
        $data['result'] = $this->m_printreport->getDataFormPrintReportBookSend($from_number_of_run, $to_number_of_run, $newStartDate, $newEndDate, $subject, $to_receive, $level_institution_id, $level_institution, $typeSelect, $number_of_run_1, $number_of_run_2, $number_of_run_3, $number_of_run_4, $number_of_run_5, $number_of_run_6, $number_of_run_7, $number_of_run_8,$form_send);
        $this->session->unset_userdata('mydataSearch');
        $this->session->set_userdata('mydataSearch', $data['result']);
        $this->load->view('include/header');
        $this->load->view('bookreceive/confirm_book_send', $data);
        $this->load->view('include/footer');
    }

    public function toDocSend() {
        $data['result'] = $this->session->userdata('mydataSearch');
        $this->load->view('bookreceive/book_send_print_report', $data);
        //$this->session->unset_userdata('mydataSearch');
    }

    
    
    
    
    
    
    
    
    
    
    //พิมพ์รายงานสถิติ
    public function confirmPrintReport() {
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');
        if ($startDate != "") {
            $newStartDate = date("d/m/Y", strtotime($startDate));
            $newStartDateTemp = date("Y-m-d", strtotime($startDate));
        } else {
            $newStartDate = "";
            $newStartDateTemp = "";
        }
        if ($endDate != "") {
            $newEndDate = date("d/m/Y", strtotime($endDate));
            $newEndDateTemp = date("Y-m-d", strtotime($endDate));
        } else {
            $newEndDate = "";
            $newEndDateTemp = "";
        }
        $level_institution_id = $this->level_institution_id;
        $level_institution = $this->level_institution;
        $data['newStartDate'] = $newStartDate;
        $data['newEndDate'] = $newEndDate;
        $data['result'] = $this->m_printreport->getDataForPrintReport($level_institution_id, $level_institution, $newStartDateTemp, $newEndDateTemp);
        $this->session->set_userdata('mydataSearchPrintReport', $data['result']);
        $this->session->set_userdata('newStartDate', $data['newStartDate']);
        $this->session->set_userdata('newEndDate', $data['newEndDate']);
        $this->load->view('include/header');
        $this->load->view('bookreceive/confirm_print_report', $data);
        $this->load->view('include/footer');
    }

    public function toDocReport() {
        $data['result'] = $this->session->userdata('mydataSearchPrintReport');
        $data['newStartDate'] = $this->session->userdata('newStartDate');
        $data['newEndDate'] = $this->session->userdata('newEndDate');
        $this->load->view('bookreceive/printreport_print_report', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */