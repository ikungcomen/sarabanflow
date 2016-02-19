
 <div class="container">

	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <center><h3><b>แก้ไขคำนำหน้าชื่อ</b></h3></center><br>
          <?php foreach($result as $row) {?>
          <form class="form-horizontal" action="index.php/maindata/prefix_name/edit/<?php echo $row['id'];?>" method="post" id = "prefixname">
          <fieldset>    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">คำนำหน้าชื่อ</label>
              <div class="col-md-9">
                <input id="prefixname" name="prefixname" type="text" placeholder="คำนำหน้าชื่อ" class="form-control" value = "<?php echo $row['prefix_name'];?>">
              </div>
            </div>

            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">รายละเอียด</label>
              <div class="col-md-9">
                <textarea class="form-control" id="prefix_detail" name="prefix_detail" placeholder="รายละเอียด" rows="5"><?php echo $row['prefix_detail'];?></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                 <a href  = "index.php/maindata/prefix_name" class="btn btn-success btn-lg">ย้อนกลับ</a>
                <button type="submit" class="btn btn-primary btn-lg">แก้ไข</button>
              </div>
            </div>
          </fieldset>
          </form>
          <?php }?>
        </div>
      </div>
	</div>
	</div>