
    $( document ).ready(function() {
        $("#modal_createnumber2").validate({
              rules: {
                      instutition_number2: "required",
                      institution_send_number2: "required",
                      federal_register2:"required",
                  },

                  messages: {
                      instutition_number2: "<p style = 'color:red;'>เลขทะเบียนต้องไม่ใช่ค่าว่าง</p>",
                      institution_send_number2: "<p style = 'color:red;'>เลขส่งทะเบียนหน่วยงานต้องไม่ใช่ค่าว่าง</p>",
                      federal_register2: "<p style = 'color:red;'>เลขส่งทะเบียนกลางต้องไม่ใช่ค่าว่าง</p>",
                  },
                   submitHandler: function(form) {
                      if($("#federal_register2").val() == "")
                      {
                          alert("ยังไม่ได้เลือกหน่วยงานทะเบียนกลาง");
                      }
                      else
                      {
                          $.post( "index.php/maindata/institution_create_number/update_number",
                            {
                             'instutition_number' :  $("#instutition_number2").val(),
                             'institution_send_number' :  $("#institution_send_number2").val(),
                             'details_of_number'  : $("#details_of_number2").val(),
                             'federal_register'   : $("#federal_register2").val(),
                             'hide2'              : $("#hide22").val(),
                             'hide_id2'           : $("#hide_id22").val(),
                             'number_recieve'     : $("#number_recieve2").val(),
                             'number_internal'    : $("#number_internal2").val(),
                             'number_external'    : $("#number_external2").val(),
                             'setup_instutition_number11111111' : $("#setup_instutition_number12").val(),
                             'setup_instutition_number2' : $("#setup_instutition_number22").val(),
                             'setup_instutition_number3' : $("#setup_institution_number32").val(),
                             'hide1'   : $("#hide1").val()
                              }
                         , function( data ) {
                           //alert(data);
                           alert('อัพเดทเลขทะเบียนเรียบร้อยแล้ว');
                           $('#myModal_provice').modal('hide');
                           var province_id = $("#prov_id").val();
                           $.post( "index.php/maindata/institution_create_number/getdata_from_amphur_institution",{'province_id' : province_id }, function( data ) {
                             $("#content2").html( data );
                          });
                      });
                      }
                     
                  }

        });
    });

