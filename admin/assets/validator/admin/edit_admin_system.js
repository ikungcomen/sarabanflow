
    $( document ).ready(function() {
        $("#edit_admin_system").validate({
              rules: {
                      username: "required",
                      //password : "",
                      repassword: {
                        equalTo: "#password"
                        }
                     },

          messages: {
                      username: "<p style = 'color:red;'>กรุณากรอกชื่อผู้ใช้</p>",
                      repassword : "<p style = 'color:red;'>รหัสผ่านไม่ตรงกัน</p>"
                    }
        });
    });

