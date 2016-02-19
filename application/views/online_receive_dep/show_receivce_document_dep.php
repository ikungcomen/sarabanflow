<hr/>
<div style = "margin-left:15px; margin-right:15px">
    <div style = "width :100% ; background-color: #3e8f3e; padding-left :15px ;color:#FFFFFF"><h2><img src = "assets/img/icon-re.ico" width = "40px">&nbsp;&nbsp;<b>ลงรับเอกสารจากระบบ Online</b></h2></div>
    <h3 style = "color:blue;"><b>&nbsp;ลงรับเอกสาร</b></h3>
<?php $this->load->view('online_receive_dep/headerMenu'); ?>
<div class="container"><br>
    
    <div class="row" align="center">
        <table border="0" width="80%">
            <tr>
                <td width="15%" class="text-right"><label>เลขทะเบียน :</label></td>
                <td>&nbsp;&nbsp;
                <?php  
                $this->db->select('*');
                $this->db->from('registration_receive_document_of_run');
                $this->db->where('registration_receive_document_id', $result[0]['registration_receive_document_id']);
                $query = $this->db->get();
                $temp = $query->result_array();
                
                echo $temp[0]['number_of_run'];
                ?>
                </td>
                <td width="15%" class="text-right"><label>เอกสารเลขที่ :</label></td>
                <td>&nbsp;&nbsp;
                    <?php echo $result[0]['document_no']; ?>
                </td>
            </tr>
            <tr>
                <td class="text-right"><label>ลงวันที่ :</label></td>
                <td>&nbsp;&nbsp;
                    <?php echo date("d-m-Y", strtotime($result[0]['receive_date'])); ?>
                    
                </td>
                <td class="text-right"><label>จาก :</label></td>
                
                <td><?php echo '&nbsp;'.$result[0]['from']; ?></td>
            </tr>
            <tr>
                <td class="text-right"><label>เรื่อง :</label></td>
                <td>&nbsp;&nbsp;<?php echo $result[0]['subject']; ?></td>
                <td class="text-right"><label>เรียน :</label></td>
                <td>&nbsp;&nbsp;<?php echo $result[0]['to_receive']; ?></td>
            </tr>
            <tr>
                <td class="text-right"><label>สิ่งที่ส่งมาด้วย :</label></td>
                <td>&nbsp;&nbsp;<?php echo $result[0]['attach_detail']; ?></td>
                <td class="text-right"><label>อ้างถึง :</label></td>
                <td>&nbsp;&nbsp;<?php echo $result[0]['reference_to']; ?></td>
            </tr>
            
            <tr>
                <td class="text-right"><label>เสนอ/ผู้ปฏิบัติ :</label></td>
                <td>&nbsp;&nbsp;<?php echo $result[0]['offer_the_operating']; ?></td>
                <td class="text-right"><label></label></td>
                <td>&nbsp;&nbsp;</td>
            </tr>
            
            <tr>
                <td class="text-right"><label>รายละเอียด :</label></td>
                <td>&nbsp;&nbsp;<?php echo $result[0]['detail']; ?></td>
                <td class="text-right"><label>วัตถุประสงค์ :</label></td>
                <td>&nbsp;&nbsp;
                    <?php
                    $object = getAllDataObjective();
                    foreach ($object as $row) {
                        if ($result[0]['objective_id'] == $row->id) {
                            echo $row->objective_name ;
                        }
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td class="text-right"><label>ชั้นความเร็ว :</label></td>
                <td>&nbsp;&nbsp;
                    <?php
                     if($result[0]['layer_priority_id'] == 1)
                     {
                        echo "ปกติ";
                     }
                      if($result[0]['layer_priority_id'] == 2)
                     {
                        echo "ด่วน";
                     }
                      if($result[0]['layer_priority_id'] == 3)
                     {
                        echo "ด่วนมาก";
                     }
                      if($result[0]['layer_priority_id'] == 4)
                     {
                        echo "ด่วนที่สุด";
                     }
                    ?>
                </td>
                <td class="text-right"><label>ชั้นความลับ :</label></td>
                <td>&nbsp;&nbsp;
                     <?php
                      if($result[0]['layer_secret_id'] == 1)
                     {
                        echo "ปกติ";
                     }
                      if($result[0]['layer_secret_id'] == 2)
                     {
                        echo "ลับ";
                     }
                      if($result[0]['layer_secret_id'] == 3)
                     {
                        echo "ลับมาก";
                     }
                      if($result[0]['layer_secret_id'] == 4)
                     {
                        echo "ลับที่สุด";
                     }
                    ?>
                </td>
            </tr>
            <tr>
                <td class="text-right"><label>วันที่ดำเนินการ :</label></td>
                <td>&nbsp;&nbsp;
                    <?php echo date("d-m-Y", strtotime($result[0]['implementation_date'])); ?>
                </td>
                <td class="text-right"><label>เวลาดำเนินการ :</label></td>
                <td>&nbsp;&nbsp;
                    <?php echo $result[0]['implementation_time']; ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="row">
        <h3 style = "color:blue;"><b>&nbsp;รายละเอียดเอกสารที่แนบ</b></h3>
        <div class="table-responsive">
            <div id = "content"></div>
        </div>
    </div>
    
    <div class="row">
        <h3 style = "color:blue;"><b>&nbsp;รับเอกสารต้นฉบับ</b></h3>
        <div class="table-responsive">
            <form action="<?php echo base_url(); ?>index.php/receiveDocumentOnline/receiveDocumentOnline/save_data_receive_document_online_dep" method="POST" id="form_recieve_document">
            <div class="form-group col-lg-6 text-left">
                <div class="row">
                    <div class="form-group col-md-3 text-right"><b>ได้เอกสารวันที่ :</b></div>
                    <div class="form-group col-md-4 text-left">
                        <input type="hidden" name="implementation_date" id="implementation_date" value="<?php echo date('d-m-Y'); ?>" class="form-control" readonly>
                        <?php echo date('d-m-Y'); ?>
                    </div>
                    <div class="form-group col-md-1 text-right"><b>เวลา:</b></div>
                    <div class="form-group col-md-4 text-left">
                        <input type="hidden" name="implementation_time" id="implementation_time" value="<?php echo date('H:i'); ?>" class="form-control" readonly>
                        <?php echo date('H:i'); ?>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-3 text-right"><b>เลขทะเบียน :</b></div>
                    <div class="form-group col-md-4 text-left">
                        <input type="number" name="number_of_run" id="number_of_run" value="" class="form-control" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12 text-right">
                        <input type="hidden" name="receive_document_department_id" id="receive_document_department_id" value="<?php echo $receive_document_department_id; ?>">
                        <input type="hidden" name="registration_create_number_id" id="registration_create_number_id" value="<?php echo $result[0]['registration_create_number_id']; ?>">
                        <input type="hidden" name="registration_receive_document_id" id="registration_receive_document_id" value="<?php echo $result[0]['registration_receive_document_id']; ?>">
                        
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-share" aria-hidden="true">&nbsp;รับเอกสาร</span></button>
                        <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true">&nbsp;ยกเลิก</span></button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        
        $.post( "index.php/receiveDocumentOnline/receiveDocumentOnline/get_content_file/<?php echo $result[0]['registration_create_number_id'];?>/<?php echo $result[0]['registration_receive_document_id'];?>/<?php echo $receive_document_department_id; ?>", function( data ) {
             $( "#content" ).html( data );
             
        });
    });
