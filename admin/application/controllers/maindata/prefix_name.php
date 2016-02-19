<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/sarabanflow_lib.php';

class prefix_name extends sarabanflow_lib {

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
		$this->load->model('maindata/m_prefix_name');
	}
	public function index()
	{   
		$this->load->view('include/header');
		$data['result'] = $this->m_prefix_name->getall();
		$this->load->view('maindata/prefixname/prefix_name',$data);
		$this->load->view('include/footer');
	}
	public function showforminsert()
	{
		$this->load->view('include/header');
		$this->load->view('maindata/prefixname/insert_prefix');
		$this->load->view('include/footer');
	}
	public function insert_data()
	{
		$prefix_name	 = $this->input->post('prefixname');
		$prefix_detail   = $this->input->post('prefix_detail');
		$data = array(
		   'id' 			=> '',
		   'prefix_name'    => $prefix_name,
		   'prefix_detail'  => $prefix_detail 
		);
		$this->m_prefix_name->insert_data($data);
		redirect('maindata/prefix_name','refresh');
	}
	public function delete($id = "")
	{
 		$this->db->where('id', $id);
		$this->db->delete('prefix_name'); 
		redirect('maindata/prefix_name','refresh');
	}
	public function showedit($id = "")
	{
 		$this->load->view('include/header');
 		$data['result'] = $this->m_prefix_name->showedit($id);
		$this->load->view('maindata/prefixname/edit_prefix',$data);
		$this->load->view('include/footer');
	}
	public function edit($id)
	{   
		$prefix_name	 = $this->input->post('prefixname');
		$prefix_detail   = $this->input->post('prefix_detail');
		$data = array(
		   'prefix_name'    => $prefix_name,
		   'prefix_detail'  => $prefix_detail 
		);
		$this->db->where('id', $id);
		$this->db->update('prefix_name', $data);
		redirect('maindata/prefix_name','refresh');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */