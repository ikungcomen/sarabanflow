<table id="example2" class="display" cellspacing="0" width="100%">
						<thead>
						        <tr>
						            <th>ที่</th>
						            <th>ชื่อหน่วยงาน</th>
						            <th>รายละเอียด</th>
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
		  			 <td><?php echo $row['institution_amphur_name']; ?></td>
		  			 <td><?php echo $row['institution_amphur_detail']; ?></td>
		  			 <td>
		  			 	<a href = "javascript:void(0);" data-toggle="modal" data-target="#myModal_edit2" onclick = "confirmedit2(<?php echo $row['id']; ?> , <?php echo $row['institution_province_id']; ?>)" class = "btn btn-success">แก้ไข</a>
		  			 	<a href = "javascript:void(0);"  onclick = "confirmdel2(<?php echo $row['id']; ?> , <?php echo $row['institution_province_id']; ?>)" class = "btn btn-danger del">ลบ</a>
		  			 </td>
		  		</tr>	
		  	<?php }?>
        </tbody>
</table>
<script>
		$(document).ready(function(){
			$(document).ready(function() {
			    $('#example2').DataTable();
			});
		});
</script>
