
<div class="container">
	<br/>
    <div class="well">
       <h3><img src="assets/img/Double-J-Design-Ravenna-3d-Database-Active.ico" width = "30px">&nbsp;<b>ชั้นความเร็ว</b></h3>
       <br/>&nbsp;&nbsp;&nbsp;<a class = "btn btn-success" href = "index.php/main_data">กลับหน้าหลัก</a>&nbsp;<a class = "btn btn-primary" href = "index.php/maindata/layer_priority/showforminsert">เพิ่มชั้นความเร็ว</a>
   		<br/><br/>
   		<div class="tab-pane fade in active" id="tab1default">
	                        		<table id="example" class="display" cellspacing="0" width="100%">
									        <thead>
									            <tr>
									                <th>ที่</th>
									                <th>ชั้นความเร็ว</th>
									                <th>รายละเอียด</th>
									                <th>อ็อบชั่น</th>
									            </tr>
									        </thead>
									 
									 	
									        <tbody>
									        	<?php
									        	  $count = 0 ; 
									        	  foreach($result as $row){
									        	  $count++;
									        	?>
									            <tr>
									                <td><?php echo $count;?></td>
									                <td><?php echo $row['pio_name'];?></td>
									                <td><?php echo $row['pio_detail'];?></td>
									                <td><a onclick="return confirm('ต้องการลบจริงหรือไม่');" href = "index.php/maindata/layer_priority/delete/<?php echo $row['id'];?>" class = "btn btn-danger">ลบ</a>&nbsp;<a href = "index.php/maindata/layer_priority/showedit/<?php echo $row['id'];?>"  class = "btn btn-success">แก้ไข</a></td>
									            </tr>
									            <?php }?>
									        </tbody>
									    </table>
			</div>
	 </div>
</div>


