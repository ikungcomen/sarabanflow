
    $( document ).ready(function() {
        $("#document_send_or_recieve").validate({
              rules: {
                      send_name: "required",
                      send_detail : "required"
                  },

                  messages: {
                      send_name: "<p style = 'color:red;'>กรุณากรอกวิธีรับ-ส่งเอกสาร</p>",
                      send_detail : "<p style = 'color:red;'>กรุณากรอกรายละเอียด</p>"
                  },
        });
    });

