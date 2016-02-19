
$(document).ready(function() {
    $("#layer_secret").validate({
        rules: {
            layersacretname: "required",
            layersacretdetail: "required"
        },
        messages: {
            layersacretname: "<p style = 'color:red;'>กรุณากรอกชั้นความลับ</p>",
            layersacretdetail: "<p style = 'color:red;'>กรุณากรอกรายละเอียด</p>"
        }
    });
    /*$('#layer_secret').keydown(function(e) {
        //var layerpriorityname = $("#layerpriorityname").val();
        // var layerprioritydetail = $("#layerprioritydetail").val();
        var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
        if (key == 32) {
            return false;
        }
    });*/
    

});

