<?php

class m_sending_dep extends CI_Model{
	
	public function getContact($registration_receive_document_id = '')
	{
		$sql = "
          select * from receive_document_department where registration_receive_document_id = $registration_receive_document_id
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
	}
}
