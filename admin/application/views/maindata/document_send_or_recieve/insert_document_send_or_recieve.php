
 <div class="container">

	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <center><h3><b>เพิ่มวิธีรับ-ส่งเอกสาร</b></h3></center><br>
          <form class="form-horizontal" action="index.php/maindata/document_send_or_recieve/insert_data" method="post" id = "document_send_or_recieve">
          <fieldset>    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">วิธีรับ-ส่งเอกสาร</label>
              <div class="col-md-9">
                <input id="send_name" name="send_name" type="text" placeholder="วิธีรับ-ส่งเอกสาร" class="form-control">
              </div>
            </div>

            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">รายละเอียด</label>
              <div class="col-md-9">
                <textarea class="form-control" id="send_detail" name="send_detail" placeholder="รายละเอียด" rows="5"></textarea>
              </div>
            </div>
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                 <a href  = "index.php/maindata/document_send_or_recieve" class="btn btn-success btn-lg">ย้อนกลับ</a>
                <button type="submit" class="btn btn-primary btn-lg">บันทึก</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
	</div>
	</div>