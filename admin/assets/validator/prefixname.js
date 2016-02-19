
    $( document ).ready(function() {
        $("#prefixname").validate({
              rules: {
                      prefixname: "required",
                      prefix_detail : "required"
                  },

                  messages: {
                      prefixname: "<p style = 'color:red;'>กรุณากรอกคำนำหน้าชื่อ</p>",
                      prefix_detail : "<p style = 'color:red;'>กรุณากรอกรายละเอียด</p>"
                  },
        });
    });

