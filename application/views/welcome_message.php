<hr/>
<div style = "margin-left:15px; margin-right:15px">

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary myprimary">
                <div class="panel-heading mysendheadaer">
                    <font size = "5"><b>ช่องสำหรับลงรับเอกสาร</b></font>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                <?php
                    $check_data_instutition_main = $this->session->userdata('data_instutition_main');
                    if($check_data_instutition_main){
                        $id    = $this->instutition_main_id;
                        $level = $this->instutition_main_level;
                        $sql = " 
                            select * from registration_send_document_outside a
                            left join registration_create_number b  on a.registration_create_number_id = b.id
                            left join registration_create_number_of_run d on b.id = d.registration_create_number_id
                            left join department_of_instutition e on b.department_of_instutition_id = e.id
                            where a.institution_id_for_send = $id 
                            and a.institution_level_for_send = '$level'
                            and a.status_receive = 'no'
                            and a.status_return_document = 'no'
                        ";
                        $result = $this->db->query($sql);
                        $result = $result->result_array();
                        $count_data = count($result);
                    }else{
                        $id    = $this->level_institution_id;
                        $level = $this->level_institution;
                        $sql = " 
                            select * from registration_send_document_outside a
                            left join registration_create_number b  on a.registration_create_number_id = b.id
                            left join registration_create_number_of_run d on b.id = d.registration_create_number_id
                            left join department_of_instutition e on b.department_of_instutition_id = e.id
                            where a.institution_id_for_send = $id 
                            and a.institution_level_for_send = '$level'
                            and a.status_receive = 'no'
                            and a.status_return_document = 'no'
                        ";
                        $result = $this->db->query($sql);
                        $result = $result->result_array();
                        $count_data = count($result);
                    }
                    

                    $sql = "
                        select * from registration_create_number a
                        left join registration_send_document_outside b on a.id = b.registration_create_number_id
                        where a.level_institution_id = $id
                        and a.level_institution    = '$level'
                        and b.status_return_document = 'yes'
                        and b.active = 1
                    ";
                    $result = $this->db->query($sql);
                    $result = $result->result_array();
                    $count_data_2 = count($result);
                ?>
                    <?php if($this->designation != "employees"){ ?>
                        <img src = "assets/img/icon02.jpg" width = "40px">&nbsp;&nbsp;<a href = "index.php/receiveDocumentOnline/receiveDocumentOnline" style = "color:#428bca!important;"><font size = "4.5" ><b>ลงรับเอกสารจากตะกร้าระบบ online</b></font></a>&nbsp;&nbsp;&nbsp;<b>( จำนวน <?php echo  $count_data; ?> ฉบับ )</b><hr/>
                    <?php }else{ 
                        $this->db->select('*');
                        $this->db->from('receive_document_department');

                        $this->db->where('department_of_instutition_id', $this->department_of_instutition_id);
                        $this->db->where('status_receive', 'no');
                        $this->db->where('status_return_document', 'no');

                        $this->db->where('active', 1);
                        
                        $query = $this->db->get();
                        $temp = $query->result_array();
                    ?>
                        <img src = "assets/img/icon02.jpg" width = "40px">&nbsp;&nbsp;<a href = "index.php/receiveDocumentOnline/receiveDocumentOnline/receiveDocumentOnlineForDepartment" style = "color:#428bca!important;"><font size = "4.5" ><b>ลงรับเอกสารจากตะกร้าระบบ online</b></font></a>&nbsp;&nbsp;&nbsp;<b>( จำนวน <?php echo  count($temp); ?> ฉบับ )</b><hr/>
                    <?php } ?>
                        
                    <?php if($this->designation != "employees"){ ?>
                        <img src = "assets/img/icon03.jpg" width = "40px">&nbsp;&nbsp;<a href = "index.php/receiveDocumentOrther/receiveDocumentOrther" style = "color:#428bca!important;"><font size = "4.5" ><b>ลงรับเอกสารจากระบบอื่น(จดหมาย,แฟกซ์,อีเมลล์,อื่น)</b></font></a><hr/>
                    <?php }else{ ?>
                        <img src = "assets/img/icon03.jpg" width = "40px">&nbsp;&nbsp;<a style = "color:#428bca!important;"><font size = "4.5" ><b>ลงรับเอกสารจากระบบอื่น(จดหมาย,แฟกซ์,อีเมลล์,อื่น)(เฉพราะธุรการกลางเท่านั้น)</b></font></a><hr/>
                    <?php } ?>  
                        
                    <?php $check_data_instutition_main = $this->session->userdata('data_instutition_main');
                        if(!$check_data_instutition_main)
                        {?>      
                         <img src = "assets/img/icon04.jpg" width = "40px">&nbsp;&nbsp;<a href = "index.php/reportReturn/reportReturn/return_detail" style = "color:#428bca!important;"><font size = "4.5" ><b>เอกสารตีกลับ</b></font></a>&nbsp;&nbsp;&nbsp;<b>( จำนวน <?php echo  $count_data_2; ?> ฉบับ )</b>
                        <?php }else{?>
                        <img src = "assets/img/icon04.jpg" width = "40px">&nbsp;&nbsp;<a title = 'ใช้ได้เฉพาะหน่วยงานตัวเองเท่านั้น' href = "javascript:void(0)" style = "color:#cccccc!important;"><font size = "4.5" ><b>เอกสารตีกลับ</b></font></a>&nbsp;&nbsp;&nbsp;<span style = 'color:red'>ใช้ได้เฉพาะหน่วยงานตัวเองเท่านั้น</span>
                        <?php }?>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-success mysuccess">
                <div class="panel-heading">
                    <font size = "5" ><b>ช่องประวัติสมุดทะเบียน</b></font>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                    <?php if($this->designation != "employees"){ ?>
                        <img src = "assets/img/icon01.jpg" width = "40px">&nbsp;&nbsp;<a href = "index.php/recieptBook/recieptBook/index" style = "color:#3c763d!important;"><font size = "4.5" ><b>สมุดทะเบียนรับ</b></font></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php }else{ ?>
                        <img src = "assets/img/icon01.jpg" width = "40px">&nbsp;&nbsp;<a href = "index.php/recieptBook/recieptBook/recieptBookForDepartment" style = "color:#3c763d!important;"><font size = "4.5" ><b>สมุดทะเบียนรับ</b></font></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php } ?>  
                    <hr/>
                     <img src = "assets/img/send_ico.ico" width = "40px">&nbsp;&nbsp;<a  style = "color:#3c763d!important;"><font size = "4.5" ><b>สมุดทะเบียนส่ง</b></font></a>
                       <div class = 'mysend_form'> 
                        <div class = "row">
                            <div class="col-md-5" style="padding-left:0px!important;padding-right:0px!important">
                                <img src = "assets/img/icon07.jpg" width = "30px">&nbsp;&nbsp;<a id = "set_link" href = "index.php/bookSend/bookSend/index" style = "color:#3c763d!important;"><font size = "3" ><b>สมุดทะเบียนส่ง(ปกติ)</b></font></a>
                            </div>
                             <div class="col-md-5" style="padding-left:0px!important;padding-right:0px!important">
                                <img src = "assets/img/icon07.jpg" width = "30px">&nbsp;&nbsp;<a id = "set_link" href = "index.php/bookCircular/bookCircular/index" style = "color:#3c763d!important;"><font size = "3" ><b>ทะเบียนหนังสือเวียน</b></font></a>
                            </div>
                            </div>
                              <div class = "row">
                             <div class="col-md-5" style="padding-left:0px!important;padding-right:0px!important">
                                <img src = "assets/img/icon07.jpg" width = "30px">&nbsp;&nbsp;<a id = "set_link" href = "index.php/bookCommand/bookCommand/index" style = "color:#3c763d!important;"><font size = "3" ><b>ทะเบียนคำสั่ง</b></font></a>
                            </div>
                             <div class="col-md-5" style="padding-left:0px!important;padding-right:0px!important">
                                <img src = "assets/img/icon07.jpg" width = "30px">&nbsp;&nbsp;<a id = "set_link" href = "index.php/datdReciept/datdReciept/index" style = "color:#3c763d!important;"><font size = "3" ><b>ทะเบียนวิทยุ</b></font></a>
                            </div>
                         </div>
                     </div>
                     <style>
                        .mysend_form
                        {  
                            margin: 10px;
                            background-color: white;
                            padding-left: 50px;
                        }
                        .panel-success>.panel-heading{
                            color: #3c763d !important;
                            background-color: red!important;
                        }
                        .success
                        {    
                             background-color: red!important;
                        }
                     </style>
                        
                        </div>
                       <div>
                   <!-- <img src = "assets/img/icon01.jpg" width = "40px">&nbsp;&nbsp;<a href = "index.php/datdReciept/datdReciept" style = "color:#3c763d!important;"><font size = "4.5" ><b>สมุดทะเบียนส่งวิทยุ</b></font></a>-->
                </div>
                <script type="text/javascript">
                    $(document).ready(function(){
                         $("#registration_type").change(function(){
                            //alert($(this).val());
                            $("#set_link").attr('href',$(this).val())
                         });
                    });
                </script>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-danger mydanger">
                <div class="panel-heading">
                    <font size = "5"><b>ช่องสำหรับออกเลขทะเบียนส่ง</b></font>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                    <img src = "assets/img/icon08.jpg" width = "40px">&nbsp;&nbsp;<a href = "index.php/dataExport/dataExport" style = "color:#a94442!important;"><font size = "4.5" ><b>ออกเลขทะเบียนส่ง</b></font></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <!--
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src = "assets/img/icon08.jpg" width = "40px">&nbsp;&nbsp;<a href = "" style = "color:#a94442!important;"><font size = "4.5" ><b>ออกเลขทะเบียนวิทยุ วิทยุที่</b></font></a><hr/>
                    <img src = "assets/img/icon08.jpg" width = "40px">&nbsp;&nbsp;<a href = "" style = "color:#a94442!important;"><font size = "4.5" ><b>ออกเลขทะเบียนหนังสือเวียน ว.3</b></font></a><hr/>
                    <img src = "assets/img/icon08.jpg" width = "40px">&nbsp;&nbsp;<a href = "" style = "color:#a94442!important;"><font size = "4.5" ><b>ออกเลขทะเบียนคำสั่ง คำสั่งที่</b></font></a>
                    -->
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-warning mywarning">
                <div class="panel-heading">
                    <font size = "5"><b>ช่วยเหลือ</b></font>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                    <img src = "assets/img/icon05.jpg" width = "40px">&nbsp;&nbsp;<a href = "#" style = "color:#8a6d3b!important;"><font size = "4.5" ><b>ดาวน์โหลดคู่มือ</b></font></a>&nbsp;&nbsp;
                    <?php if($this->session->userdata('data_instutition_main')){ ?>
                    <a href = "index.php/central_registration/logout" class = "btn btn-danger btn-lg">ออกจากระบบทะเบียนกลาง</a><hr/>
                    <?php }else{ echo "<hr/>"; } ?>
                    <img src = "assets/img/icon06.jpg" width = "40px">&nbsp;&nbsp;<a id="download"  target="_blank" href="https://www.dropbox.com/s/xdqxlr200vnsw7z/Nitro.rar?dl=0" style = "color:#8a6d3b!important;"><font size = "4.5" ><b>ดาวน์โหลดโปรแกรม</b></font></a>&nbsp;&nbsp;
                    <?php if(!$this->session->userdata('data_instutition_main') && $this->designation == "central_administration" && $this->active_center == 0){ ?>
                    <?php if($this->instutition_main_id != 0){ ?>
                    <a href = "index.php/central_registration" class = "btn btn-primary btn-lg">เข้าระบบทะเบียนกลาง</a><hr/>
                    <?php }else{ echo "<label style='color:red;'>(หน่วยงานนี้ทำหน้าที่เป็นทะเบียนกลาง)</label><hr/>"; } ?>
                    <?php }else{ echo "<hr/>"; } ?>
                    <img src = "assets/img/icon09.jpg" width = "40px">&nbsp;&nbsp;<a href = "index.php/changePassword/changePassword" style = "color:#8a6d3b!important;"><font size = "4.5" ><b>เปลี่ยนรหัสผ่าน</b></font></a>
                </div>
            </div>
        </div>
    </div>

</div>
<style>
    .row{
/*        margin-top:40px;
        padding: 0 10px;*/
    }

    .clickable{
        cursor: pointer;   
    }

    .panel-heading span {
        margin-top: 5px;
        font-size: 15px;
    }
</style>
<script>
    $(document).on('click', '.panel-heading span.clickable', function(e) {
        var $this = $(this);
        if (!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
        }
    });
    $(document).ready(function(){
       // $("#download").click(function(){
            //var nameDownload = "NitroPDFProfessional7";
            //var url = "index.php/download/download";
           /// $.post(url, {'nameDownload':nameDownload}, function(data) {
               
           // });
        //});
    });
</script>