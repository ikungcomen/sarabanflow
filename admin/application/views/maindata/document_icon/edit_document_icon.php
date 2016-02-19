
 <div class="container">

	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <center><h3><b>แก้ไขไอคอนเอกสาร</b></h3></center><br>
          <?php foreach($result as $row) {?>
          <form class="form-horizontal" action="index.php/maindata/document_icon/edit/<?php echo $row['id'];?>" method="post" id = "document_icon">
           <fieldset>    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">ไอคอนเอกสาร</label>
              <div class="col-md-9">
                <input id="iconname" name="iconname" type="text" placeholder="ไอคอนเอกสาร" class="form-control" value = "<?php echo $row['icon_name'];?>">
              </div>
            </div>

            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">รายละเอียด</label>
              <div class="col-md-9">
                <textarea class="form-control" id="icondetail" name="icondetail" placeholder="รายละเอียด" rows="5"><?php echo $row['icon_detail'];?></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                 <a href  = "index.php/maindata/document_icon" class="btn btn-success btn-lg">ย้อนกลับ</a>
                <button type="submit" class="btn btn-primary btn-lg">บันทึก</button>
              </div>
            </div>
          </fieldset>
          </form>
          <?php }?>
        </div>
      </div>
	</div>
	</div>