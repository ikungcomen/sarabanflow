
    $( document ).ready(function() {
        $("#objective").validate({
              rules: {
                      objectivename: "required",
                      objectivedetail : "required"
                  },

                  messages: {
                      objectivename: "<p style = 'color:red;'>กรุณากรอกวัตถุประสงค์</p>",
                      objectivedetail : "<p style = 'color:red;'>กรุณากรอกรายละเอียด</p>"
                  },
        });
    });

