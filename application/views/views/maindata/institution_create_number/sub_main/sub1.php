<script type="text/javascript">
	$(document).ready(function(){
		//get data from province selected
		$("#province").change(function(){
			var province_id = $(this).val();
			if(province_id == 0)
			{
				$("#content1").hide();
				$("#content2").hide();
				$("#content3").hide();
			}
			$("#prov_id").val(province_id);
				$("#form2").show();
				$("#content1").show();
				$.post( "index.php/maindata/institution_create_number/getdata_from_province_institution",{'province_id' : province_id }, function( data ) {
			      $("#content1").html( data );
			    });
			     $('html, body').animate({
						scrollTop: $("#step2").offset().top
				 }, 1000);
			 
			
		});

		 $("#province").change(function(){
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
	});
</script>