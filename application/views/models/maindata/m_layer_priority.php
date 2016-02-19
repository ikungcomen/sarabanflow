<?php
  class m_layer_priority extends CI_Model
  {		
  
  
  	  public function showedit($id = "")
  	  {
  	  	$sql     = "select * from layer_priority where id = $id";
  	  	 $result  = $this->db->query($sql);
  	  	 $result  = $result->result_array();
  	  	 return $result;
  	  }
  	  public function getall()
  	  {
  	  	 $sql     = "select * from layer_priority order by id desc ";
  	  	 $result  = $this->db->query($sql);
  	  	 $result  = $result->result_array();
  	  	 return $result;
  	  }
  	  public function insert_data($data = '')
  	  {
  	  	$this->db->set('cdate', 'NOW()', FALSE);
                $this->db->set('udate', 'NOW()', FALSE);
  	  	$this->db->insert('layer_priority', $data); 
  	  }

  }
?>