<?php
class m_sending extends CI_Model{
    //put your code here
    public function clear_data2()
    {
         $sql = 'DELETE FROM institution_amphur';
        $this->db->query($sql);

        $sql = 'DELETE FROM institution_district';
        $this->db->query($sql);

        $sql = 'DELETE FROM institution_province';
        $this->db->query($sql);

        $sql = 'DELETE FROM number_of_institution';
        $this->db->query($sql);

        return true; 
    }
    public function clear_data()
    {
        $sql = 'DELETE FROM receive_document_department';
        $this->db->query($sql);

        $sql = 'DELETE FROM receive_document_department_of_run';
        $this->db->query($sql);

        $sql = 'DELETE FROM registration_create_number';
        $this->db->query($sql);

        $sql = 'DELETE FROM registration_create_number_file_upload';
        $this->db->query($sql);

        $sql = 'DELETE FROM registration_create_number_of_run';
        $this->db->query($sql);

        $sql = 'DELETE FROM registration_receive_document';
        $this->db->query($sql);

        $sql = 'DELETE FROM registration_receive_document_file_upload';
        $this->db->query($sql);

        $sql = 'DELETE FROM registration_receive_document_of_run';
        $this->db->query($sql);

        $sql = 'DELETE FROM registration_send_document_outside';
        $this->db->query($sql);

        return true; 
    }
    public function get_list_send_by_group($group_id = '')
    {
        $sql = "select * from group_send_detail where group_send_id = $group_id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function show_group_data($id_group = '')
    {
        $sql = "select * from group_send_detail where group_send_id = $id_group";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function send_by_group()
    {   
        $id = $this->level_institution_id;
        $level = $this->level_institution;

        $sql = "select * from group_send where institution_id = $id  and institution_level = '$level'";

        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function get_list_am($id = '')
    {   
        
        $sql = "select * from institution_amphur  where institution_province_id = $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function get_list_pro($id = '')
    {
        $sql = "select * from institution_province  where province_id = $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function getdata_pro($id_redirect = '' , $select_ins = '')
    {  
        $check_data_instutition_main = $this->session->userdata('data_instutition_main');
        if($check_data_instutition_main)
        {
            $id        = $this->instutition_main_id;
            $level_ses = $this->instutition_main_level;
        }
        else
        {
            $id        = $this->level_institution_id;
            $level_ses = $this->level_institution;
        }
            if($select_ins == 1)
            {
                $level = 'institution_province';
                if($level_ses == 'institution_province')
                {
                    $sql = "select * from $level  where province_id = $id_redirect and id <> $id";
                }
                else
                {
                    $sql = "select * from $level  where province_id = $id_redirect";
                }
            }
             if($select_ins == 2)
            {
                $level = 'institution_amphur';
                if($level_ses == 'institution_amphur')
                {
                    $sql = "select * from $level  where institution_province_id = $id_redirect and id <> $id";
                }
                else
                {
                    $sql = "select * from $level  where institution_province_id = $id_redirect";
                }
            }
             if($select_ins == 3)
            {
                $level = 'institution_district';
                if($level_ses == 'institution_district')
                {
                    $sql = "select * from $level  where institution_amphur_id = $id_redirect and id <> $id";
                }
                else
                {
                    $sql = "select * from $level  where institution_amphur_id = $id_redirect";
                }
            }

        
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function getdata($id_redirect = '', $select_ins = '')
    {   
        $check_data_instutition_main = $this->session->userdata('data_instutition_main');
        if($check_data_instutition_main)
        {
            $id        = $this->instutition_main_id;
            $level_ses = $this->instutition_main_level;
        }
        else
        {
            $id        = $this->level_institution_id;
            $level_ses = $this->level_institution;
        }
            if($select_ins == 1)
            {
                $level = 'institution_province';
                if($level_ses == 'institution_province')
                {
                    $sql = "select * from $level  where province_id = $id_redirect and id <> $id";
                }
                else
                {
                    $sql = "select * from $level  where province_id = $id_redirect";
                }
            }
             if($select_ins == 2)
            {
                $level = 'institution_amphur';
                if($level_ses == 'institution_amphur')
                {
                    $sql = "select * from $level  where province_id = $id_redirect and id <> $id";
                }
                else
                {
                    $sql = "select * from $level  where province_id = $id_redirect";
                }
            }
             if($select_ins == 3)
            {
                $level = 'institution_district';
                if($level_ses == 'institution_district')
                {
                    $sql = "select * from $level  where province_id = $id_redirect and id <> $id";
                }
                else
                {
                    $sql = "select * from $level  where province_id = $id_redirect";
                }
            }

        
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
}

// class m_sending extends CI_Model{
//     //put your code here
//     public function getdata($id_redirect = '', $select_ins = '')
//     {   
//         if($select_ins == 1)
//         {
//             $level = 'institution_province';
//         }
//          if($select_ins == 2)
//         {
//             $level = 'institution_amphur';
//         }
//          if($select_ins == 3)
//         {
//             $level = 'institution_district';
//         }
//         $sql = "select * from $level  where province_id = $id_redirect";
//         $result = $this->db->query($sql);
//         $result = $result->result_array();
//         return $result;
//     }
// }
