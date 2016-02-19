

$(document).ready(function() {
    $("#mymodal_province").validate({
        rules: {
            name1: "required",
            detail1: "required"
        },
        messages: {
            name1: "<p style = 'color:red;'>กลุ่มงานจังหวัด</p>",
            detail1: "<p style = 'color:red;'>รายละเอียด</p>"
        },
 	   });
    });