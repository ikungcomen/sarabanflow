<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/sarabanflow_lib.php';

class layer_priority extends sarabanflow_lib {

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
		$this->load->model('maindata/m_layer_priority');
	}
	public function index()
	{   
		$this->load->view('include/header');
		$data['result'] = $this->m_layer_priority->getall();
		$this->load->view('maindata/layer_priority/layer_priority',$data);
		$this->load->view('include/footer');
	}
	public function showforminsert()
	{
		$this->load->view('include/header');
		$this->load->view('maindata/layer_priority/insert_layer_priority');
		$this->load->view('include/footer');
	}
	public function insert_data()
	{
		$layerpriorityname    = $this->input->post('layerpriorityname');
		$layerprioritydetail  = $this->input->post('layerprioritydetail');
		$data = array(
		   'id' 			=> '',
		   'pio_name'    => $layerpriorityname,
		   'pio_detail'  => $layerprioritydetail 
		);
		$this->m_layer_priority->insert_data($data);
		redirect('maindata/layer_priority','refresh');
	}
	public function delete($id = "")
	{
 		$this->db->where('id', $id);
		$this->db->delete('layer_priority'); 
		redirect('maindata/layer_priority','refresh');
	}
	public function showedit($id = "")
	{
 		$this->load->view('include/header');
 		$data['result'] = $this->m_layer_priority->showedit($id);
		$this->load->view('maindata/layer_priority/edit_layer_priority',$data);
		$this->load->view('include/footer');
	}
	public function edit($id)
	{   
		$layerpriorityname     = $this->input->post('layerpriorityname');
		$layerprioritydetail   = $this->input->post('layerprioritydetail');
		$data = array(
		   'pio_name'    => $layerpriorityname,
		   'pio_detail'  => $layerprioritydetail 
		);
		$this->db->where('id', $id);
		$this->db->update('layer_priority', $data);
		redirect('maindata/layer_priority','refresh');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */