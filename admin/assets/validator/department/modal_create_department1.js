
    $( document ).ready(function() {
        $("#modal_create_department1").validate({
              rules: {
                      department_number1: "required",
                      department_name1 : "required"
                  },

                  messages: {
                      department_number1: "<p style = 'color:red;'>กรุณากรอกหมายเลขแผนก</p>",
                      department_name1 : "<p style = 'color:red;'>กรุณากรอกชื่อแผนก</p>"
                  }
        });
        $("#modal_create_department2").validate({
              rules: {
                      department_number1_am: "required",
                      department_name1_am : "required"
                  },

                  messages: {
                      department_number1_am: "<p style = 'color:red;'>กรุณากรอกหมายเลขแผนก</p>",
                      department_name1_am : "<p style = 'color:red;'>กรุณากรอกชื่อแผนก</p>"
                  }
        });
        $("#modal_create_department3").validate({
              rules: {
                      department_number1_tam: "required",
                      department_name1_tam : "required"
                  },

                  messages: {
                      department_number1_tam: "<p style = 'color:red;'>กรุณากรอกหมายเลขแผนก</p>",
                      department_name1_tam : "<p style = 'color:red;'>กรุณากรอกชื่อแผนก</p>"
                  }
        });
    });

