<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/nm_saraban_lib.php';
class detailReceiveOutsite extends nm_saraban_lib{
      function __construct() {
        parent::__construct();
        $this->load->model('m_detailreceiveoutsite');
        $this->load->model('m_booksend');
    }
    public function index(){
       
    }
    public function followUp($registration_receive_document_id = '' , $registration_create_number_id = '')
    {
        $data['result'] = $this->m_booksend->getDetail($registration_create_number_id);
        //
       $data['result'] = $this->m_detailreceiveoutsite->getDetail($registration_receive_document_id);
        
        $data['registration_receive_document_id'] = $registration_receive_document_id;
        $data['registration_create_number_id'] = $registration_create_number_id;
        
        $data['attach_file_old'] = $this->m_detailreceiveoutsite->get_attach_file_old($registration_create_number_id);
        $data['attach_file_new'] = $this->m_detailreceiveoutsite->get_attach_file_new($registration_receive_document_id);

        $this->load->view('include/header');
        $this->load->view('detailReceiveOutsite/form_send_followUp', $data);
        $this->load->view('include/footer');
    }
    public function Send_To($id_receive = '' , $id_create_number = '')
    {   
        $data['depart_list'] = $this->m_detailreceiveoutsite->depart_list();
        $data['id_receive']       = $id_receive  ;
        $data['id_create_number'] = $id_create_number;

        $data['get_type_receive']   =  $this->m_detailreceiveoutsite->get_type_receive($id_receive );
        $this->load->view('include/header');
        $this->load->view('detailReceiveOutsite/SendData/form_send', $data);
        $this->load->view('include/footer');
    }
    public function show_detail($registration_receive_document_id = '' , $registration_create_number_id = '')
    {
        $data['result'] = $this->m_detailreceiveoutsite->getDetail($registration_receive_document_id);
        
        $data['registration_receive_document_id'] = $registration_receive_document_id;
        $data['registration_create_number_id'] = $registration_create_number_id;
        
        $data['attach_file_old'] = $this->m_detailreceiveoutsite->get_attach_file_old($registration_create_number_id);
        $data['attach_file_new'] = $this->m_detailreceiveoutsite->get_attach_file_new($registration_receive_document_id);
        
        $this->load->view('include/header');
        $this->load->view('detailReceiveOutsite/detailReceiveOutsite', $data);
        $this->load->view('include/footer');
    }
    
    public function upload_document_attach_file($registration_receive_document_id = '' , $registration_create_number_id = ''){
        $data['result'] = $this->m_detailreceiveoutsite->getDetail($registration_receive_document_id);
        $data['attach_file_old'] = $this->m_detailreceiveoutsite->get_attach_file_old($registration_create_number_id);
        $data['attach_file_new'] = $this->m_detailreceiveoutsite->get_attach_file_new($registration_receive_document_id);
        
        $data['registration_receive_document_id'] = $registration_receive_document_id;
        $data['registration_create_number_id'] = $registration_create_number_id;
        
        $this->load->view('include/header');
        $this->load->view('detailReceiveOutsite/document_attach_file', $data);
        $this->load->view('include/footer');
    }
    
