<?php

class m_login extends CI_Model{
    //put your code here
    function check_login($user_name,$password){
        $this -> db -> select('*');
        $this -> db -> from('admin_account');
        $this -> db -> where('user_name', $user_name);
        $this -> db -> where('password', sha1($password));
        $this -> db -> limit(1);
        
        $query = $this -> db -> get();
        return $query->result();
    }
    function getDataUpdateLogin($account_id){
        $this -> db -> select('*');
        $this -> db -> from('admin_account');
        $this -> db -> where('id', $account_id);
        
        $this -> db -> limit(1);
        
        $query = $this -> db -> get();
        return $query->result();
    }
}
