<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/nm_saraban_lib.php';
class acceptBook extends nm_saraban_lib{
      function __construct() {
        parent::__construct();
        $this->load->model('m_acceptbook');
        $this->load->model('m_booksend');
        $this->load->model('m_receive_document_orther');
    }
    public function index(){

    }
    public function see_doc()
    {
        $id = $this->input->post('id');
        $this->db->set('status_reading','yes');
        $this->db->where('id',$id);
        $this->db->update('registration_send_document_outside');
    }
    public function get_content($id = '' , $id_create = '')
    {  
       $data['result'] = $this->m_booksend->getDetail($id_create);
       $data['id_accept'] = $id;
       $data['id_create'] = $id_create;
       $data['result'] = $this->m_booksend->get_content($id);
       $this->load->view('acceptBook/sup/content_doc',$data);
    }
    public function show_detail($id = '' ,$id_create = '')
    {
        $data['result'] = $this->m_booksend->getDetail($id_create);
        $data['id_accept'] = $id;
        $data['id_create'] = $id_create;
        $this->load->view('include/header');
        $this->load->view('acceptBook/acceptBook',$data);
        $this->load->view('include/footer');
    }
    public function accept_return_document()
    {
        $id_accept   =  $this->input->post('id_accept');
        $id_create   =  $this->input->post('id_create');
        $messages   =  $this->input->post('messages');

        $this->db->set('status_return_document','yes');
        $this->db->set('reason_return_document',$messages);
        $this->db->set('udate',date('Y-m-d H:i:s'));

        $this->db->where('id',$id_accept);
        $this->db->update('registration_send_document_outside');

        $this->session->set_flashdata('insert_send2', 'Value');  
        redirect('receiveDocumentOnline/receiveDocumentOnline','refresh');
    }
    public function return_document($id = '' ,$id_create = '')
    {
        $data['result'] = $this->m_booksend->getDetail($id_create);
        $data['id_accept'] = $id;
        $data['id_create'] = $id_create;
        $this->load->view('include/header');
        $this->load->view('acceptBook/return_document',$data);
        $this->load->view('include/footer');
    }
    public function acceptBookkeep_document($id = '' , $id_create = '')
    {  
        $data['result'] = $this->m_booksend->getDetail($id_create);
        $data['id_accept'] = $id;
        $data['id_create'] = $id_create;

        $this->load->view('include/header');
        $this->load->view('acceptBook/acceptBook',$data);
        $this->load->view('include/footer');
    }
    
    public function detail_receivce_document($id = '' ,$id_create = ''){
        $data['result'] = $this->m_booksend->getDetail($id_create);
        $data['id_accept'] = $id;
        $data['id_create'] = $id_create;
        $this->load->view('include/header');
        $this->load->view('acceptBook/detail_receivce_document',$data);
        $this->load->view('include/footer');
    }
    
