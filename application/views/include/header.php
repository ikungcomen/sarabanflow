<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>ระบบงานสารบรรณอิเล็กทรอนิกส์ Saraban Flow</title>
        <base href = "<?php echo base_url(); ?>"/>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="assets/mycss/jquery_ui.css">
        <link rel="stylesheet" href="assets/mycss/mycss.css">
        <link rel="stylesheet" href="assets/mycss/formsearch.css">
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>-->
        <script src="assets/js/bootstrap2.min.js"></script>
        <!--datatable-->
        <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
        <script src="assets/myjs/jquery-1.10.2.js"></script>
        <script src="assets/js/jquery-1.8.js"></script>
        <script src="assets/js/jquery.ui.timepicker.js"></script>
        <!--<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>-->
        <script src="assets/js/jquery-ui.js"></script>
        <script src="assets/jvalidate/dist/jquery.validate.min.js"></script>
        
        <!--inputfile by ikung-->
        <link href="assets/css/fileinput.min.css"   rel="stylesheet">
        <link href="assets/css/jquery.ui.timepicker.css"   rel="stylesheet">
        <link href="assets/css/fileinput.css"   rel="stylesheet">
        <script src="assets/js/fileinput.js"></script>
        <script src="assets/js/fileinpue.min.js"></script>

        <script>
            $(function() {
             $( document ).tooltip();
             $('#implementation_time').timepicker();
            });
        </script>
        <style>
            .btn-xs
            {
                margin-top: 10px!important;
            }
            th{
                background-color: #3e8f3e!important;
                color: white!important;
                border-style: solid!important;
                border-width: 1px!important;
                border-color: #CCCCCC!important;
            }
            li.active > a
            {
                background-color: green!important;
                color: white!important;
            }
             li > a
            {
                color: black!important;
            }
            table.mytd td{
                border-style: solid!important;
                border-width: 1px!important;
                border-color: #CCCCCC!important;
            }
            th
            {
                text-align: center;
            }
            .container{
                width:90%
            }
        </style>
        
        <script>
            $(function() {
                $("#datepicker-en").datepicker({dateFormat: 'dd/mm/yy'});
                var d = new Date();
                var toDay = d.getDate() + '-' + (d.getMonth() + 1) + '-' + d.getFullYear();
                $("#datepicker,#datepicker2,#dated_send,#startDate,#endDate,#implementation_date,#receive_date,#start_date,#end_date").datepicker({changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
                    dayNamesMin: ['อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.'],
                    monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
                    monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.']
                });
                
                //$('#implementation_time').timepicker({ 'timeFormat': 'H:i:s' });
                //$('#implementation_time').datepicker({ dateFormat: 'HH:ii:ss' }).val();
            });
        </script>
        <script>
            $(document).ready(function(){
                $(".backhear").click(function(){
                    parent.history.back();
                    return false;
                });
            });
        </script>
    </head>
    <body style = " font-family: 'leelawadee', sans-serif; bgcolor:red!important;">
                <?php //echo $this->session->userdata('re_page');?>
        <div>
            <table width = "100%" border = "0" id = "header" class="<?php echo ($this->session->userdata('data_instutition_main'))? "central_registration":"" ?>">
                <tr>
                    <td > <h3 id = "my_header" ><b>ระบบสารบัญอิเล็กทรอนิกส์ จังหวัด<?php echo $this->province_name; ?></b></h3></td>
                </tr>
                <tr>
                    <td><font size = "4" id = "my_header" >ท่านกำลังใช้งานระบบ :   </font>
                        <?php 
                        $check_data_instutition_main = $this->session->userdata('data_instutition_main');
                        //var_dump($check_data_instutition_main);
                        if(!$check_data_instutition_main){
                        ?>
                            <font size = "2">
                                <b><?php echo $this->institution_name; ?> , <?php echo $this->institution_detail; ?>
                                <?php 
                                if($this->level_institution == "institution_province"){
                                    echo "--- ( เป็นหน่วยงานระดับจังหวัด )";
                                }else if($this->level_institution == "institution_amphur"){
                                    echo "--- ( เป็นหน่วยงานระดับอำเภอ )";
                                }else if($this->level_institution == "institution_district"){
                                    echo "--- ( เป็นหน่วยงานระดับตำบล )";
                                }else{
                                    echo "Error System";
                                }
                                ?>
                                </b>
                            </font>
                        <?php }else{ ?>
                            <font size = "2">
                                <b><?php echo $check_data_instutition_main['instutition_main_name']; ?> , <?php echo $check_data_instutition_main['instutition_main_detail']; ?>
                                <?php 
                                if($this->instutition_main_level == "institution_province"){
                                    echo "--- ( เป็นหน่วยงานระดับจังหวัด )";
                                }else if($this->instutition_main_level == "institution_amphur"){
                                    echo "--- ( เป็นหน่วยงานระดับอำเภอ )";
                                }else if($this->instutition_main_level == "institution_district"){
                                    echo "--- ( เป็นหน่วยงานระดับตำบล )";
                                }else{
                                    echo "Error System";
                                }
                                ?>
                                </b>
                            </font>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td><font size = "4" id = "my_header"  >ชื่อผู้ใช้งาน :   </font><font size = "2"><b><?php echo $this->fullname; ?></font></td>
                </tr>
                <tr>
                    <td><font size = "4" id = "my_header"  >ตำแหน่ง :   </font><font size = "2"><b>
                        <?php 
                        if($this->designation == "central_administration"){
                            echo "ธุรการกลาง";
                        }else if($this->designation == "governor"){
                            echo "ผู้ว่าราชการจังหวัด";
                        }else if($this->designation == "employees"){
                            echo "พนักงานราชการ";
                        }else if($this->designation == "prefect"){
                            echo "นายอำเภอ";
                        }else{
                            echo "Error Designation";
                        }
                        
                        ?>
                    </font></td>
                </tr>
                <tr>
                    <td><font size = "4" id = "my_header"  >สังกัดแผนก :   </font><font size = "2"><b><?php echo $this->department_name.'('.$this->department_number.')'; ?></font></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr >
                    <td style = "padding-left:20px;">
                        <a href = "index.php/welcome/" class="btn btn-primary btn-cons"><span class="glyphicon glyphicon-home" aria-hidden="true">&nbsp;หน้าหลัก</span></a>
                        <a href = "index.php/searchreport/searchreport" class="btn btn-primary btn-cons"><span class="glyphicon glyphicon-search" aria-hidden="true">&nbsp;ค้นหาเอกสาร</span></a>
                        <a href = "index.php/report/book_receive" class="btn btn-primary btn-cons"><span class="glyphicon glyphicon-print" aria-hidden="true">&nbsp;พิมพ์รายงาน</span></a>
                        <a href = "index.php/auth_login/logout" class="btn btn-primary btn-cons"><span class="glyphicon glyphicon-off" aria-hidden="true">&nbsp;ออกจากระบบ</span></a>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </div>
        
        <style>
            .central_registration{
                background-color: #254117 !important;
                background-image: none !important;
            }
            <?php if($this->session->userdata('data_instutition_main')){ ?>
                body{
                    background-color: #BDFCBD!important;
                }
            <?php } ?>
        </style>
        