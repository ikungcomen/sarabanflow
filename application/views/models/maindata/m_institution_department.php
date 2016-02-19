<?php
   /**
   * 
   */
   class m_institution_department extends CI_Model
   {
     function __construct()
     {
       parent::__construct();
     }
     public function get_province_dep($id = '')
     {
           $sql = "
                 select * from department_of_instutition where instutition_id = $id and instutition_level = 'institution_province'
            ";
            $result = $this->db->query($sql);
            $result = $result->result_array();
            return $result;
     }
     public function get_amphur_dep($id = '')
     {
       $sql = "
                 select * from department_of_instutition where instutition_id = $id and instutition_level = 'institution_amphur'
            ";
            $result = $this->db->query($sql);
            $result = $result->result_array();
            return $result;
     }
     public function get_tambol_dep($id = '')
     {
       $sql = "
                 select * from department_of_instutition where instutition_id = $id and instutition_level = 'institution_district'
            ";
            $result = $this->db->query($sql);
            $result = $result->result_array();
            return $result;
     }
     public function edit_dep1($id = '')
     { 
           $sql = "
                 select * from department_of_instutition where id = $id
            ";
            $result = $this->db->query($sql);
            $result = $result->result_array();
            return $result;
     }

   }
   
  
?>