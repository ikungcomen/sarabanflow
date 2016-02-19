
    $( document ).ready(function() {
        $("#document_type").validate({
              rules: {
                      document_type_name: "required",
                      document_type_detail : "required"
                  },

                  messages: {
                      document_type_name: "<p style = 'color:red;'>กรุณากรอกประเภทเอกสาร</p>",
                      document_type_detail : "<p style = 'color:red;'>กรุณากรอกรายละเอียด</p>"
                  },
        });
    });

