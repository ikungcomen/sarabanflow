<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/nm_saraban_lib.php';
class changePassword extends nm_saraban_lib{
    function __construct() {
        parent::__construct();
        $this->load->model('m_changepassword');
    }
    public function index() {
        $this->load->view('include/header');
        $this->load->view('changePassword/changePassword');
        $this->load->view('include/footer');
    }
    public function save(){
        $normal_account_id = $this->normal_account_id;
        $level_institution_id = $this->level_institution_id;
        $level_institution    = $this->level_institution;
        $username             = $this->username;
        $password             = $this->password;
        $newPassword = $this->input->post('newPassword');
        $this->db->set('password',$newPassword);
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->where('id',$normal_account_id);
        $this->db->where('level_institution_id',$level_institution_id);
        $this->db->where('level_institution',$level_institution);
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $this->db->update('normal_account');
        redirect('auth_login/logout','refresh');
        
        
    }
    public function checkDefaultPassword(){
        $normal_account_id    = $this->normal_account_id;
        $level_institution_id = $this->level_institution_id;
        $level_institution    = $this->level_institution;
        $username             = $this->username;
        $password             = $this->password;
        $defaultPassword      = $this->input->post('defaultPassword');
        $data = $this->m_changepassword->getDefaultPassword($level_institution_id,$level_institution,$username,$password,$normal_account_id);
        $passwordTemp = $data[0]['password'];
        if ($passwordTemp == $defaultPassword){
           echo "1";
        }else{
           echo "0";
        }
    }

}

?>