
    $( document ).ready(function() {
        $("#admin_system").validate({
              rules: {
                      username: "required",
                      password : "required",
                      repassword: {
                        equalTo: "#password"
                     }
                  },

                  messages: {
                      username: "<p style = 'color:red;'>กรุณากรอกชื่อผู้ใช้</p>",
                      password : "<p style = 'color:red;'>กรุณากรอกรหัสผ่าน</p>",
                      repassword : "<p style = 'color:red;'>รหัสผ่านไม่ตรงกัน</p>"
                  },
        });
    });

