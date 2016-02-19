<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/sarabanflow_lib.php';

class institution_department extends sarabanflow_lib {

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
		$this->load->model('maindata/m_institution_create_number');
		$this->load->model('maindata/m_institution_department');
		$this->load->model('maindata/m_institution');
	}

	public function index()
	{
		$this->load->view('include/header');
		$data['result'] = $this->m_institution->get_province();
		$this->load->view('maindata/institution_department/institution_department',$data);
		$this->load->view('include/footer');
	}
	public function delete_dep1($id = '')
	{
		$this->db->where('id', $id);
		$this->db->delete('department_of_instutition'); 

		$this->session->set_flashdata('delete', 'Value');
		redirect('maindata/institution_department','refresh');
	}
	public function edit_dep1($id = '')
	{
		$data['result'] = $this->m_institution_department->edit_dep1($id);
		$this->load->view('include/header');
		$this->load->view('maindata/institution_department/edit_dep1',$data);
		$this->load->view('include/footer');
	}
	public function edit_department1($id = '')
	{ 
		$department_number1 =  $this->input->post('department_number1');
	    $department_name1   =  $this->input->post('department_name1');

	    $this->db->set('department_id',$department_number1);
	    $this->db->set('department_name',$department_name1);
        $this->db->set('udate', 'NOW()', FALSE);

        $this->db->where('id', $id);
        $this->db->update('department_of_instutition'); 

        $this->session->set_flashdata('insert_dep1', 'Value');

		redirect('maindata/institution_department','refresh');
	}
	public function get_province_dep()
	{  
		$province_id = $this->input->post('id');
		$data['result'] = $this->m_institution_department->get_province_dep($province_id);
		$this->load->view('maindata/institution_department/subdata/get_province_dep',$data);
	}
	public function get_amphur_dep()
	{
		$province_id = $this->input->post('id');
		$data['result'] = $this->m_institution_department->get_amphur_dep($province_id);
		$this->load->view('maindata/institution_department/subdata/get_amphur_dep',$data);
	}
	public function get_tambol_dep()
	{
		$province_id = $this->input->post('id');
		$data['result'] = $this->m_institution_department->get_tambol_dep($province_id);
		$this->load->view('maindata/institution_department/subdata/get_tambol_dep',$data);
	}

	public function save_department1()
	{   
		$department_number1 =  $this->input->post('department_number1');
	    $department_name1   =  $this->input->post('department_name1');
	    $hide1              =  $this->input->post('hide1');
	    $prov1              =  $this->input->post('prov1');

	    
	    $this->db->set('province_id',$prov1);
	    $this->db->set('instutition_id',$hide1  );
	    $this->db->set('instutition_level','institution_province');
	    $this->db->set('department_id',$department_number1);
	    $this->db->set('department_name',$department_name1);

	    $this->db->set('cdate', 'NOW()', FALSE);
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->set('active',1);

        $this->db->insert('department_of_instutition');

        $this->session->set_flashdata('insert_dep1', 'Value');
		redirect('maindata/institution_department','refresh');
	}
	public function save_department2()
	{   
		$department_number1 =  $this->input->post('department_number1_am');
	    $department_name1   =  $this->input->post('department_name1_am');
	    $hide1              =  $this->input->post('hide1_am');
	    $prov1              =  $this->input->post('prov1_am');

	    
	    $this->db->set('province_id',$prov1);
	    $this->db->set('instutition_id',$hide1  );
	    $this->db->set('instutition_level','institution_amphur');
	    $this->db->set('department_id',$department_number1);
	    $this->db->set('department_name',$department_name1);

	    $this->db->set('cdate', 'NOW()', FALSE);
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->set('active',1);

        $this->db->insert('department_of_instutition');

        $this->session->set_flashdata('insert_dep1', 'Value');

		redirect('maindata/institution_department','refresh');
	}
	public function save_department3()
	{   
		$department_number1 =  $this->input->post('department_number1_tam');
	    $department_name1   =  $this->input->post('department_name1_tam');
	    $hide1              =  $this->input->post('hide1_tam');
	    $prov1              =  $this->input->post('prov1_tam');
	    
	    $this->db->set('province_id',$prov1);
	    $this->db->set('instutition_id',$hide1  );
	    $this->db->set('instutition_level','institution_district');
	    $this->db->set('department_id',$department_number1);
	    $this->db->set('department_name',$department_name1);

	    $this->db->set('cdate', 'NOW()', FALSE);
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->set('active',1);

        $this->db->insert('department_of_instutition');

        $this->session->set_flashdata('insert_dep1', 'Value');

		redirect('maindata/institution_department','refresh');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */