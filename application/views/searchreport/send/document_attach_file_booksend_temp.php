<div class="container"><br><br>
    <?php $this->load->view('searchreport/headermenu/headermenu'); ?>

    <div class="row">

    </div>
    <div class="row">
        <div class="form-group">
            <label  class="col-sm-6 control-label">แนบเอกสาร&nbsp;<font color="red">(กดปุ่ม browse เพื่อเลือกเอกสารที่ต้องการแนบ)</font></label>
            <label  class="col-sm-6 control-label"><h2>เอกสารที่แนบเรียบร้อยแล้ว</h2></label>
        </div>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="form-group">
                <div class=" col-sm-6">
                    <input id="input-5" name="input-5" type="file" multiple="true">
                </div>
            </div> 
        </div>
    </form>
    <br><br>
    <div class="row">
        <div class="form-group">
            <label  class="col-sm-6 control-label"><font color="red">** ชื่อไฟล์ห้ามเกิน 140 ตัวอักษร</font></label>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label  class="col-sm-6 control-label"><font color="red">** รองรับนามสกุลไฟล์ gif, jpg, png, jpeg, pdf, doc, xml, docx, xlsx, xls เท่านั้น</font></label>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label  class="col-sm-6 control-label"><font color="red">** ขนาดไฟล์แต่ละไฟล์ไม่เกิน 10 MB</font></label>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label  class="col-sm-6 control-label"><font color="red">** ถ้าเป็นรูปภาพขนาดไม่เกิน 2048 x 2048 Pixel</font></label>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-sm-6 text-right">
                <a class="btn btn-primary uploadFile">บันทึก</a>
                <a class="btn btn-danger text-right">ยกเลิก</a>
            </div>
        </div>
    </div>
    <br><br>
    <div class="form-group col-lg-6 text-left">
        <form action="<?php echo base_url(); ?>index.php/bookSend/bookSend/registration_create_upload_file" method="post" enctype="multipart/form-data" id="form_upload_file">
            <input type="hidden" name="registration_create_number_id" id="registration_create_number_id" value="<?php echo $result[0]['id']; ?>">
            <input type="file" class="form-control" name="images[]" id="images" multiple>
            <label style='color: red;'></label> <br>
            <label style='color: red;'></label> <br>
            <label style='color: red;'></label> <br>
            <label style='color: red;'></label> <br>
            <input type="submit" name="" id="" value="แนบเอกสาร" class="btn btn-primary">
            <input type="reset" name="" id="" value="ยกเลิก" class="btn btn-danger">
        </form>
        <br>
        <?php
        if ($this->session->flashdata('array_file_result')) {
            $array_file = $this->session->flashdata('array_file_result');
            ?>
            <div class="alert alert-info">
                <a href="#" class="btn btn-xs btn-primary pull-right">Upload <?php echo count($array_file); ?> File Success</a>
                <strong>Upload File : </strong> แนบเอกสารเรียบร้อยแล้ว 
            </div>
        <?php } ?>
    </div>

    <div class="form-group col-lg-6 text-left">
        <div class="pricing_header">
            <h2>เอกสารที่แนบเรียบร้อยแล้ว</h2>
            <div class="space"></div>
        </div>
        <ul class="list-group">
            <?php
            foreach ($attach_file as $row) {
                $array_name = explode("_", $row['file_upload_name']);
                ?>
                <li class="list-group-item"><span class="glyphicon glyphicon-ok"></span>
                    <a href="<?php echo base_url(); ?>uploads/registration_create_file/<?php echo $row['file_upload_name']; ?>" target="_blank">
                        <?php echo base64_decode($array_name[1]); ?>
                    </a>
                    <br>
                    <span style="color:green;">เมื่อวันที่</span> <?php echo date("d-m-Y H:i:s", strtotime($row['created'])); ?> &nbsp;&nbsp;&nbsp;
                    <a href="<?php echo base_url(); ?>index.php/bookSend/bookSend/delete_file_upload_registration/<?php echo $row['id']; ?>/<?php echo $result[0]['id']; ?>">
                        [ลบออก] 
                    </a>
                </li>
            <?php } ?>
        </ul>

    </div>
</div>
<!-- ------------------------------------------------------------------------------------------------------------------------------ -->
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#form_upload_file").submit(function(e) {
            if (!$("#images").val()) {
                e.preventDefault();
                alert("กรุณาเลือกไฟล์ที่ต้องการก่อน กดแนบเอกสาร ...");
            }
        });
        $(".uploadFile").click(function(){
            var value = $("#input-5").val();
            alert("AAA"+value);
        });


    });
    $("#input-5").fileinput({showUpload: false, maxFileCount: 10, mainClass: "input-group-lg"});
</script>