    public function registration_receive_upload_file(){
        $registration_create_number_id = $this->input->post('registration_create_number_id');
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
                $this->m_detailreceiveoutsite->registration_receive_upload_file($data);
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
                $this->m_detailreceiveoutsite->registration_receive_upload_file($data);
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
                $this->m_detailreceiveoutsite->registration_receive_upload_file($data);
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
                $this->m_detailreceiveoutsite->registration_receive_upload_file($data);
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
                $this->m_detailreceiveoutsite->registration_receive_upload_file($data);
            }
        }
        $this->session->set_flashdata('array_file_result', $array_file);
        redirect('detailReceiveOutsite/detailReceiveOutsite/upload_document_attach_file/'.$registration_receive_document_id.'/'.$registration_create_number_id, 'refresh');
    }
    
    public function delete_file_upload_registration($registration_receive_document_file_upload_id, $registration_receive_document_id, $registration_create_number_id){
        $this->m_detailreceiveoutsite->delete_file_upload_registration($registration_receive_document_file_upload_id);
        redirect('detailReceiveOutsite/detailReceiveOutsite/upload_document_attach_file/'.$registration_receive_document_id.'/'.$registration_create_number_id, 'refresh');
    }
    
    public function delete($registration_receive_document_id, $registration_create_number_id){
        $this->db->where('id', $registration_receive_document_id);
        $this->db->delete('registration_receive_document');
        redirect('recieptBook/recieptBook', 'refresh');
    }
    
    public function edit($registration_receive_document_id, $registration_create_number_id){
        $data['result'] = $this->m_detailreceiveoutsite->getDetail($registration_receive_document_id);
        
        $data['registration_receive_document_id'] = $registration_receive_document_id;
        $data['registration_create_number_id'] = $registration_create_number_id;
        
        $data['attach_file_old'] = $this->m_detailreceiveoutsite->get_attach_file_old($registration_create_number_id);
        $data['attach_file_new'] = $this->m_detailreceiveoutsite->get_attach_file_new($registration_receive_document_id);
        
        //$data['id_send'] = $id;
        $this->load->view('include/header');
        $this->load->view('detailReceiveOutsite/show_edit_detail_registration_receive', $data);
        $this->load->view('include/footer');
    }
    
    public function update_registration_recieve_number(){
        if($this->input->post('registration_receive_document_id')){
            $data = array(
                "document_no" => $this->input->post('document_no'),
                "receive_date" => $this->input->post('receive_date'),
                "from" => $this->input->post('from'),
                "subject" => $this->input->post('subject'),
                "to_receive" => $this->input->post('to_receive'),
                "attach_detail" => $this->input->post('attach_detail'),
                "reference_to" => $this->input->post('reference_to'),
                "offer_the_operating" => $this->input->post('offer_the_operating'),
                "detail" => $this->input->post('detail'),
                "objective_id" => $this->input->post('objective_id'),
                "layer_priority_id" => $this->input->post('layer_priority_id'),
                "layer_secret_id" => $this->input->post('layer_secret_id'),
                "implementation_date" => $this->input->post('implementation_date'),
                "implementation_time" => $this->input->post('implementation_time')
            );
            
            $instutition_receiver_id = $this->input->post('instutition_receiver_id');
            $instutition_receiver_level = $this->input->post('instutition_receiver_level');
            $registration_receive_document_id = $this->input->post('registration_receive_document_id');
            $registration_create_number_id = $this->input->post('registration_create_number_id');
            
            $ducument_number_new = $this->input->post('ducument_number_new');
            $ducument_number_old = $this->input->post('ducument_number_old');
            
            $check_receive_document = $this->m_detailreceiveoutsite->check_receive_document($this->input->post('registration_create_number_id'));
            if(count($check_receive_document) == 0){
                if(trim($ducument_number_new) != $ducument_number_old){
                    $check_number_of_run = $this->m_detailreceiveoutsite->check_number_of_run_for_update($instutition_receiver_id, $instutition_receiver_level, $ducument_number_new);
                    
                    if(count($check_number_of_run) > 0){
                        $this->session->set_flashdata('update_registration_create_number', 'error');
                    }else{
                        $number_data = array(
                            "number_of_run" => $ducument_number_new
                        );
                        $this->m_detailreceiveoutsite->update_number_of_run($number_data, $registration_receive_document_id);
                        
                        $this->m_detailreceiveoutsite->update_registration_recieve_number($data, $this->input->post('registration_receive_document_id'));
                        $this->session->set_flashdata('update_registration_create_number', '1');
                    }
                }else{
                    $this->m_detailreceiveoutsite->update_registration_recieve_number($data, $this->input->post('registration_receive_document_id'));
                    $this->session->set_flashdata('update_registration_create_number', '1');
                }
            }else{
                $this->session->set_flashdata('update_registration_create_number', 'error-edit');
            }
        }
        
        redirect('detailReceiveOutsite/detailReceiveOutsite/edit/'.$registration_receive_document_id.'/'.$registration_create_number_id, 'refresh');
    }
}
