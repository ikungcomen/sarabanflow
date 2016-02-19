<div class="container">
    <div class="row">
        <div class="panel-body form-horizontal payment-form">
            <form id="submitChange" action="index.php/changePassword/changePassword/save" method="post">
                <div class="form-group">
                    <label class="col-sm-12 "><font color='red'><h3><< แก้ไขข้อมูลผู้ใช้ระบบ >></h3></font></label></label>
                </div>
                <hr>
                <div class="form-group">
                    <label class="col-sm-2 text-right">รหัสผ่านเดิม :</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control selectValue" id="defaultPassword" name="defaultPassword" placeholder="รหัสผ่านเดิม">
                        <span id="errorDefaultPassword"></span>
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-2 text-right">รหัสผ่านใหม่ :</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control selectValue" id="newPassword" name="newPassword" placeholder="รหัสผ่านใหม่">
                        <span id="new_password"></span>
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-2 text-right">ยืนยันรหัสผ่านใหม่ :</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control selectValue" id="RenewPassword" name="RenewPassword" placeholder="ยืนยันรหัสผ่านใหม่">
                        <span id="repassword"></span>
                    </div>
                    
                </div>
                <hr>
                <div class="form-group">
                    <div class="col-sm-6 text-right">
                        <a class="btn btn-success btnSave">บันทึกข้อมูล</a>
                        <button type="reset" class="btn btn-danger">ยกเลิก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $().ready(function() {
        $(".selectValue").click(function() {
            $(this).select();
        });
        $('#defaultPassword').focusout(function() {
            var check = check_email();
            check.success(function(data) {
                if(data == "1"){
                    $("#errorDefaultPassword").html("");
                }else{
                    var ht = '<br><b><font color="red">รหัสผ่านไม่ตรงกันกับรหัสผ่านเดิม</font><b>';
                    $("#errorDefaultPassword").html(ht);
                }
            });
        });
        $("#RenewPassword").prop('disabled', true);
        $("#newPassword").keyup(function(){
            var value = $("#newPassword").val();
            if(value.length > 0){
                $("#new_password").html("");
                $("#RenewPassword").prop('disabled', false);
            }else{
                $("#RenewPassword").val("");
                $("#RenewPassword").prop('disabled', true);
            }
        });
        $("#RenewPassword").focusout(function(){
            var newPassword = $("#newPassword").val();
            var RenewPassword = $("#RenewPassword").val();
            if(newPassword != RenewPassword){
                var ht = '<br><b><font color="red">รหัสผ่านไม่ตรงกัน</font><b>';
                $("#repassword").html(ht);
            }else{
                
                $("#repassword").html("");
            }
            
        });
        $(".btnSave").click(function(event) {
            var defaultPassword = $("#defaultPassword").val();
            var newPassword = $("#newPassword").val();
            var RenewPassword = $("#RenewPassword").val();
            
            if(defaultPassword == ""){
                var ht = '<br><b><font color="red">กรุณาระบุรหัสผ่านเดิม</font><b>';
                $("#errorDefaultPassword").html(ht);
                event.preventDefault();
            }else if(newPassword == ""){
                var ht = '<br><b><font color="red">กรุณาระบุรหัสผ่านใหม่</font><b>';
                $("#new_password").html(ht);
                event.preventDefault();
            }else if(RenewPassword == ""){
                var ht = '<br><b><font color="red">กรุณาระบุยืนยันรหัสผ่านใหม่</font><b>';
                $("#repassword").html(ht);
                event.preventDefault();
            }else{
                if(newPassword == RenewPassword){
                    $("#submitChange").submit();
                }
            }
           
        });
    });
    function check_email() {
        return $.ajax({
            type: 'POST',
            data: {defaultPassword: $('#defaultPassword').val()},
            url: 'index.php/changePassword/changePassword/checkDefaultPassword'
        });
    }
</script>