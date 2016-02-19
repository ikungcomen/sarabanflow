<table id="example" class="display" cellspacing="0" width="100%">
						<thead>
						        <tr>
						            <th>ที่</th>
						            <th>หมายเลขแผนก</th>
						            <th>ชื่อแผนก</th>
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
		  			 <td><?php echo $row['department_id'] ; ?></td>
		  			 <td><?php echo $row['department_name'] ; ?></td>
		  			 <td>
		  			 	<a onclick="return confirm('ต้องการที่จะลบจริงหรือไม่')" href = "index.php/maindata/institution_department/delete_dep1/<?php echo $row['id'] ; ?>" class = "btn btn-danger">ลบ</a>&nbsp;&nbsp;
		  			 	<a href = "index.php/maindata/institution_department/edit_dep1/<?php echo $row['id'] ; ?>" class = "btn btn-success">แก้ไข</a>
		  			 </td>
		  		</tr>	
		  	<?php }?>
        </tbody>
</table>
<script>
			$(document).ready(function() {
			    $('#example').DataTable();
			  });
</script>
