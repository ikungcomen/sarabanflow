					<script>
							$(document).ready(function(){
								    $("#form2").hide();
								    $("#form3").hide();
								    $("#getcontent1").hide();
								    $("#btn_add1").hide();
								  
									var province_id = $("#province").val();
									var province_name = $("#province option:selected").text();
										$("#btn_add1").text(" : "+province_name);
										$("#title1").text(" เพิ่มหน่วยงานจังหวัด : "+province_name);
										$("#hide1").val(province_id);	
								$("#province").change(function(event){

									 var province_id = $(this).val();
								        $('#amphur option[value!="0"]').remove();
								         $.post( "index.php/maindata/institution/get_institution_province2",{'id':province_id}, function( data ) {
								          
								               $('#amphur').attr('enabled', 'true');
								               $.each(data, function() {
								                  $('#amphur').append(
								                      $("<option></option>").text(this.institution_province_name).val(this.id)
								                  );
								               });
								         });
								 });		
								$("#province").change(function(event){
									  $("#getcontent2").hide();
								   	$("#btn_add2").hide();
								   	$("#content2").hide();
									$("#form2").show();
									$("#form3").hide();
									$("#getcontent1").show();
								    $("#btn_add1").show();
								    $("#content1").show();
								    $("#content2").hide();
									var province_id = $(this).val();
									var province_name = $("#province option:selected").text();
									if(province_id == 0)
									{  
										$("#form2").hide();
										$("#getcontent1").hide();
								   		$("#btn_add1").hide();
								   		$("#content1").hide();
									}
									$.post( "index.php/maindata/institution/get_institution_province",{'id' : province_id }, function( data ) {
									  $( "#content1" ).html( data );
									});

										$("#btn_add1").text(" : "+province_name);
										$("#title1").text(" เพิ่มหน่วยงานจังหวัด : "+province_name);
										$("#hide1").val(province_id);
									$("#step2").show();
									$("#getname1").text("กลุ่มหน่วยงานระดับจังหัด : "+province_name);
								
						               $('html, body').animate({
						               scrollTop: $("#step2").offset().top
						               }, 1000);
								});
							

							});
						</script>