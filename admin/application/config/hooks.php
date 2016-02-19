<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['post_controller_constructor'] = array(
                                    'class'    => 'myhook', //ชื่อคลาสที่เรียกใช้งาน
                                    'function' => 'check_login', //ชื่อฟังก์ชั่นที่เรียกใช้งาน
                                    'filename' => 'myhook.php', //ชื่อไฟล์ที่เราสร้างคลาส
                                    'filepath' => 'hooks'//ชื่อโฟลเดอร์ที่เก็บไฟล์ไว้
                                    //'params'   => array('beer', 'wine', 'snacks') //พารามิเตอร์ ถ้าไม่มีก็ไม่ต้องกำหนดและปิดไว้ไม่ใช้งาน
                                );


/* End of file hooks.php */
/* Location: ./application/config/hooks.php */