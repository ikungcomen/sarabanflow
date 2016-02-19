<?php
  class m_usermanagement extends CI_Model
  {		
  	  public function showedit($id = "")
  	  {
  	  	 $sql     = "select * from admin_account where id = $id ";
  	  	 $result  = $this->db->query($sql);
  	  	 $result  = $result->result_array();
  	  	 return $result;
  	  }
  	  public function getall()
  	  {
  	  	 $sql     = "select * from admin_account order by id desc ";
  	  	 $result  = $this->db->query($sql);
  	  	 $result  = $result->result_array();
  	  	 return $result;
  	  }
  	  public function insert_data($data = '')
  	  {
  	  	$this->db->insert('admin_account', $data); 
  	  }

  }
?>