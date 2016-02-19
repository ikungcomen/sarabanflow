<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/sarabanflow_lib.php';

class institution extends sarabanflow_lib {

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
		$this->load->model('maindata/m_institution');
	}
	public function index()
	{
		$this->load->view('include/header');
		$data['result'] = $this->m_institution->get_province();
		$this->load->view('maindata/institution/institution',$data);
		$this->load->view('include/footer');
	}
	public function get_institution_province()
	{	
		$id  =  $this->input->post('id');
		$data['result'] = $this->m_institution->get_institution_province($id);
		$this->load->view('maindata/institution/province/province_data',$data);	
	}
	public function get_institution_province2()
	{	
		 $id  =  $this->input->post('id');
		 $result = $this->m_institution->get_institution_province($id);
		 header('Content-Type: application/json');
         echo json_encode( $result );
	}
	public function get_institution_province3()
	{	
		 $id  =  $this->input->post('id');
		 $result = $this->m_institution->get_institution_province2($id);
		 header('Content-Type: application/json');
         echo json_encode( $result );
	}
	public function get_institution_province4()
	{	
		 $id  =  $this->input->post('id');
		 $result = $this->m_institution->get_institution_province4($id);
		 header('Content-Type: application/json');
         echo json_encode( $result );
	}
	public function insert_institution_province()
	{
		$name1      = $this->input->post('name1'); 
		$detail1    = $this->input->post('detail1'); 
		$hide1      = $this->input->post('hide1');

		$this->db->set('province_id',$hide1);
		$this->db->set('institution_province_name', $name1);
		$this->db->set('institution_province_detail',$detail1);
		$this->db->set('cdate', 'NOW()', FALSE);
		$this->db->set('udate', 'NOW()', FALSE);
		$this->db->set('active',1);
        $this->db->insert('institution_province');

        $id   = $this->db->insert_id();
        $this->db->set('province_id',$hide1);
        $this->db->set('instutition_id',$id);
        $this->db->set('instutition_level',"institution_province");
		$this->db->set('cdate', 'NOW()', FALSE);
		$this->db->set('udate', 'NOW()', FALSE);
		$this->db->insert('number_of_institution');
	}
	public function delete()
	{
		$id    =  $this->input->post('id');
		$this->db->delete('institution_province', array('id' => $id)); 
		$data['result'] = $this->m_institution->get_institution_province($id);
		$this->load->view('maindata/institution/province/province_data',$data);
	}
	public function edit()
	{
		$id    =  $this->input->post('id');
		$data['result'] = $this->m_institution->get_institution_list($id);
		header("Content-Type: application/json");
    	echo json_encode($data['result']);
	}
	public function edit_institution_province()
	{
		$name1      = $this->input->post('name_1'); 
		$detail1    = $this->input->post('detail_1'); 
		$hide1      = $this->input->post('hide_1');
		// echo $name1.$detail1.$hide1;
		// exit;
		$data = array(
               'institution_province_name' => $name1,
               'institution_province_detail' => $detail1
        );
		$this->db->set('udate', 'NOW()', FALSE);
		$this->db->where('id', $hide1);
		$this->db->update('institution_province',$data); 
	}
	public function insert_institution_amphur()
	{
		$name2      = $this->input->post('name2'); 
		$detail2    = $this->input->post('detail2'); 
		$hide2      = $this->input->post('hide2');
		$hide2_pro  = $this->input->post('hide2_pro');

		$this->db->set('province_id',$hide2_pro);
		$this->db->set('institution_province_id',$hide2);
		$this->db->set('institution_amphur_name', $name2);
		$this->db->set('institution_amphur_detail',$detail2);
		$this->db->set('cdate', 'NOW()', FALSE);
		$this->db->set('udate', 'NOW()', FALSE);
		$this->db->set('active',1);
        $this->db->insert('institution_amphur');

  //       $id   = $this->db->insert_id();
  //       $this->db->set('province_id',$hide2_pro);
  //       $this->db->set('institution_id',$id);
  //       $this->db->set('institution_level',"institution_amphur");
		// $this->db->set('cdate', 'NOW()', FALSE);
		// $this->db->set('udate', 'NOW()', FALSE);
		// $this->db->insert('institution_create_numbers');

		$id   = $this->db->insert_id();
        $this->db->set('province_id',$hide2_pro);
        $this->db->set('instutition_id',$id);
        $this->db->set('instutition_level',"institution_amphur");
		$this->db->set('cdate', 'NOW()', FALSE);
		$this->db->set('udate', 'NOW()', FALSE);
		$this->db->insert('number_of_institution');
	}
	public function insert_institution_tambol()
	{
		$name3      = $this->input->post('name3'); 
		$detail3    = $this->input->post('detail3'); 
		$hide3      = $this->input->post('hide3');
		$hide3_pro  = $this->input->post('hide3_pro');
		$hide3_am   = $this->input->post('hide3_am');

		$this->db->set('province_id',$hide3_pro);
		$this->db->set('institution_province_id',$hide3_am);
		$this->db->set('institution_amphur_id',$hide3);
		$this->db->set('institution_district_name', $name3);
		$this->db->set('institution_district_detail',$detail3);
		$this->db->set('cdate', 'NOW()', FALSE);
		$this->db->set('udate', 'NOW()', FALSE);
		$this->db->set('active',1);
        $this->db->insert('institution_district');

  //       $id   = $this->db->insert_id();
  //       $this->db->set('province_id',$hide3_pro);
  //       $this->db->set('institution_id',$id);
  //       $this->db->set('institution_level',"institution_district");
		// $this->db->set('cdate', 'NOW()', FALSE);
		// $this->db->set('udate', 'NOW()', FALSE);
		// $this->db->insert('institution_create_numbers');

		$id   = $this->db->insert_id();
        $this->db->set('province_id',$hide3_pro);
        $this->db->set('instutition_id',$id);
        $this->db->set('instutition_level',"institution_district");
		$this->db->set('cdate', 'NOW()', FALSE);
		$this->db->set('udate', 'NOW()', FALSE);
		$this->db->insert('number_of_institution');
	}
	public function get_institution_amphur()
	{
		$id  =  $this->input->post('id');
		$data['result'] = $this->m_institution->get_institution_amphur($id);
		$this->load->view('maindata/institution/amphur/amphur_data',$data);	
	}
	public function get_institution_tambol()
	{
		$id  =  $this->input->post('id');
		$data['result'] = $this->m_institution->get_institution_tambol($id);
		$this->load->view('maindata/institution/tambol/tambol_data',$data);	
	}
	public function delete2()
	{
		$id    =  $this->input->post('id');
		$this->db->delete('institution_amphur', array('id' => $id)); 
		$data['result'] = $this->m_institution->get_institution_amphur($id);
		$this->load->view('maindata/institution/amphur/amphur_data',$data);	
	}
	public function delete3()
	{
		$id    =  $this->input->post('id');
		$this->db->delete('institution_district', array('id' => $id)); 
		// $data['result'] = $this->m_institution->get_institution_tambol($id);
		// $this->load->view('maindata/institution/tambol/tambol_data',$data);	
	}
	public function edit2()
	{
		$id    =  $this->input->post('id');
		$data['result'] = $this->m_institution->get_institution_list2($id);
		header("Content-Type: application/json");
    	echo json_encode($data['result']);
	}
	public function edit3()
	{
		$id    =  $this->input->post('id');
		$data['result'] = $this->m_institution->get_institution_list3($id);
		header("Content-Type: application/json");
    	echo json_encode($data['result']);
	}
	public function edit_institution_amphur()
	{
		$name_2      = $this->input->post('name_2'); 
		$detail_2    = $this->input->post('detail_2'); 
		$hide_2      = $this->input->post('hide_2');
		// echo $name1.$detail1.$hide1;
		// exit;
		$data = array(
               'institution_amphur_name' => $name_2,
               'institution_amphur_detail' => $detail_2
        );
		$this->db->set('udate', 'NOW()', FALSE);
		$this->db->where('id', $hide_2);
		$this->db->update('institution_amphur',$data); 
	}
	public function edit_institution_tambol()
	{
		$name_3      = $this->input->post('name_3'); 
		$detail_3    = $this->input->post('detail_3'); 
		$hide_3      = $this->input->post('hide_3');

		$data = array(
               'institution_district_name' => $name_3,
               'institution_district_detail' => $detail_3
        );
		$this->db->set('udate', 'NOW()', FALSE);
		$this->db->where('id', $hide_3);
		$this->db->update('institution_district',$data); 
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */