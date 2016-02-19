
<?php

class m_booksend extends CI_Model {

    function __construct() {
        
    }
    public function get_name_group()
    {
        $id    = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "
            select * from group_send a
            where a.institution_id =  $id
            and   a.institution_level = '$level'
            and a.active = 1
            order by a.id desc
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function getDetail_group()
    {
        $id    = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "
            select * from group_send a
            where a.institution_id =  $id
            and   a.institution_level = '$level'
            and a.child = 1
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function get_content($id = '')
    {
        $sql = "
            select * from registration_create_number_file_upload where registration_create_number_id = $id
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function getContact($id = '')
    {
        $sql = "
            select * from registration_create_number a
            left join registration_send_document_outside b on a.id = b.registration_create_number_id
            where a.id = $id 
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function getContact_return()
    {   
        $id    = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "
            select * ,b.id as out_id , a.registration_type as typing from registration_create_number a
            left join registration_send_document_outside b on a.id = b.registration_create_number_id
            left join registration_create_number_of_run c on a.registration_create_number_of_run_id = c.id
            where a.level_institution_id = $id
            and a.level_institution    = '$level'
            and b.status_return_document = 'yes'
            and b.active = 1
            order by b.udate DESC
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function get_sender($id_create = "")
    {
        $sql = "
            select * from registration_create_number where id = $id_create
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function getDataReceive_accept($limit = 30, $offset = 0)
    {     
        
        $this->db->select('registration_receive_document.*, registration_receive_document_of_run.*');
        $this->db->from('registration_receive_document');
        //$this->db->join('registration_send_document_outside', 'registration_send_document_outside.id = registration_receive_document.registration_document_outside_id');
        $this->db->join('registration_receive_document_of_run', 'registration_receive_document_of_run.id = registration_receive_document.registration_receive_document_of_run_id');
        $this->db->where('registration_receive_document.instutition_receiver_id', $this->level_institution_id);
        $this->db->where('registration_receive_document.instutition_receiver_level', $this->level_institution);
        //$this->db->where('registration_receive_document.receive_type', 'online');
        $this->db->where('registration_receive_document.active', 1);
        $this->db->order_by('registration_receive_document.implementation_date', 'desc');
        $this->db->order_by('registration_receive_document.implementation_time', 'desc');
        $this->db->order_by('registration_receive_document.id', 'desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();

        return $query->result_array();

        // $sql = "
        //     select registration_receive_document.*, registration_receive_document_of_run.*
        //     from registration_receive_document
        //     left join registration_send_document_outside on registration_send_document_outside.id = registration_receive_document.registration_document_outside_id
        //     left join registration_receive_document_of_run on registration_receive_document_of_run.id = registration_receive_document.registration_receive_document_of_run_id
        //     where registration_receive_document.instutition_receiver_id = $this->level_institution_id
        //     and registration_receive_document.instutition_receiver_level = '$this->level_institution'
        //     and registration_receive_document.receive_type = 'online'
        //     and registration_receive_document.active = 1
        //     ORDER BY STR_TO_DATE(concat(registration_receive_document.implementation_date,registration_receive_document.implementation_time) ,'%Y-%m-%d %h:%i' ) DESC
        //     limit $offset,$limit 
        // ";
        //   $result = $this->db->query($sql);
        //   $result = $result->result_array();
        //   return $result;
    }
    
    public function CountDataReceive_accept(){
        $this->db->select('registration_receive_document.*, registration_receive_document_of_run.*');
        $this->db->from('registration_receive_document');
        //$this->db->join('registration_send_document_outside', 'registration_send_document_outside.id = registration_receive_document.registration_document_outside_id');
        $this->db->join('registration_receive_document_of_run', 'registration_receive_document_of_run.id = registration_receive_document.registration_receive_document_of_run_id');
        $this->db->where('registration_receive_document.instutition_receiver_id', $this->level_institution_id);
        $this->db->where('registration_receive_document.instutition_receiver_level', $this->level_institution);
        //$this->db->where('registration_receive_document.receive_type', 'online');
        $this->db->where('registration_receive_document.active', 1);
        $this->db->order_by('registration_receive_document.id', 'desc');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getDataReceive_accept_center($limit = 30, $offset = 0){
        $this->db->select('registration_receive_document.*, registration_receive_document_of_run.*');
        $this->db->from('registration_receive_document');
        //$this->db->join('registration_send_document_outside', 'registration_send_document_outside.id = registration_receive_document.registration_document_outside_id');
        $this->db->join('registration_receive_document_of_run', 'registration_receive_document_of_run.id = registration_receive_document.registration_receive_document_of_run_id');
        $this->db->where('registration_receive_document.instutition_receiver_id', $this->instutition_main_id);
        $this->db->where('registration_receive_document.instutition_receiver_level', $this->instutition_main_level);
        //$this->db->where('registration_receive_document.receive_type', 'online');
        $this->db->where('registration_receive_document.active', 1);
        $this->db->order_by('registration_receive_document.implementation_date', 'desc');
        $this->db->order_by('registration_receive_document.implementation_time', 'desc');
        $this->db->order_by('registration_receive_document.id', 'desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();

        //  $sql = "
        //     select registration_receive_document.*, registration_receive_document_of_run.*
        //     from registration_receive_document
        //     left join registration_send_document_outside on registration_send_document_outside.id = registration_receive_document.registration_document_outside_id
        //     left join registration_receive_document_of_run on registration_receive_document_of_run.id = registration_receive_document.registration_receive_document_of_run_id
        //     where registration_receive_document.instutition_receiver_id = $this->instutition_main_id
        //     and registration_receive_document.instutition_receiver_level = '$this->instutition_main_level'
        //     and registration_receive_document.receive_type = 'online'
        //     and registration_receive_document.active = 1
        //     ORDER BY STR_TO_DATE(concat(registration_receive_document.implementation_date,registration_receive_document.implementation_time) ,'%Y-%m-%d %h:%i' ) DESC
        //     limit $offset,$limit 
        // ";
        //   $result = $this->db->query($sql);
        //   $result = $result->result_array();
        //   return $result;
    }
    
    public function CountDataReceive_accept_center(){
        $this->db->select('registration_receive_document.*, registration_receive_document_of_run.*');
        $this->db->from('registration_receive_document');
        //$this->db->join('registration_send_document_outside', 'registration_send_document_outside.id = registration_receive_document.registration_document_outside_id');
        $this->db->join('registration_receive_document_of_run', 'registration_receive_document_of_run.id = registration_receive_document.registration_receive_document_of_run_id');
        $this->db->where('registration_receive_document.instutition_receiver_id', $this->instutition_main_id);
        $this->db->where('registration_receive_document.instutition_receiver_level', $this->instutition_main_level);
        //$this->db->where('registration_receive_document.receive_type', 'online');
        $this->db->where('registration_receive_document.active', 1);
        $this->db->order_by('registration_receive_document.id', 'desc');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getDataReceive_accept_search_word($search, $limit = 30, $offset = 0){
        $this->db->select('registration_receive_document.*, registration_receive_document_of_run.*');
        $this->db->from('registration_receive_document');
        //$this->db->join('registration_send_document_outside', 'registration_send_document_outside.id = registration_receive_document.registration_document_outside_id');
        $this->db->join('registration_receive_document_of_run', 'registration_receive_document_of_run.id = registration_receive_document.registration_receive_document_of_run_id');
        $this->db->where('registration_receive_document.instutition_receiver_id', $this->level_institution_id);
        $this->db->where('registration_receive_document.instutition_receiver_level', $this->level_institution);
        //$this->db->where('registration_receive_document.receive_type', 'online');
        $this->db->where('registration_receive_document.active', 1);
        
        $this->db->like('registration_receive_document.subject', $search); 
        $this->db->or_like('registration_receive_document.from', $search); 
        $this->db->or_like('registration_receive_document.to_receive', $search); 
        
        $this->db->order_by('registration_receive_document.id', 'desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function CountDataReceive_accept_search_word($search){
        $this->db->select('registration_receive_document.*, registration_receive_document_of_run.*');
        $this->db->from('registration_receive_document');
        //$this->db->join('registration_send_document_outside', 'registration_send_document_outside.id = registration_receive_document.registration_document_outside_id');
        $this->db->join('registration_receive_document_of_run', 'registration_receive_document_of_run.id = registration_receive_document.registration_receive_document_of_run_id');
        $this->db->where('registration_receive_document.instutition_receiver_id', $this->level_institution_id);
        $this->db->where('registration_receive_document.instutition_receiver_level', $this->level_institution);
        //$this->db->where('registration_receive_document.receive_type', 'online');
        $this->db->where('registration_receive_document.active', 1);
        
        $this->db->like('registration_receive_document.subject', $search); 
        $this->db->or_like('registration_receive_document.from', $search); 
        $this->db->or_like('registration_receive_document.to_receive', $search); 
        
        $this->db->order_by('registration_receive_document.id', 'desc');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getDataReceive_accept_search_word_center($search, $limit = 30, $offset = 0){
        $this->db->select('registration_receive_document.*, registration_receive_document_of_run.*');
        $this->db->from('registration_receive_document');
        //$this->db->join('registration_send_document_outside', 'registration_send_document_outside.id = registration_receive_document.registration_document_outside_id');
        $this->db->join('registration_receive_document_of_run', 'registration_receive_document_of_run.id = registration_receive_document.registration_receive_document_of_run_id');
        $this->db->where('registration_receive_document.instutition_receiver_id', $this->instutition_main_id);
        $this->db->where('registration_receive_document.instutition_receiver_level', $this->instutition_main_level);
        //$this->db->where('registration_receive_document.receive_type', 'online');
        $this->db->where('registration_receive_document.active', 1);
        
        $this->db->like('registration_receive_document.subject', $search); 
        $this->db->or_like('registration_receive_document.from', $search); 
        $this->db->or_like('registration_receive_document.to_receive', $search);
        
        $this->db->order_by('registration_receive_document.id', 'desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function CountDataReceive_accept_search_word_center($search){
        $this->db->select('registration_receive_document.*, registration_receive_document_of_run.*');
        $this->db->from('registration_receive_document');
        //$this->db->join('registration_send_document_outside', 'registration_send_document_outside.id = registration_receive_document.registration_document_outside_id');
        $this->db->join('registration_receive_document_of_run', 'registration_receive_document_of_run.id = registration_receive_document.registration_receive_document_of_run_id');
        $this->db->where('registration_receive_document.instutition_receiver_id', $this->instutition_main_id);
        $this->db->where('registration_receive_document.instutition_receiver_level', $this->instutition_main_level);
        //$this->db->where('registration_receive_document.receive_type', 'online');
        $this->db->where('registration_receive_document.active', 1);
        
        $this->db->like('registration_receive_document.subject', $search); 
        $this->db->or_like('registration_receive_document.from', $search); 
        $this->db->or_like('registration_receive_document.to_receive', $search);
        
        $this->db->order_by('registration_receive_document.id', 'desc');
       
        $query = $this->db->get();
        return $query->result_array();
    }


    public function getDataReceive_accept_search_date($start_date , $end_date, $limit = 30, $offset = 0){
        $this->db->select('registration_receive_document.*, registration_receive_document_of_run.*');
        $this->db->from('registration_receive_document');
        //$this->db->join('registration_send_document_outside', 'registration_send_document_outside.id = registration_receive_document.registration_document_outside_id');
        $this->db->join('registration_receive_document_of_run', 'registration_receive_document_of_run.id = registration_receive_document.registration_receive_document_of_run_id');
        $this->db->where('registration_receive_document.instutition_receiver_id', $this->level_institution_id);
        $this->db->where('registration_receive_document.instutition_receiver_level', $this->level_institution);
        //$this->db->where('registration_receive_document.receive_type', 'online');
        $this->db->where('registration_receive_document.active', 1);
        
        $this->db->where('registration_receive_document.implementation_date >=', $start_date); 
        $this->db->where('registration_receive_document.implementation_date <=', $end_date); 
        
        $this->db->order_by('registration_receive_document.id', 'desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function CountDataReceive_accept_search_date($start_date , $end_date){
        $this->db->select('registration_receive_document.*, registration_receive_document_of_run.*');
        $this->db->from('registration_receive_document');
        //$this->db->join('registration_send_document_outside', 'registration_send_document_outside.id = registration_receive_document.registration_document_outside_id');
        $this->db->join('registration_receive_document_of_run', 'registration_receive_document_of_run.id = registration_receive_document.registration_receive_document_of_run_id');
        $this->db->where('registration_receive_document.instutition_receiver_id', $this->level_institution_id);
        $this->db->where('registration_receive_document.instutition_receiver_level', $this->level_institution);
        //$this->db->where('registration_receive_document.receive_type', 'online');
        $this->db->where('registration_receive_document.active', 1);
        
        $this->db->where('registration_receive_document.implementation_date >=', $start_date); 
        $this->db->where('registration_receive_document.implementation_date <=', $end_date); 
        
        $this->db->order_by('registration_receive_document.id', 'desc');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getDataReceive_accept_search_date_center($start_date , $end_date, $limit = 30, $offset = 0){
        $this->db->select('registration_receive_document.*, registration_receive_document_of_run.*');
        $this->db->from('registration_receive_document');
        //$this->db->join('registration_send_document_outside', 'registration_send_document_outside.id = registration_receive_document.registration_document_outside_id');
        $this->db->join('registration_receive_document_of_run', 'registration_receive_document_of_run.id = registration_receive_document.registration_receive_document_of_run_id');
        $this->db->where('registration_receive_document.instutition_receiver_id', $this->instutition_main_id);
        $this->db->where('registration_receive_document.instutition_receiver_level', $this->instutition_main_level);
        //$this->db->where('registration_receive_document.receive_type', 'online');
        $this->db->where('registration_receive_document.active', 1);
        
        $this->db->where('registration_receive_document.implementation_date >=', $start_date); 
        $this->db->where('registration_receive_document.implementation_date <=', $end_date); 
        
        $this->db->order_by('registration_receive_document.id', 'desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function CountDataReceive_accept_search_date_center($start_date , $end_date){
        $this->db->select('registration_receive_document.*, registration_receive_document_of_run.*');
        $this->db->from('registration_receive_document');
        //$this->db->join('registration_send_document_outside', 'registration_send_document_outside.id = registration_receive_document.registration_document_outside_id');
        $this->db->join('registration_receive_document_of_run', 'registration_receive_document_of_run.id = registration_receive_document.registration_receive_document_of_run_id');
        $this->db->where('registration_receive_document.instutition_receiver_id', $this->instutition_main_id);
        $this->db->where('registration_receive_document.instutition_receiver_level', $this->instutition_main_level);
        //$this->db->where('registration_receive_document.receive_type', 'online');
        $this->db->where('registration_receive_document.active', 1);
        
        $this->db->where('registration_receive_document.implementation_date >=', $start_date); 
        $this->db->where('registration_receive_document.implementation_date <=', $end_date); 
        
        $this->db->order_by('registration_receive_document.id', 'desc');
       
        $query = $this->db->get();
        return $query->result_array();
    }


    public function getAll($limit = 30, $offset = 0) {
            $id = $this->level_institution_id;
            $level = $this->level_institution;
            $sql = "select * from registration_create_number 
                where (registration_type = '') and
                (
                 level_institution_id = $id
                 and level_institution = '$level'
                 and central_registration = 'no'
                )
                OR
                (
                 level_institution_central_id = $id
                 and level_institution_central = '$level'
                 and registration_type = ''
                 and central_registration = 'yes'
                ) 
                
                ORDER BY implementation_date DESC, implementation_time DESC , id DESC
                limit $offset,$limit 
            ";

            $result = $this->db->query($sql);
            $result = $result->result_array();
            return $result;
    }
    
    public function getAll_count_normal(){
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where (registration_type = '') and
            (
             level_institution_id = $id
             and level_institution = '$level'
             and central_registration = 'no'
            )
            OR
            (
             level_institution_central_id = $id
             and level_institution_central = '$level'
             and registration_type = ''
             and central_registration = 'yes'
            ) 

            order by implementation_time DESC

           
        ";

        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
     public function getAll_search($txt = '') {
            $id = $this->level_institution_id;
            $level = $this->level_institution;
            $sql = "select * from registration_create_number 
                where registration_type = ''
                and level_institution_id = $id
                and level_institution = '$level'
                and subject  LIKE '%$txt%'
                order by id Desc 
            ";
            $result = $this->db->query($sql);
            $result = $result->result_array();
            return $result;
    }
     
    public function getAll_center_search($txt = '') {
            $id = $this->level_institution_id;
            $level = $this->level_institution;
            $sql = "select * from registration_create_number 
                where registration_type = ''
                and level_institution_central_id = $id
                and level_institution_central = '$level'
                and central_registration = 'yes'
                and subject  LIKE '%$txt%'
                order by id Desc 
            ";
            $result = $this->db->query($sql);
            $result = $result->result_array();
            return $result;
    }
    public function getAll_center($limit = 30, $offset = 0) {
            $id = $this->level_institution_id;
            $level = $this->level_institution;
            $sql = "select * from registration_create_number 
                where registration_type = ''
                and level_institution_id = $id
                and level_institution = '$level'
                and central_registration = 'yes'
                ORDER BY implementation_date DESC, implementation_time DESC,id DESC
                limit $offset,$limit 
            ";
            $result = $this->db->query($sql);
            $result = $result->result_array();
            return $result;
    }
    public function getAll_center_count_normal(){
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where registration_type = ''
            and level_institution_id = $id
            and level_institution = '$level'
            and central_registration = 'yes'
            order by id Desc 
             
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function getAll_radio($limit = 30, $offset = 0)
    {  
        $id = $this->level_institution_id;
        $level = $this->level_institution;
         $sql = "
            select * from registration_create_number 
                where (registration_type = 'วิทยุ') and
                (
                 level_institution_id = $id
                 and level_institution = '$level'
                 and central_registration = 'no'
                )
                OR
                (
                 level_institution_central_id = $id
                 and level_institution_central = '$level'
                 and registration_type = 'วิทยุ'
                 and central_registration = 'yes'
                ) 

                ORDER BY implementation_date DESC, implementation_time DESC ,id DESC
                limit $offset,$limit 
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function CountAll_radio(){
        $id = $this->level_institution_id;
        $level = $this->level_institution;
         $sql = "
            select * from registration_create_number 
                where (registration_type = 'วิทยุ') and
                (
                 level_institution_id = $id
                 and level_institution = '$level'
                 and central_registration = 'no'
                )
                OR
                (
                 level_institution_central_id = $id
                 and level_institution_central = '$level'
                 and registration_type = 'วิทยุ'
                 and central_registration = 'yes'
                ) 

                order by id Desc 
                
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function getAll_radio_search($txt = '', $limit = 30, $offset = 0)
    {
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where (registration_type = 'วิทยุ') and
            (
             level_institution_id = $id
             and level_institution = '$level'
             and central_registration = 'no'
             and ( subject  LIKE '%$txt%' OR registration_create_number.from LIKE '%$txt%' OR to_receive LIKE '%$txt%' ) 
            )
            OR
            (
             level_institution_central_id = $id
             and level_institution_central = '$level'
             and registration_type = 'วิทยุ'
             and central_registration = 'yes'
             and ( subject  LIKE '%$txt%' OR registration_create_number.from LIKE '%$txt%' OR to_receive LIKE '%$txt%' ) 
            ) 

            order by id Desc 
            limit $offset,$limit 
        ";

        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function CountAll_radio_search($txt = ''){
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where (registration_type = 'วิทยุ') and
            (
             level_institution_id = $id
             and level_institution = '$level'
             and central_registration = 'no'
             and ( subject  LIKE '%$txt%' OR registration_create_number.from LIKE '%$txt%' OR to_receive LIKE '%$txt%' ) 
            )
            OR
            (
             level_institution_central_id = $id
             and level_institution_central = '$level'
             and registration_type = 'วิทยุ'
             and central_registration = 'yes'
             and ( subject  LIKE '%$txt%' OR registration_create_number.from LIKE '%$txt%' OR to_receive LIKE '%$txt%' ) 
            ) 

            order by id Desc 
            
        ";

        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function getAll_radio_search_date($startdate , $enddate, $limit = 30, $offset = 0)
    {
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where (registration_type = 'วิทยุ') and
            (
             level_institution_id = $id
             and level_institution = '$level'
             and central_registration = 'no'
             and implementation_date >= '$startdate'
             and implementation_date <= '$enddate'
            )
            OR
            (
             level_institution_central_id = $id
             and level_institution_central = '$level'
             and registration_type = 'วิทยุ'
             and central_registration = 'yes'
             and implementation_date >= '$startdate'
             and implementation_date <= '$enddate'
            ) 

            order by id Desc 
            limit $offset,$limit 
        ";

        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function CountAll_radio_search_date($startdate , $enddate){
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where (registration_type = 'วิทยุ') and
            (
             level_institution_id = $id
             and level_institution = '$level'
             and central_registration = 'no'
             and implementation_date >= '$startdate'
             and implementation_date <= '$enddate'
            )
            OR
            (
             level_institution_central_id = $id
             and level_institution_central = '$level'
             and registration_type = 'วิทยุ'
             and central_registration = 'yes'
             and implementation_date >= '$startdate'
             and implementation_date <= '$enddate'
            ) 

            order by id Desc 
            
        ";

        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function getAll_radio_center_search_date($startdate , $enddate, $limit = 30, $offset = 0)
    {
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where registration_type = 'วิทยุ'
            and level_institution_id = $id
            and level_institution = '$level'
            and central_registration = 'yes'
            and implementation_date >= '$startdate'
            and implementation_date <= '$enddate'
            order by id Desc 
            limit $offset,$limit 
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function CountAll_radio_center_search_date($startdate , $enddate){
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where registration_type = 'วิทยุ'
            and level_institution_id = $id
            and level_institution = '$level'
            and central_registration = 'yes'
            and implementation_date >= '$startdate'
            and implementation_date <= '$enddate'
            order by id Desc 
            
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function getAll_radio_center_search($txt = '', $limit = 30, $offset = 0)
    {
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where registration_type = 'วิทยุ'
            and level_institution_id = $id
            and level_institution = '$level'
            and central_registration = 'yes'
            and ( subject  LIKE '%$txt%' OR registration_create_number.from LIKE '%$txt%' OR to_receive LIKE '%$txt%' ) 
            order by id Desc 
            limit $offset,$limit 
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function CountAll_radio_center_search($txt = ''){
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where registration_type = 'วิทยุ'
            and level_institution_id = $id
            and level_institution = '$level'
            and central_registration = 'yes'
            and ( subject  LIKE '%$txt%' OR registration_create_number.from LIKE '%$txt%' OR to_receive LIKE '%$txt%' ) 
            order by id Desc 
            
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function getAll_radio_center($limit = 30, $offset = 0)
    {
         $id = $this->level_institution_id;
            $level = $this->level_institution;
            $sql = "select * from registration_create_number 
                where registration_type = 'วิทยุ'
                and level_institution_id = $id
                and level_institution = '$level'
                and central_registration = 'yes'
                ORDER BY implementation_date DESC, implementation_time DESC ,id DESC
                limit $offset,$limit 
            ";
            $result = $this->db->query($sql);
            $result = $result->result_array();
            return $result;
    }
    
    public function CountAll_radio_center(){
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where registration_type = 'วิทยุ'
            and level_institution_id = $id
            and level_institution = '$level'
            and central_registration = 'yes'
            order by id Desc 
            
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function getAll_Circular($limit = 30, $offset = 0)
    {    
        $id = $this->level_institution_id;
        $level = $this->level_institution;
           
        $sql = "
            select * from registration_create_number 
                where (registration_type = 'ว') and
                (
                 level_institution_id = $id
                 and level_institution = '$level'
                 and central_registration = 'no'
                )
                OR
                (
                 level_institution_central_id = $id
                 and level_institution_central = '$level'
                 and registration_type = 'ว'
                 and central_registration = 'yes'
                ) 

                ORDER BY implementation_date DESC, implementation_time DESC , id DESC
                limit $offset,$limit 
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function CountAll_Circular(){
        $id = $this->level_institution_id;
        $level = $this->level_institution;
           
        $sql = "
            select * from registration_create_number 
                where (registration_type = 'ว') and
                (
                 level_institution_id = $id
                 and level_institution = '$level'
                 and central_registration = 'no'
                )
                OR
                (
                 level_institution_central_id = $id
                 and level_institution_central = '$level'
                 and registration_type = 'ว'
                 and central_registration = 'yes'
                ) 

                order by id Desc 
                
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function getAll_Circular_search($txt = '', $limit = 30, $offset = 0)
    {    
        $id = $this->level_institution_id;
        $level = $this->level_institution;
           
        $sql = "
            select * from registration_create_number 
                where (registration_type = 'ว') and
                (
                 level_institution_id = $id
                 and level_institution = '$level'
                 and central_registration = 'no' 
                 and ( subject  LIKE '%$txt%' OR registration_create_number.from LIKE '%$txt%' OR to_receive LIKE '%$txt%' ) 
                )
                OR
                (
                 level_institution_central_id = $id
                 and level_institution_central = '$level'
                 and registration_type = 'ว'
                 and central_registration = 'yes' 
                 and ( subject  LIKE '%$txt%' OR registration_create_number.from LIKE '%$txt%' OR to_receive LIKE '%$txt%' ) 
                ) 

                order by id Desc 
                limit $offset,$limit 
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function CountAll_Circular_search($txt = ''){
        $id = $this->level_institution_id;
        $level = $this->level_institution;
           
        $sql = "
            select * from registration_create_number 
                where (registration_type = 'ว') and
                (
                 level_institution_id = $id
                 and level_institution = '$level'
                 and central_registration = 'no' 
                 and ( subject  LIKE '%$txt%' OR registration_create_number.from LIKE '%$txt%' OR to_receive LIKE '%$txt%' ) 
                )
                OR
                (
                 level_institution_central_id = $id
                 and level_institution_central = '$level'
                 and registration_type = 'ว'
                 and central_registration = 'yes' 
                 and ( subject  LIKE '%$txt%' OR registration_create_number.from LIKE '%$txt%' OR to_receive LIKE '%$txt%' ) 
                ) 

                order by id Desc 
                
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
     public function getAll_Circular_search_date($startdate , $enddate, $limit = 30, $offset = 0)
    {    
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where (registration_type = 'ว') and
            (
             level_institution_id = $id
             and level_institution = '$level'
             and central_registration = 'no'
             and implementation_date >= '$startdate'
             and implementation_date <= '$enddate'
            )
            OR
            (
             level_institution_central_id = $id
             and level_institution_central = '$level'
             and registration_type = ''
             and central_registration = 'yes'
             and implementation_date >= '$startdate'
             and implementation_date <= '$enddate'
            ) 

            order by id Desc 
            limit $offset,$limit 
        ";

        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function CountAll_Circular_search_date($startdate , $enddate){
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where (registration_type = 'ว') and
            (
             level_institution_id = $id
             and level_institution = '$level'
             and central_registration = 'no'
             and implementation_date >= '$startdate'
             and implementation_date <= '$enddate'
            )
            OR
            (
             level_institution_central_id = $id
             and level_institution_central = '$level'
             and registration_type = ''
             and central_registration = 'yes'
             and implementation_date >= '$startdate'
             and implementation_date <= '$enddate'
            ) 

            order by id Desc 
            
        ";

        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function getAll_Circular_center_search_date($startdate , $enddate, $limit = 30, $offset = 0)
    {    
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where registration_type = 'ว'
            and level_institution_id = $id
            and level_institution = '$level'
            and central_registration = 'yes'
            and implementation_date >= '$startdate'
            and implementation_date <= '$enddate'
            ORDER BY implementation_date DESC, implementation_time DESC
            limit $offset,$limit 
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function CountAll_Circular_center_search_date($startdate , $enddate){
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where registration_type = 'ว'
            and level_institution_id = $id
            and level_institution = '$level'
            and central_registration = 'yes'
            and implementation_date >= '$startdate'
            and implementation_date <= '$enddate'
            order by id Desc 
            
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function getAll_Circular_search_center($txt = '', $limit = 30, $offset = 0)
    {    
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where registration_type = 'ว'
            and level_institution_id = $id
            and level_institution = '$level'
            and central_registration = 'yes'
            and ( subject  LIKE '%$txt%' OR registration_create_number.from LIKE '%$txt%' OR to_receive LIKE '%$txt%' ) 
            order by id Desc 
            limit $offset,$limit 
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
        
    }
    
    public function CountAll_Circular_search_center($txt = ''){
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where registration_type = 'ว'
            and level_institution_id = $id
            and level_institution = '$level'
            and central_registration = 'yes'
            and ( subject  LIKE '%$txt%' OR registration_create_number.from LIKE '%$txt%' OR to_receive LIKE '%$txt%' ) 
            order by id Desc 
            
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
     
    public function getAll_Circular_center($limit = 30, $offset = 0)
    {    
        $id    = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where registration_type = 'ว'
            and level_institution_id = $id
            and level_institution = '$level'
            and central_registration = 'yes'
            ORDER BY implementation_date DESC, implementation_time DESC ,id DESC
            limit $offset,$limit 
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function CountAll_Circular_center(){
        $id    = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where registration_type = 'ว'
            and level_institution_id = $id
            and level_institution = '$level'
            and central_registration = 'yes'
            order by id Desc 
            
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function getAll_Command($limit = 30, $offset = 0)
    {   
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "
            select * from registration_create_number 
                where (registration_type = 'คำสั่ง') and
                (
                 level_institution_id = $id
                 and level_institution = '$level'
                 and central_registration = 'no'
                )
                OR
                (
                 level_institution_central_id = $id
                 and level_institution_central = '$level'
                 and registration_type = 'คำสั่ง'
                 and central_registration = 'yes'
                ) 
                ORDER BY implementation_date DESC, implementation_time DESC , id DESC
                limit $offset,$limit 
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
        //ORDER BY STR_TO_DATE(concat(implementation_date,implementation_time) ,'%Y-%m-%d %h:%i' ) DESC 
    }
    
    public function CountAll_Command(){
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "
            select * from registration_create_number 
                where (registration_type = 'คำสั่ง') and
                (
                 level_institution_id = $id
                 and level_institution = '$level'
                 and central_registration = 'no'
                )
                OR
                (
                 level_institution_central_id = $id
                 and level_institution_central = '$level'
                 and registration_type = 'คำสั่ง'
                 and central_registration = 'yes'
                ) 

                order by id Desc 
               
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function getAll_Command_search($txt = '', $limit = 30, $offset = 0)
    {   
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where (registration_type = 'คำสั่ง') and
            (
             level_institution_id = $id
             and level_institution = '$level'
             and central_registration = 'no'
             and ( subject  LIKE '%$txt%' OR registration_create_number.from LIKE '%$txt%' OR to_receive LIKE '%$txt%' ) 
            )
            OR
            (
             level_institution_central_id = $id
             and level_institution_central = '$level'
             and registration_type = 'คำสั่ง'
             and central_registration = 'yes'
             and ( subject  LIKE '%$txt%' OR registration_create_number.from LIKE '%$txt%' OR to_receive LIKE '%$txt%' ) 
            ) 

            order by id Desc 
            limit $offset,$limit 
        ";

        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    
//        $id = $this->level_institution_id;
//            $level = $this->level_institution;
//         $sql = "select * from registration_create_number 
//                where registration_type = 'คำสั่ง'
//                and level_institution_id = $id
//                and level_institution = '$level'
//                and subject  LIKE '%$txt%'
//                order by id Desc 
//                ";
//        $result = $this->db->query($sql);
//        $result = $result->result_array();
//        return $result;
    }
    
    public function CountAll_Command_search($txt = ''){
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where (registration_type = 'คำสั่ง') and
            (
             level_institution_id = $id
             and level_institution = '$level'
             and central_registration = 'no'
             and ( subject  LIKE '%$txt%' OR registration_create_number.from LIKE '%$txt%' OR to_receive LIKE '%$txt%' ) 
            )
            OR
            (
             level_institution_central_id = $id
             and level_institution_central = '$level'
             and registration_type = 'คำสั่ง'
             and central_registration = 'yes'
             and ( subject  LIKE '%$txt%' OR registration_create_number.from LIKE '%$txt%' OR to_receive LIKE '%$txt%' ) 
            ) 

            order by id Desc 
            
        ";

        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
     public function getAll_Command_search_date($startdate , $enddate, $limit = 30, $offset = 0)
    {   
         $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where (registration_type = 'คำสั่ง') and
            (
             level_institution_id = $id
             and level_institution = '$level'
             and central_registration = 'no'
             and implementation_date >= '$startdate'
             and implementation_date <= '$enddate'
            )
            OR
            (
             level_institution_central_id = $id
             and level_institution_central = '$level'
             and registration_type = 'คำสั่ง'
             and central_registration = 'yes'
             and implementation_date >= '$startdate'
             and implementation_date <= '$enddate'
            ) 

            order by id Desc 
            limit $offset,$limit 
        ";

        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function CountAll_Command_search_date($startdate , $enddate){
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where (registration_type = 'คำสั่ง') and
            (
             level_institution_id = $id
             and level_institution = '$level'
             and central_registration = 'no'
             and implementation_date >= '$startdate'
             and implementation_date <= '$enddate'
            )
            OR
            (
             level_institution_central_id = $id
             and level_institution_central = '$level'
             and registration_type = 'คำสั่ง'
             and central_registration = 'yes'
             and implementation_date >= '$startdate'
             and implementation_date <= '$enddate'
            ) 

            order by id Desc 
            
        ";

        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function getAll_Command_center_search_date($startdate , $enddate, $limit = 30, $offset = 0)
    {
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where registration_type = 'คำสั่ง'
            and level_institution_id = $id
            and level_institution = '$level'
            and central_registration = 'yes'
            and implementation_date >= '$startdate'
            and implementation_date <= '$enddate'
            order by id Desc 
            limit $offset,$limit 
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function CountAll_Command_center_search_date($startdate , $enddate){
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where registration_type = 'คำสั่ง'
            and level_institution_id = $id
            and level_institution = '$level'
            and central_registration = 'yes'
            and implementation_date >= '$startdate'
            and implementation_date <= '$enddate'
            order by id Desc 
            
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
     public function getAll_Command_center_search($txt = '', $limit = 30, $offset = 0)
    {
         $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where registration_type = 'คำสั่ง'
            and level_institution_id = $id
            and level_institution = '$level'
            and central_registration = 'yes'
            and ( subject  LIKE '%$txt%' OR registration_create_number.from LIKE '%$txt%' OR to_receive LIKE '%$txt%' ) 
            order by id Desc 
            limit $offset,$limit 
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function CountAll_Command_center_search($txt = ''){
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where registration_type = 'คำสั่ง'
            and level_institution_id = $id
            and level_institution = '$level'
            and central_registration = 'yes'
            and ( subject  LIKE '%$txt%' OR registration_create_number.from LIKE '%$txt%' OR to_receive LIKE '%$txt%' ) 
            order by id Desc 
            
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function getAll_Command_center($limit = 30, $offset = 0)
    {
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where registration_type = 'คำสั่ง'
            and level_institution_id = $id
            and level_institution = '$level'
            and central_registration = 'yes'
            ORDER BY implementation_date DESC, implementation_time DESC , id DESC
            limit $offset,$limit 
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function CountAll_Command_center(){
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where registration_type = 'คำสั่ง'
            and level_institution_id = $id
            and level_institution = '$level'
            and central_registration = 'yes'
            order by id Desc 
            
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function getsearch($level_institution_id ="",$level_institution = "",$valueSearch = "") {
        $sql = "select * from registration_create_number  "
                . "where level_institution_id = '$level_institution_id' "
                . "  and level_institution = '$level_institution' and "
                . "("
                . "      subject like '%$valueSearch%'"
                . "or to_receive like '%$valueSearch%'"
                . " "
                . ") order by registration_create_number_of_run_id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function getsearchAll($level_institution_id ="",$level_institution = "") {
        $sql = "select * from registration_create_number  ";
               // . "where level_institution_id = '$level_institution_id' "
                //. "  and level_institution = '$level_institution'  "
               // . "order by registration_create_number_of_run_id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function getDetail($idDetail = "") {
        $sql = "select * from registration_create_number where id = $idDetail";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function GetDataProvince_change_province($id = '')
    {
        
        $sql = "select * from institution_province where province_id = $id order by id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function GetDataProvince_change_amphur($id = '')
    {
        $sql = "select * from institution_amphur where province_id = $id order by id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function GetDataProvince_change_tambol($id = '')
    {
        $sql = "select * from institution_district where province_id = $id order by id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function update_registration_create_number($data, $registration_create_number_id){
        $this->db->where('id', $registration_create_number_id);
        $this->db->update('registration_create_number', $data); 
    }
    public function get_attach_file($registration_create_number_id){
        $sql = "select * from registration_create_number_file_upload where registration_create_number_id = $registration_create_number_id order by created DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function check_number_of_run_for_update($number_of_run_institution_id, $number_of_run_institution_level, $registration_type, $ducument_number_new){
        $this->db->select('*');
        $this->db->from('registration_create_number_of_run');
        $this->db->where('level_institution_id', $number_of_run_institution_id);
        $this->db->where('level_institution', $number_of_run_institution_level);
        $this->db->where('registration_type', $registration_type);
        $this->db->where('number_of_run', $ducument_number_new);
        $query = $this -> db -> get();
        return $query->result_array();
    }
    public function update_number_of_run($number_data, $registration_create_number_id){
        $this->db->where('registration_create_number_id', $registration_create_number_id);
        $this->db->update('registration_create_number_of_run', $number_data);

    }
    public function check_receive_document($registration_create_number_id){
        $this->db->select('*');
        $this->db->from('registration_send_document_outside');
        $this->db->where('registration_create_number_id', $registration_create_number_id);
        $this->db->where('status_receive', 'yes');
        $this->db->where('active', 1);
        $query = $this -> db -> get();
        return $query->result_array();
    }
    public function delete_file_upload_registration($registration_create_number_file_upload_id){
        $this->db->select('*');
        $this->db->from('registration_create_number_file_upload');
        $this->db->where('id', $registration_create_number_file_upload_id);
        
        $query = $this -> db -> get();
        $temp = $query->result_array();
        
        unlink('uploads/registration_create_file/'.$temp[0]['file_upload_name']);
        
        $this->db->where('id', $registration_create_number_file_upload_id);
        $this->db->delete('registration_create_number_file_upload'); 
    }
    
    function check_exist_document_no($document_no, $sender_level_institution_id, $sender_level_institution){
        $this->db->select('*');
        $this->db->from('registration_receive_document');
        $this->db->where('document_no', $document_no);
        $this->db->where('instutition_receiver_id', $this->level_institution_id);
        $this->db->where('instutition_receiver_level', $this->level_institution);
        
        $this->db->where('instutition_sender_id', $sender_level_institution_id);
        $this->db->where('instutition_sender_level', $sender_level_institution);
        
        $query = $this -> db -> get();
        return $query->result_array();
    }
    public function check_exist_document_no_for_main($document_no, $sender_level_institution_id, $sender_level_institution)
    {
        $this->db->select('*');
        $this->db->from('registration_receive_document');
        $this->db->where('document_no', $document_no);
        $this->db->where('instutition_receiver_id', $this->instutition_main_id);
        $this->db->where('instutition_receiver_level', $this->instutition_main_level);
        
        $this->db->where('instutition_sender_id', $sender_level_institution_id);
        $this->db->where('instutition_sender_level', $sender_level_institution);
        
        $query = $this -> db -> get();
        return $query->result_array();   
    }
    
    function save_data_accepted($data){
        $this->db->trans_start();
        $this->db->insert('registration_receive_document',$data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();

        //update udate from receive
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->update('registration_send_document_outside');

        return  $insert_id;
    }
}

?>