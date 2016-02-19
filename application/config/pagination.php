<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Pagination Config
 * 
 * Just applying codeigniter's standard pagination config with twitter 
 * bootstrap stylings
 * 
 * @license		http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @author		Mike Funk
 * @link		http://codeigniter.com/user_guide/libraries/pagination.html
 * @email		mike@mikefunk.com
 * 
 * @file		pagination.php
 * @version		1.3.1
 * @date		03/12/2012
 * 
 * Copyright (c) 2011
 */
 
// --------------------------------------------------------------------------
    
    $config['num_links'] = 7;
    
    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] ="</ul>";

    $config['first_link'] = '« First';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';

    $config['last_link'] = 'Last »';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';

    $config['next_link'] = 'Next →';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';

    $config['prev_link'] = '← Previous';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='javascript:void(0)'>";
    $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";

    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';

// --------------------------------------------------------------------------

/* End of file pagination.php */
/* Location: ./bookymark/application/config/pagination.php */