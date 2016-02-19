
    $( document ).ready(function() {
        $("#modal_createnumber1").validate({
              rules: {
                      instutition_number: "required",
                      institution_send_number: "required",
                      //federal_register:"required",
                  },

                  messages: {
                      instutition_number: "<p style = 'color:red;'>เลขทะเบียนต้องไม่ใช่ค่าว่าง</p>",
                      institution_send_number: "<p style = 'color:red;'>เลขส่งทะเบียนหน่วยงานต้องไม่ใช่ค่าว่าง</p>",
                      //federal_register: "<p style = 'color:red;'>เลขส่งทะเบียนกลางต้องไม่ใช่ค่าว่าง</p>",
                  },

                  

        });
    });

