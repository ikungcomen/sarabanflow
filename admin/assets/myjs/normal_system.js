
$(document).ready(function(){
    $("#show_page_institution_province").html('');
    $("#show_page_institution_amphur").html('');
    $("#show_page_institution_district").html('');
        
    $("#province_id").change(function(){
        $("#show_page_institution_province").html('');
        $("#show_page_institution_amphur").html('');
        $("#show_page_institution_district").html('');
        var pathname = window.location.pathname; // returns path only
        var url      = window.location.href;     // returns full url 
        
        $("#show_province_name").html($("#province_id option:selected").text());
        if($(this).val() != ""){
            $("#show_page_institution_province").load(url+"/show_page_institution_province/"+$(this).val(), function(){ 
                var scrolled = 0;
                scrolled=scrolled+420;
                $("body").animate({
                        scrollTop:  scrolled
                });
            });
        }else{
            var scrolled = 200;
            
            $("body").animate({
                    scrollTop:  scrolled
            });
        }
    });
    
    
});