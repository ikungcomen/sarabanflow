
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/nm_saraban_lib.php';
class sending_dep extends nm_saraban_lib {

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_sending_dep');
    }
    public function getContact($registration_receive_document_id = '')
    {

        $data['result'] = $this->m_sending_dep->getContact($registration_receive_document_id);
        $data['registration_receive_document_id'] = $registration_receive_document_id ;
        $this->load->view('sending/list_return',$data); 
    }
    public function sendToDep()
    {
        $id_receive       = $this->input->post('id_receive');
        $id_create_number = $this->input->post('id_create_number');
        $item_dep         = $this->input->post('item_dep');

        if($item_dep > 0)
        {
            foreach ($item_dep as $key => $row) {
                $this->db->set('registration_receive_document_id', $id_receive);
                $this->db->set('registration_create_number_id', $id_create_number);
                $this->db->set('department_of_instutition_id', $row);
                $this->db->set('cdate', 'NOW()', FALSE);
                $this->db->set('udate', 'NOW()', FALSE);
                $this->db->insert('receive_document_department');
            }

            $this->db->set('status_sender_to_department',1);
            $this->db->where('id',$id_receive );
            $this->db->update('registration_receive_document');

            $this->session->set_flashdata('sendToDep_success', 'Value');
            redirect('recieptBook/recieptBook/index'  , 'refresh' );
        }
        else
        {   
            $this->session->set_flashdata('sendToDep_false', 'Value');
            redirect('detailReceiveOutsite/detailReceiveOutsite/Send_To/'.$id_receive.'/'.$id_create_number  , 'refresh' );
        }
            
        
    }   

}
