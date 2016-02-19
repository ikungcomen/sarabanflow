
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class clear_data extends CI_Controller {

    public function clear_data()
    { 
    	$this->load->model('m_sending');
    	$this->m_sending->clear_data();
    	echo "ok";
    }
    
}
