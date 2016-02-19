
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="box">
        <div class="box-icon">
            <span class="fa fa-4x fa-user"></span>
        </div>
        <div class="info">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="col-md-5 control-label" for="institution_district">เลือกหน่วยงานระดับตำบล : </label>
                        <div class="col-md-7">
                            <select name="institution_district" id="institution_district" class="form-control">
                                <option value="">กรุณาเลือก</option>
                                <?php foreach ($institution_district as $row){ ?>
                                <option value="<?php echo $row->id; ?>"><?php echo $row->institution_district_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <a href="#" class="btn btn-primary" id="create_user_institution_district" data-toggle="modal" data-target="#create_user_institution_district_modal" data-backdrop="static">เพิ่มผู้ใช้งาน</a>
                    
                </div>
            </div>
            <!-- form add modify user  ----------------------------------------------------------------------------------------------- -->
            <br>
            <div class="modal fade" id="create_user_institution_district_modal" tabindex="-1" role="dialog" aria-labelledby="create_user_institution_district_modal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form class="form-horizontal" action="" method="post" id="form_user_institution_district">
                        <div class="modal-header" style="border-bottom: none;">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        </div>
                        <div class="modal-body">
          
                            <div class="row" id="show_form_manage_user">
                                <div class="col-md-12">
                                  <div class="">
                                    
                                    <fieldset>
                                      <legend class="text-center">จัดการผู้ใช้งานหน่วยงานระดับตำบล</legend>

                                      <!-- Name input-->
                                      <div class="form-group">
                                        <label class="col-md-3 control-label" for="username_of_district">Username : </label>
                                        <div class="col-md-9">
                                          <input id="username_of_district" name="username_of_district" type="text" placeholder="Username" class="form-control">
                                        </div>
                                      </div>

                                      <!-- Email input-->
                                      <div class="form-group">
                                        <label class="col-md-3 control-label" for="password_of_district">Password</label>
                                        <div class="col-md-9">
                                            <input id="password_of_district" name="password_of_district" type="text" placeholder="Password" class="form-control">
                                        </div>
                                      </div>

                                      <!-- Message body -->
                                      <div class="form-group">
                                        <label class="col-md-3 control-label" for="fullname_of_district">ชื่อ-นามสกุล</label>
                                        <div class="col-md-9">
                                            <input id="fullname_of_district" name="fullname_of_district" type="text" placeholder="ชื่อ-นามสกุล" class="form-control">

                                        </div>
                                      </div>

                                      <!-- Message body -->
                                      <div class="form-group">
                                        <label class="col-md-3 control-label" for="user_detail_of_district">รายละเอียด</label>
                                        <div class="col-md-9">

                                            <textarea class="form-control" id="user_detail_of_district" name="user_detail_of_district" placeholder="รายละเอียด" rows="5"></textarea>
                                        </div>
                                      </div>

                                      <!-- Message body -->
                                      <div class="form-group">
                                        <label class="col-md-3 control-label" for="designation_of_district">ตำแหน่ง</label>
                                        <div class="col-md-9">
                                            <select name="designation_of_district" id="designation_of_district" class="form-control">
                                                <option value="">เลือกตำแหน่ง</option>
                                                <option value="governor">ผู้ว่าราชการจังหวัด</option>
                                                <option value="prefect">นายอำเภอ</option>
                                                <option value="central_administration">ธุรการกลาง</option>
                                                <option value="employees">พนักงานราชการ</option>
                                            </select>
                                        </div>
                                      </div>
                                      
                                      <!-- Message body -->
                                      <div class="form-group">
                                        <label class="col-md-3 control-label" for="department_of_district">สังกัดแผนก</label>
                                        <div class="col-md-9">
                                            <select name="department_of_district" id="department_of_district" class="form-control">
                                                <option value="">เลือกสังกัดแผนก</option>
                                                
                                            </select>
                                        </div>
                                      </div>
                                      
                                      <!-- Message body -->
                                      <div class="form-group">
                                        <label class="col-md-3 control-label" for="permission_level_of_district">กำหนดสิทธิ์การใช้งานระบบ</label>
                                        <div class="col-md-9">

                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="permission_level_of_district[]" id="permission_level_1_district" value="1" checked> ทั่วไป
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="permission_level_of_district[]" id="permission_level_2_district" value="2"> แก้ไข
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="permission_level_of_district[]" id="permission_level_3_district" value="3"> ชั้นความลับ
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="permission_level_of_district[]" id="permission_level_4_district" value="4"> หัวหน้า
                                                </label>


                                        </div>
                                      </div>

                                      <!-- Form actions -->
                                      <div class="form-group">
                                        <div class="col-md-12 text-right">
                                          <!--<button type="submit" class="btn btn-primary btn-lg" id="btn_submit_form_institution_province">บันทึก</button>
                                          <button type="reset" class="btn btn-danger btn-lg" id="btn_cancel_form_institution_province">ยกเลิก</button> -->
                                          <input type="hidden" name="province_id_of_district" id="province_id_of_district" value="">
                                          <input type="hidden" name="institution_district_id_of_district" id="institution_district_id_of_district" value="">
                                          <input type="hidden" name="normal_account_id_of_district" id="normal_account_id_of_district">
                                        </div>
                                      </div>
                                    </fieldset>
                                    
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="reset" class="btn btn-default" data-dismiss="modal" id="btn_cancel_form_institution_district">ยกเลิก</button>
                          <button type="submit" class="btn btn-primary">บันทึก</button>
                        </div>
                        </form>    
                    </div>
                </div>
            </div>        
          
            <!-- end form add modify user -------------------------------------------------------------------------------------------------->
            <br>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tab-pane fade in active" id="list_user_institution_district">
                        <table id="example_table_user_institution_district" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ที่</th>
                                    <th>username</th>
                                    <th>ชื่อ-นามกุล</th>
                                    <th>รายละเอียด</th>
                                    <th>สิทธิ์การใช้งาน</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
$(document).ready(function(){
    $('#example_table_user_institution_district').DataTable();
    $("#create_user_institution_district").hide();
    //$("#show_form_manage_user_institution_district").hide();
    
    $("#institution_district").on("change",function(){
            //$("#show_page_institution_amphur").html('');
            //$("#show_page_institution_district").html('');
            var pathname = window.location.pathname; // returns path only
            var url      = window.location.href;     // returns full url 

            var province_id = $("#province_id").val();
            var institution_province_id = $("#institution_province").val();

            if(province_id != "" && $(this).val() != ""){
                $("#create_user_institution_district").show();
                //$("#show_page_institution_district").load(url+"/show_page_institution_district",{province_id:province_id, institution_province_id:institution_province_id, institution_amphur_id:$(this).val()} );
                list_user_institution_district(province_id, $(this).val());
                
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/usermanagement/normal_system/get_data_department_of_province",
                    type: "post",
                    data: {institution_id:$(this).val(), instutition_level:"institution_district"},
                    dataType:"html",
                    success: function(data) {
                        $("#department_of_district").html(data);
                    }
                });
            }else{
                $("#create_user_institution_district").hide();
                //$("#show_page_institution_amphur").html('');
                //$("#show_page_institution_district").html('');
                //$("#btn_cancel_form_institution_district").click();
                list_user_institution_district('0', '0');
            }
        });
    
    $("#btn_cancel_form_institution_district").click(function(){
        $("#username_of_district").val("");
        $("#password_of_district").val("");
        $("#fullname_of_district").val("");
        $("#user_detail_of_district").val("");
        $("#normal_account_id_of_district").val("");
        
        $("#permission_level_2_district").prop('checked', false);
        $("#permission_level_3_district").prop('checked', false);
        $('#permission_level_4_district').prop('checked', false);
    });
    
    $("#permission_level_1_district").click(function(){
        $('#permission_level_1_district').prop('checked', true);
        
        $("#permission_level_2_district").prop('checked', false);
        $("#permission_level_3_district").prop('checked', false);
        $('#permission_level_4_district').prop('checked', false);
    });
    
    $("#permission_level_2_district").click(function(){
        if(this.checked) {
            $('#permission_level_1_district').prop('checked', true);
        }else{
            $('#permission_level_1_district').prop('checked', true);
            
            $('#permission_level_3_district').prop('checked', false);
            $('#permission_level_4_district').prop('checked', false);
        }
        
    });
    
    $("#permission_level_3_district").click(function(){
        if(this.checked) {
            $('#permission_level_1_district').prop('checked', true);
            $("#permission_level_2_district").prop('checked', true);
        }else{
            $('#permission_level_1_district').prop('checked', true);
            $("#permission_level_2_district").prop('checked', true);
            
            $("#permission_level_3_district").prop('checked', false);
            $('#permission_level_4_district').prop('checked', false);
        }
        
    });
    
    $("#permission_level_4_district").click(function(){
        if(this.checked) {
            $('#permission_level_1_district').prop('checked', true);
            $("#permission_level_2_district").prop('checked', true);
            $("#permission_level_3_district").prop('checked', true);
        }else{
            $('#permission_level_1_district').prop('checked', true);
            $("#permission_level_2_district").prop('checked', true);
            $("#permission_level_3_district").prop('checked', true);
            
            $('#permission_level_4_district').prop('checked', false);
        }
        
    });
    
    $("#form_user_institution_district").validate({
        
        rules: {
                username_of_district: "required",
                password_of_district : "required",
                fullname_of_district : "required",
                designation_of_district : "required",
                department_of_district : "required"
            },

        messages: {
            username_of_district: "<p style = 'color:red;'>กรุณากรอกชื่อผู้ใช้งาน</p>",
            password_of_district : "<p style = 'color:red;'>กรุณากรอกรหัสผ่าน</p>",
            fullname_of_district : "<p style = 'color:red;'>กรุณากรอกชื่อ-นามสกุล</p>",
            designation_of_district : "<p style = 'color:red;'>กรุณาเลือกตำแหน่ง</p>",
            department_of_district : "<p style = 'color:red;'>กรุณาเลือกแผนกที่สังกัด</p>"
        },
        
        submitHandler: function() { 
            if($("#normal_account_id_of_district").val() == ""){
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/usermanagement/normal_system/check_user_normal_existing",
                    type: "POST",
                    data: {username: $("#username_of_district").val() },
                    dataType:"html",
                    success: function(d) {
                        if($.trim(d) == "yes"){
                            add_user_institution_district();
                        }else{
                            alert("ไม่สามารถทำการบันทึกผู้ใช้งานได้ เนื่องจาก username นี้มีผู้ใช้งานแล้ว");
                        }
                    }
                });
            }else{
                add_user_institution_district();
            }
            
            
        }
    });
    
    $("#form_user_institution_district").submit(function(e){
        e.preventDefault();
    });
});

    function add_user_institution_district(){
    
        if($("#province_id").val() != "" && $("#institution_district").val() != ""){
            $("#province_id_of_district").val($("#province_id").val());
            $("#institution_district_id_of_district").val($("#institution_district").val());
            
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/usermanagement/normal_system/add_user_institution_district",
                type: "post",
                data: $("#form_user_institution_district").serialize(),
                dataType:"html",
                success: function(d) {
                    alert('เพิ่มข้อมูลผู้ใช้งาน เรียบร้อยแล้ว !!!');
                    $("#btn_cancel_form_institution_district").click();
                    list_user_institution_district($("#province_id").val(), $("#institution_district").val());
                }
            });
            
        }else{
            alert("ไม่สามารถทำการบันทึกข้อมูลผู้ใช้งานได้ กรุณาลองใหม่ในภายหลัง !!!");
        }
    }
    
    function edit_user_normal_district(normal_account_id){
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/usermanagement/normal_system/edit_user_institution_district",
            type: "post",
            data: {normal_account_id:normal_account_id},
            dataType:"json",
            success: function(data) {
                $("#permission_level_2_district").prop('checked', false);
                $("#permission_level_3_district").prop('checked', false);
                $('#permission_level_4_district').prop('checked', false);
                
                $("#username_of_district").val(data[0]['username']);
                $("#password_of_district").val(data[0]['password']);
                $("#fullname_of_district").val(data[0]['fullname']);
                $("#user_detail_of_district").val(data[0]['user_detail']);
                
                $("#designation_of_district").val(data[0]['designation']);
                $("#department_of_district").val(data[0]['department_of_instutition_id']);
                
                $("#normal_account_id_of_district").val(data[0]['id']);
                
                for(var i = 1 ; i <= data[0]['permission_level'] ; i++){
                    $("#permission_level_"+i+"_district").prop('checked', true);
                }
                
            }
        });
        
        $("#create_user_institution_district").click();
    }
    function remove_user_normal_district(normal_account_id){
        if(confirm('ต้องการลบผู้ใช้งานนี้จริงหรือไม่')){
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/usermanagement/normal_system/remove_user_institution_district",
                type: "post",
                data: {normal_account_id:normal_account_id},
                dataType:"html",
                success: function(d) {
                    var province_id = $("#province_id").val();
                    var institution_district_id = $("#institution_district").val();

                    list_user_institution_district(province_id, institution_district_id);
                    alert('ลบข้อมูลผู้ใช้งานนี้ เรียบร้อยแล้ว');
                }
            });
        }
        
    }
    function list_user_institution_district(province_id, institution_district_id){
        var url      = window.location.href;     // returns full url 
        $("#list_user_institution_district").load(url+"/list_user_institution_district", {province_id:province_id, institution_district_id:institution_district_id});
    }
</script>
