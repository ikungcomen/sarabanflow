

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once APPPATH . 'libraries/nm_saraban_lib.php';

class bookSend extends nm_saraban_lib {

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_booksend');
        $this->load->model('m_dataexport');
        $this->load->model('m_search_send');
         $this->load->model('m_sending');
        $this->load->library('pagination');
        
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
        $config['base_url'] = base_url().'index.php/bookSend/bookSend/search_word';
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        
        //---------------------------------------------------------
        
        $check_data_instutition_main = $this->session->userdata('data_instutition_main');
        
        if($check_data_instutition_main)
        {
            $config['total_rows'] = count($this->m_search_send->CountDataSearchNormalSend_center($search));
        
            $this->pagination->initialize($config);
            $data['result'] = $this->m_search_send->getDataSearchNormalSend_center($search, $config['per_page'], $offset);
        }
        else
        {
            $config['total_rows'] = count($this->m_search_send->CountDataSearchNormalSend($search));
            
            $this->pagination->initialize($config);
            $data['result'] = $this->m_search_send->getDataSearchNormalSend($search, $config['per_page'], $offset);
        }
        
        $data['search_word'] = $search;
        $data['type_data'] = "ปกติ";
        $this->load->view('include/header');
        $this->load->view('bookSend/bookSend', $data);
        $this->load->view('include/footer');
    }
    
    public function get_content($id_create ='' , $id = '')
    {
       $data['result'] = $this->m_booksend->getDetail($id);
       $data['id_accept'] = $id;
       $data['id_create'] = $id_create;
       $data['result'] = $this->m_booksend->get_content($id);
       $this->load->view('acceptBook/sup/content_doc',$data);
    }
    public function get_content2($id_create ='' , $id = '')
    {
       $data['result'] = $this->m_booksend->getDetail($id);
       $data['id_accept'] = $id;
       $data['id_create'] = $id_create;
       $data['result'] = $this->m_booksend->get_content($id);
       $this->load->view('acceptBook/sup/content_doc2',$data);
    }
    public function set_all_data()
    {
        $id =  $this->input->post('pro_id');
        $result_province = $this->m_booksend->GetDataProvince_change_province($id);
        $result_amphur = $this->m_booksend->GetDataProvince_change_amphur($id);
        $result_tambol = $this->m_booksend->GetDataProvince_change_tambol($id);

        $set_ins_send = array();

        // echo "<pre>";
        // print_r($result_province);
        // echo "</pre>";

        foreach ($result_province as $key => $value) {
           //echo $value['id'].","."institution_province"."<br/>";
           array_push($set_ins_send,$value['id'].","."institution_province");
        }
        foreach ($result_amphur as $key => $value) {
           //echo $value['id'].","."institution_amphur"."<br/>";
            array_push($set_ins_send,$value['id'].","."institution_amphur");
        }
        foreach ($result_tambol as $key => $value) {
           //echo $value['id'].","."institution_district"."<br/>";
            array_push($set_ins_send,$value['id'].","."institution_district");
        }
         $this->session->set_userdata('list_send',$set_ins_send);


    }
    public function unset_all_data()
    {
        //$pro_id =  $this->input->post('pro_id');   
         $this->session->set_userdata('list_send','');

    }
    public function save_group()
    {  
       $data    = $this->input->post('group_name');
       $hide_re = $this->input->post('hide_re');

       $this->db->set('group_name', $data);
       $this->db->set('institution_id', $this->level_institution_id);
       $this->db->set('institution_level', $this->level_institution);
       $this->db->set('cdate', 'NOW()', FALSE);
       $this->db->set('udate', 'NOW()', FALSE);
       $this->db->insert('group_send');
       $id =  $this->db->insert_id();
       
       $this->session->set_flashdata('add_group_name_com', 'value');
       redirect('bookSend/bookSend/add_group/'.$hide_re,'refresh');

    }
    public function add_group()
    {   
        $id = $this->uri->segment(4);
        $data['name_group'] = $this->m_booksend->get_name_group();
        $data['id_send'] = $id;
        $this->session->set_userdata('list_send','');
        $this->load->view('include/header');
        $this->load->view('bookSend/add_group2',$data);
        $this->load->view('include/footer');
    }
    public function del_group($id = '' , $redi = '')
    {
        $this->db->where('id', $id);
        $this->db->delete('group_send');

        $this->db->where('group_send_id', $id);
        $this->db->delete('group_send_detail');

        $this->session->set_flashdata('insert_dep_send_success', 'Value');

        redirect('bookSend/bookSend/Send_To/'.$redi,'refresh');
    }
    public function show_group($id = '')
    {
        echo $id;
    }
    public function grouping()
    {   
        $id_re = $this->input->post('id_re');
        $data['id_re'] = $id_re;
        $data['result'] = $this->m_booksend->getDetail_group();
        $this->load->view('bookSend/sub/ShowGroup',$data);
    }
    public function set_session()
    {    
         if($this->session->userdata('list_send'))
         {
            $list_send = $this->session->userdata('list_send');
            $id  = $this->input->post('id');
            array_push($list_send,$id);
            $this->session->set_userdata('list_send',$list_send);
         }
         else
         { 
             $list_send = array();
             $id  = $this->input->post('id');
             array_push($list_send,$id);
             $this->session->set_userdata('list_send',$list_send);
         }
         
    }
    public function send_types()
    {
        echo $this->input->post('id');
    }
    public function unset_session()
    {
         $id  = $this->input->post('id');
        // echo $id ;

         $institution_id_send = $this->session->userdata('list_send');
         foreach ($institution_id_send as $key => $value) {
             if($value ==  $id )
             {
                unset($institution_id_send[$key]);
             }
         }
         $this->session->set_userdata('list_send',$institution_id_send);
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
        $config['base_url'] = base_url().'index.php/bookSend/bookSend/search_date';
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        
        //---------------------------------------------------------
        $check_data_instutition_main = $this->session->userdata('data_instutition_main');

        if($check_data_instutition_main){
            $config['total_rows'] = count($this->m_search_send->CountAll_center_search_date($start_date , $end_date));
        
            $this->pagination->initialize($config);
            $data['result'] = $this->m_search_send->getAll_center_search_date($start_date , $end_date, $config['per_page'], $offset);
        }else{
            $config['total_rows'] = count($this->m_search_send->CountAll_search_date($start_date , $end_date));
        
            $this->pagination->initialize($config);
            $data['result'] = $this->m_search_send->getAll_search_date($start_date , $end_date, $config['per_page'], $offset);
        }
        
        
        //$data['result'] = $this->m_booksend->getAll_center_search_date($startdate , $enddate);
        $data['type_data'] = "ปกติ";
        $data['start_date'] = date("d-m-Y", strtotime($start_date));
        $data['end_date'] = date("d-m-Y", strtotime($end_date));
        
        $this->load->view('include/header');
        $this->load->view('bookSend/bookSend', $data);
        $this->load->view('include/footer');
    }
    public function index($offset = 0) {
        
        //------ Pagination Config------//
        /* This Application Must Be Used With BootStrap 3 *  */
        $config['base_url'] = base_url().'index.php/bookSend/bookSend/index';
        
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        
        //---------------------------------------------------------
        
        $check_data_instutition_main = $this->session->userdata('data_instutition_main');
        if($check_data_instutition_main)
        {
            $config['total_rows'] = count($this->m_booksend->getAll_center_count_normal());
            $this->pagination->initialize($config);
            
            $data['result'] = $this->m_booksend->getAll_center($config['per_page'], $offset);
        }
        else
        {
            $config['total_rows'] = count($this->m_booksend->getAll_count_normal());
            $this->pagination->initialize($config);
            
            $data['result'] = $this->m_booksend->getAll($config['per_page'], $offset);
        }
        // echo "<pre>";
        // print_r($data['result']);
        // echo "</pre>";
        // exit;
        $data['type_data'] = "ปกติ";
        $this->session->set_userdata('re_page','bookSend/bookSend');
        $this->load->view('include/header');
        $this->load->view('bookSend/bookSend', $data);
        $this->load->view('include/footer');
    }

    public function save_group_data($id_back = ''){

        $institution_id_send = $this->session->userdata('list_send');
        if(isset($institution_id_send[0]))
        {
                foreach ($institution_id_send as $row) {
                $data_id = explode(',', $row);
                $this->db->set('group_send_id',$this->session->userdata('group_id'));
                $this->db->set('institution_id', $data_id[0]);
                $this->db->set('institution_level', $data_id[1]);
                $this->db->set('cdate', 'NOW()', FALSE);
                $this->db->set('udate', 'NOW()', FALSE);
                $this->db->set('active', 1);
                $this->db->insert('group_send_detail');
                }

                $this->db->set('child', 1);
                $this->db->where('id', $this->session->userdata('group_id'));
                $this->db->update('group_send');

                $this->session->set_userdata('list_send','');
                $this->session->set_userdata('group_id','');

                $this->session->set_flashdata('insert_dep1', 'Value');
                redirect('bookSend/bookSend/Send_To/'.$id_back, 'refresh');
        }
        else
        {
            $this->session->set_userdata('list_send','');
            $this->session->set_userdata('group_id','');
            $this->session->set_flashdata('not_found_data', 'Value');
            redirect('bookSend/bookSend/add_group/'.$id_back, 'refresh');
        }

    }
    public function send_by_group()
    {
        $group_id =  $this->input->post('group_name');
        $result = $this->m_sending->get_list_send_by_group($group_id);
        //echo "<pre>";print_r($result );die;
        $data_send = array();
        foreach ($result as $key => $row) {
            $str = $row['institution_id'].','.$row['institution_level'];
            array_push( $data_send ,  $str ) ;      
        }    
    }
    public function Send_To_instutition() {

        $send_create = $this->input->post('send_create');
        $send_type = $this->input->post('send_type');
        $province = $this->input->post('province');
        $message = $this->input->post('message');
        $institution_id_send_group = $this->input->post('group_name');

        if($institution_id_send_group)
        {   
            $institution_id_send = array();
            $result = $this->m_sending->get_list_send_by_group($institution_id_send_group);
            //echo "<pre>";print_r($result );die;
            $data_send = array();
            foreach ($result as $key => $row) {
                $str = $row['institution_id'].','.$row['institution_level'];
                array_push( $institution_id_send ,  $str ) ;      
            } 
        }
        else
        {
            $institution_id_send = $this->session->userdata('item_select');
        }
        //echo "<pre>";print_r( $institution_id_send );die;
        if(isset($institution_id_send[0]))
        {
            foreach ($institution_id_send as $row) {
                $data_id = explode(',', $row);
                $this->db->set('registration_create_number_id', $send_create);
                $this->db->set('institution_id_for_send', $data_id[0]);
                $this->db->set('institution_level_for_send', $data_id[1]);
                $this->db->set('status_reading', 'no');
                $this->db->set('status_return_document', 'no');
                $this->db->set('reason_return_document', "");
                $this->db->set('detail', '');
                $this->db->set('type_send', '');
                $this->db->set('cdate', 'NOW()', FALSE);
                $this->db->set('udate', 'NOW()', FALSE);
                $this->db->set('active', 1);
                $this->db->insert('registration_send_document_outside');
            }

                $this->db->set('status_sending', 1);
                $this->db->where('id', $send_create);
                $this->db->update('registration_create_number');

                $this->session->set_userdata('item_select','');
                $redirect_page = $this->session->userdata('re_page');
                $this->session->set_userdata('re_page','');
                $this->session->set_flashdata('insert_dep_send_success', 'Value');
                redirect($redirect_page , 'refresh');
        }
        else
        {
                $this->session->set_flashdata('not_found_data', 'Value');
                redirect('bookSend/bookSend/Send_To/'.$send_create , 'refresh');
        }


    }

    public function Send_To($id = '') {
        $this->session->set_userdata('list_send','');
        $data['id_data'] = $id;
        $this->session->set_userdata('item_select2','');
        $this->load->view('include/header');
        //$this->load->view('bookSend/Send_To', $data);
        //$this->load->view('bookSend/new_Send_To', $data);
        $this->load->view('bookSend/Send_To3', $data);
        $this->load->view('include/footer');
    }

    public function GetDataProvince() {
        $this->load->view('bookSend/sub/ShowList');
    }

    public function GetDataProvince_change() {
        $id = $this->input->post('id');
        $data['province_id'] = $id;
        $data['result_province'] = $this->m_booksend->GetDataProvince_change_province($id);
        $data['result_amphur'] = $this->m_booksend->GetDataProvince_change_amphur($id);
        $data['result_tambol'] = $this->m_booksend->GetDataProvince_change_tambol($id);
        $this->load->view('bookSend/sub/ShowList', $data);
    }

    public function showDetail($id = '') {
        $data['result'] = $this->m_booksend->getDetail($id);
        $data['id_accept'] = $id ;

        $sql = "select id as tran_id from registration_send_document_outside where registration_create_number_id =  $id  limit 1";
        $result = $this->db->query($sql);
        $result = $result->result_array();

        if(count($result) == 0)
        {
            $data['id_create'] = $id;
        }
        else
        {
            $data['id_create'] = $result[0]['tran_id'];
        }
        $this->session->set_userdata('item_select','');
        $this->load->view('include/header');
        $this->load->view('bookSend/show_detail_bookSend', $data);
        $this->load->view('include/footer');
    }

    public function edit($id = '') {
        $data['result'] = $this->m_booksend->getDetail($id);
         $data['attach_file'] = $this->m_booksend->get_attach_file($id);
        //$data['id_send'] = $id;
        $this->load->view('include/header');
        $this->load->view('bookSend/show_edit_detail_bookSend', $data);
        $this->load->view('include/footer');
    }

    public function update_registration_create_number(){
        if($this->input->post('registration_create_number_id')){
            $data = array(
                "dated_send" => $this->input->post('dated_send'),
                "subject" => $this->input->post('subject'),
                "to_receive" => $this->input->post('to_receive'),
                "attach_detail" => $this->input->post('attach_detail'),
                "reference_to" => $this->input->post('reference_to'),
                "detail" => $this->input->post('detail'),
                "objective_id" => $this->input->post('objective_id'),
                "layer_priority_id" => $this->input->post('layer_priority_id'),
                "layer_secret_id" => $this->input->post('layer_secret_id'),
                "implementation_date" => date("Y-m-d", strtotime($this->input->post('implementation_date'))),
                "implementation_time" => $this->input->post('implementation_time')
            );
            
            $ducument_number_new = $this->input->post('ducument_number_new');
            $ducument_number_old = $this->input->post('ducument_number_old');
            $number_of_run_institution_id = $this->input->post('number_of_run_institution_id');
            $number_of_run_institution_level = $this->input->post('number_of_run_institution_level');
            
            $check_receive_document = $this->m_booksend->check_receive_document($this->input->post('registration_create_number_id'));
            if(count($check_receive_document) == 0){
                if(trim($ducument_number_new) != $ducument_number_old){
                    if($this->input->post('registration_type') == ""){
                        $check_number_of_run = $this->m_booksend->check_number_of_run_for_update($number_of_run_institution_id, $number_of_run_institution_level, 'normal', $ducument_number_new);
                    }else if($this->input->post('registration_type') == "ว"){
                        $check_number_of_run = $this->m_booksend->check_number_of_run_for_update($number_of_run_institution_id, $number_of_run_institution_level, 'vian', $ducument_number_new);
                    }else if($this->input->post('registration_type') == "คำสั่ง"){
                        $check_number_of_run = $this->m_booksend->check_number_of_run_for_update($number_of_run_institution_id, $number_of_run_institution_level, 'command', $ducument_number_new);
                    }else if($this->input->post('registration_type') == "วิทยุ"){
                        $check_number_of_run = $this->m_booksend->check_number_of_run_for_update($number_of_run_institution_id, $number_of_run_institution_level, 'radio', $ducument_number_new);
                    }
                    
                    if(count($check_number_of_run) > 0){
                        $this->session->set_flashdata('update_registration_create_number', 'error');
                    }else{
                        $number_data = array(
                            "number_of_run" => $ducument_number_new
                        );
                        $this->m_booksend->update_number_of_run($number_data, $this->input->post('registration_create_number_id'));

                        $this->m_booksend->update_registration_create_number($data, $this->input->post('registration_create_number_id'));
                        $this->session->set_flashdata('update_registration_create_number', '1');
                    }
                }else{
                    $this->m_booksend->update_registration_create_number($data, $this->input->post('registration_create_number_id'));
                    $this->session->set_flashdata('update_registration_create_number', '1');
                }
            }else{
                $this->session->set_flashdata('update_registration_create_number', 'error-edit');
            }
            redirect('bookSend/bookSend/edit/'.$this->input->post('registration_create_number_id'), 'refresh');
        }
    }
    public function delete($id = '') {
        $this->db->where('id', $id);
        $this->db->delete('registration_create_number');
        redirect('welcome', 'refresh');
    }

    public function getContact($id = '')
    {   
        $data['result'] = $this->m_booksend->getContact($id);
        $data['re_id'] = $id ;
        $data['out_id'] = $id ;
        $this->load->view('bookSend/sub/list_contact',$data);   
    }
    public function followUp($id = "") {
        $data['result'] = $this->m_booksend->getDetail($id);
        $data['id_send'] = $id;
        $this->load->view('include/header');
        $this->load->view('bookSend/followup', $data);
        $this->load->view('include/footer');
    }
    
    public function upload_document_attach_file($registration_create_number_id = ""){
        $data['result'] = $this->m_booksend->getDetail($registration_create_number_id);
        $data['attach_file'] = $this->m_booksend->get_attach_file($registration_create_number_id);
        
        $this->load->view('include/header');
        $this->load->view('bookSend/document_attach_file', $data);
        $this->load->view('include/footer');
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
        redirect('bookSend/bookSend/upload_document_attach_file/'.$registration_create_number_id, 'refresh');
    }
    public function delete_file_upload_registration($registration_create_number_file_upload_id, $registration_create_number_id){
        $this->m_booksend->delete_file_upload_registration($registration_create_number_file_upload_id);
        redirect('bookSend/bookSend/upload_document_attach_file/'.$registration_create_number_id, 'refresh');
    }
}