    public function save_data_accepted()
    {   
        $registration_create_number_id = $this->input->post('registration_create_number_id');
        $registration_send_document_outside_id = $this->input->post('registration_send_document_outside_id');
        $implementation_date = $this->input->post('implementation_date');
        $implementation_time = $this->input->post('implementation_time');
        $number_of_run = trim($this->input->post('number_of_run'));
        $sender_data = $this->m_booksend->get_sender($registration_create_number_id);
        
        
        $this->db->select('*');
        $this->db->from('registration_create_number_of_run');
        $this->db->where('registration_create_number_id', $sender_data[0]['id']);
        $this->db->where('active', 1);
        $query = $this->db->get();
        $data_result = $query->result_array();
    
        $this->db->select('*');
        $this->db->from('department_of_instutition');
        $this->db->where('id', $sender_data[0]['department_of_instutition_id']);
        $this->db->where('active', 1);
        $query = $this->db->get();
        $result2 = $query->result_array();
        
        //$document_no = get_number_of_instutition($sender_data[0]['level_institution_id'],$sender_data[0]['level_institution'])  . $result2[0]['department_id'] . '/' . $sender_data[0]['registration_type'] . $data_result[0]['number_of_run'];
        $document_no = get_number_of_instutition($sender_data[0]['use_instutition_id'],$sender_data[0]['use_instutition_level'])  . $result2[0]['department_id'] . '/' . $sender_data[0]['registration_type'] . $data_result[0]['number_of_run'];
        
        $check_data_instutition_main = $this->session->userdata('data_instutition_main');
        if($check_data_instutition_main){
            $level_institution_id = $this->instutition_main_id;
            $level_institution = $this->instutition_main_level;
        }else{
            $level_institution_id = $this->level_institution_id;
            $level_institution = $this->level_institution;
        }
        //-------------- ตรวจสอบว่าใครเป็นคนสร้าง เพื่อจะได้ ลงรับเอกสารได้ ในกรณีที่มีการออกเลขซ้ำกัน เช่น ล็อกเข้าไปในหน่วยงานกลาง ---------------
        $sender_level_institution_id = ($sender_data[0]['central_registration'] == 'yes')? $sender_data[0]['level_institution_central_id'] : $sender_data[0]['level_institution_id'];
        $sender_level_institution = ($sender_data[0]['central_registration'] == 'yes')? $sender_data[0]['level_institution_central'] : $sender_data[0]['level_institution'];
        //echo $sender_level_institution_id.' '.$sender_level_institution.' '.$sender_data[0]['central_registration']; exit;
        //-----------------------------------------------------------------------------------------------------------------
        $data = array(
            "instutition_receiver_id" => $level_institution_id,
            "instutition_receiver_level" => $level_institution,
            "instutition_sender_id" => $sender_level_institution_id, //$sender_data[0]['level_institution_id'],
            "instutition_sender_level" => $sender_level_institution, //$sender_data[0]['level_institution'],
            "registration_document_outside_id" => $registration_send_document_outside_id,
            "registration_create_number_id" => $registration_create_number_id,
            
            "receive_type" => "online",
            "document_no" => $document_no,
            "receive_date" => date("Y-m-d"),
            "from" => $sender_data[0]['from'],
            "subject" => $sender_data[0]['subject'],
            "to_receive" => $sender_data[0]['to_receive'],
            "attach_detail" => $sender_data[0]['attach_detail'],
            "reference_to" => $sender_data[0]['reference_to'],
            "detail" => $sender_data[0]['detail'],
            "layer_priority_id" => $sender_data[0]['layer_priority_id'],
            "layer_secret_id" => $sender_data[0]['layer_secret_id'],
            "objective_id" => $sender_data[0]['objective_id'],
            "implementation_date" => date("Y-m-d", strtotime($implementation_date)),
            "implementation_time" => $implementation_time,
            "cdate" => date("Y-m-d H:i:s"),
            "udate" => date("Y-m-d H:i:s")
        );
        
        if($this->check_exist_document_no($document_no, $sender_level_institution_id, $sender_level_institution)){
           $check_data_instutition_main = $this->session->userdata('data_instutition_main');
           if($check_data_instutition_main)
           {
              $this->receive_type = $check_data_instutition_main['receive_type'];
           }
            if($this->receive_type == 1 && $number_of_run == ""){  //รันเลขทะเบียนรับแบบ auto
                $registration_receive_document_id = $this->m_booksend->save_data_accepted($data);
                $this->made_number_of_run_registration_receive($registration_receive_document_id);
                
                 //update status receive
                $this->db->set('status_receive','yes');
                $this->db->where('id', $registration_send_document_outside_id);
                $this->db->update('registration_send_document_outside'); 

                $this->session->set_flashdata('insert_send1', 'Value');

                redirect('recieptBook/recieptBook','refresh');
        
            }else if($this->receive_type == 2 && $number_of_run != ""){  //รันเลขทะเบียนรับแบบ manual
                if($this->check_custom_registration_receive_number($number_of_run, $level_institution_id, $level_institution)){
                    
                    $registration_receive_document_id = $this->m_booksend->save_data_accepted($data);
                    $registration_receive_document_of_run_id = $this->m_receive_document_orther
                                                    ->save_registration_receive_number_of_run($registration_receive_document_id, $level_institution_id, $level_institution, $number_of_run);
        
                    $this->m_receive_document_orther->update_registration_receive_document_other($registration_receive_document_id, $registration_receive_document_of_run_id);
                    
                    //update status receive
                    $this->db->set('status_receive','yes');
                    $this->db->where('id', $registration_send_document_outside_id);
                    $this->db->update('registration_send_document_outside'); 

                    $this->session->set_flashdata('insert_send1', 'Value');

                    redirect('recieptBook/recieptBook','refresh');
                    
                }else{
                    $this->session->set_flashdata('error', 'limit');
                    redirect('acceptBook/acceptBook/detail_receivce_document/'.$registration_send_document_outside_id.'/'.$registration_create_number_id, 'refresh');
                }
            }else{
                //รันเลขทะเบียนรับผิดแบบ
                $this->session->set_flashdata('error', 'not_run_number');
                redirect('acceptBook/acceptBook/detail_receivce_document/'.$registration_send_document_outside_id.'/'.$registration_create_number_id, 'refresh');
            }
            
        }else{
            //-- เลขทะเบียนซ้ำเคยรับแล้ว
            $this->session->set_flashdata('error', 'exist');
            redirect('acceptBook/acceptBook/detail_receivce_document/'.$registration_send_document_outside_id.'/'.$registration_create_number_id, 'refresh');
        }
        
        //---------------------------------------------------------------------------------------------------------------------------------------------------------
        
    }
    
