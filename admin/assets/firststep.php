 <script>
	$(document).ready(function(){
			function updatelist2()
			{
										 var province_id = $("#province").val();
									        $('#amphur option[value!="0"]').remove();
									         $.post( "index.php/maindata/institution/get_institution_province2",{'id':province_id}, function( data ) {
									          
									               $('#amphur').attr('enabled', 'true');
									               $.each(data, function() {
									                  $('#amphur').append(
									                      $("<option></option>").text(this.institution_province_name).val(this.id)
									    		 );
											 });
										});

			}
		$("#save1").click(function(){
			var name1    = $("#name1").val();
			var detail1  = $("#detail1").val();
			var hide1    = $("#hide1").val();
			if(name1  != "")
			{
				
				$.post( "index.php/maindata/institution/insert_institution_province", $("#mymodal_province").serialize() , function( data ) {
					  alert("บันทึกข้อมูลเรียบร้อยแล้ว");
					  updatelist2();
					  $('#myModal').modal('hide');
					  $("#name1").val('');
					  $("#detail1").val('');
					  $.post( "index.php/maindata/institution/get_institution_province",{'id' : hide1 }, function( data ) {
							$( "#content1" ).html( data );
					  });
			    });
			}
			else
			{
				alert("กรุณากรอก กลุ่มงานจังหวัด");
			}
		});
		$("#save_1").click(function(){
			var name_1    = $("#name_1").val();
			var detail_1  = $("#detail_1").val();
			var hide_1    = $("#hide_1").val();
			var province_id = $("#province").val();
			if(name_1  != "")
			{
				 
				$.post( "index.php/maindata/institution/edit_institution_province", $("#mymodal_province_edit").serialize() , function( data ) {
					// alert(data);
					  alert("บันทึกข้อมูลเรียบร้อยแล้ว");
					  updatelist2();
					  $('#myModal_edit').modal('hide');
					  $("#name_1").val('');
					  $("#detail_1").val('');
					  $.post( "index.php/maindata/institution/get_institution_province",{'id' : province_id }, function( data ) {
							$( "#content1" ).html( data );
					  });
			    });
			}
			else
			{
				alert("กรุณากรอก กลุ่มงานจังหวัด");
			}
		});
	});
</script>
<script>
function confirmdel(id , province_id) {
	$("#name1").val('');
	$("#detail1").val('');
    if (confirm("ต้องการลบจริงหรือไม่") == true) {

           $.post( "index.php/maindata/institution/delete/",{'id' : id }, function( data ) {
           			 alert("ลบข้อมูลเรียบร้อบแล้ว");
				     $.post( "index.php/maindata/institution/get_institution_province",{'id' : province_id }, function( data ) {
							$( "#content1" ).html( data );
					 });
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
    } else {
         
    }
}
function confirmedit(id , province_id) {
	$.post( "index.php/maindata/institution/edit/",{'id' : id }, function( data ) {
           		var name   = data[0].institution_province_name ;
           		var detail = data[0].institution_province_detail;
           		var id = data[0].id;
           		$("#name_1").val(name);
           		$("#detail_1").val(detail);
           		$("#hide_1").val(id);
	},'json');
}
</script>

