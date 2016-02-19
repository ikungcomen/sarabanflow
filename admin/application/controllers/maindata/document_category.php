<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/sarabanflow_lib.php';

class document_category extends sarabanflow_lib {

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
		$this->load->model('maindata/m_document_category');
	}
	public function index()
	{   
		$this->load->view('include/header');
		$data['result'] = $this->m_document_category->getall();
		$this->load->view('maindata/document_category/document_category',$data);
		$this->load->view('include/footer');
	}
	public function showforminsert()
	{
		$this->load->view('include/header');
		$this->load->view('maindata/document_category/insert_document_category');
		$this->load->view('include/footer');
	}
	public function insert_data()
	{
		$category_name	 = $this->input->post('category_name');
		$category_detail   = $this->input->post('category_detail');
		$data = array(
		   'id' 			=> '',
		   'doc_cate_name'    => $category_name,
		   'doc_cate_detail'  => $category_detail 
		);
		$this->m_document_category->insert_data($data);
		redirect('maindata/document_category','refresh');
	}
	public function delete($id = "")
	{
 		$this->db->where('id', $id);
		$this->db->delete('document_category'); 
		redirect('maindata/document_category','refresh');
	}
	public function showedit($id = "")
	{
 		$this->load->view('include/header');
 		$data['result'] = $this->m_document_category->showedit($id);
		$this->load->view('maindata/document_category/edit_document_category',$data);
		$this->load->view('include/footer');
	}
	public function edit($id)
	{   
		$category_name	 = $this->input->post('category_name');
		$category_detail   = $this->input->post('category_detail');
		$data = array(
		   'doc_cate_name'    => $category_name,
		   'doc_cate_detail'  => $category_detail 
		);
		$this->db->where('id', $id);
		$this->db->update('document_category', $data);
		redirect('maindata/document_category','refresh');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */