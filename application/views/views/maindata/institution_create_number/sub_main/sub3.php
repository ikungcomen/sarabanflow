<script type="text/javascript">
	$(document).ready(function(){

		//get data from province selected
		$("#tambol").change(function(){
			var tambol_id = $(this).val();
			$.post( "index.php/maindata/institution_create_number/getdata_from_tambol_institution",{'tambol_id' : tambol_id }, function( data ) {
			   $("#content3").html( data );
			});
		});



	});
</script>