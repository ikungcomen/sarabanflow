<!DOCTYPE html>
<html lang="en">
<head>
	<base href = "<?php echo base_url();?>"/>

	<meta charset="utf-8">
	<title>ผู้ดูแลระบบ</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="assets/mycss/mycss.css">
  <link rel="stylesheet" href="assets/css/mystyle.css">
  <!--datatable-->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.3/css/jquery.dataTables.min.css">
  <script src="assets/myjs/jquery-1.10.2.js"></script>
  <script src="assets/jvalidate/dist/jquery.validate.min.js"></script>

  <!--validator-->
  <script src="assets/validator/admin/admin_valid.js"></script>
  <script src="assets/validator/prefixname.js"></script>
  <script src="assets/validator/objective.js"></script>
  <script src="assets/validator/document_send_or_recieve.js"></script>
  <script src="assets/validator/document_category.js"></script>
  <script src="assets/validator/document_icon.js"></script>
  <script src="assets/validator/layer_secret.js"></script>
  <script src="assets/validator/layer_priority.js"></script>
  <script src="assets/validator/document_type.js"></script>
  <script src="assets/validator/admin/edit_admin_system.js"></script>
  <script src="assets/validator/modal_create_number/modal1.js"></script>
   <script src="assets/validator/department/modal_create_department1.js"></script>
  <script src="assets/validator/model_province/mymodal_province.js"></script>
  <!--show dialog-->
  <script src="assets/myjs/showdialog.js"></script>
  <!-- normal user -->
  
    
 
