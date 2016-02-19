
 <div class="container">

	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <center><h3><b>เพิ่มวัตถุประสงค์</b></h3></center><br>
          <form class="form-horizontal" action="index.php/maindata/objective/insert_data" method="post" id = "objective">
          <fieldset>    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">วัตถุประสงค์</label>
              <div class="col-md-9">
                <input id="objectivename" name="objectivename" type="text" placeholder="วัตถุประสงค์" class="form-control">
              </div>
            </div>

            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">รายละเอียด</label>
              <div class="col-md-9">
                <textarea class="form-control" id="objectivedetail" name="objectivedetail" placeholder="รายละเอียด" rows="5"></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                 <a href  = "index.php/maindata/objective" class="btn btn-success btn-lg">ย้อนกลับ</a>
                <button type="submit" class="btn btn-primary btn-lg">บันทึก</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
	</div>
	</div>