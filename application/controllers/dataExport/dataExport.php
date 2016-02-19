<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/nm_saraban_lib.php';
class dataExport extends nm_saraban_lib{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_dataexport');
        $this->load->model('m_auth_login');
    }
    
    public function index(){
        $data['department_of_instutition'] = $this->m_dataexport->get_data_department_of_instutition($this->province_id, $this->level_institution_id, $this->level_institution);
        $this->load->view('dataExport/dataExport', $data);
        //$this->load->view('error/error_404');
    }
    public function set_redirect()
    {   
        $type_re = $this->input->post('type_re');
        if($type_re == '')
        {
           $this->session->set_userdata('re_page','bookSend/bookSend');
        }
        if($type_re == 'ว')
        {
           $this->session->set_userdata('re_page','bookCircular/bookCircular');
        }
        if($type_re == 'คำสั่ง')
        {
           $this->session->set_userdata('re_page','bookCommand/bookCommand');
        }
        if($type_re == 'วิทยุ')
        {
           $this->session->set_userdata('re_page','datdReciept/datdReciept');
        }
    }
    public function registration_create(){
        $registration_number = $this->input->post('registration_number');
        $layer_priority_id = $this->input->post('layer_priority_id');
        $dated_send = $this->input->post('dated_send');
        $layer_secret_id = $this->input->post('layer_secret_id');
        $from_send = $this->input->post('from_send');
        $objective_id = $this->input->post('objective_id');
        $subject = $this->input->post('subject');
        $implementation_date = $this->input->post('implementation_date');
        $to_receive = $this->input->post('to_receive');
        $implementation_time = $this->input->post('implementation_time');
        $attach_detail = $this->input->post('attach_detail');
        $custom_registration_number = trim($this->input->post('custom_registration_number'));
        $reference_to = $this->input->post('reference_to');
        $detail = $this->input->post('detail');
        $central_registration = "no";
        if($this->session->userdata('data_instutition_main')){
            $central_registration = "yes";
        }
        
        //-----------------------------------------------------------------------------------------------
        if($this->designation == "governor" || $this->designation == "prefect"){
            $temp = explode(',', $registration_number);
            $create_number_by = "governor_or_prefect";
            $use_instutition_id = $temp[0];
            $use_instutition_level = $temp[1];
        }else{
            $create_number_by = "";
            $use_instutition_id = $this->level_institution_id;
            $use_instutition_level = $this->level_institution;
        }
        //-----------------------------------------------------------------------------------------------
        
        $data = array(
            //"registration_create_number_of_run_id" => 1,
            
            "registration_type" => $this->input->post('registration_type'),
            "dated_send" => date("Y-m-d" ,  strtotime($dated_send)),
            "level_institution_id" => $this->level_institution_id,
            "level_institution" => $this->level_institution,
            "department_of_instutition_id" => $this->input->post('department_number'),
            
            "create_number_by" => $create_number_by,
            "use_instutition_id" => $use_instutition_id,
            "use_instutition_level" => $use_instutition_level,
            
            "central_registration" => $central_registration,
            "level_institution_central_id" => ($central_registration == "yes")? $this->instutition_main_id : NULL,
            "level_institution_central" => ($central_registration == "yes")? $this->instutition_main_level : NULL,
            "from" => $from_send,
            "subject" => $subject,
            "to_receive" => $to_receive,
            "attach_detail" => $attach_detail,
            "reference_to" => $reference_to,
            "detail" => $detail,
            "layer_priority_id" => $layer_priority_id,
            "layer_secret_id" => $layer_secret_id,
            "objective_id" => $objective_id,
            "custom_registration_number" => ($custom_registration_number != "")? "Yes":"No",
            "implementation_date" => date("Y-m-d" ,  strtotime($implementation_date)),
            "implementation_time" => $implementation_time,
            "created" => date("Y-m-d H:i:s"),
            "updated" => date("Y-m-d H:i:s")
        );
        
        $check_registration_type = $this->registration_type_allocate($this->input->post('registration_type'), $custom_registration_number, $central_registration);
        if($check_registration_type == "auto"){
            $registration_create_number_id = $this->m_dataexport->registration_create($data);
            $this->made_number_of_run_registration($registration_create_number_id, $central_registration, $this->input->post('registration_type'));
            
            redirect('dataExport/dataExport/report_detail_registration_create/'.base64_encode($registration_create_number_id), 'refresh');
            
        }else if($check_registration_type == "custom"){
            
            
            
            if($this->check_custom_registration_number($custom_registration_number, $this->input->post('registration_type'), $central_registration)){
                $registration_create_number_id = $this->m_dataexport->registration_create($data);
                if($central_registration == "no"){
                    if($this->input->post('registration_type') == ""){
                        $registration_create_number_of_run_id = $this->m_dataexport->save_registration_create_number_of_run($registration_create_number_id, $this->level_institution_id, $this->level_institution, 'normal', $custom_registration_number);
                        $this->m_dataexport->update_registration_create($registration_create_number_id, $registration_create_number_of_run_id);
                    }else if($this->input->post('registration_type') == "ว"){
                        $registration_create_number_of_run_id = $this->m_dataexport->save_registration_create_number_of_run($registration_create_number_id, $this->level_institution_id, $this->level_institution, 'vian', $custom_registration_number);
                        $this->m_dataexport->update_registration_create($registration_create_number_id, $registration_create_number_of_run_id);
                    }else if($this->input->post('registration_type') == "คำสั่ง"){
                        $registration_create_number_of_run_id = $this->m_dataexport->save_registration_create_number_of_run($registration_create_number_id, $this->level_institution_id, $this->level_institution, 'command', $custom_registration_number);
                        $this->m_dataexport->update_registration_create($registration_create_number_id, $registration_create_number_of_run_id);
                    }else if($this->input->post('registration_type') == "วิทยุ"){
                        $registration_create_number_of_run_id = $this->m_dataexport->save_registration_create_number_of_run($registration_create_number_id, $this->level_institution_id, $this->level_institution, 'radio', $custom_registration_number);
                        $this->m_dataexport->update_registration_create($registration_create_number_id, $registration_create_number_of_run_id);
                    }
                }else if($central_registration == "yes"){
                    
                    
                    if($this->input->post('registration_type') == ""){
                        $registration_create_number_of_run_id = $this->m_dataexport->save_registration_create_number_of_run($registration_create_number_id, $this->instutition_main_id, $this->instutition_main_level, 'normal', $custom_registration_number);
                        $this->m_dataexport->update_registration_create($registration_create_number_id, $registration_create_number_of_run_id);
                    }else if($this->input->post('registration_type') == "ว"){
                        $registration_create_number_of_run_id = $this->m_dataexport->save_registration_create_number_of_run($registration_create_number_id, $this->instutition_main_id, $this->instutition_main_level, 'vian', $custom_registration_number);
                        $this->m_dataexport->update_registration_create($registration_create_number_id, $registration_create_number_of_run_id);
                    }else if($this->input->post('registration_type') == "คำสั่ง"){
                        $registration_create_number_of_run_id = $this->m_dataexport->save_registration_create_number_of_run($registration_create_number_id, $this->instutition_main_id, $this->instutition_main_level, 'command', $custom_registration_number);
                        $this->m_dataexport->update_registration_create($registration_create_number_id, $registration_create_number_of_run_id);
                    }else if($this->input->post('registration_type') == "วิทยุ"){
                        $registration_create_number_of_run_id = $this->m_dataexport->save_registration_create_number_of_run($registration_create_number_id, $this->instutition_main_id, $this->instutition_main_level, 'radio', $custom_registration_number);
                        $this->m_dataexport->update_registration_create($registration_create_number_id, $registration_create_number_of_run_id);
                    }
                }
                
                
                redirect('dataExport/dataExport/report_detail_registration_create/'.base64_encode($registration_create_number_id), 'refresh');
            }else{
                $this->session->set_flashdata('error_result', 'limit-number');
                redirect('dataExport/dataExport', 'refresh');
            }
            
        }else{
            $this->session->set_flashdata('error_result', $check_registration_type);  //-- error ในกรณีที่มีการรันเลขทะเบียนผิดรูปแบบ
            redirect('dataExport/dataExport', 'refresh');
        }
        
        
    }
    
    public function registration_type_allocate($registration_type, $custom_registration_number, $central_registration){
        
        if($central_registration == "no"){
            if($custom_registration_number == ""){
                if($registration_type == "" && $this->nornal_type == 1){
                    return "auto";
                }else if($registration_type == "ว" && $this->vian_type == 1){
                    return "auto";
                }else if($registration_type == "คำสั่ง" && $this->command_type == 1){
                    return "auto";
                }else if($registration_type == "วิทยุ" && $this->radio_type == 1){
                    return "auto";
                }else{
                    return "error-auto";
                }
            }else if($custom_registration_number != ""){
                if($registration_type == "" && $this->nornal_type == 2){
                    return "custom";
                }else if($registration_type == "ว" && $this->vian_type == 2){
                    return "custom";
                }else if($registration_type == "คำสั่ง" && $this->command_type == 2){
                    return "custom";
                }else if($registration_type == "วิทยุ" && $this->radio_type == 2){
                    return "custom";
                }else{
                    return "error-custom";
                }
            }else{
                redirect('error', 'refresh');
                exit;
            }
        }else if($central_registration == "yes"){
            $check_data_instutition_main = $this->session->userdata('data_instutition_main');
            if($custom_registration_number == ""){
                if($registration_type == "" && $check_data_instutition_main['nornal_type'] == 1){
                    return "auto";
                }else if($registration_type == "ว" && $check_data_instutition_main['vian_type'] == 1){
                    return "auto";
                }else if($registration_type == "คำสั่ง" && $check_data_instutition_main['command_type'] == 1){
                    return "auto";
                }else if($registration_type == "วิทยุ" && $check_data_instutition_main['radio_type'] == 1){
                    return "auto";
                }else{
                    return "error-auto";
                }
            }else if($custom_registration_number != ""){
                if($registration_type == "" && $check_data_instutition_main['nornal_type'] == 2){
                    return "custom";
                }else if($registration_type == "ว" && $check_data_instutition_main['vian_type'] == 2){
                    return "custom";
                }else if($registration_type == "คำสั่ง" && $check_data_instutition_main['command_type'] == 2){
                    return "custom";
                }else if($registration_type == "วิทยุ" && $check_data_instutition_main['radio_type'] == 2){
                    return "custom";
                }else{
                    return "error-custom";
                }
            }else{
                redirect('error', 'refresh');
                exit;
            }
            
        }else{
            redirect('error', 'refresh');
            exit;
        }
    }
    
    public function made_number_of_run_registration($registration_create_number_id, $central_registration, $registration_type){
        if($central_registration == "no"){
            if($registration_type == ""){
                $number_of_run = $this->m_dataexport->check_registration_create_number_of_run($this->level_institution_id, $this->level_institution, 'normal');
                $temp_number_of_run = ($number_of_run[0]['number_of_run'] + 1);
                if($this->nornal_text <= $temp_number_of_run){
                    $new_number_of_run = $temp_number_of_run;
                }else{
                    $new_number_of_run = $this->nornal_text;
                }
                
                $registration_create_number_of_run_id = $this->m_dataexport->save_registration_create_number_of_run($registration_create_number_id, $this->level_institution_id, $this->level_institution, "normal", $new_number_of_run);
                $this->m_dataexport->update_registration_create($registration_create_number_id, $registration_create_number_of_run_id);
                
            }else if($registration_type == "ว"){
                $number_of_run = $this->m_dataexport->check_registration_create_number_of_run($this->level_institution_id, $this->level_institution, 'vian');
                $temp_number_of_run = ($number_of_run[0]['number_of_run'] + 1);
                if($this->vian_text <= $temp_number_of_run){
                    $new_number_of_run = $temp_number_of_run;
                }else{
                    $new_number_of_run = $this->vian_text;
                }
                
                $registration_create_number_of_run_id = $this->m_dataexport->save_registration_create_number_of_run($registration_create_number_id, $this->level_institution_id, $this->level_institution, "vian", $new_number_of_run);
                $this->m_dataexport->update_registration_create($registration_create_number_id, $registration_create_number_of_run_id);
                
            }else if($registration_type == "คำสั่ง"){
                $number_of_run = $this->m_dataexport->check_registration_create_number_of_run($this->level_institution_id, $this->level_institution, 'command');
                $temp_number_of_run = ($number_of_run[0]['number_of_run'] + 1);
                if($this->command_text <= $temp_number_of_run){
                    $new_number_of_run = $temp_number_of_run;
                }else{
                    $new_number_of_run = $this->command_text;
                }
                
                $registration_create_number_of_run_id = $this->m_dataexport->save_registration_create_number_of_run($registration_create_number_id, $this->level_institution_id, $this->level_institution, "command", $new_number_of_run);
                $this->m_dataexport->update_registration_create($registration_create_number_id, $registration_create_number_of_run_id);
            }else if($registration_type == "วิทยุ"){
                $number_of_run = $this->m_dataexport->check_registration_create_number_of_run($this->level_institution_id, $this->level_institution, 'radio');
                $temp_number_of_run = ($number_of_run[0]['number_of_run'] + 1);
                if($this->radio_text <= $temp_number_of_run){
                    $new_number_of_run = $temp_number_of_run;
                }else{
                    $new_number_of_run = $this->radio_text;
                }
                
                $registration_create_number_of_run_id = $this->m_dataexport->save_registration_create_number_of_run($registration_create_number_id, $this->level_institution_id, $this->level_institution, "radio", $new_number_of_run);
                $this->m_dataexport->update_registration_create($registration_create_number_id, $registration_create_number_of_run_id);
            }
         
        }else if($central_registration == "yes"){ //ส่งแบบกรณีที่เข้าไปในระบบทะเบียนกลาง
            $check_data_instutition_main = $this->session->userdata('data_instutition_main');
            if($registration_type == ""){
                $number_of_run = $this->m_dataexport->check_registration_create_number_of_run($this->instutition_main_id, $this->instutition_main_level, 'normal');
                $temp_number_of_run = ($number_of_run[0]['number_of_run'] + 1);
                if($check_data_instutition_main['nornal_text'] <= $temp_number_of_run){
                    $new_number_of_run = $temp_number_of_run;
                }else{
                    $new_number_of_run = $check_data_instutition_main['nornal_text'];
                }
                
                $registration_create_number_of_run_id = $this->m_dataexport->save_registration_create_number_of_run($registration_create_number_id, $this->instutition_main_id, $this->instutition_main_level, "normal", $new_number_of_run);
                $this->m_dataexport->update_registration_create($registration_create_number_id, $registration_create_number_of_run_id);
                
            }else if($registration_type == "ว"){
                $number_of_run = $this->m_dataexport->check_registration_create_number_of_run($this->instutition_main_id, $this->instutition_main_level, 'vian');
                $temp_number_of_run = ($number_of_run[0]['number_of_run'] + 1);
                if($check_data_instutition_main['vian_text'] <= $temp_number_of_run){
                    $new_number_of_run = $temp_number_of_run;
                }else{
                    $new_number_of_run = $check_data_instutition_main['vian_text'];
                }
                
                $registration_create_number_of_run_id = $this->m_dataexport->save_registration_create_number_of_run($registration_create_number_id, $this->instutition_main_id, $this->instutition_main_level, "vian", $new_number_of_run);
                $this->m_dataexport->update_registration_create($registration_create_number_id, $registration_create_number_of_run_id);
                
            }else if($registration_type == "คำสั่ง"){
                $number_of_run = $this->m_dataexport->check_registration_create_number_of_run($this->instutition_main_id, $this->instutition_main_level, 'command');
                $temp_number_of_run = ($number_of_run[0]['number_of_run'] + 1);
                if($check_data_instutition_main['command_text'] <= $temp_number_of_run){
                    $new_number_of_run = $temp_number_of_run;
                }else{
                    $new_number_of_run = $check_data_instutition_main['command_text'];
                }
                
                $registration_create_number_of_run_id = $this->m_dataexport->save_registration_create_number_of_run($registration_create_number_id, $this->instutition_main_id, $this->instutition_main_level, "command", $new_number_of_run);
                $this->m_dataexport->update_registration_create($registration_create_number_id, $registration_create_number_of_run_id);
            }else if($registration_type == "วิทยุ"){
                $number_of_run = $this->m_dataexport->check_registration_create_number_of_run($this->instutition_main_id, $this->instutition_main_level, 'radio');
                $temp_number_of_run = ($number_of_run[0]['number_of_run'] + 1);
                if($check_data_instutition_main['radio_text'] <= $temp_number_of_run){
                    $new_number_of_run = $temp_number_of_run;
                }else{
                    $new_number_of_run = $check_data_instutition_main['radio_text'];
                }
                
                $registration_create_number_of_run_id = $this->m_dataexport->save_registration_create_number_of_run($registration_create_number_id, $this->instutition_main_id, $this->instutition_main_level, "radio", $new_number_of_run);
                $this->m_dataexport->update_registration_create($registration_create_number_id, $registration_create_number_of_run_id);
            }
            
        }
        
    }
    
    public function check_custom_registration_number($custom_registration_number, $registration_type, $central_registration){
        if($central_registration == "no"){
            if($registration_type == ""){
                $this -> db -> select('*');
                $this -> db -> from('registration_create_number_of_run');
                $this -> db -> where('level_institution_id', $this->level_institution_id);
                $this -> db -> where('level_institution', $this->level_institution);
                $this -> db -> where('registration_type', 'normal');
                $this -> db -> where('number_of_run', $custom_registration_number);
                $query = $this -> db -> get();
                $result = $query->result_array();

                if(count($result) > 0 || $custom_registration_number > $this->nornal_text){
                    return FALSE;
                }else{
                    return TRUE;
                }
            }else if($registration_type == "ว"){
                $this -> db -> select('*');
                $this -> db -> from('registration_create_number_of_run');
                $this -> db -> where('level_institution_id', $this->level_institution_id);
                $this -> db -> where('level_institution', $this->level_institution);
                $this -> db -> where('registration_type', 'vian');
                $this -> db -> where('number_of_run', $custom_registration_number);
                $query = $this -> db -> get();
                $result = $query->result_array();

                if(count($result) > 0 || $custom_registration_number > $this->vian_text){
                    return FALSE;
                }else{
                    return TRUE;
                }
            }else if($registration_type == "คำสั่ง"){
                $this -> db -> select('*');
                $this -> db -> from('registration_create_number_of_run');
                $this -> db -> where('level_institution_id', $this->level_institution_id);
                $this -> db -> where('level_institution', $this->level_institution);
                $this -> db -> where('registration_type', 'command');
                $this -> db -> where('number_of_run', $custom_registration_number);
                $query = $this -> db -> get();
                $result = $query->result_array();

                if(count($result) > 0 || $custom_registration_number > $this->command_text){
                    return FALSE;
                }else{
                    return TRUE;
                }
            }else if($registration_type == "วิทยุ"){
                $this -> db -> select('*');
                $this -> db -> from('registration_create_number_of_run');
                $this -> db -> where('level_institution_id', $this->level_institution_id);
                $this -> db -> where('level_institution', $this->level_institution);
                $this -> db -> where('registration_type', 'radio');
                $this -> db -> where('number_of_run', $custom_registration_number);
                $query = $this -> db -> get();
                $result = $query->result_array();

                if(count($result) > 0 || $custom_registration_number > $this->radio_text){
                    return FALSE;
                }else{
                    return TRUE;
                }
            }
        }else if($central_registration == "yes"){   //--------------------------------------------
            $check_data_instutition_main = $this->session->userdata('data_instutition_main');
            if($registration_type == ""){
                $this -> db -> select('*');
                $this -> db -> from('registration_create_number_of_run');
                $this -> db -> where('level_institution_id', $this->instutition_main_id);
                $this -> db -> where('level_institution', $this->instutition_main_level);
                $this -> db -> where('registration_type', 'normal');
                $this -> db -> where('number_of_run', $custom_registration_number);
                $query = $this -> db -> get();
                $result = $query->result_array();

                if(count($result) > 0 || $custom_registration_number > $check_data_instutition_main['nornal_text']){
                    return FALSE;
                }else{
                    return TRUE;
                }
            }else if($registration_type == "ว"){
                $this -> db -> select('*');
                $this -> db -> from('registration_create_number_of_run');
                $this -> db -> where('level_institution_id', $this->instutition_main_id);
                $this -> db -> where('level_institution', $this->instutition_main_level);
                $this -> db -> where('registration_type', 'vian');
                $this -> db -> where('number_of_run', $custom_registration_number);
                $query = $this -> db -> get();
                $result = $query->result_array();

                if(count($result) > 0 || $custom_registration_number > $check_data_instutition_main['vian_text']){
                    return FALSE;
                }else{
                    return TRUE;
                }
            }else if($registration_type == "คำสั่ง"){
                $this -> db -> select('*');
                $this -> db -> from('registration_create_number_of_run');
                $this -> db -> where('level_institution_id', $this->instutition_main_id);
                $this -> db -> where('level_institution', $this->instutition_main_level);
                $this -> db -> where('registration_type', 'command');
                $this -> db -> where('number_of_run', $custom_registration_number);
                $query = $this -> db -> get();
                $result = $query->result_array();

                if(count($result) > 0 || $custom_registration_number > $check_data_instutition_main['command_text']){
                    return FALSE;
                }else{
                    return TRUE;
                }
            }else if($registration_type == "วิทยุ"){
                $this -> db -> select('*');
                $this -> db -> from('registration_create_number_of_run');
                $this -> db -> where('level_institution_id', $this->instutition_main_id);
                $this -> db -> where('level_institution', $this->instutition_main_level);
                $this -> db -> where('registration_type', 'radio');
                $this -> db -> where('number_of_run', $custom_registration_number);
                $query = $this -> db -> get();
                $result = $query->result_array();

                if(count($result) > 0 || $custom_registration_number > $check_data_instutition_main['radio_text']){
                    return FALSE;
                }else{
                    return TRUE;
                }
            }
            
        }
        
    }
    
    public function report_detail_registration_create($registration_create_number_id){
        $data['registration_create_number_id'] = base64_decode($registration_create_number_id);
        $data['registration_create_number'] = $this->m_dataexport->report_detail_registration_create(base64_decode($registration_create_number_id));
        $data['number_of_run'] = $this->m_dataexport->get_number_of_run(base64_decode($registration_create_number_id));
        $data['attach_file'] = $this->m_dataexport->get_image_update_registration_create(base64_decode($registration_create_number_id));
        
        $this->load->view('dataExport/report_detail_registration_create', $data);
    }
    public function registration_create_upload_file(){
        $registration_create_number_id = $this->input->post('registration_create_number_id');
        if (!empty($_FILES['images1']['name'][0])) {
            $array_file = upload_files($_FILES['images1'], './uploads/registration_create_file');
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
        if (!empty($_FILES['images2']['name'][0])) {
            $array_file = upload_files($_FILES['images2'], './uploads/registration_create_file');
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
        if (!empty($_FILES['images3']['name'][0])) {
            $array_file = upload_files($_FILES['images3'], './uploads/registration_create_file');
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
        if (!empty($_FILES['images4']['name'][0])) {
            $array_file = upload_files($_FILES['images4'], './uploads/registration_create_file');
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
        if (!empty($_FILES['images5']['name'][0])) {
            $array_file = upload_files($_FILES['images5'], './uploads/registration_create_file');
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
        redirect('dataExport/dataExport/report_detail_registration_create/'.base64_encode($registration_create_number_id), 'refresh');
    }
    
    public function delete_file_upload_registration($registration_create_number_file_upload_id, $registration_create_number_id){
        $this->m_dataexport->delete_file_upload_registration($registration_create_number_file_upload_id);
        redirect('dataExport/dataExport/report_detail_registration_create/'.base64_encode($registration_create_number_id), 'refresh');
    }
    
    public function get_department_number(){
        $data_instutition = explode(',', $this->input->post('data_instutition'));
        $instutition_id = $data_instutition[0];
        $instutition_level = $data_instutition[1];
        
        $this->db->select('*');
        $this->db->from('department_of_instutition');
        $this->db->where('instutition_id', $instutition_id);
        $this->db->where('instutition_level', $instutition_level);
        $this->db->where('active', 1);
        $query = $this -> db -> get();
        $result = $query->result_array();
        foreach ($result as $row){
            echo "<option value='".$row['id']."'>".$row['department_id']."</option>";
        }
    }
}

