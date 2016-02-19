
    $( document ).ready(function() {
        $("#document_category").validate({
              rules: {
                      category_name: "required",
                      category_detail : "required"
                  },

                  messages: {
                      category_name: "<p style = 'color:red;'>กรุณากรอกหมวดเอกสาร</p>",
                      category_detail : "<p style = 'color:red;'>กรุณากรอกรายละเอียด</p>"
                  },
        });
    });

