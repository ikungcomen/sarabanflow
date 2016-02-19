<table id="example" class="display" cellspacing="0" width="100%">
						<thead>
						        <tr>
						            <th>ที่</th>
						            <th>ชื่อหน่วยงาน</th>
						            <th>รายละเอียด</th>
						            <th>เลขทะเบียน</th>
						            <th>Option</th>
						        </tr>
						</thead>			 		 	
		  <tbody>
		  	<?php 
		  	$count = 0 ;
		  	foreach($result as $row){
		  	$count ++;
		  	?>
		  		<tr>
		  			 <td><?php echo $count ; ?></td>
		  			 <td><?php echo $row['institution_province_name']; ?></td>
		  			 <td><?php echo $row['institution_province_detail']; ?></td>
		  			 <td><?php 
		  			 	if($row['instutition_number'] == "")
		  			 	{
		  			 		echo "<p style = 'color:red'><b>ยังไม่ได้สร้างเลขทะเบียน</p></b>";
		  			 	}
		  			 	else
		  			 	{
		  			 		echo $row['instutition_number'];
		  			 	}
		  			  ?>
		  			  </td>
		  			 <td>
		  			 	<a id = 'setlink' href = "index.php/maindata/institution_create_number/show_form_update/1/<?php echo $row['id']; ?>/<?php echo base64_encode($row['institution_province_name']); ?>"  id = "update1" class = "btn btn-warning updateins1">จัดการเลขทะเบียน</a>
		  			 </td>
		  		</tr>	
		  	<?php }?>
        </tbody>
</table>
<script>
   $('#example').DataTable();
			$(document).ready(function() {
			    $('#example').DataTable();
			    $(".updateins1").click(function(event) {
			    	
			    	var textname = $(this).attr('href');
			    	$("#institution_send_number").val(textname);

				    var id = $(this).attr('id');
				    var province_id = $("#province").val();

				    $.post( "index.php/maindata/institution_create_number/get_data_to_update",{'id':id}, function( data ) {   
				    	   var id   				  = data[0]['id'];
			               var instutition_number 	  = data[0]['instutition_number'];
			               var instutition_main_send  = data[0]['instutition_main_send'];
			               var details_of_number 	  = data[0]['details_of_number'];
			               var federal_register 	  = data[0]['instutition_main_send'];
			               var instutition_main_id 	      = data[0]['instutition_main_id'];
			               var instutition_main_level 	  = data[0]['instutition_main_level'];
			               var number_recieve 	  		  = data[0]['number_recieve'];
			               var number_internal 	  		  = data[0]['number_internal'];
			               var number_external 	  		  = data[0]['number_external'];
			               var setup_instutition_number1 	    = data[0]['setup_instutition_number1'];
			               var setup_instutition_number2 	    = data[0]['setup_instutition_number2'];
			               var setup_instutition_number3 	    = data[0]['setup_instutition_number3'];

			               if(setup_instutition_number1 == 1)
			               {
			               		$('#setup_instutition_number1').prop('checked', true);
			               }
			               if(setup_instutition_number2 != "")
			               { 
			               	   $('#check_set2').prop('checked', true);
			               	   $("#setup_instutition_number2").prop('disabled', false);		
			               }
			               else
			               {
			               		$('#check_set2').prop('checked', false);
			               }
			               if(setup_instutition_number3 != "")
			               { 
			               	   $('#check_set3').prop('checked', true);
			               	   $("#setup_institution_number3").prop('disabled', false);		
			               }
			               else
			               {
			               		$('#check_set2').prop('checked', false);
			               }
			                

			               $("#instutition_number").val(instutition_number);
			               $("#details_of_number").val(details_of_number);
			               $("#federal_register").val(instutition_main_send);
			               $("#hide2").val(instutition_main_id);
			               $("#hide_id2").val(instutition_main_level);

			               $("#number_recieve").val(number_recieve);
			               $("#number_internal").val(number_internal);
			               $("#number_external").val(number_external);

			               $("#setup_instutition_number2").val(setup_instutition_number2);
			               $("#setup_institution_number3").val(setup_instutition_number3);
			         });

				    $("#hide1").val(id);

				    $('#instutition_level1 option[value!="0"]').remove();
				        $.post( "index.php/maindata/institution/get_institution_province2",{'id':province_id}, function( data ) {     
			               $('#instutition_level1').attr('enabled', 'true');
			               $.each(data, function() {
				                  $('#instutition_level1').append(
			               $("<option></option>").text(this.institution_province_name).val(this.id)
			                );
			              });
			        });

			    });

			    $("#instutition_level1").change(function(event) {
				   
				   

			    });
			});

</script>
