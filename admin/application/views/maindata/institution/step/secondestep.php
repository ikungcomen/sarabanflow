<script>

	function confirmdel2(id , institution_province_id) {
	$("#name2").val('');
	$("#detail2").val('');
    if (confirm("ต้องการลบจริงหรือไม่") == true) {

           $.post( "index.php/maindata/institution/delete2/",{'id' : id }, function( data ) {
           			 alert("ลบข้อมูลเรียบร้อบแล้ว");
				     $.post( "index.php/maindata/institution/get_institution_amphur",{'id' : institution_province_id }, function( data ) {
							$( "#content2" ).html( data );
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
function confirmedit2(id , province_id) {
	$.post( "index.php/maindata/institution/edit2/",{'id' : id }, function( data ) {
           		var name   = data[0].institution_amphur_name ;
           		var detail = data[0].institution_amphur_detail;
           		var id = data[0].id;
           		$("#name_2").val(name);
           		$("#detail_2").val(detail);
           		$("#hide_2").val(id);
	},'json');
}

$("#save_2").click(function(){
			var name_2    = $("#name_2").val();
			var detail_2  = $("#detail_2").val();
			var hide_2    = $("#hide_2").val();
			var amphur_id = $("#amphur").val();
			if(name_2  != "")
			{	 
				$.post( "index.php/maindata/institution/edit_institution_amphur", $("#mymodal_amphur_edit").serialize() , function( data ) {
					// alert(data);
					  alert("บันทึกข้อมูลเรียบร้อยแล้ว");
					  $('#myModal_edit2').modal('hide');
					  $("#name_2").val('');
					  $("#detail_2").val('');
					  $.post( "index.php/maindata/institution/get_institution_amphur",{'id' : amphur_id }, function( data ) {
							$( "#content2" ).html( data );
					  });
					  updatelist3();
			    });
			}
			else
			{
				alert("กรุณากรอก กลุ่มงานอำเภอ");
			}
		});
</script>
<script>
	function updatelist3()
			{
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

			}
			$("#amphur").change(function(event){
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
								 
		$("#amphur").change(function(event){
									
									var amphur_id = $(this).val();
									var amphur_name = $("#amphur option:selected").text();
									if(amphur_id == 0)
									{  
										$("#form3").hide();
										$("#getcontent2").hide();
								   		$("#btn_add2").hide();
								   		$("#content2").hide();
									}
									else
									{   
										$("#content2").show();
									    $.post( "index.php/maindata/institution/get_institution_amphur",{'id' : amphur_id }, function( data ) {
										  $( "#content2" ).html( data );
										});    
										var province_id = $("#province option:selected").val();
										$("#form3").show();
										$("#getcontent2").show();
										$("#btn_add2").text(" : "+amphur_name).show();
										$("#title2").text(" เพิ่มกลุ่มหน่วยงานอำเภอภายใน : "+amphur_name);
										$("#hide2").val(amphur_id);
										$("#step3").show();
										$("#hide2_pro").val(province_id);
										$("#getname2").text("กลุ่มหน่วยงานระดับจังหัด : "+amphur_name);
										$('html, body').animate({
						                scrollTop: $("#step3").offset().top
						                }, 1000);
									}

									
		});
		$("#save2").click(function(){
			var name2       = $("#name2").val();
			var detail2     = $("#detail2").val();
			var hide2   	= $("#hide2").val();
			if(name2  != "")
			{
				
				$.post( "index.php/maindata/institution/insert_institution_amphur", $("#mymodal_amphur").serialize() , function( data ) {
					  alert("บันทึกข้อมูลเรียบร้อยแล้ว");
					  updatelist3();
					  $('#myModal_2').modal('hide');
					  $("#name2").val('');
					  $("#detail2").val('');
					  $.post( "index.php/maindata/institution/get_institution_amphur",{'id' : hide2 }, function( data ) {
							$( "#content2" ).html( data );
					  });
			    });
			}
			else
			{
				alert("กรุณากรอก กลุ่มงานำเภอ");
			}
		});
		function updatelist3()
		{
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
		}
</script>