    public function made_number_of_run_registration_receive($registration_receive_document_id){
        $check_data_instutition_main = $this->session->userdata('data_instutition_main');
        if($check_data_instutition_main){
            $this->txt_receive = $check_data_instutition_main['txt_receive'];
            $number_of_run = $this->m_receive_document_orther->check_registration_receive_number_of_run($this->instutition_main_id, $this->instutition_main_level);
            $temp_number_of_run = ($number_of_run[0]['number_of_run']+1);
            if($temp_number_of_run >= $this->txt_receive){
                $new_number_of_run = $temp_number_of_run;
            }else{
                $new_number_of_run = $this->txt_receive;
            }


            $registration_receive_document_of_run_id = $this->m_receive_document_orther
                                                        ->save_registration_receive_number_of_run($registration_receive_document_id, $this->instutition_main_id, $this->instutition_main_level, $new_number_of_run);

            $this->m_receive_document_orther->update_registration_receive_document_other($registration_receive_document_id, $registration_receive_document_of_run_id);
            //---------------------------------------------------------------------------------------------------------------------------------------------------------------
        }else{
            $number_of_run = $this->m_receive_document_orther->check_registration_receive_number_of_run($this->level_institution_id, $this->level_institution);
            $temp_number_of_run = ($number_of_run[0]['number_of_run']+1);
            if($temp_number_of_run >= $this->txt_receive){
                $new_number_of_run = $temp_number_of_run;
            }else{
                $new_number_of_run = $this->txt_receive;
            }


            $registration_receive_document_of_run_id = $this->m_receive_document_orther
                                                        ->save_registration_receive_number_of_run($registration_receive_document_id, $this->level_institution_id, $this->level_institution, $new_number_of_run);

            $this->m_receive_document_orther->update_registration_receive_document_other($registration_receive_document_id, $registration_receive_document_of_run_id);
        }
        
    }
    
    public function check_exist_document_no($document_no, $sender_level_institution_id, $sender_level_institution){
        $check_data_instutition_main = $this->session->userdata('data_instutition_main');
        if($check_data_instutition_main)
        {
             $temp = $this->m_booksend->check_exist_document_no_for_main($document_no, $sender_level_institution_id, $sender_level_institution);
            if(count($temp) > 0){
                return false;
            }else{
                return true;
            }
        }
        else
        {
            $temp = $this->m_booksend->check_exist_document_no($document_no, $sender_level_institution_id, $sender_level_institution);
            if(count($temp) > 0){
                return false;
            }else{
                return true;
            }
        }

    }
    
    public function check_custom_registration_receive_number($custom_registration_receive_number, $level_institution_id, $level_institution){
        
        $check_data_instutition_main = $this->session->userdata('data_instutition_main');
            if($check_data_instutition_main)
            {
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
}
