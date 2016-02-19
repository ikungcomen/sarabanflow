<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ( ! function_exists('upload_files'))
{
    
    function upload_files($files, $upload_path)
    {
        $CI =& get_instance();
        
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, TRUE);
        }
        //$config['file_name'] = $_SERVER['REQUEST_TIME'];
        $config = array(
            'upload_path'   => $upload_path, //--  './uploads/restaurant'
            'allowed_types' => 'gif|jpg|png|jpeg|pdf|doc|xml|docx|xlsx|xls',
            'overwrite'     => FALSE,
            'max_size'	=> '10000',
            'max_width' => '2048',
            'max_height' => '2048'
        );
        $CI->load->library('upload', $config);

        $images = array();

        foreach ($files['name'] as $key => $image) {
            $_FILES['images[]']['name']= $files['name'][$key];
            $_FILES['images[]']['type']= $files['type'][$key];
            $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['images[]']['error']= $files['error'][$key];
            $_FILES['images[]']['size']= $files['size'][$key];
            
            $fileName = $_SERVER["REQUEST_TIME"].'_'. base64_encode($image);

            //$images[] = $fileName;

            $config['file_name'] = $fileName;

            $CI->upload->initialize($config);

            if ($CI->upload->do_upload('images[]')) {
                $upload_data = $CI->upload->data();
                $images[] = $upload_data['file_name'];
                //$this->m_restaurant->saveImageUpload($name_image, $restaurant_id);
            } else {
                //return false; 
                var_dump($CI->upload->display_errors());
                 exit;
            }
        }
        
        return $images;
    }

}

if ( ! function_exists('get_name_instutition'))
{
    function get_name_instutition($instutition_id, $instutition_level){
        $CI =& get_instance();
        
        $CI->load->model('m_helper');
        $result = $CI->m_helper->get_name_instutition($instutition_id, $instutition_level);
        
        return $result[0][$instutition_level.'_name'];
    }
}

if ( ! function_exists('get_number_of_instutition'))
{
    function get_number_of_instutition($instutition_id, $instutition_level){
        $CI =& get_instance();
        
        $CI->load->model('m_helper');
        $result = $CI->m_helper->get_number_of_instutition($instutition_id, $instutition_level);
        
        return $result[0]['instutition_number'];
    }
}