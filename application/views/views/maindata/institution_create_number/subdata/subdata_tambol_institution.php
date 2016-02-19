<table id="tambol2" class="display" cellspacing="0" width="100%">
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
		  			 <td><?php echo $row['institution_district_name']; ?></td>
		  			 <td><?php echo $row['institution_district_detail']; ?></td>
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
		  			 	<a href = "index.php/maindata/institution_create_number/show_form_update/3/<?php echo $row['id']; ?>/<?php echo base64_encode($row['institution_district_name']); ?>"  id = "update3" class = "btn btn-warning updateins1">จัดการเลขทะเบียน</a>
		  			 </td>
		  		</tr>	
		  	<?php }?>
        </tbody>
</table>
<script>
		$(document).ready(function(){
			$(document).ready(function() {
			    $('#tambol2').DataTable();
			});
		});
</script>
