<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/sarabanflow_lib.php';

class document_send_or_recieve extends sarabanflow_lib {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('maindata/m_document_send_or_recieve');
	}
	public function index()
	{   
		$this->load->view('include/header');
		$data['result'] = $this->m_document_send_or_recieve->getall();
		$this->load->view('maindata/document_send_or_recieve/document_send_or_recieve',$data);
		$this->load->view('include/footer');
	}
	public function showforminsert()
	{
		$this->load->view('include/header');
		$this->load->view('maindata/document_send_or_recieve/insert_document_send_or_recieve');
		$this->load->view('include/footer');
	}
	public function insert_data()
	{
		$send_name	 = $this->input->post('send_name');
		$send_detail   = $this->input->post('send_detail');
		$data = array(
		   'id' 			=> '',
		   'doc_send_name'    => $send_name,
		   'doc_send_detail'  => $send_detail 
		);
		$this->m_document_send_or_recieve->insert_data($data);
		redirect('maindata/document_send_or_recieve','refresh');
	}
	public function delete($id = "")
	{
 		$this->db->where('id', $id);
		$this->db->delete('document_send_or_recieve'); 
		redirect('maindata/document_send_or_recieve','refresh');
	}
	public function showedit($id = "")
	{
 		$this->load->view('include/header');
 		$data['result'] = $this->m_document_send_or_recieve->showedit($id);
		$this->load->view('maindata/document_send_or_recieve/edit_document_send_or_recieve',$data);
		$this->load->view('include/footer');
	}
	public function edit($id)
	{   
		$send_name	 = $this->input->post('send_name');
		$send_detail   = $this->input->post('send_detail');
		$data = array(
		   'doc_send_name'    => $send_name,
		   'doc_send_detail'  => $send_detail 
		);
		$this->db->where('id', $id);
		$this->db->update('document_send_or_recieve', $data);
		redirect('maindata/document_send_or_recieve','refresh');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */