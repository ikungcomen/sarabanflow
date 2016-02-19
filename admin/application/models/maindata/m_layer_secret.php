<?php

class m_layer_secret extends CI_Model {

    public function getLayer_secretAll() {

        $sql = "select * from layer_secret order by id desc ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }

    public function showeLater_secretEdit($id = "") {
        $sql = "select * from layer_secret where id = $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }

    public function insert_data($data = '') {
        $this->db->set('cdate', 'NOW()', FALSE);
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->insert('layer_secret', $data);
    }

}

?>