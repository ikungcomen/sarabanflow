
<div class="container">
	<br/>
    <div class="well">
       <h3><img src="assets/img/Aha-Soft-Free-Large-Boss-Admin.ico" width = "30px">&nbsp;<b>ผู้ดูแลระบบ</b></h3>
       <br/>&nbsp;&nbsp;&nbsp;<a class = "btn btn-success" href = "index.php/manageuser">กลับหน้าหลัก</a>&nbsp;<a class = "btn btn-primary" href = "index.php/usermanagement/admin_system/showforminsert">เพิ่มผู้ดูแลระบบ</a>
   		<br/><br/>
   		<div class="tab-pane fade in active" id="tab1default">
	                        		<table id="example" class="display" cellspacing="0" width="100%">
									        <thead>
									            <tr>
									                <th>ที่</th>
									                <th>username</th>
									                <th>ชื่อ-นามกุล</th>
									                <th>เบอร์โทร</th>
									                <th>อีเมลล์</th>
									                <th>ออพชั่น</th>
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
									                <td><?php echo $row['user_name'];?></td>
									                <td><?php echo $row['fullname'];?></td>
									                <td><?php echo $row['tel'];?></td>
									                <td><?php echo $row['email'];?></td>
									                <td><a onclick="return confirm('ต้องการลบจริงหรือไม่');" href = "index.php/usermanagement/admin_system/delete/<?php echo $row['id'];?>" class = "btn btn-danger">ลบ</a>&nbsp;<a href = "index.php/usermanagement/admin_system/showedit/<?php echo $row['id'];?>"  class = "btn btn-success">แก้ไข</a></td>
									            </tr>
									            <?php }?>
									        
									        </tbody>
									    </table>
			</div>
	 </div>
</div>