</script>
<script>
    $(document).ready(function(){
        
        $("#form_recieve_document").validate({

            rules: {
                    implementation_date: "required",
                    implementation_time : "required",
                    number_of_run : { number: true }
                },

            messages: {
                implementation_date: "<p style = 'color:red;'>กรุณากรอกได้เอกสารวันที่</p>",
                implementation_time : "<p style = 'color:red;'>กรุณากรอกเวลา</p>",
                number_of_run : "<p style = 'color:red;'>กรุณากรอกเป็นตัวเลขเท่านั้น</p>"
            },

            
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
    $check_error = $this->session->flashdata('error');
    if($check_error == "exist") {
?>
<script type="text/javascript">
    $(document).ready(function(){
        alert("ไม่สามารถทำการรับเอกสารนี้ได้ เนื่องจากคุณมีเอกสารฉบับนี้แล้ว");
    });
</script>

    <?php }else if($check_error == "limit"){ ?>
<script type="text/javascript">
    $(document).ready(function(){
        alert("ไม่สามารถทำการรับเอกสารนี้ได้ เนื่องจากมีเลขทะเบียนนี้แล้ว หรือ กำหนดเลขทะเบียนเกินขอบเขตที่ได้ตั้งไว้");
    });
</script>
    <?php } ?>
