<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/sarabanflow_lib.php';

class layer_secret extends sarabanflow_lib {

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
		$this->load->model('maindata/m_layer_secret');
	}
	public function index()
	{   
		$this->load->view('include/header');
		$data['result'] = $this->m_layer_secret->getLayer_secretAll();
                $this->load->view('maindata/layer_secret/layer_secret',$data);
		$this->load->view('include/footer');
	}
	public function showforminsert()
	{
		$this->load->view('include/header');
		$this->load->view('maindata/layer_secret/insert_layer_secret');
		$this->load->view('include/footer');
	}
	public function insert_data()
	{
		$layersacretname    = $this->input->post('layersacretname');
		$layersacretdetail  = $this->input->post('layersacretdetail');
		$data = array(
                   'id'            => '',
		   'layer_name'    => $layersacretname,
		   'layer_detail'  => $layersacretdetail 
		);
		$this->m_layer_secret->insert_data($data);
		redirect('maindata/layer_secret','refresh');
	}
	public function delete($id = "")
	{
 		$this->db->where('id', $id);
		$this->db->delete('layer_secret'); 
		redirect('maindata/layer_secret','refresh');
	}
	public function showedit($id = "")
	{
                $this->load->view('include/header');
 		$data['result'] = $this->m_layer_secret->showeLater_secretEdit($id);
		$this->load->view('maindata/layer_secret/edit_layer_secret',$data);
		$this->load->view('include/footer');
	}
	public function edit($id = "")
	{   
		$layersacretname   = $this->input->post('layersacretname');
		$layersacretdetail = $this->input->post('layersacretdetail');
		$data = array(
		   'layer_name'    => $layersacretname,
		   'layer_detail'  => $layersacretdetail 
		);
		$this->db->where('id', $id);
		$this->db->update('layer_secret', $data);
		redirect('maindata/layer_secret','refresh');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */