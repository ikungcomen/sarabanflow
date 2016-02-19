<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_helper
 *
 * @author chaowalit
 */
class m_helper extends CI_Model{
    //put your code here
    function get_name_instutition($instutition_id, $instutition_level){
        $sql = "select * from $instutition_level where id = $instutition_id order by id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    function get_number_of_instutition($instutition_id, $instutition_level){
        $this -> db -> select('*');
        $this -> db -> from('number_of_institution');
        $this -> db -> where('instutition_id', $instutition_id);
        $this -> db -> where('instutition_level', $instutition_level);
        $query = $this -> db -> get();
        return $query->result_array();
    }
}
