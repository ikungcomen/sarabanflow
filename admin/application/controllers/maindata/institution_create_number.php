<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/sarabanflow_lib.php';

class institution_create_number extends sarabanflow_lib {

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
		$this->load->model('maindata/m_institution');
	}
	public function show_form_update($level_id  = '' ,$id = '' , $name = '')
	{  

		$this->load->view('include/header');
		$data['pro_name']  = base64_decode($name) ;
		$data['level_id']  = $level_id;
		$data['number_of_id'] = $id;
		//run number 
		$data['get_id_level'] = $this->m_institution_create_number->getmax($id);	
		//echo "<pre>";print_r($data['normal_run']);exit;
		$instutition_id    =  $data['get_id_level'][0]['instutition_id'];
		$instutition_level =  $data['get_id_level'][0]['instutition_level'];
		
		$data['normal_id']  =  $this->m_institution_create_number->getmax_normal_id($instutition_id , $instutition_level );
		$data['vian_id']    =  $this->m_institution_create_number->getmax_vian_id($instutition_id , $instutition_level );
		$data['command_id'] =  $this->m_institution_create_number->getmax_command_id($instutition_id , $instutition_level );
		$data['radio_id']   =  $this->m_institution_create_number->getmax_radio_id($instutition_id , $instutition_level );

		// echo $instutition_id;
		// echo $instutition_level;
		// echo "<pre>";
		// print_r($data['normal_id']);
		// echo "</pre>";
		// echo "<pre>";
		// print_r($data['vian_id']);
		// echo "</pre>";
		// echo "<pre>";
		// print_r($data['command_id']);
		// echo "</pre>";
		// echo "<pre>";
		// print_r($data['radio_id']);
		// echo "</pre>";

		$data['normal_id_max']     = $data['normal_id'][0]['number_of_run']; 
		$data['vian_id_max']       = $data['vian_id'][0]['number_of_run']; 
		$data['command_id_max']    = $data['command_id'][0]['number_of_run']; 
		$data['radio_id_max']      = $data['radio_id'][0]['number_of_run']; 

		// echo $data['normal_id_max']."<br/>";
		// echo $data['vian_id_max']."<br/>";
		// echo $data['command_id_max']."<br/>";
		// echo $data['radio_id_max']."<br/>";
		//exit;
 		
 		$data['result'] = $this->m_institution_create_number->show_form_update($id);
		$this->load->view('maindata/institution_create_number/form_update/show_form_update',$data);
		$this->load->view('include/footer');
	}
	public function get_data_to_update()
	{   
		 $id = $this->input->post('id');
		 $result = $this->m_institution_create_number->get_data_to_update($id);
		 header('Content-Type: application/json');
         echo json_encode( $result );

	}
	public function update_number()
	{   
		
        /////////////////////////////////////////////////////
        $normal     = $this->input->post('normal');
        $txt_normal = $this->input->post('txt_normal');

        $vian     = $this->input->post('vian');
        $txt_vian = $this->input->post('txt_vian');

        $command     = $this->input->post('command');
        $txt_command = $this->input->post('txt_command');

        $radios     = $this->input->post('radios');
        $txt_radios = $this->input->post('txt_radios');
        
        $receive_type = $this->input->post('receive_type');
        $txt_receive = $this->input->post('txt_receive');

		// $check_set2    = $this->input->post('check_set2');
		// $check_set3    = $this->input->post('check_set3');
		$center_define = $this->input->post('center_define');
		

		$instutition_number       = $this->input->post('instutition_number');
		$institution_send_number  = $this->input->post('institution_send_number');
		$details_of_number 	   	  = $this->input->post('details_of_number');
		$federal_register  	 	  = $this->input->post('federal_register');
		$hide2 					  = $this->input->post('hide2');

		$hide_id2        		  = $this->input->post('hide_id2');
		$number_recieve  		  = $this->input->post('number_recieve');
		$number_internal  		  = $this->input->post('number_internal');
		$number_external    	  = $this->input->post('number_external');
		$setup_instutition_number1  = $this->input->post('setup_instutition_number11111111');
		$setup_instutition_number2  = $this->input->post('setup_instutition_number2');
		$setup_instutition_number3  = $this->input->post('setup_institution_number3');
		$hide1 					  = $this->input->post('hide1');

		$this->db->set('instutition_number',$instutition_number);
		$this->db->set('instutition_number_send',$institution_send_number);
		$this->db->set('details_of_number', $details_of_number);
		$this->db->set('instutition_main_send',$federal_register);
		$this->db->set('instutition_main_id',$hide2 );
		$this->db->set('instutition_main_level',$hide_id2);
		$this->db->set('number_recieve',$number_recieve );
		$this->db->set('number_internal',$number_internal);
		$this->db->set('number_external',$number_external);
		$this->db->set('setup_instutition_number1',$setup_instutition_number1);
		$this->db->set('setup_instutition_number2',$setup_instutition_number2);
		$this->db->set('setup_instutition_number3',$setup_instutition_number3);

		$this->db->set('nornal_type',$normal);
		$this->db->set('nornal_text',$txt_normal);

		$this->db->set('vian_type',$vian);
		$this->db->set('vian_text',$txt_vian);

		$this->db->set('command_type',$command);
		$this->db->set('command_text',$txt_command);

		$this->db->set('radio_type',$radios);
		$this->db->set('radio_text',$txt_radios);

		$this->db->set('receive_type',$receive_type);
		$this->db->set('txt_receive',$txt_receive);

		//$this->db->set('set2_val',$check_set2);
		//$this->db->set('set3_val',$check_set3);
		$this->db->set('active_center',$center_define);


		$this->db->where('id', $hide1);
		$this->db->update('number_of_institution');


		//update active
		$level_id      = $this->input->post('level_id');

		$this->session->set_flashdata('insert_dep1', 'Value');
		redirect('maindata/institution_create_number','refresh');
	}
	public function index()
	{
		$this->load->view('include/header');
		$data['result'] = $this->m_institution->get_province();
		$this->load->view('maindata/institution_create_number/institution_create_number',$data);
		$this->load->view('include/footer');
	}
	public function getdata_from_province_institution()
	{
		$province_id = $this->input->post('province_id');
		$data['result'] = $this->m_institution_create_number->getdata_from_province_institution($province_id);
		$this->load->view('maindata/institution_create_number/subdata/subdata_province_institution',$data);
	}
	public function getdata_from_amphur_institution()
	{
		$amphur_id = $this->input->post('amphur_id');
		$data['result'] = $this->m_institution_create_number->getdata_from_amphur_institution($amphur_id);
		$this->load->view('maindata/institution_create_number/subdata/subdata_amphur_institution',$data);
	}
	public function getdata_from_tambol_institution()
	{
		$tambol_id = $this->input->post('tambol_id');
		$data['result'] = $this->m_institution_create_number->getdata_from_tambol_institution($tambol_id);
		$this->load->view('maindata/institution_create_number/subdata/subdata_tambol_institution',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */