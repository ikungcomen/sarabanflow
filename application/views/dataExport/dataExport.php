<?php $this->load->view('include/header'); ?>
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/js/select2.min.js"></script>

<div class="container">
    <div class="row">
        <div class="form-group col-lg-12">
            <div style = "width :100% ; background-color: #3e8f3e; padding-left :15px;color:#FFFFFF"><h3><img src = "assets/img/icon08.jpg" width = "40px" >&nbsp;&nbsp;<b>ออกเลขทะเบียนส่ง</b></h3></div>
        </div>
    </div>
    <?php 
    $error = $this->session->flashdata('error_result');
    if($error == "error-auto"){
    ?>
    <!-- <noscript> -->
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <span><strong>แจ้งเตือน: </strong> ไม่สามารถทำการบันทึกเลขทะเบียนแบบ Auto ได้ เนื่องจากระบบได้กำหนดให้รันเลขทะเบียนแบบ Manual </span>
    </div>
    <!-- </noscript> -->
    <?php }else if($error == "error-custom"){ ?>
    <!-- <noscript> -->
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <span><strong>แจ้งเตือน: </strong> ไม่สามารถทำการบันทึกเลขทะเบียนแบบ Manual ได้ เนื่องจากระบบได้กำหนดให้รันเลขทะเบียนแบบ Auto </span>
    </div>
    <!-- </noscript> -->
    
    <?php }else if($error == "limit-number"){ ?>
    <!-- <noscript> -->
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <span><strong>แจ้งเตือน: </strong>1. ไม่สามารถทำการบันทึกเลขทะเบียนแบบ Manual ได้ เนื่องจากหมายเลขที่กำหนดมาเกินขอบเขตที่ ผู้ดูแลระบบ ตั้งไว้ กรุณาติดต่อผู้ดูแลระบบ </span><br>
        <span><strong>แจ้งเตือน: </strong>2. ไม่สามารถทำการบันทึกเลขทะเบียนแบบ Manual ได้ เนื่องจากหมายเลขที่กำหนดอาจจะไปซ้ำกับเลขทะเบียนที่มีอยู่ในระบบแล้ว </span>
    </div>
    <!-- </noscript> -->
    <?php } ?>
    <form action="<?php echo base_url(); ?>index.php/dataExport/dataExport/registration_create" method="POST" id="form_registration_create">
    <div class="row">
        <div class="form-group col-lg-2 text-left">
            <a href="index.php/welcome" class="btn btn-danger backhear"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true">&nbsp;ย้อนกลับ</span></a>
            
        </div>
        <div class="form-group col-lg-4 text-left">
           <!--  <select name="registration_type" id="registration_type" class="form-control">
                <option value="">ออกเลขทะเบียนปกติ</option>
                <option value="(ว)">ออกเลขทะเบียนหนังสือเวียน ว.3</option>
                <option value="(คำสั่ง)">ออกเลขทะเบียนคำสั่ง</option>
                <option value="(วิทยุ)">ออกเลขทะเบียนวิทยุ</option>
            </select> -->
             <select name="registration_type" id="registration_type" class="form-control">
                <option value="">ออกเลขทะเบียนปกติ</option>
                <option value="ว">ออกเลขทะเบียนหนังสือเวียน</option>
                <option value="คำสั่ง">ออกเลขทะเบียนคำสั่ง</option>
                <option value="วิทยุ">ออกเลขทะเบียนวิทยุ</option>
            </select>
            <style> 
            #registration_type{
                background-color: white;
                box-shadow: 10px 10px 5px #888888;
                border-color: blue;
                border-width: 2px;
                font-weight: bold;
            }
            </style>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group col-md-2 text-right" style="padding-right:1px;padding-left: 1px;">
                <label id="show_document_no">เอกสารที่<font color="red"> **</font></label>
            </div>
            <div class="form-group col-md-4 " style="padding-right:1px;padding-left: 1px;">
                <?php if($this->designation == "governor" || $this->designation == "prefect"){
                    echo "<select id='registration_number' name='registration_number' class='js-example-basic-single form-control'>";
                    $level_institution_id = $this->level_institution_id;
                    $level_institution = $this->level_institution;
                    
                    $this->db->select('*');
                    $this->db->from('number_of_institution');
                    $this->db->where('instutition_main_id', $level_institution_id);
                    $this->db->where('instutition_main_level', $level_institution);
                    $this->db->where('active', 1);
                    $query = $this->db->get();
                    $data_number = $query->result_array();
                    echo "<option value=\"".$level_institution_id.','.$level_institution ."\" checked>".$this->instutition_number."</option>";
                    foreach($data_number as $row){
                ?>
                        <option value="<?php echo $row['instutition_id'].','.$row['instutition_level']; ?>" ><?php echo $row['instutition_number']; ?></option>
                <?php } ?>
                        
                <?php echo "</select>"; }else{ ?>
                <input id="registration_number" name="registration_number" type="text" value="<?php echo $this->instutition_number; ?>" class="form-control"  placeholder="" readonly="true">
                <?php } ?>
            </div>
            <div class="form-group col-md-2 " style="padding-right:1px;padding-left: 1px;">
                <select name="department_number" id="department_number" class="form-control">
                    <?php if($this->designation == "governor" || $this->designation == "prefect"){ ?>
                        <!-- กรณีที่เป็นตำแหน่ง ผู้ว่า นายอำเภอ จะออกเลขแทนผู้อื่นได้ -->
                    <?php }else{ ?>
                        <?php 
                            if($this->designation == "central_administration"){
                                foreach($department_of_instutition as $row){

                        ?>
                        <option value="<?php echo $row['id']; ?>" <?php echo ($this->department_of_instutition_id == $row['id'])? 'selected':"" ?> ><?php echo $row['department_id']; ?></option>
                        <?php } }else{ ?>
                        <option value="<?php echo $this->department_of_instutition_id; ?>"><?php echo $this->department_number; ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-md-1 text-center" style="padding-right:1px;padding-left: 1px;">
                <label id="show_type_send">/</label>
            </div>
            <div class="form-group col-md-3 " style="padding-right:1px;padding-left: 1px;">
                <input id="custom_registration_number" name="custom_registration_number" type="number" class="form-control" title="ออกเลขทะเบียน/กำหนดเอง" placeholder="ออกเลขทะเบียน/กำหนดเอง"  >
            </div>
        </div>
        <div class="form-group col-lg-2 text-right">
            <label>ชั้นความเร็ว</label>
        </div>
        <div class="form-group col-lg-4">
            <select name="layer_priority_id" id="layer_priority_id" class="form-control">
               <option value="1">ปกติ</option>
               <option value="2">ด่วน</option>
               <option value="3">ด่วนมาก</option>
               <option value="4">ด่วนที่สุด</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-2 text-right">
            <label>ลงวันที่</label>
        </div>
        <div class="form-group col-lg-4">
            <input type="text" class="form-control" id="dated_send" name="dated_send" value="<?php echo date("d-m-Y"); ?>">
        </div>
        <div class="form-group col-lg-2 text-right">
            <label>ชั้นความลับ</label>
        </div>
        <div class="form-group col-lg-4 text-right">
            <select name="layer_secret_id" id="layer_secret_id" class="form-control">
               <option value="1">ปกติ</option>
               <option value="2">ลับ</option>
               <option value="3">ลับมาก</option>
               <option value="4">ลับมากที่สุด</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-2 text-right">
            <label>จาก<font color="red"> **</font></label>
        </div>
        <div class="form-group col-lg-4">
            <input id="from_send" name="from_send" type="text" class="form-control"  value="" >
        </div>
        <div class="form-group col-lg-2 text-right">
            <label>วัตถุประสงค์</label>
        </div>
        <div class="form-group col-lg-4">
            <select class="form-control" name="objective_id" id="objective_id">
                
                <?php 
                $objective = getAllDataObjective();
               
                foreach($objective as $row){ 
                    ?>
                <option value="<?php echo $row->id; ?>"><?php echo $row->objective_name; ?></option>
                
                <?php } ?>
            </select>

        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-2 text-right">
            <label>เรื่อง<font color="red"> **</font></label>
        </div>
        <div class="form-group col-lg-4">
            <input id="subject" name="subject" type="text" class="form-control"  >
        </div>
        <div class="form-group col-lg-2 text-right">
            <label>วันที่ดำเนินการ</label>
        </div>
        <div class="form-group col-lg-4">
            <?php if($this->permission_level >= 2){ ?>
            <input type="text" class="form-control" id="implementation_date" name="implementation_date" value="<?php echo date("d-m-Y"); ?>" >
            <?php }else{ ?>
            <input type="text" class="form-control" id="" name="implementation_date" value="<?php echo date("d-m-Y"); ?>" readonly>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-2 text-right">
            <label>เรียน<font color="red"> **</font></label>
        </div>
        <div class="form-group col-lg-4">
            <input id="to_receive" name="to_receive" type="text" class="form-control"  >
        </div>
        <div class="form-group col-lg-2 text-right">
            <label>เวลาที่ดำเนินการ</label>
        </div>
        <div class="form-group col-lg-4">
            <?php if($this->permission_level >= 2){ ?>
            <input type='text' class="form-control" id="implementation_time" name="implementation_time" value="<?php echo date("H:i"); ?>" />
            <?php }else{ ?>
            <input type='text' class="form-control" id="" name="implementation_time" value="<?php echo date("H:i"); ?>" readonly/>
            <?php } ?>
            <span style = 'color:red'>รูปแบบเวลา xx:xx  ชั่วโมง:นาที เช่น 22:05</span> 

        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-2 text-right">
            <label>สิ่งที่ส่งมาด้วย</label>
        </div>
        <div class="form-group col-lg-4">
            <input id="attach_detail" name="attach_detail" type="text" class="form-control"  >
        </div>
        <!--<div class="form-group col-lg-2 text-right">
            <label>ออกเลขทะเบียน/กำหนดเอง</label>
        </div>
        <div class="form-group col-lg-4">
            <input id="custom_registration_number" name="custom_registration_number" type="number" class="form-control"  placeholder="ออกเลขทะเบียน/กำหนดเอง" <?php echo ($this->set2_val == 0 || $this->session->userdata('data_instutition_main'))? "readonly":"" ?> >
        </div>
        -->
    </div>
    <div class="row">
        <div class="form-group col-lg-2 text-right">
            <label>อ้างถึง</label>
        </div>
        <div class="form-group col-lg-4 text-right">
            <input id="reference_to" name="reference_to" type="text" class="form-control"  >
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-2 text-right">
            <label>รายละเอียด</label>
        </div>
        <div class="form-group col-lg-4">
            <textarea class="form-control" name="detail" id="detail"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-12 text-right">
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-share" aria-hidden="true">&nbsp;ออกเลขทะเบียน</span></button>
            <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true">&nbsp;ยกเลิก</span></button>
        </div>
    </div>
    </form>
</div>

<script>
    $(document).ready(function(){
        $.post( "index.php/dataExport/dataExport/set_redirect",{'type_re':''}, function( data ) {});
        $("#form_registration_create").validate({

            rules: {
                    subject: "required",
                    to_receive : "required",
                    from_send : "required",
                    custom_registration_number : { number: true }
                },

            messages: {
                subject: "<p style = 'color:red;'>กรุณากรอกช่องชื่อเรื่อง</p>",
                to_receive : "<p style = 'color:red;'>กรุณากรอกช่องเรียน</p>",
                from_send : "<p style = 'color:red;'>กรุณากรอกช่องจาก</p>",
                custom_registration_number : "<p style = 'color:red;'>กรุณากรอกเป็นตัวเลขเท่านั้น</p>"
            },

            
        });
    
        $("#registration_type").change(function(){
            $.post( "index.php/dataExport/dataExport/set_redirect",{'type_re':$(this).val()}, function( data ) {});
            if($(this).val() == ""){
                $("#show_document_no").html('เอกสารที่<font color="red"> **</font>');
                $("#show_type_send").html('/');
            }else if($(this).val() == "ว"){
                $("#show_document_no").html('เอกสารที่<font color="red"> **</font>');
                $("#show_type_send").html('/ว');
            }else if($(this).val() == "คำสั่ง"){
                $("#show_document_no").html('คำสั่งที่<font color="red"> **</font>');
                $("#show_type_send").html('<font style="font-size:12px;">/คำสั่ง</font>');
            }else if($(this).val() == "วิทยุ"){
                $("#show_document_no").html('เลขวิทยุที่<font color="red"> **</font>');
                $("#show_type_send").html('/วิทยุ');
            }
        });
    
        var tooltips = $( "[title]" ).tooltip({
            position: {
              my: "left top",
              at: "right+5 top-5"
            }
        });
        $(".js-example-basic-single").select2();
        
        
    });
    
</script>
<?php if($this->designation == "governor" || $this->designation == "prefect"){ ?>
<script>
    $(document).ready(function(){
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/dataExport/dataExport/get_department_number",
            type: "POST",
            data: {data_instutition: $("#registration_number").val() },
            dataType:"html",
            success: function(d) {
                $("#department_number").html(d);
            }
        });
        
        $("#registration_number").change(function(){
            //alert($(this).val());
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/dataExport/dataExport/get_department_number",
                type: "POST",
                data: {data_instutition: $(this).val() },
                dataType:"html",
                success: function(d) {
                    $("#department_number").html(d);
                }
            });
        });
    });
</script>
<?php } ?>
<?php $this->load->view('include/footer'); ?>
