
 <div class="container">

	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <center><h3><b>แก้ไขหมวดเอกสาร</b></h3></center><br>
          <?php foreach($result as $row) {?>
          <form class="form-horizontal" action="index.php/maindata/document_category/edit/<?php echo $row['id'];?>" method="post" id = "document_category">
           <fieldset>    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">หมวดเอกสาร</label>
              <div class="col-md-9">
                <input id="category_name" name="category_name" type="text" placeholder="หมวดเอกสาร" class="form-control" value = "<?php echo $row['doc_cate_name'];?>">
              </div>
            </div>

            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">รายละเอียด</label>
              <div class="col-md-9">
                <textarea class="form-control" id="category_detail" name="category_detail" placeholder="รายละเอียด" rows="5"><?php echo $row['doc_cate_detail'];?></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                 <a href  = "index.php/maindata/document_category" class="btn btn-success btn-lg">ย้อนกลับ</a>
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