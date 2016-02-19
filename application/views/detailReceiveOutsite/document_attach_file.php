<div class="container"><br><br>
    <?php $this->load->view('detailReceiveOutsite/headmenu'); ?>
    
    <!-- ------------------------------------------------------------------------------------------------------------------------------ -->
    
    
    <div class="row">
        <div class="form-group col-lg-6 text-left">
            <form action="<?php echo base_url(); ?>index.php/detailReceiveOutsite/detailReceiveOutsite/registration_receive_upload_file" method="post" enctype="multipart/form-data" id="form_upload_file">
                <input type="hidden" name="registration_create_number_id" id="registration_create_number_id" value="<?php echo $registration_create_number_id; ?>">
                <input type="hidden" name="registration_receive_document_id" id="registration_receive_document_id" value="<?php echo $registration_receive_document_id; ?>">
                <label><b style="font-size: 18px;">แนบเอกสาร</b> (กดปุ่ม browse เพื่อเลือกเอกสารที่ต้องการแนบ)</label> 
                <input type="file" class="form-control" name="images1[]" id="images1" >
                <input type="file" class="form-control" name="images2[]" id="images2" >
                <input type="file" class="form-control" name="images3[]" id="images3" >
                <input type="file" class="form-control" name="images4[]" id="images4" >
                <input type="file" class="form-control" name="images5[]" id="images5" >
                <br>
                <input type="submit" name="" id="" value="แนบเอกสาร" class="btn btn-primary">
                <input type="reset" name="" id="" value="ยกเลิก" class="btn btn-danger">
                <br>
                <label style='color: red;'>** ชื่อไฟล์ห้ามเกิน 140 ตัวอักษร</label> <br>
                <label style='color: red;'>** รองรับนามสกุลไฟล์ gif, jpg, png, jpeg, pdf, doc, xml, docx, xlsx, xls เท่านั้น</label> <br>
                <label style='color: red;'>** ขนาดไฟล์แต่ละไฟล์ไม่เกิน 10 MB</label> <br>
                <label style='color: red;'>** ถ้าเป็นรูปภาพขนาดไม่เกิน 2048 x 2048 Pixel</label> <br>
                
            </form>
            <br>
            <?php if($this->session->flashdata('array_file_result')){ 
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
            <div class="form-group col-lg-6 text-left " id = "bgshow">
            <ul class="list-group">
                <?php foreach($attach_file_new as $row){ 
                    $array_name = explode("_", $row['file_upload_name']);
                ?>
                <li class="list-group-item"><?php echo getFileExtension($row['file_upload_name']); ?>
                    <a href="<?php echo base_url(); ?>uploads/registration_create_file/<?php echo $row['file_upload_name']; ?>" target="_blank">
                        <?php echo base64_decode($array_name[1]); ?>
                    </a>
                    <br>
                    <span style="color:green;">เมื่อวันที่</span> <?php echo date("d-m-Y H:i:s", strtotime($row['cdate'])); ?> &nbsp;&nbsp;&nbsp;
                    <a href="<?php echo base_url(); ?>index.php/detailReceiveOutsite/detailReceiveOutsite/delete_file_upload_registration/<?php echo $row['id']; ?>/<?php echo $registration_receive_document_id; ?>/<?php echo $registration_create_number_id; ?>">
                       [ลบออก] 
                    </a>
                </li>
                <?php } ?>
                
                <?php foreach($attach_file_old as $row){ 
                    $array_name = explode("_", $row['file_upload_name']);
                ?>
                <li class="list-group-item"><?php echo getFileExtension($row['file_upload_name']); ?>
                    <a href="<?php echo base_url(); ?>uploads/registration_create_file/<?php echo $row['file_upload_name']; ?>" target="_blank">
                        <?php echo base64_decode($array_name[1]); ?>
                    </a>
                    <br>
                    <span style="color:green;">เมื่อวันที่</span> <?php echo date("d-m-Y H:i:s", strtotime($row['created'])); ?> &nbsp;&nbsp;&nbsp;
                    
                </li>
                <?php } ?>
            </ul>
           </div>       
        </div>
    </div>
    <!-- ------------------------------------------------------------------------------------------------------------------------------ -->
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#form_upload_file").submit(function(e){
            if(!$("#images1").val() && !$("#images2").val() && !$("#images3").val() && !$("#images4").val() && !$("#images5").val()){
                e.preventDefault();
                alert("กรุณาเลือกไฟล์ที่ต้องการก่อน กดแนบเอกสาร ...");
            }
        });
        
        
    });
    
</script>

<script>
    $(document).ready(function(){
        //binds to onchange event of your input field
        $('#images1').bind('change', function() {
          //this.files[0].size gets the size of your file.
          //alert(this.files[0].size);
          if(this.files[0].size > 10000000){
              $('#images1').val("");
              alert("ขนาดไฟล์แต่ละไฟล์ไม่เกิน 10 MB เท่านั้น");
          }
        });
        
        $('#images2').bind('change', function() {
          //this.files[0].size gets the size of your file.
          //alert(this.files[0].size);
          if(this.files[0].size > 10000000){
              $('#images2').val("");
              alert("ขนาดไฟล์แต่ละไฟล์ไม่เกิน 10 MB เท่านั้น");
          }
        });
        
        $('#images3').bind('change', function() {
          //this.files[0].size gets the size of your file.
          //alert(this.files[0].size);
          if(this.files[0].size > 10000000){
              $('#images3').val("");
              alert("ขนาดไฟล์แต่ละไฟล์ไม่เกิน 10 MB เท่านั้น");
          }
        });
        
        $('#images4').bind('change', function() {
          //this.files[0].size gets the size of your file.
          //alert(this.files[0].size);
          if(this.files[0].size > 10000000){
              $('#images4').val("");
              alert("ขนาดไฟล์แต่ละไฟล์ไม่เกิน 10 MB เท่านั้น");
          }
        });
        
        $('#images5').bind('change', function() {
          //this.files[0].size gets the size of your file.
          //alert(this.files[0].size);
          if(this.files[0].size > 10000000){
              $('#images5').val("");
              alert("ขนาดไฟล์แต่ละไฟล์ไม่เกิน 10 MB เท่านั้น");
          }
        });
    });
</script>

<style>
    #bgshow{
        width: 500px!important;
        height: 350px!important;
        border-style: solid;
        border-color: #428bca;
        border-width: 2px!important;
        background-color: white!important;
        padding-top: 10px;
    }
</style>
