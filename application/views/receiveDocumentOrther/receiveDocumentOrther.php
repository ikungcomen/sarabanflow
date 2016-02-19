<div class="container">
    <div class="row">
        <div class="form-group col-lg-12">
            <div style = "width :100% ; background-color: #3e8f3e; padding-left :15px;color:#FFFFFF"><h3><img src = "assets/img/icon03.jpg" width = "40px">&nbsp;&nbsp;<b>ลงรับเอกสารจากระบบอื่น (จดหมาย,แฟกซ์,อีเมลล์,อื่นๆ)</b></h3></div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-12 text-left">
            <a href="index.php/welcome" class="btn btn-danger"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true">&nbsp;ย้อนกลับ</span></a>
        </div>
    </div>
    <form action="<?php echo base_url(); ?>index.php/receiveDocumentOrther/receiveDocumentOrther/create_receive_document_other" method="POST" id="form_registration_receive_other">
    <div class="row">
        <div class="form-group col-lg-2 text-right">
            <label>เอกสารที่<font color="red"> **</font></label>
        </div>
        <div class="form-group col-lg-4 ">
            <input id="document_no" name="document_no" type="text" class="form-control"  placeholder="">
        </div>
        <div class="form-group col-lg-2 text-right">
            <label>ชั้นความเร็ว</label>
        </div>
        <div class="form-group col-lg-4">
            <select id="layer_priority_id" name="layer_priority_id" class="form-control">

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
            <input type="text" class="form-control" id="receive_date" name="receive_date" placeholder="">
        </div>
        <div class="form-group col-lg-2 text-right">
            <label>ชั้นความลับ</label>
        </div>
        
        <div class="form-group col-lg-4 text-right">
            <select id="layer_secret_id" name="layer_secret_id" class="form-control">
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
            <input id="from" name="from" type="text" class="form-control"  placeholder="">
        </div>
        <div class="form-group col-lg-2 text-right">
            <label>วัตถุประสงค์</label>
        </div>
        <div class="form-group col-lg-4">
        <select class="form-control" id="objective_id" name="objective_id">
           <?php foreach (getAllDataObjective() as $row) {?>
                    <option value="<?php echo $row->id;?>"><?php echo $row->objective_name;?></option>
            <?php }?>
        </select>
           
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-2 text-right">
            <label>เรื่อง<font color="red"> **</font></label>
        </div>
        <div class="form-group col-lg-4">
            <input id="subject" name="subject" type="text" class="form-control"  placeholder="">
        </div>
        <div class="form-group col-lg-2 text-right">
            <label>วันที่ดำเนินการ</label>
        </div>
        <div class="form-group col-lg-4">
            <?php if($this->permission_level >= 2){ ?>
            <input type="text" class="form-control" id="implementation_date" name="implementation_date" value="<?php echo date("Y-m-d"); ?>" >
            <?php }else{ ?>
            <input type="text" class="form-control" id="" name="implementation_date" value="<?php echo date("Y-m-d"); ?>" readonly>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-2 text-right">
            <label>เรียน<font color="red"> **</font></label>
        </div>
        <div class="form-group col-lg-4">
            <input id="to_receive" name="to_receive" type="text" class="form-control"  placeholder="">
        </div>
        <div class="form-group col-lg-2 text-right">
            <label>เวลาที่ดำเนินการ</label>
        </div>
        <div class="form-group col-lg-4">
            <div class="form-group">
                <?php if($this->permission_level >= 2){ ?>
                <input type='text' name="implementation_time" id="implementation_time" class="form-control" value="<?php echo date("H:i"); ?>" />
                <?php }else{ ?>
                <input type='text' name="implementation_time" id="" class="form-control" value="<?php echo date("H:i"); ?>" readonly/>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-2 text-right">
            <label>สิ่งที่ส่งมาด้วย</label>
        </div>
        <div class="form-group col-lg-4">
            <input id="attach_detail" name="attach_detail" type="text" class="form-control"  placeholder="">
        </div>
        <div class="form-group col-lg-2 text-right">
            <label>ออกเลขทะเบียน/กำหนดเอง</label>
        </div>
        <?php 
            $check_data_instutition_main = $this->session->userdata('data_instutition_main');
                if($check_data_instutition_main){
                    $this->receive_type = $check_data_instutition_main['receive_type'];
                }
        ?>
        <div class="form-group col-lg-4">
            <input id="custom_registration_receive_number" name="custom_registration_receive_number" type="text" class="form-control"  placeholder="" <?php echo ($this->receive_type == 1)? "readonly":""; ?>>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-2 text-right">
            <label>อ้างถึง</label>
        </div>
        <div class="form-group col-lg-4 text-right">
            <input id="reference_to" name="reference_to" type="text" class="form-control"  placeholder="">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-2 text-right">
            <label>เสนอ/ผู้ปฎิบัติ</label>
        </div>
        <div class="form-group col-lg-4">
            <input id="offer_the_operating" name="offer_the_operating" type="text" class="form-control"  placeholder="">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-2 text-right">
            <label>รายละเอียด</label>
        </div>
        <div class="form-group col-lg-4">
            <textarea class="form-control" name="detail" id="detail" placeholder=""></textarea>
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
        $("#form_registration_receive_other").validate({

            rules: {
                    document_no: "required",
                    from: "required",
                    subject: "required",
                    to_receive : "required",
                    custom_registration_receive_number : { number: true }
                },

            messages: {
                document_no: "<p style = 'color:red;'>กรุณากรอกเอกสารที่ให้ถูกต้อง</p>",
                from: "<p style = 'color:red;'>กรุณากรอกช่องจาก</p>",
                subject: "<p style = 'color:red;'>กรุณากรอกช่องชื่อเรื่อง</p>",
                to_receive : "<p style = 'color:red;'>กรุณากรอกช่องเรียน</p>",
                custom_registration_receive_number : "<p style = 'color:red;'>กรุณากรอกเป็นตัวเลขเท่านั้น</p>"
            }

            
        });
    
        var tooltips = $( "[title]" ).tooltip({
            position: {
              my: "left top",
              at: "right+5 top-5"
            }
        });
    });
    
</script>
<?php 
    if($this->session->flashdata('exist_document_no')){
?>
<script>
    $(document).ready(function(){
        alert('ไม่สามารถทำการรับเอกสารนี้ได้ เนื่องจากคุณมีเอกสารฉบับนี้แล้ว');
    });
    
</script>

<?php } ?>

<?php 
    $check_error = $this->session->flashdata('error');
?>

    <?php if($check_error == "limit"){ ?>
<script type="text/javascript">
    $(document).ready(function(){
        alert("ไม่สามารถทำการรับเอกสารนี้ได้ เนื่องจากมีเลขทะเบียนนี้แล้ว หรือ กำหนดเลขทะเบียนเกินขอบเขตที่ได้ตั้งไว้");
    });
</script>
    <?php }else if($check_error == "on-number-of-run"){ ?>
        <script type="text/javascript">
            $(document).ready(function(){
                alert("ไม่สามารถทำการรับเอกสารนี้ได้ เนื่องจากไม่ได้กำหนดเลขทะเบียน");
            });
        </script>
    <?php } ?>
