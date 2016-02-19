<?php

class m_institution extends CI_Model {

    public function get_province()
    {
        $sql    = "select * from province";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function get_institution_province($id = "")
    {
    	$sql    = "select * from institution_province where province_id = $id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function get_institution_province2($id = "")
    {
        $sql    = "select * from institution_amphur where institution_province_id = $id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function get_institution_province4($id = "")
    {
        $sql    = "select * from institution_district where institution_amphur_id = $id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function get_institution_list($id = "")
    {
    	$sql    = "select * from institution_province where id = $id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;	
    }
    public function get_institution_list2($id = "")
    {
        $sql    = "select * from institution_amphur where id = $id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result; 
    }
    public function get_institution_list3($id = "")
    {
        $sql    = "select * from institution_district where id = $id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result; 
    }
    public function get_institution_amphur($id = "")
    {
        $sql    = "select * from institution_amphur where institution_province_id = $id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function get_institution_tambol($id = "")
    {
         $sql    = "select * from institution_district where institution_amphur_id = $id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }

}

?>