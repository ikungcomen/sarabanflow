<table id="example" class="display" cellspacing="0" width="100%">
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
		  			 <td><?php echo $row['institution_province_name']; ?></td>
		  			 <td><?php echo $row['institution_province_detail']; ?></td>
		  			 <td>
		  			 	<a href = "javascript:void(0);" data-toggle="modal" data-target="#myModal_edit" onclick = "confirmedit(<?php echo $row['id']; ?> , <?php echo $row['province_id']; ?>)" class = "btn btn-success">แก้ไข</a>
		  			 	<a href = "javascript:void(0);"  onclick = "confirmdel(<?php echo $row['id']; ?> , <?php echo $row['province_id']; ?>)" class = "btn btn-danger del">ลบ</a>
		  			 </td>
		  		</tr>	
		  	<?php }?>
        </tbody>
</table>
<script>
		$(document).ready(function(){
			$(document).ready(function() {
			    $('#example').DataTable();
			});
		});
</script>
