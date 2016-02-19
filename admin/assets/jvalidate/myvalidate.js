
    $( document ).ready(function() {
        $("#signupform").validate({
              rules: {
                      firstname: "required",
                      lastname : "required",
                      username : "required",
                      password : "required",
                      conpassword: {
                        equalTo: "#password"
                     }
                  },

                  messages: {
                      firstname: "<p style = 'color:red;'>กรุณาใส่ชื่อ<p>",
                      lastname : "<p style = 'color:red;'>กรุณาใส่นามสกุล<p>",
                      username : "<p style = 'color:red;'>กรุณาใส่ username<p>",
                      password : "<p style = 'color:red;'>กรุณาใส่ password<p>",
                      conpassword: "<p style = 'color:red;'>password ไม่เหมือนกัน<p>"
                  },
        });
    });

