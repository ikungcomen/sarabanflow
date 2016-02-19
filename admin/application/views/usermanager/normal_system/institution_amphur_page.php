
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="box">
        <div class="box-icon">
            <span class="fa fa-4x fa-user"></span>
        </div>
        <div class="info">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="col-md-5 control-label" for="institution_province">เลือกหน่วยงานระดับอำเภอ : </label>
                        <div class="col-md-7">
                            <select name="institution_amphur" id="institution_amphur" class="form-control">
                                <option value="">กรุณาเลือก</option>
                                <?php foreach ($institution_amphur as $row){ ?>
                                <option value="<?php echo $row->id; ?>"><?php echo $row->institution_amphur_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    
                    <a href="#" class="btn btn-primary" id="create_user_institution_amphur" data-toggle="modal" data-target="#create_user_institution_amphur_modal" data-backdrop="static">เพิ่มผู้ใช้งาน</a>
                </div>
            </div>
            <!-- form add modify user  ----------------------------------------------------------------------------------------------- -->
            <br>
            <div class="modal fade" id="create_user_institution_amphur_modal" tabindex="-1" role="dialog" aria-labelledby="create_user_institution_amphur_modal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form class="form-horizontal" action="" method="post" id="form_user_institution_amphur">
                        <div class="modal-header" style="border-bottom: none;">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        </div>
                        <div class="modal-body">
          
                            <div class="row" id="show_form_manage_user">
                                <div class="col-md-12">
                                  <div class="">
                                    
                                    <fieldset>
                                      <legend class="text-center">จัดการผู้ใช้งานหน่วยงานระดับอำเภอ</legend>

                                      <!-- Name input-->
                                      <div class="form-group">
                                        <label class="col-md-3 control-label" for="username_of_amphur">Username : </label>
                                        <div class="col-md-9">
                                          <input id="username_of_amphur" name="username_of_amphur" type="text" placeholder="Username" class="form-control">
                                        </div>
                                      </div>

                                      <!-- Email input-->
                                      <div class="form-group">
                                        <label class="col-md-3 control-label" for="password_of_amphur">Password</label>
                                        <div class="col-md-9">
                                            <input id="password_of_amphur" name="password_of_amphur" type="text" placeholder="Password" class="form-control">
                                        </div>
                                      </div>

                                      <!-- Message body -->
                                      <div class="form-group">
                                        <label class="col-md-3 control-label" for="fullname_of_amphur">ชื่อ-นามสกุล</label>
                                        <div class="col-md-9">
                                            <input id="fullname_of_amphur" name="fullname_of_amphur" type="text" placeholder="ชื่อ-นามสกุล" class="form-control">

                                        </div>
                                      </div>

                                      <!-- Message body -->
                                      <div class="form-group">
                                        <label class="col-md-3 control-label" for="user_detail_of_amphur">รายละเอียด</label>
                                        <div class="col-md-9">

                                            <textarea class="form-control" id="user_detail_of_amphur" name="user_detail_of_amphur" placeholder="รายละเอียด" rows="5"></textarea>
                                        </div>
                                      </div>
                                      
                                      <!-- Message body -->
                                      <div class="form-group">
                                        <label class="col-md-3 control-label" for="designation_of_amphur">ตำแหน่ง</label>
                                        <div class="col-md-9">
                                            <select name="designation_of_amphur" id="designation_of_amphur" class="form-control">
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
                                        <label class="col-md-3 control-label" for="department_of_amphur">สังกัดแผนก</label>
                                        <div class="col-md-9">
                                            <select name="department_of_amphur" id="department_of_amphur" class="form-control">
                                                <option value="">เลือกสังกัดแผนก</option>
                                                
                                            </select>
                                        </div>
                                      </div>
                                      
                                      <!-- Message body -->
                                      <div class="form-group">
                                        <label class="col-md-3 control-label" for="permission_level_of_amphur">กำหนดสิทธิ์การใช้งานระบบ</label>
                                        <div class="col-md-9">

                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="permission_level_of_amphur[]" id="permission_level_1_amphur" value="1" checked> ทั่วไป
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="permission_level_of_amphur[]" id="permission_level_2_amphur" value="2"> แก้ไข
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="permission_level_of_amphur[]" id="permission_level_3_amphur" value="3"> ชั้นความลับ
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="permission_level_of_amphur[]" id="permission_level_4_amphur" value="4"> หัวหน้า
                                                </label>


                                        </div>
                                      </div>

                                      <!-- Form actions -->
                                      <div class="form-group">
                                        <div class="col-md-12 text-right">
                                          <!--<button type="submit" class="btn btn-primary btn-lg" id="btn_submit_form_institution_province">บันทึก</button>
                                          <button type="reset" class="btn btn-danger btn-lg" id="btn_cancel_form_institution_province">ยกเลิก</button> -->
                                          <input type="hidden" name="province_id_of_amphur" id="province_id_of_amphur" value="">
                                          <input type="hidden" name="institution_amphur_id_of_amphur" id="institution_amphur_id_of_amphur" value="">
                                          <input type="hidden" name="normal_account_id_of_amphur" id="normal_account_id_of_amphur">
                                        </div>
                                      </div>
                                    </fieldset>
                                    
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="reset" class="btn btn-default" data-dismiss="modal" id="btn_cancel_form_institution_amphur">ยกเลิก</button>
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
                    <div class="tab-pane fade in active" id="list_user_institution_amphur">
                        <table id="example_table_user_institution_amphur" class="display" cellspacing="0" width="100%">
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
    $('#example_table_user_institution_amphur').DataTable();
    $("#create_user_institution_amphur").hide();
    //$("#show_form_manage_user_institution_amphur").hide();
    
    $("#institution_amphur").on("change",function(){
            //$("#show_page_institution_amphur").html('');
            $("#show_page_institution_district").html('');
            var pathname = window.location.pathname; // returns path only
            var url      = window.location.href;     // returns full url 

            var province_id = $("#province_id").val();
            var institution_province_id = $("#institution_province").val();

            if(province_id != "" && $(this).val() != ""){
                $("#create_user_institution_amphur").show();
                $("#show_page_institution_district").load(url+"/show_page_institution_district",{province_id:province_id, institution_province_id:institution_province_id, institution_amphur_id:$(this).val()} );
                list_user_institution_amphur(province_id, $(this).val());
                
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/usermanagement/normal_system/get_data_department_of_province",
                    type: "post",
                    data: {institution_id:$(this).val(), instutition_level:"institution_amphur"},
                    dataType:"html",
                    success: function(data) {
                        $("#department_of_amphur").html(data);
                    }
                });
            }else{
                $("#create_user_institution_amphur").hide();
                //$("#show_page_institution_amphur").html('');
                $("#show_page_institution_district").html('');
                //$("#btn_cancel_form_institution_amphur").click();
                list_user_institution_amphur('0', '0');
            }
        });
    
    $("#btn_cancel_form_institution_amphur").click(function(){
        $("#username_of_amphur").val("");
        $("#password_of_amphur").val("");
        $("#fullname_of_amphur").val("");
        $("#user_detail_of_amphur").val("");
        $("#normal_account_id_of_amphur").val("");
        
        $("#permission_level_2_amphur").prop('checked', false);
        $("#permission_level_3_amphur").prop('checked', false);
        $('#permission_level_4_amphur').prop('checked', false);
    });
    
    $("#permission_level_1_amphur").click(function(){
        $('#permission_level_1_amphur').prop('checked', true);
        
        $("#permission_level_2_amphur").prop('checked', false);
        $("#permission_level_3_amphur").prop('checked', false);
        $('#permission_level_4_amphur').prop('checked', false);
    });
    
    $("#permission_level_2_amphur").click(function(){
        if(this.checked) {
            $('#permission_level_1_amphur').prop('checked', true);
        }else{
            $('#permission_level_1_amphur').prop('checked', true);
            
            $('#permission_level_3_amphur').prop('checked', false);
            $('#permission_level_4_amphur').prop('checked', false);
        }
        
    });
    
    $("#permission_level_3_amphur").click(function(){
        if(this.checked) {
            $('#permission_level_1_amphur').prop('checked', true);
            $("#permission_level_2_amphur").prop('checked', true);
        }else{
            $('#permission_level_1_amphur').prop('checked', true);
            $("#permission_level_2_amphur").prop('checked', true);
            
            $("#permission_level_3_amphur").prop('checked', false);
            $('#permission_level_4_amphur').prop('checked', false);
        }
        
    });
    
    $("#permission_level_4_amphur").click(function(){
        if(this.checked) {
            $('#permission_level_1_amphur').prop('checked', true);
            $("#permission_level_2_amphur").prop('checked', true);
            $("#permission_level_3_amphur").prop('checked', true);
        }else{
            $('#permission_level_1_amphur').prop('checked', true);
            $("#permission_level_2_amphur").prop('checked', true);
            $("#permission_level_3_amphur").prop('checked', true);
            
            $('#permission_level_4_amphur').prop('checked', false);
        }
        
    });
    
    $("#form_user_institution_amphur").validate({
        
        rules: {
                username_of_amphur: "required",
                password_of_amphur : "required",
                fullname_of_amphur : "required",
                designation_of_amphur : "required",
                department_of_amphur : "required"
            },

        messages: {
            username_of_amphur: "<p style = 'color:red;'>กรุณากรอกชื่อผู้ใช้งาน</p>",
            password_of_amphur : "<p style = 'color:red;'>กรุณากรอกรหัสผ่าน</p>",
            fullname_of_amphur : "<p style = 'color:red;'>กรุณากรอกชื่อ-นามสกุล</p>",
            designation_of_amphur : "<p style = 'color:red;'>กรุณาเลือกตำแหน่ง</p>",
            department_of_amphur : "<p style = 'color:red;'>กรุณาเลือกแผนกที่สังกัด</p>"
        },
        
        submitHandler: function() { 
            if($("#normal_account_id_of_amphur").val() == ""){
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/usermanagement/normal_system/check_user_normal_existing",
                    type: "POST",
                    data: {username: $("#username_of_amphur").val() },
                    dataType:"html",
                    success: function(d) {
                        if($.trim(d) == "yes"){
                            add_user_institution_amphur();
                        }else{
                            alert("ไม่สามารถทำการบันทึกผู้ใช้งานได้ เนื่องจาก username นี้มีผู้ใช้งานแล้ว");
                        }
                    }
                });
            }else{
                add_user_institution_amphur();
            }
            
            
        }
    });
    
    $("#form_user_institution_amphur").submit(function(e){
        e.preventDefault();
    });
    
});
    function add_user_institution_amphur(){
    
        if($("#province_id").val() != "" && $("#institution_amphur").val() != ""){
            $("#province_id_of_amphur").val($("#province_id").val());
            $("#institution_amphur_id_of_amphur").val($("#institution_amphur").val());
            
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/usermanagement/normal_system/add_user_institution_amphur",
                type: "post",
                data: $("#form_user_institution_amphur").serialize(),
                dataType:"html",
                success: function(d) {
                    alert('เพิ่มข้อมูลผู้ใช้งาน เรียบร้อยแล้ว !!!');
                    $("#btn_cancel_form_institution_amphur").click();
                    list_user_institution_amphur($("#province_id").val(), $("#institution_amphur").val());
                }
            });
            
        }else{
            alert("ไม่สามารถทำการบันทึกข้อมูลผู้ใช้งานได้ กรุณาลองใหม่ในภายหลัง !!!");
        }
    }
    
    function edit_user_normal_amphur(normal_account_id){
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/usermanagement/normal_system/edit_user_institution_amphur",
            type: "post",
            data: {normal_account_id:normal_account_id},
            dataType:"json",
            success: function(data) {
                $("#permission_level_2_amphur").prop('checked', false);
                $("#permission_level_3_amphur").prop('checked', false);
                $('#permission_level_4_amphur').prop('checked', false);
                
                $("#username_of_amphur").val(data[0]['username']);
                $("#password_of_amphur").val(data[0]['password']);
                $("#fullname_of_amphur").val(data[0]['fullname']);
                $("#user_detail_of_amphur").val(data[0]['user_detail']);
                
                $("#designation_of_amphur").val(data[0]['designation']);
                $("#department_of_amphur").val(data[0]['department_of_instutition_id']);
                
                $("#normal_account_id_of_amphur").val(data[0]['id']);
                
                for(var i = 1 ; i <= data[0]['permission_level'] ; i++){
                    $("#permission_level_"+i+"_amphur").prop('checked', true);
                }
                
            }
        });
        
        $("#create_user_institution_amphur").click();
    }
    function remove_user_normal_amphur(normal_account_id){
        if(confirm('ต้องการลบผู้ใช้งานนี้จริงหรือไม่')){
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/usermanagement/normal_system/remove_user_institution_amphur",
                type: "post",
                data: {normal_account_id:normal_account_id},
                dataType:"html",
                success: function(d) {
                    var province_id = $("#province_id").val();
                    var institution_amphur_id = $("#institution_amphur").val();

                    list_user_institution_amphur(province_id, institution_amphur_id);
                    alert('ลบข้อมูลผู้ใช้งานนี้ เรียบร้อยแล้ว');
                }
            });
        }
        
    }
    function list_user_institution_amphur(province_id, institution_amphur_id){
        var url      = window.location.href;     // returns full url 
        $("#list_user_institution_amphur").load(url+"/list_user_institution_amphur", {province_id:province_id, institution_amphur_id:institution_amphur_id});
    }
</script>
