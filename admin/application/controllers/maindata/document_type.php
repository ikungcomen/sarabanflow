<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/sarabanflow_lib.php';

class document_type extends sarabanflow_lib {

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
		$this->load->model('maindata/m_document_type');
	}
	public function index()
	{   
		$this->load->view('include/header');
		$data['result'] = $this->m_document_type->getall();
		$this->load->view('maindata/document_type/document_type',$data);
		$this->load->view('include/footer');
	}
	public function showforminsert()
	{
		$this->load->view('include/header');
		$this->load->view('maindata/document_type/insert_document_type');
		$this->load->view('include/footer');
	}
	public function insert_data()
	{
		$document_type_name	 = $this->input->post('document_type_name');
		$document_type_detail   = $this->input->post('document_type_detail');
		$data = array(
		   'id' 	=> '',
		   'doc_type_name'    => $document_type_name,
		   'doc_type_detail'  => $document_type_detail 
		);
		$this->m_document_type->insert_data($data);
		redirect('maindata/document_type','refresh');
	}
	public function delete($id = "")
	{
 		$this->db->where('id', $id);
		$this->db->delete('document_type'); 
		redirect('maindata/document_type','refresh');
	}
	public function showedit($id = "")
	{
 		$this->load->view('include/header');
 		$data['result'] = $this->m_document_type->showedit($id);
		$this->load->view('maindata/document_type/edit_document_type',$data);
		$this->load->view('include/footer');
	}
	public function edit($id ="")
	{   
		$document_type_name	 = $this->input->post('document_type_name');
		$document_type_detail   = $this->input->post('document_type_detail');
		$data = array(
		   'doc_type_name'    => $document_type_name,
		   'doc_type_detail'  => $document_type_detail 
		);
		$this->db->where('id', $id);
		$this->db->update('document_type', $data);
		redirect('maindata/document_type','refresh');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */