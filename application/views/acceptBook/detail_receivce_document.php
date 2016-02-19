<hr/>
<div style = "margin-left:15px; margin-right:15px">
    <div style = "width :100% ; background-color: #3e8f3e; padding-left :15px ;color:#FFFFFF"><h2><img src = "assets/img/icon-re.ico" width = "40px">&nbsp;&nbsp;<b>ลงรับเอกสารจากระบบ Online</b></h2></div>
    <h3 style = "color:blue;"><b>&nbsp;ลงรับเอกสาร</b></h3>
<?php $this->load->view('acceptBook/headerMenu');?>
<div class="container"><br>
    <?php //$this->load->view('bookSend/headmenu/headmenu'); ?>
    <?php  
    $this->db->select('*');
    $this->db->from('registration_create_number_of_run');
    $this->db->where('registration_create_number_id', $result[0]['id']);
    $this->db->where('active', 1);
    $query = $this->db->get();
    $data_result = $query->result_array();
    ?>
    <div class="row" align="center">
        <table border="0" width="80%">
            <tr>
                <td width="15%"><label>เลขทะเบียน :</label></td>
                <td><?php echo $data_result[0]['number_of_run']; ?></td>
                <td width="15%"><label>เอกสารเลขที่ :</label></td>
                <td>
                    <?php
                    $this->db->select('*');
                    $this->db->from('department_of_instutition');
                    $this->db->where('id', $result[0]['department_of_instutition_id']);
                    $this->db->where('active', 1);
                    $query = $this->db->get();
                    $result2 = $query->result_array();
                    // echo $result[0]['level_institution_id'];
                    // echo $result[0]['level_institution'];
                    //echo get_number_of_instutition($result[0]['level_institution_id'],$result[0]['level_institution'])  . $result2[0]['department_id'] . '/' . $result[0]['registration_type'] . $data_result[0]['number_of_run'];
                    echo get_number_of_instutition($result[0]['use_instutition_id'],$result[0]['use_instutition_level'])  . $result2[0]['department_id'] . '/' . $result[0]['registration_type'] . $data_result[0]['number_of_run'];
                    ?>
                </td>
            </tr>
            <tr>
                <td><label>ลงวันที่ :</label></td>
                <td><?php
                    $dateTemp = date("d/m/Y", strtotime($result[0]['dated_send']));
                    echo $dateTemp;
                    ?>
                </td>
                <td><label>จาก :</label></td>
                <td><?php echo get_name_instutition($result[0]['level_institution_id'],$result[0]['level_institution']); ?></td>
            </tr>
            <tr>
                <td><label>เรื่อง :</label></td>
                <td><?php echo $result[0]['subject']; ?></td>
                <td><label>เรียน :</label></td>
                <td><?php echo $result[0]['to_receive']; ?></td>
            </tr>
            <tr>
                <td><label>สิ่งที่ส่งมาด้วย :</label></td>
                <td><?php echo $result[0]['attach_detail']; ?></td>
                <td><label>อ้างถึง :</label></td>
                <td><?php echo $result[0]['reference_to']; ?></td>
            </tr>
            <tr>
                <td><label>รายละเอียด :</label></td>
                <td><?php echo $result[0]['detail']; ?></td>
                <td><label>วัตถุประสงค์ :</label></td>
                <td>
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
                <td><label>ชั้นความเร็ว :</label></td>
                <td>
                    <?php
                    $layer_priority = getAllDataLayerPriority();
                    foreach ($layer_priority as $row) {
                        if ($result[0]['layer_priority_id'] == $row->id) {
                            echo $row->pio_name ;
                        }
                    }
                    ?>
                </td>
                <td><label>ชั้นความลับ :</label></td>
                <td>
                     <?php
                    $layer_secret = getAllDataLayerSecret();
                    foreach ($layer_secret as $row) {
                        if ($result[0]['layer_secret_id'] == $row->id) {
                            echo $row->layer_name ;
                        }
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td><label>วันที่ดำเนินการ :</label></td>
                <td>
                    <?php
                    $arr = explode(" ", $result[0]['created']);
                    $date = date("d/m/Y", strtotime($arr[0]));
                    echo $date;
                    ?>
                </td>
                <td><label>เวลาดำเนินการ :</label></td>
                <td>
                    <?php
                    $arr = explode(" ", $result[0]['created']);
                    echo $arr[1];
                    ?>
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
            <form action="<?php echo base_url(); ?>index.php/acceptBook/acceptBook/save_data_accepted" method="POST" id="form_recieve_document">
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
                        <?php echo date('H:i:s'); ?>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-3 text-right"><b>เลขทะเบียน :</b></div>
                    <div class="form-group col-md-4 text-left">
                        <?php
                               $check_data_instutition_main = $this->session->userdata('data_instutition_main');
                               if($check_data_instutition_main)
                               {
                                  $this->receive_type = $check_data_instutition_main['receive_type'];
                               }
                        ?>
                        <input type="number" name="number_of_run" id="number_of_run" value="" class="form-control" <?php echo ($this->receive_type == 1)? "readonly":" " ?>>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12 text-right">
                        
                        <input type="hidden" name="registration_send_document_outside_id" value="<?php echo $id_accept; ?>">
                        <input type="hidden" name="registration_create_number_id" value="<?php echo $id_create; ?>">
                        
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
        //alert("<?php echo $id_create;?>");
        $.post( "index.php/acceptBook/acceptBook/get_content/<?php echo $id_create;?>/<?php echo $id_accept;?>", function( data ) {
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
    <?php } else if($check_error == "not_run_number"){?>
    <script type="text/javascript">
    $(document).ready(function(){
        alert("ไม่สามารถทำการรับเอกสารนี้ได้ไม่ได้กรอกเลขทะเบียน หรือ กำหนดเลขทะเบียนเกินขอบเขตที่ได้ตั้งไว้");
    });
</script>
<?php }?>
