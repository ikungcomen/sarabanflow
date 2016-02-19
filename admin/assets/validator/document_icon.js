
    $( document ).ready(function() {
        $("#document_icon").validate({
              rules: {
                      iconname: "required",
                      icondetail : "required"
                  },

                  messages: {
                      iconname: "<p style = 'color:red;'>กรุณากรอกไอคอนเอกสาร</p>",
                      icondetail : "<p style = 'color:red;'>กรุณากรอกรายละเอียด</p>"
                  },
        });
    });

