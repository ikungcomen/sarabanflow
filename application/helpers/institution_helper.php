<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of institution_helper
 *
 * @author chaowalit
 */
if ( ! function_exists('getFileExtension'))
{
    
    function getFileExtension($img_name = '')
    { 
        $temp_img = array();
        if($img_name != "")
        {
            $temp_img = explode('.', $img_name);
            if($temp_img[1] == 'docx' || $temp_img[1] == 'doc')
            {
                $img_tag = "<img src = 'assets/file/doc.gif' alt = 'docx'/>";
            }
            else if($temp_img[1] == 'pdf')
            {
                 $img_tag = "<img src = 'assets/file/pdf.gif' alt = 'gif'/>";
            }
            else if($temp_img[1] == 'xlsx' ||  $temp_img[1] == 'xls')
            {
                 $img_tag = "<img src = 'assets/file/xls.gif' alt = 'xlsx'/>";
            }
            else if($temp_img[1] == 'jpg' || $temp_img[1] == 'jpeg')
            {
                 $img_tag = "<img src = 'assets/file/jpg.gif' alt = 'jpeg'/>";
            }
            else if($temp_img[1] == 'png' )
            {
                 $img_tag = "<img src = 'assets/file/jpg.gif' alt = 'png'/>";
            }
            else if($temp_img[1] == 'gif' )
            {
                 $img_tag = "<img src = 'assets/file/gif.gif'  alt = 'gif'/>";
            }
            else
            {
                $img_tag = "<img src = 'assets/file/other.jpg' alt = 'other'/>";
            }
        }
        return $img_tag;
    }

}

if ( ! function_exists('getAllDataLayerPriority'))
{
    
    function getAllDataLayerPriority()
    {
        $CI =& get_instance();
        $CI->load->model('m_auth_login');	
        $layer_priority = $CI->m_auth_login->getAllDataLayerPriority();
        
        return $layer_priority;
    }

}

if ( ! function_exists('getAllDataLayerSecret'))
{
    
    function getAllDataLayerSecret()
    {
        $CI =& get_instance();
        $CI->load->model('m_auth_login');	
        $layer_secret = $CI->m_auth_login->getAllDataLayerSecret();
        
        return $layer_secret;
    }

}

if ( ! function_exists('getAllDataObjective'))
{
    
    function getAllDataObjective()
    {
        $CI =& get_instance();
        $CI->load->model('m_auth_login');	
        $objective = $CI->m_auth_login->getAllDataObjective();
        
        return $objective;
    }

}

if ( ! function_exists('getAllDataProvince'))
{
    
    function getAllDataProvince()
    {
        $CI =& get_instance();
        $CI->load->model('m_auth_login');	
        $province = $CI->m_auth_login->getAllDataProvince();
        
        return $province;
    }

}