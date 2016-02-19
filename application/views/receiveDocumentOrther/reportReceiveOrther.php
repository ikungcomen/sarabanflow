<?php $this->load->view('include/header'); ?>
<div class="container">
    <div class="row">
        <div class="form-group col-lg-12">
            <div style = "width :100% ; background-color: #3e8f3e; padding-left :15px;color:#FFFFFF"><h3><img src = "assets/img/icon08.jpg" width = "40px" >&nbsp;&nbsp;<b>รายงานเลขทะเบียนรับ</b></h3></div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-12 text-right">
            <a href="index.php/receiveDocumentOrther/receiveDocumentOrther" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true">&nbsp;ป้อนเรื่องใหม่</span></a>
            <?php
              foreach($registration_receive_document as $row){
                if($row->layer_secret_id > 1 && $this->permission_level < 3)
                {
                     $dis ="disabled";
                }
                else
                {
                     $dis ="";
                }
              }
            ?>
            <a <?php echo $dis;?>  href="index.php/recieptBook/recieptBook" class="btn btn-info"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true">&nbsp;ดำเนินการต่อ</span></a>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-12">
            <div class="tab-pane fade in active" id="">
                
                <table id="" class="table table-responsive table-hover table-striped" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="width:12%;">เลขทะเบียน</th>
                            <th style="width:17%;">เอกสารเลขที่</th>
                            <th style="width:15%;">วันที่</th>
                            <th style="width:12%;">เวลา</th>
                            <th>เรื่อง</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($registration_receive_document as $row){ ?>
                        <tr>
                            <td><?php echo $number_of_run[0]['number_of_run']; ?></td>
                            <td>
                                <?php 
                                    echo $row->document_no;                    
                                ?>
                            </td>
                            <td><?php 
                            
                            echo $row->implementation_date; 
                            ?></td>
                            <td><?php 
                            
                            echo $row->	implementation_time; 
                            ?></td>
                            <td><?php 
                            echo ($row->layer_secret_id > 1 && $this->permission_level < 3)? "-???- <br>":$row->subject.'<br>';
                            echo "จาก : ".$row->from.'<br>'; 
                            echo "เรียน : "; echo ($row->layer_secret_id > 1 && $this->permission_level < 3)? "-???-":$row->to_receive;
                            ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <?php if(!empty($registration_receive_document_id)){ ?>
        <div class="form-group col-lg-6 text-left">
            <form action="<?php echo base_url(); ?>index.php/receiveDocumentOrther/receiveDocumentOrther/registration_receive_upload_file" method="post" enctype="multipart/form-data" id="form_upload_file">
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
        <?php } ?>
        
        <div class="form-group col-lg-6 text-left">
            <div class="pricing_header">
                <h2>เอกสารที่แนบเรียบร้อยแล้ว</h2>
                <div class="space"></div>
            </div>
            <ul class="list-group">
                <?php foreach($attach_file as $row){ 
                    $array_name = explode("_", $row['file_upload_name']);
                ?>
                <li class="list-group-item"><?php echo getFileExtension($row['file_upload_name']); ?>
                    <a href="<?php echo base_url(); ?>uploads/registration_create_file/<?php echo $row['file_upload_name']; ?>" target="_blank">
                        <?php echo base64_decode($array_name[1]); ?>
                    </a>
                    <br>
                    <span style="color:green;">เมื่อวันที่</span> <?php echo date("d-m-Y H:i:s", strtotime($row['cdate'])); ?> &nbsp;&nbsp;&nbsp;
                    <a href="<?php echo base_url(); ?>index.php/receiveDocumentOrther/receiveDocumentOrther/delete_file_upload_registration/<?php echo $row['id']; ?>/<?php echo $registration_receive_document_id; ?>">
                       [ลบออก] 
                    </a>
                </li>
                <?php } ?>
            </ul>
                  
        </div>
        
    </div>
</div>

<script>
    $(document).ready(function(){
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

<?php $this->load->view('include/footer'); ?>

