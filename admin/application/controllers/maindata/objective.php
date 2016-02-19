<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/sarabanflow_lib.php';

class objective extends sarabanflow_lib {

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
		$this->load->model('maindata/m_objective');
	}
	public function index()
	{   
		$this->load->view('include/header');
		$data['result'] = $this->m_objective->getall();
		$this->load->view('maindata/objective/objective',$data);
		$this->load->view('include/footer');
	}
	public function showforminsert()
	{
		$this->load->view('include/header');
		$this->load->view('maindata/objective/insert_objective');
		$this->load->view('include/footer');
	}
	public function insert_data()
	{
		$objectivename	 = $this->input->post('objectivename');
		$objectivedetail   = $this->input->post('objectivedetail');
		$data = array(
		   'id' 			=> '',
		   'objective_name'    => $objectivename,
		   'objective_detail'  => $objectivedetail 
		);
		$this->m_objective->insert_data($data);
		redirect('maindata/objective','refresh');
	}
	public function delete($id = "")
	{
 		$this->db->where('id', $id);
		$this->db->delete('objective'); 
		redirect('maindata/objective','refresh');
	}
	public function showedit($id = "")
	{
 		$this->load->view('include/header');
 		$data['result'] = $this->m_objective->showedit($id);
		$this->load->view('maindata/objective/edit_objective',$data);
		$this->load->view('include/footer');
	}
	public function edit($id)
	{   
		$objectivename	 = $this->input->post('objectivename');
		$objectivedetail   = $this->input->post('objectivedetail');
		$data = array(
		   'objective_name'    => $objectivename,
		   'objective_detail'  => $objectivedetail 
		);
		$this->db->where('id', $id);
		$this->db->update('objective', $data);
		redirect('maindata/objective','refresh');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */