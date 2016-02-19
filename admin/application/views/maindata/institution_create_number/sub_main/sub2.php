<script type="text/javascript">
	$(document).ready(function(){

		//get data from province selected
		$("#amphur").change(function(){
			var amphur_id = $(this).val(); 
				$("#form3").show();
				$.post( "index.php/maindata/institution_create_number/getdata_from_amphur_institution",{'amphur_id' : amphur_id }, function( data ) {
				   $("#content2").html( data );
				});
				$('html, body').animate({
						               scrollTop: $("#step2").offset().top
						               }, 1000);
			
			
		});
			$("#amphur").change(function(event){
					//alert("xxx");
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


	});
</script>