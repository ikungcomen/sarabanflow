<div class="container"><br><br>
    <?php $this->load->view('bookSend/headmenu/headmenu');?>
    <div class="col-md-8">
    <?php if($this->session->flashdata('update_registration_create_number') == '1'){ ?>
    <div class="page-alerts">
        <div class="alert alert-success page-alert" id="alert-1" style="width:80%;">
            <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <strong>บันทึกข้อมูลสำเร็จแล้ว</strong> กรุณาตรวจสอบความถูกต้องของข้อมูลให้เรียบร้อย ก่อนออกจากเมนูนี้ ...
        </div>
    </div>    
    <?php }else if($this->session->flashdata('update_registration_create_number') == 'error'){ ?>
    <div class="page-alerts">
        <div class="alert alert-danger page-alert" id="alert-1" style="width:80%;">
            <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <strong>ไม่สามารถบันทึกข้อมูลได้</strong> เนื่องจากหมายเลขทะเบียนนี้ถูกใช้งานแล้ว กรุณาลองใหม่อีกครั้ง ...
        </div>
    </div>   
    <?php }else if($this->session->flashdata('update_registration_create_number') == 'error-edit'){ ?>
    <div class="page-alerts">
        <div class="alert alert-warning page-alert" id="alert-1" style="width:80%;">
            <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <strong>ไม่สามารถบันทึกข้อมูลได้</strong> เนื่องจากหมายเลขทะเบียนนี้ ถูกรับเข้าสู่สมุดทะเบียนรับแล้ว ...
        </div>
    </div>   
    <?php } ?>
    <div class="row">
        <div class="col-xs-12  ">
            <div class="row">
                <div class="col-xs-3 " style="background-color: #A9BCF5;border-top-left-radius:10px; ">
                    <div class="my_planTitle"><span class="glyphicon glyphicon-align-justify " aria-hidden="true">&nbsp;หัวข้อ</span></div>
                </div>
                <div class="col-xs-9 " style="background-color: #A9BCF5;border-top-right-radius:10px">
                    <div class="my_planTitle"><span class="glyphicon glyphicon-list " aria-hidden="true">&nbsp;รายละเอียด</span></div>
                </div>
            </div>
        </div>
    </div>
    <?php
        $this -> db -> select('*');
        $this -> db -> from('registration_create_number_of_run');
        $this -> db -> where('registration_create_number_id', $result[0]['id']);
        $this -> db -> where('active', 1);
        $query = $this -> db -> get();
        $data_result = $query->result_array();
    ?>
    <form action="<?php echo base_url(); ?>index.php/bookSend/bookSend/update_registration_create_number" id="form_registration_create" method="POST">
    <div class="row my_featureRow">
        <div class="col-xs-12 ">
            <div class="row">
                <div class="col-xs-3 col-sm-2 text-right" style="background-color: #BDBDBD;">
                    <label>ทะเบียนที่</label>
                </div>
                <div class="col-xs-9 col-sm-10 " style="background-color: #E6E6E6;">
                    <input id="ducument_number_new" name="ducument_number_new" type="number" class="form-control"  placeholder="" <?php echo ($this->permission_level >= 2) ? "":"readonly" ?> value="<?php echo $data_result[0]['number_of_run']; ?>" style="width:50%;">
                    <input type="hidden" name="ducument_number_old" value="<?php echo $data_result[0]['number_of_run']; ?>">
                </div>
            </div>
        </div>
    </div>
    <?php 
        $this -> db -> select('*');
        $this -> db -> from('department_of_instutition');
        $this -> db -> where('id', $result[0]['department_of_instutition_id']);
        $this -> db -> where('active', 1);
        $query = $this -> db -> get();
        $result2 = $query->result_array();
    ?>
    <div class="row my_featureRow">
        <div class="col-xs-12 ">
            <div class="row">
                <div class="col-xs-3 col-sm-2 text-right" style="background-color: #BDBDBD;">
                    <label>เอกสารเลขที่</label>
                </div>
                <div class="col-xs-9 col-sm-10 " style="background-color: #E6E6E6;">
                    <!--<input id="" name="" type="text" class="form-control"  placeholder="เอกสารเลขที่" value="<?php echo get_number_of_instutition($result[0]['level_institution_id'], $result[0]['level_institution']).$result2[0]['department_id'].'/'.$result[0]['registration_type'].$data_result[0]['number_of_run'];  ?>" readonly="true" style="width:50%;"> -->
                    <input id="" name="" type="text" class="form-control"  placeholder="เอกสารเลขที่" value="<?php echo get_number_of_instutition($result[0]['use_instutition_id'], $result[0]['use_instutition_level']).$result2[0]['department_id'].'/'.$result[0]['registration_type'].$data_result[0]['number_of_run'];  ?>" readonly="true" style="width:50%;">
                </div>
            </div>
        </div>
    </div>
    <div class="row my_featureRow">
        <div class="col-xs-12 ">
            <div class="row">
                <div class="col-xs-3 col-sm-2 text-right" style="background-color: #BDBDBD;">
                    <label>ลงวันที่</label>
                </div>
                <div class="col-xs-9 col-sm-10 " style="background-color: #E6E6E6;">
                    <input type="text" class="form-control" id="dated_send" name="dated_send" value="<?php echo date("d-m-Y", strtotime($result[0]['dated_send'])); ?>" style="width:50%;">
                </div>
            </div>
        </div>
    </div>
    <div class="row my_featureRow">
        <div class="col-xs-12 ">
            <div class="row">
                <div class="col-xs-3 col-sm-2 text-right" style="background-color: #BDBDBD;">
                    <label>จาก</label>
                </div>
                <div class="col-xs-9 col-sm-10 " style="background-color: #E6E6E6;">
                    <input id="" name="" type="text" class="form-control"  placeholder="" value="<?php echo  $this->institution_name;?>" readonly="true" style="width:50%;">
                </div>
            </div>
        </div>
    </div>
    <div class="row my_featureRow">
        <div class="col-xs-12 ">
            <div class="row">
                <div class="col-xs-3 col-sm-2 text-right" style="background-color: #BDBDBD;">
                    <label>เรื่อง</label>
                </div>
                <div class="col-xs-9 col-sm-10 " style="background-color: #E6E6E6;">
                    <input id="subject" name="subject" type="text" class="form-control"  placeholder="" value="<?php echo $result[0]['subject']; ?>" style="width:50%;">
                </div>
            </div>
        </div>
    </div>
    <div class="row my_featureRow">
        <div class="col-xs-12 ">
            <div class="row">
                <div class="col-xs-3 col-sm-2 text-right" style="background-color: #BDBDBD;">
                    <label>เรียน</label>
                </div>
                <div class="col-xs-9 col-sm-10 " style="background-color: #E6E6E6;">
                    <input id="to_receive" name="to_receive" type="text" class="form-control"  placeholder="" value="<?php echo $result[0]['to_receive']; ?>" style="width:50%;">
                </div>
            </div>
        </div>
    </div>
    <div class="row my_featureRow">
        <div class="col-xs-12 ">
            <div class="row">
                <div class="col-xs-3 col-sm-2 text-right" style="background-color: #BDBDBD;">
                    <label>สิ่งที่ส่งมาด้วย</label>
                </div>
                <div class="col-xs-9 col-sm-10 " style="background-color: #E6E6E6;">
                    <input id="attach_detail" name="attach_detail" type="text" class="form-control"  placeholder="" value="<?php echo $result[0]['attach_detail']; ?>" style="width:50%;">
                </div>
            </div>
        </div>
    </div>
    <div class="row my_featureRow">
        <div class="col-xs-12 ">
            <div class="row">
                <div class="col-xs-3 col-sm-2 text-right" style="background-color: #BDBDBD;">
                    <label>อ้างถึง</label>
                </div>
                <div class="col-xs-9 col-sm-10 " style="background-color: #E6E6E6;">
                    <input id="reference_to" name="reference_to" type="text" class="form-control"  placeholder="" value="<?php echo $result[0]['reference_to']; ?>" style="width:50%;">
                </div>
            </div>
        </div>
    </div>
    <div class="row my_featureRow">
        <div class="col-xs-12 ">
            <div class="row">
                <div class="col-xs-3 col-sm-2 text-right" style="background-color: #BDBDBD;">
                    <label>รายละเอียด</label>
                </div>
                <div class="col-xs-9 col-sm-10 " style="background-color: #E6E6E6;">
                    <input id="detail" name="detail" type="text" class="form-control"  placeholder="" value="<?php echo $result[0]['detail']; ?>" style="width:50%;">
                </div>
            </div>
        </div>
    </div>
    <div class="row my_featureRow">
        <div class="col-xs-12 ">
            <div class="row">
                <div class="col-xs-3 col-sm-2 text-right" style="background-color: #BDBDBD;">
                    <label>วัตถุประสงค์</label>
                </div>
                <div class="col-xs-9 col-sm-10 " style="background-color: #E6E6E6;">
                    <select name="objective_id" id="objective_id" class="form-control" style="width:50%;">
                        <?php
                            $object = getAllDataObjective();
                            foreach ($object as $row) {
                                
                        ?>
                        <option value="<?php echo $row->id; ?>" <?php ($result[0]['objective_id'] == $row->id)? "selected":"" ?> ><?php echo $row->objective_name; ?></option>
                        
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row my_featureRow">
        <div class="col-xs-12 ">
            <div class="row">
                <div class="col-xs-3 col-sm-2 text-right" style="background-color: #BDBDBD;">
                    <label>ชั้นความเร็ว</label>
                </div>
                <div class="col-xs-9 col-sm-10 " style="background-color: #E6E6E6;">
                    <select name="layer_priority_id" id="layer_priority_id" class="form-control" style="width:50%;">
                        
                        <option value="1" <?php echo ($result[0]['layer_priority_id'] == 1)? " selected":"" ?>>ปกติ</option>
                        <option value="2" <?php echo ($result[0]['layer_priority_id'] == 2)? " selected":"" ?>>ด่วน</option>
                        <option value="3" <?php echo ($result[0]['layer_priority_id'] == 3)? " selected":"" ?>>ด่วนมาก</option>
                        <option value="4" <?php echo ($result[0]['layer_priority_id'] == 4)? " selected":"" ?>>ด่วนที่สุด</option>
                    </select>

                </div>
            </div>
        </div>
    </div>
    <div class="row my_featureRow">
        <div class="col-xs-12 ">
            <div class="row">
                <div class="col-xs-3 col-sm-2 text-right" style="background-color: #BDBDBD;">
                    <label>ชั้นความลับ</label>
                </div>
                <div class="col-xs-9 col-sm-10 " style="background-color: #E6E6E6;">
                    <select name="layer_secret_id" id="layer_secret_id" class="form-control" style="width:50%;">
                    
                        <option value="1" <?php echo ($result[0]['layer_secret_id'] == 1)? " selected":"" ?>>ปกติ</option>
                        <option value="2" <?php echo ($result[0]['layer_secret_id'] == 2)? " selected":"" ?>>ลับ</option>
                        <option value="3" <?php echo ($result[0]['layer_secret_id'] == 3)? " selected":"" ?>>ลับมาก</option>
                        <option value="4" <?php echo ($result[0]['layer_secret_id'] == 4)? " selected":"" ?>>ลับมากที่สุด</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row my_featureRow">
        <div class="col-xs-12 ">
            <div class="row">
                <div class="col-xs-3 col-sm-2 text-right" style="background-color: #BDBDBD;">
                    <label>วันที่ดำเนินการ</label>
                </div>
                <div class="col-xs-9 col-sm-10 " style="background-color: #E6E6E6;">
                     
                    <input type="text" class="form-control" id="implementation_date" name="implementation_date" value="<?php echo date("d-m-Y", strtotime($result[0]['implementation_date'])); ?>" style="width:50%;" <?php echo ($this->permission_level >= 2) ? "":"readonly" ?>>
                </div>
            </div>
        </div>
    </div>
    <div class="row my_featureRow">
        <div class="col-xs-12 ">
            <div class="row">
                <div class="col-xs-3 col-sm-2 text-right" style="background-color: #BDBDBD;">
                    <label>เวลาที่ดำเนินการ</label>
                </div>
                <div class="col-xs-9 col-sm-10 " style="background-color: #E6E6E6;">
                    
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker4' style="width:50%;">
                            <input type='text' class="form-control" id="implementation_time" name="implementation_time" value="<?php echo $result[0]['implementation_time']; ?>" <?php echo ($this->permission_level >= 2) ? "":"readonly" ?>/>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
        
        <input type="hidden" name="number_of_run_institution_id" value="<?php echo $data_result[0]['level_institution_id']; ?>">
        <input type="hidden" name="number_of_run_institution_level" value="<?php echo $data_result[0]['level_institution']; ?>">
        
    <div class="row my_featureRow">
        <div class="col-xs-12 ">
            <div class="row">
                <div class="col-xs-3 col-sm-12 text-right" style="background-color: #BDBDBD;">
                    <input type="hidden" name="registration_type" id="registration_type" value="<?php echo $result[0]['registration_type']; ?>">
                    <input type="hidden" name="registration_create_number_id" id="registration_create_number" value="<?php echo $result[0]['id']; ?>">
                    <button type="submit" id="update_registration_create_number" class="btn btn-success">ปรับปรุงข้อมูล</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    <div class="row ">
        <div class="col-xs-12 ">
            <div class="row">
                <div class="col-xs-3 col-sm-2 " style="background-color: #A9BCF5;">
                    <label></label>
                </div>
                <div class="col-xs-9 col-sm-10 " style="background-color: #A9BCF5;">
                    <label></label>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-xs-12 ">
            <div class="row">
                <div class="col-xs-3 col-sm-2 " style="background-color: #A9BCF5;border-bottom-left-radius:10px">
                    <label></label>
                </div>
                <div class="col-xs-9 col-sm-10 " style="background-color: #A9BCF5;border-bottom-right-radius:10px">
                    <label></label>
                </div>
            </div>
        </div>
    </div>
  </div>
          <div class="form-group col-md-4 text-left">
            <div class="pricing_header">
                <h2>เอกสารที่แนบเรียบร้อยแล้ว</h2>
                <div class="space"></div>
            </div>
            <div class="form-group col-lg-6 text-left " id = "bgshow">
            <ul class="list-group">
                <?php foreach($attach_file as $row){ 
                    $array_name = explode("_", $row['file_upload_name']);
                ?>
                <li class="list-group-item"><?php echo getFileExtension($row['file_upload_name']); ?>
                    <a href="<?php echo base_url(); ?>uploads/registration_create_file/<?php echo $row['file_upload_name']; ?>" target="_blank">
                        <?php echo base64_decode($array_name[1]); ?>
                    </a>
                    <br>
                    <span style="color:green;">เมื่อวันที่</span> <?php echo date("d-m-Y H:i:s", strtotime($row['created'])); ?> &nbsp;&nbsp;&nbsp;
                    <a href="<?php echo base_url(); ?>index.php/bookSend/bookSend/delete_file_upload_registration/<?php echo $row['id']; ?>/<?php echo $result[0]['id'];?>">
                       [ลบออก] 
                    </a>
                </li>
                <?php } ?>
            </ul>
           </div>       
        </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#form_registration_create").validate({

            rules: {
                    subject: "required",
                    to_receive : "required",
                    ducument_number_new : { number: true }
                },

            messages: {
                subject : "<p style = 'color:red;'>กรุณากรอกช่องชื่อเรื่อง</p>",
                to_receive : "<p style = 'color:red;'>กรุณากรอกช่องเรียน</p>",
                ducument_number_new : "<p style = 'color:red;'>กรุณากรอกเป็นตัวเลขเท่านั้น</p>"
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

