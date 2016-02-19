<script>
	$("#tambol").change(function(event){
									
									var tambol_id = $(this).val();
									var tambol_name = $("#tambol option:selected").text();
									if(tambol_id == 0)
									{  
										$("#getcontent3").hide();
								   		$("#btn_add3").hide();
								   		$("#content3").hide();
									}
									else
									{   
										$("#content3").show();
									    $.post( "index.php/maindata/institution/get_institution_tambol",{'id' : tambol_id }, function( data ) {
										  $( "#content3" ).html( data );
										});    
										var province_id = $("#province option:selected").val();
										var amphur_id = $("#amphur option:selected").val();
										$("#form3").show();
										$("#getcontent3").show();
										$("#btn_add3").text(" : "+tambol_name).show();
										$("#title3").text(" เพิ่มกลุ่มหน่วยงานตำบลภายใน : "+tambol_name);
										$("#getname2").text("กลุ่มหน่วยงานระดับจังหัด : "+tambol_name);
										$("#step3").show();

										$("#hide3").val(tambol_id);
										$("#hide3_pro").val(province_id);
										$("#hide3_am").val(amphur_id);
										
									}				
		});
		$("#save3").click(function(){
					var name3       = $("#name3").val();
					var tambol_id = $("#tambol").val();
					if(name3  != "")
					{
						
						$.post( "index.php/maindata/institution/insert_institution_tambol", $("#mymodal_tambol").serialize() , function( data ) {
							  alert("บันทึกข้อมูลเรียบร้อยแล้ว");
							  $('#myModal_3').modal('hide');
							  $("#name3").val('');
							  $("#detail3").val('');
							   $.post( "index.php/maindata/institution/get_institution_tambol",{'id' : tambol_id }, function( data ) {
										  $( "#content3" ).html( data );
										});    
					    });
					}
					else
					{
						alert("กรุณากรอก กลุ่มงานตำบล");
					}
				});

		function confirmdel3(id , institution_amphur_id) {
	$("#name3").val('');
	$("#detail3").val('');
    if (confirm("ต้องการลบจริงหรือไม่") == true) {

           $.post( "index.php/maindata/institution/delete3/",{'id' : id }, function( data ) {
           			 alert("ลบข้อมูลเรียบร้อบแล้ว");
           			 var tambol_id = $("#tambol").val();
				       $.post( "index.php/maindata/institution/get_institution_tambol",{'id' : tambol_id }, function( data ) {
										  $( "#content3" ).html( data );
						}); 
					   var amphur = $("#amphur").val();
									        $('#tambol option[value!="0"]').remove();
									         $.post( "index.php/maindata/institution/get_institution_province3",{'id':amphur}, function( data ) {
									          
									               $('#tambol').attr('enabled', 'true');
									               $.each(data, function() {
									                  $('#tambol').append(
									                      $("<option></option>").text(this.institution_amphur_name).val(this.id)
									    		 );
											 });
										});
					 
			});
    } else {
         
    }
}
$("#save_3").click(function(){
			var name_3    = $("#name_3").val();
			var detail_3  = $("#detail_3").val();
			var hide_3    = $("#hide_3").val();
			if(name_3  != "")
			{	 
				$.post( "index.php/maindata/institution/edit_institution_tambol", $("#mymodal_tambol_edit").serialize() , function( data ) {
					// alert(data);
					  alert("บันทึกข้อมูลเรียบร้อยแล้ว");
					  $('#myModal_edit3').modal('hide');
					  $("#name_3").val('');
					  $("#detail_3").val('');
					   var tambol_id = $("#tambol").val();
				       $.post( "index.php/maindata/institution/get_institution_tambol",{'id' : tambol_id }, function( data ) {
										  $( "#content3" ).html( data );
						}); 
			    });
			}
			else
			{
				alert("กรุณากรอก กลุ่มงานอำเภอ");
			}
		});
function confirmedit3(id , tambol_id) {
	$.post( "index.php/maindata/institution/edit3/",{'id' : id }, function( data ) {
           		var name   = data[0].institution_district_name ;
           		var detail = data[0].institution_district_detail;
           		var id = data[0].id;
           		$("#name_3").val(name);
           		$("#detail_3").val(detail);
           		$("#hide_3").val(id);
	},'json');
}
</script>