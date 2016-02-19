
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/nm_saraban_lib.php';
class sending extends nm_saraban_lib {

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_sending');
    }
    public function index()
    {   

    }
    public function show_group_data()
    {
        $id_group =  $this->input->post('id_group');
        $data['show_group_data'] = $this->m_sending->show_group_data($id_group);
        $this->load->view('sending/group_send_list',$data);
        //echo "<pre>";print_r($data['show_group_data'] );die;
    }
    public function send_by_group($id_send = '')
    {   
        $data['id_data'] = $id_send;
        $data['gruop_data'] = $this->m_sending->send_by_group();
        //echo "<pre>";print_r($data['gruop_data']);die;
        $this->load->view('include/header');
        $this->load->view('sending/group_send',$data);
        $this->load->view('include/footer');
    }
    public function get_j_pro()
    {
         $id  =  $this->input->post('id');
         $result = $this->m_sending->get_list_pro($id);
         header('Content-Type: application/json');
         echo json_encode( $result );
    }
    public function get_j_am()
    {
         $id  =  $this->input->post('id');
         $result = $this->m_sending->get_list_am($id);
         header('Content-Type: application/json');
         echo json_encode( $result );
    }
    public function clear_data()
    {
        $result = $this->m_sending->clear_data();
        if($result == true)
        {
            echo "Empty data Success";
        }
    }
     public function clear_data2()
    {
        $result = $this->m_sending->clear_data2();
        if($result == true)
        {
            echo "Empty data Success (backoffice)";
        }
    }
    public function del_item($item = '')
    {
        $id    =  $_GET['item'];
        $id_re =  $_GET['id_re'];
        $institution_id_send = $this->session->userdata('item_select');
        foreach ($institution_id_send as $key => $value) {
             if($value ==  $id )
             {
                unset($institution_id_send[$key]);
             }
         }
         $this->session->set_userdata('item_select',$institution_id_send);
         $institution_id_send = $this->session->userdata('item_select');

         redirect('bookSend/bookSend/Send_To/'.$id_re,'refresh');
    }
    public function addItem()
    {
        $item_select = $this->input->post('item_select');
        echo "<pre>";
        print_r($item_select);
        echo "</pre>";
    }
    public function create_group_data()
    {   
        $id_redirect =  $this->input->post('id_redirect');
        $select_ins =  $this->input->post('select_ins');
        $id_data   = $this->input->post('id_data');
        $data['id_data'] = $id_data;
        if($select_ins == 1)
        {
            $data['level'] = 'institution_province_name';
        }
         if($select_ins == 2)
        {
            $data['level'] = 'institution_amphur_name';
        }
         if($select_ins == 3)
        {
            $data['level'] = 'institution_district_name';
        }
        $data['list_institution'] = $this->m_sending->getdata($id_redirect , $select_ins);
        $this->load->view('sending/list_sending_add_group',$data);
    }
    public function sending_data_group()
    {
        $id_redirect =  $this->input->post('id_redirect');
        $select_ins =  $this->input->post('select_ins');
        $id_data   = $this->input->post('id_data');
        $data['id_data'] = $id_data;
        $data['item_type'] =  $select_ins;
        if($select_ins == 1)
        {
            $data['level'] = 'institution_province_name';
        }
         if($select_ins == 2)
        {
            $data['level'] = 'institution_amphur_name';
        }
         if($select_ins == 3)
        {
            $data['level'] = 'institution_district_name';
        }
        $data['list_institution']  = $this->m_sending->getdata_pro($id_redirect, $select_ins);
        $this->load->view('sending/list_sending3',$data);
    }

    public function sending_data_pro()
    {
        $id_redirect =  $this->input->post('id_redirect');
        $select_ins =  $this->input->post('select_ins');
        $id_data   = $this->input->post('id_data');
        $data['id_data'] = $id_data;
        $data['item_type'] =  $select_ins;
        if($select_ins == 1)
        {
            $data['level'] = 'institution_province_name';
        }
         if($select_ins == 2)
        {
            $data['level'] = 'institution_amphur_name';
        }
         if($select_ins == 3)
        {
            $data['level'] = 'institution_district_name';
        }
        $data['list_institution']  = $this->m_sending->getdata_pro($id_redirect, $select_ins);
        $this->load->view('sending/list_sending2',$data);
    }
    public function sending_data()
    {   
        $id_redirect =  $this->input->post('id_redirect');
        $select_ins =  $this->input->post('select_ins');
        $id_data   = $this->input->post('id_data');
        $data['id_data'] = $id_data;
        if($select_ins == 1)
        {
            $data['level'] = 'institution_province_name';
        }
         if($select_ins == 2)
        {
            $data['level'] = 'institution_amphur_name';
        }
         if($select_ins == 3)
        {
            $data['level'] = 'institution_district_name';
        }
        $data['list_institution'] = $this->m_sending->getdata($id_redirect , $select_ins);
        $this->load->view('sending/list_sending',$data);
    }
    public function unset_session()
    {
         $id  = $this->input->post('id');
         $institution_id_send = $this->session->userdata('list_send');
         foreach ($institution_id_send as $key => $value) {
             if($value ==  $id )
             {
                unset($institution_id_send[$key]);
             }
         }
         $this->session->set_userdata('list_send',$institution_id_send);
    }
    public function set_session($set_session = '')
    {    
         if($this->session->userdata('item_select'))
         {  
            $item_select_push  = $this->input->post('item_select');
            $item_select = $this->session->userdata('item_select');
            foreach ($item_select as $key1 => $value1) {
                foreach ($item_select_push as $key2 => $value2) {
                    if($value1  == $value2)
                    {
                        unset($item_select_push[$key2]);
                    }
                }
            }
            $this->session->set_userdata('item_select',array_merge($item_select,$item_select_push));
         }
         else
         { 
             $item_select  = $this->input->post('item_select');
             $this->session->set_userdata('item_select',$item_select);
         }

         redirect('bookSend/bookSend/Send_To/'.$set_session,'refresh');
         
    }
    public function unset_session_group()
    {
         $id  = $this->input->post('id');
         $institution_id_send = $this->session->userdata('list_send');
         foreach ($institution_id_send as $key => $value) {
             if($value ==  $id )
             {
                unset($institution_id_send[$key]);
             }
         }
         $this->session->set_userdata('list_send',$institution_id_send);
    }
    public function set_session_group($set_session = '')
    {    
         if($this->session->userdata('item_select2'))
         {  
            $item_select_push  = $this->input->post('item_select');
            $item_select = $this->session->userdata('item_select2');
            foreach ($item_select as $key1 => $value1) {
                foreach ($item_select_push as $key2 => $value2) {
                    if($value1  == $value2)
                    {
                        unset($item_select_push[$key2]);
                    }
                }
            }
            $this->session->set_userdata('item_select2',array_merge($item_select,$item_select_push));
         }
         else
         { 
             $item_select  = $this->input->post('item_select');
             $this->session->set_userdata('item_select2',$item_select);
         }

         redirect('bookSend/bookSend/add_group/'.$set_session,'refresh');
         
    }
    public function del_item_group($item = '')
    {
        $id    =  $_GET['item'];
        $id_re =  $_GET['id_re'];
        $institution_id_send = $this->session->userdata('item_select2');
        foreach ($institution_id_send as $key => $value) {
             if($value ==  $id )
             {
                unset($institution_id_send[$key]);
             }
         }
         $this->session->set_userdata('item_select2',$institution_id_send);
         $institution_id_send = $this->session->userdata('item_select2');

         redirect('bookSend/bookSend/add_group/'.$id_re,'refresh');
    }
    public function create_group()
    {  
        $group_send_id  = $this->input->post('group_name');
        $id_re = $this->input->post('hide_re');
        $institution_id_send = $this->session->userdata('item_select2');   

        if($group_send_id == 0)
        {
            $this->session->set_flashdata('create_group_not', 'error');
            redirect('bookSend/bookSend/add_group/'.$id_re,'refresh');
        }
        else
        {
            foreach ($institution_id_send as $row) {
                    $data_id = explode(',', $row);
                    $this->db->set('id', '');
                    $this->db->set('group_send_id',$group_send_id);
                    $this->db->set('institution_id', $data_id[0]);
                    $this->db->set('institution_level',  $data_id[1]);
                    $this->db->set('cdate', 'NOW()', FALSE);
                    $this->db->set('udate', 'NOW()', FALSE);
                    $this->db->set('active', 1);
                    $this->db->insert('group_send_detail');
                }
            //update status group
            $this->db->set('active', 0);
            $this->db->where('id',$group_send_id);
            $this->db->update('group_send');

            $this->session->set_flashdata('create_group_com', 'error');
            $this->session->set_userdata('item_select2','');
            redirect('bookSend/bookSend/add_group/'.$id_re,'refresh');
        }
        
    }
    public function clear_ses()
    {
        $this->session->set_userdata('item_select','');
    }
}