</head>
<body style = " font-family: 'leelawadee', sans-serif;">
	 <div class="well headers">
       <h2><b>สำหรับผู้ดูแลระบบ</b></h2>
       <h4 style = "color:green;"><?php echo $this->fullname; ?></h4>
     </div>
	<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <a href = "#"> <img src = "assets/img/ic_home_black_48dp.png"> </a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
        <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url();?> " target = "_blank">หน้าแรกเว็บไซต์</a></li>
    		<li class="dropdown mega-dropdown active">
			    <a href="#" class="dropdown-toggle" data-toggle="dropdown">หน้าผู้ดูแลระบบ <span class="caret"></span></a>				
				<div class="dropdown-menu mega-dropdown-menu">
                    <div class="container-fluid">
    				    <!-- Tab panes -->
                        <div class="tab-content">
                          <div class="tab-pane active" id="men">
                            <ul class="nav-list list-inline">
                                <li><a href="index.php/welcome/allReport"><img src="assets/img/Treetog-I-Documents.ico" width = "80px">&nbsp;<span>ทะเบียนรวม</span></a></li>
                                <li><a href="#"><img src="assets/img/Custom-Icon-Design-Pretty-Office-9-Email-receive.ico" width = "80px">&nbsp;<span>ทะเบียนรับเอกสาร</span></a></li>
                                <li><a href="#"><img src="assets/img/Custom-Icon-Design-Pretty-Office-9-Email-send.ico" width = "80px">&nbsp;<span>ทะเบียนส่งเอกสาร</span></a></li>
                                <li><a href="index.php/manageuser"><img src="assets/img/Aha-Soft-Free-Large-Boss-Admin.ico" width = "80px">&nbsp;<span>จัดการผู้ดูแลระบบ</span></a></li>
                                <li><a href="index.php/main_data"><img src="assets/img/Double-J-Design-Ravenna-3d-Database-Active.ico" width = "80px">&nbsp;<span>ข้อมูลพื้นฐาน</span></a></li>
                            </ul>
                          </div>
                         <!--
                          <div class="tab-pane" id="women">
                            <ul class="nav-list list-inline">
                                <li><a href="#"><img src="http://content.nike.com/content/dam/one-nike/globalAssets/menu_header_images/OneNike_Global_Nav_Icons_Running.png"><span>Running</span></a></li>
                                <li><a href="#"><img src="http://content.nike.com/content/dam/one-nike/globalAssets/menu_header_images/OneNike_Global_Nav_Icons_Basketball.png"><span>Basketball</span></a></li>
                                <li><a href="#"><img src="http://content.nike.com/content/dam/one-nike/globalAssets/menu_header_images/OneNike_Global_Nav_Icons_Football.png"><span>Football</span></a></li>
                                <li><a href="#"><img src="http://content.nike.com/content/dam/one-nike/globalAssets/menu_header_images/OneNike_Global_Nav_Icons_Soccer.png"><span>Soccer</span></a></li>                                
                            </ul>
                          </div>
                          <div class="tab-pane" id="kids">
                            <ul class="nav-list list-inline">
                                <li><a href="#"><img src="http://content.nike.com/content/dam/one-nike/globalAssets/menu_header_images/OneNike_Global_Nav_Icons_Running.png"><span>Running</span></a></li>
                                <li><a href="#"><img src="http://content.nike.com/content/dam/one-nike/globalAssets/menu_header_images/OneNike_Global_Nav_Icons_Basketball.png"><span>Basketball</span></a></li>
                                <li><a href="#"><img src="http://content.nike.com/content/dam/one-nike/globalAssets/menu_header_images/OneNike_Global_Nav_Icons_Football.png"><span>Football</span></a></li>
                                <li><a href="#"><img src="http://content.nike.com/content/dam/one-nike/globalAssets/menu_header_images/OneNike_Global_Nav_Icons_Soccer.png"><span>Soccer</span></a></li>
                                <li><a href="#"><img src="http://content.nike.com/content/dam/one-nike/globalAssets/menu_header_images/OneNike_Global_Nav_Icons_MensTraining.png"><span>Men's Training</span></a></li>
                                <li><a href="#"><img src="http://content.nike.com/content/dam/one-nike/globalAssets/menu_header_images/OneNike_Global_Nav_Icons_WomensTraining.png"><span>Women's Training</span></a></li>
                            </ul>
                          </div>
                          <div class="tab-pane" id="sports">
                            <ul class="nav-list list-inline">                                
                                <li><a href="#"><img src="http://content.nike.com/content/dam/one-nike/globalAssets/menu_header_images/OneNike_Global_Nav_Icons_Basketball.png"><span>Basketball</span></a></li>
                                <li><a href="#"><img src="http://content.nike.com/content/dam/one-nike/globalAssets/menu_header_images/OneNike_Global_Nav_Icons_Football.png"><span>Football</span></a></li>
                                <li><a href="#"><img src="http://content.nike.com/content/dam/one-nike/globalAssets/menu_header_images/OneNike_Global_Nav_Icons_Soccer.png"><span>Soccer</span></a></li>
                                <li><a href="#"><img src="http://content.nike.com/content/dam/one-nike/globalAssets/menu_header_images/OneNike_Global_Nav_Icons_MensTraining.png"><span>Men's Training</span></a></li>
                                <li><a href="#"><img src="http://content.nike.com/content/dam/one-nike/globalAssets/menu_header_images/OneNike_Global_Nav_Icons_WomensTraining.png"><span>Women's Training</span></a></li>
                            </ul>
                          </div>
                      -->
                        </div>
                    </div>
                    
                    <!-- Nav tabs -->
                    <!--
                    <ul class="nav nav-tabs" role="tablist">
                       <li class="active"><a href="#men" role="tab" data-toggle="tab">Men</a></li>
                       <li><a href="#women" role="tab" data-toggle="tab">Women</a></li>
                       <li><a href="#kids" role="tab" data-toggle="tab">Kids</a></li>
                       <li><a href="#sports" role="tab" data-toggle="tab">Sports</a></li>
                    </ul>  
                    -->                  
				</div>				
			</li>
        </ul>
        <!--
        <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
        -->
        
        <ul class="nav navbar-nav navbar-right">
        	<!--
            <li><a href="#">Link</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li>
            -->
            <li><a href="<?php echo base_url(); ?>index.php/auth_login/logout">ออกจากระบบ</a></li>
        </ul>
    	
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
