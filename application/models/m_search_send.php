<?php

class m_search_send extends CI_Model{
    //put your code here
    public function getDataSearchNormalSend($txt = '', $limit = 30, $offset = 0) {
    $id = $this->level_institution_id;
    $level = $this->level_institution;
    $sql = "select * from registration_create_number 
        where (registration_type = '') and
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
         and registration_type = ''
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
    public function getDataSearchNormalSend_center($txt = '', $limit = 30, $offset = 0) {
            $id = $this->level_institution_id;
            $level = $this->level_institution;
            $sql = "select * from registration_create_number 
                where registration_type = ''
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
    
    public function CountDataSearchNormalSend($txt = ''){
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where (registration_type = '') and
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
             and registration_type = ''
             and central_registration = 'yes'
             and ( subject  LIKE '%$txt%' OR registration_create_number.from LIKE '%$txt%' OR to_receive LIKE '%$txt%' ) 
            ) 

            order by id Desc 
            
        ";

        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function CountDataSearchNormalSend_center($txt = ''){
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where registration_type = ''
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
    
    public function getAll_search_date($startdate , $enddate, $limit = 30, $offset = 0) {
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where (registration_type = '') and
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
    
    public function getAll_center_search_date($startdate , $enddate, $limit = 30, $offset = 0){
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where registration_type = ''
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
    
    public function CountAll_search_date($startdate , $enddate){
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where (registration_type = '') and
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
    
    public function CountAll_center_search_date($startdate , $enddate){
        $id = $this->level_institution_id;
        $level = $this->level_institution;
        $sql = "select * from registration_create_number 
            where registration_type = ''
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
}
