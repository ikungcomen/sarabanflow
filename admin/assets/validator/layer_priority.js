
$(document).ready(function() {
    $("#layer_priority").validate({
        rules: {
            layerpriorityname: "required",
            layerprioritydetail: "required"
        },
        messages: {
            layerpriorityname: "<p style = 'color:red;'>กรุณากรอกชั้นความเร็ว</p>",
            layerprioritydetail: "<p style = 'color:red;'>กรุณากรอกรายละเอียด</p>"
        },
    });
    /*$('#layer_priority').keydown(function(e) {
        //var layerpriorityname = $("#layerpriorityname").val();
       // var layerprioritydetail = $("#layerprioritydetail").val();
        var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
        if (key == 32) {
            return false;
        }

    });*/



});


