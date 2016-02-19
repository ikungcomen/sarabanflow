<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/sarabanflow_lib.php';

class document_icon extends sarabanflow_lib {

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
		$this->load->model('maindata/m_document_icon');
	}
	public function index()
	{   
		$this->load->view('include/header');
		$data['result'] = $this->m_document_icon->getall();
		$this->load->view('maindata/document_icon/document_icon',$data);
		$this->load->view('include/footer');
	}
	public function showforminsert()
	{
		$this->load->view('include/header');
		$this->load->view('maindata/document_icon/insert_document_icon');
		$this->load->view('include/footer');
	}
	public function insert_data()
	{
		$iconname	  = $this->input->post('iconname');
		$icondetail   = $this->input->post('icondetail');
		$data = array(
		   'id' 			=> '',
		   'icon_name'    => $iconname,
		   'icon_detail'  => $icondetail 
		);
		$this->m_document_icon->insert_data($data);
		redirect('maindata/document_icon','refresh');
	}
	public function delete($id = "")
	{
 		$this->db->where('id', $id);
		$this->db->delete('document_icon'); 
		redirect('maindata/document_icon','refresh');
	}
	public function showedit($id = "")
	{
 		$this->load->view('include/header');
 		$data['result'] = $this->m_document_icon->showedit($id);
		$this->load->view('maindata/document_icon/edit_document_icon',$data);
		$this->load->view('include/footer');
	}
	public function edit($id)
	{   
		$iconname	  = $this->input->post('iconname');
		$icondetail   = $this->input->post('icondetail');
		$data = array(
		   'id' 			=> '',
		   'icon_name'    => $iconname,
		   'icon_detail'  => $icondetail 
		);
		$this->db->where('id', $id);
		$this->db->update('document_icon', $data);
		redirect('maindata/document_icon','refresh');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */