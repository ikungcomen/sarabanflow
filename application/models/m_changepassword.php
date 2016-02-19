<?php

class m_changepassword extends CI_Model {
    
    public function getDefaultPassword($level_institution_id = "",$level_institution = "",$username = "",$password = "",$normal_account_id = ""){
        $sql = " select * from normal_account "
             . " where id = '".$normal_account_id."'"
             . " and level_institution_id = '".$level_institution_id."'"
             . " and level_institution = '".$level_institution."'";
             //. " and username = '".$username."'"
             ///. " and password = '".$password."'";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
}

?>