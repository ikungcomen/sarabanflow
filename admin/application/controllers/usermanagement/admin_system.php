<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once APPPATH . 'libraries/sarabanflow_lib.php';

class admin_system extends sarabanflow_lib {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('usermanagement/m_usermanagement');
    }

    public function index() {
        $this->load->view('include/header');
        $data['result'] = $this->m_usermanagement->getall();
        $this->load->view('usermanager/admin_system/admin_system', $data);
        $this->load->view('include/footer');
    }

    public function showforminsert() {
        $this->load->view('include/header');
        $this->load->view('usermanager/admin_system/insert_admin_system');
        $this->load->view('include/footer');
    }

    public function insert_data() {

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $fullname = $this->input->post('fullname');
        $email = $this->input->post('email');
        $tel = $this->input->post('tel');
        $detail = $this->input->post('detail');


        $data = array(
            'id' => '',
            'user_name' => $username,
            'password' => sha1($password),
            'fullname' => $fullname,
            'email' => $email,
            'tel' => $tel,
            'detail' => $detail
        );
        $this->m_usermanagement->insert_data($data);
        redirect('usermanagement/admin_system', 'refresh');
    }

    public function delete($id = "") {
        $this->db->where('id', $id);
        $this->db->delete('admin_account');
        redirect('usermanagement/admin_system', 'refresh');
    }

    public function showedit($id = "") {
        $this->load->view('include/header');
        $data['result'] = $this->m_usermanagement->showedit($id);
        $this->load->view('usermanager/admin_system/edit_admin_system', $data);
        $this->load->view('include/footer');
    }

    public function edit($id = "") {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $fullname = $this->input->post('fullname');
        $email = $this->input->post('email');
        $tel = $this->input->post('tel');
        $detail = $this->input->post('detail');
        $this->db->set('user_name', $username);
        if ($password != ""){
            $this->db->set('password', sha1($password));
        }
        $this->db->set('fullname', $fullname);
        $this->db->set('email', $email);
        $this->db->set('tel', $tel);
        $this->db->set('detail', $detail);
        $this->db->where('id', $id);
        $this->db->update('admin_account');
        $this->__updateDataLogin();
        redirect('usermanagement/admin_system', 'refresh');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */