<?php
   /**
   * 
   */
   class m_institution_create_number extends CI_Model
   {
     function __construct()
     {
       parent::__construct();
     }
     public function getmax_normal_id($instutition_id = '', $instutition_level = '' )
     {
        $this->db->select_max('number_of_run');
        $this -> db -> where('level_institution_id', $instutition_id);
        $this -> db -> where('level_institution', $instutition_level);
        $this -> db -> where('registration_type', 'normal');
        $query = $this->db->get('registration_create_number_of_run');
        return $query->result_array();
     }
     public function getmax_vian_id($instutition_id = '', $instutition_level = '' )
     {
        $this->db->select_max('number_of_run');
        $this -> db -> where('level_institution_id', $instutition_id);
        $this -> db -> where('level_institution', $instutition_level);
        $this -> db -> where('registration_type', 'vian');
        $query = $this->db->get('registration_create_number_of_run');
        return $query->result_array();
     }
     public function getmax_command_id($instutition_id = '', $instutition_level = '' )
     {
        $this->db->select_max('number_of_run');
        $this -> db -> where('level_institution_id', $instutition_id);
        $this -> db -> where('level_institution', $instutition_level);
        $this -> db -> where('registration_type', 'command');
        $query = $this->db->get('registration_create_number_of_run');
        return $query->result_array();
     }
     public function getmax_radio_id($instutition_id = '', $instutition_level = '' )
     {
        $this->db->select_max('number_of_run');
        $this -> db -> where('level_institution_id', $instutition_id);
        $this -> db -> where('level_institution', $instutition_level);
        $this -> db -> where('registration_type', 'radio');
        $query = $this->db->get('registration_create_number_of_run');
        return $query->result_array();
     }
     public function getmax($id = '')
     {
         $sql = "
                 select * from number_of_institution where id = $id
            ";
            $result = $this->db->query($sql);
            $result = $result->result_array();
            return $result;
     }
     public function get_data_to_update($id = "")
     {
            $sql = "
                 select * from number_of_institution where id = $id
            ";
            $result = $this->db->query($sql);
            $result = $result->result_array();
            return $result;
     }
     public function show_form_update($id = "")
     {      

            $sql = "
                 select * from number_of_institution where id = $id
            ";
            $result = $this->db->query($sql);
            $result = $result->result_array();
            return $result;
     }
     public function getdata_from_province_institution($province_id = "")
     {
        // $sql = "
        // select * from institution_province a
        // left join institution_create_numbers b on a.id = b.institution_id
        // where a.province_id =  $province_id
        // ";
        $sql = "
             select * from institution_province a
            left join number_of_institution b on a.id = b.instutition_id
            where a.province_id =  $province_id and instutition_level = 'institution_province'
            group by a.id
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
     }
     public function getdata_from_amphur_institution($amphur_id = "")
     {
        $sql = "
        select * from institution_amphur a
        left join number_of_institution b on a.id = b.instutition_id
        where a.institution_province_id =  $amphur_id and instutition_level = 'institution_amphur'
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
     }
     public function getdata_from_tambol_institution($tambol_id = "")
     {
        $sql = "
            select * from institution_district a
            left join number_of_institution b on a.id = b.instutition_id
            where a.institution_amphur_id =   $tambol_id  and instutition_level = 'institution_district'
        ";    
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
     }
   }
   
  
?>