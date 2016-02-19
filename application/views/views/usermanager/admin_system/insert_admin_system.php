
 <div class="container">

	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <center><h3><b> เพิ่มผู้ดูแลระบบ </b></h3></center><br>
          <form class="form-horizontal" action="index.php/usermanagement/admin_system/insert_data" method="post" id = "admin_system">
          <fieldset>    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">ชื่อผู้ใช้งาน *</label>
              <div class="col-md-9">
                <input id="username" name="username" type="text" placeholder="ชื่อผู้ใช้งาน" class="form-control">
              </div>
            </div>
             <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">รหัสผ่าน *</label>
              <div class="col-md-9">
                <input id="password" name="password" type="password" placeholder="รหัสผ่าน" class="form-control">
              </div>
            </div>
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">ยืนยันรหัสผ่าน *</label>
              <div class="col-md-9">
                <input id="repassword" name="repassword" type="password" placeholder="ยืนยันรหัสผ่าน" class="form-control">
              </div>
            </div>

            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">ชื่อ - สกุล</label>
              <div class="col-md-9">
                <input id="fullname" name="fullname" type="text" placeholder="ชื่อ - สกุล" class="form-control">
              </div>
            </div>

            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">E-mail</label>
              <div class="col-md-9">
                <input id="email" name="email" type="email" placeholder="E-mail" class="form-control">
              </div>
            </div>
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">โทรศัพท์</label>
              <div class="col-md-9">
                <input id="tel" name="tel" type="text" placeholder="โทรศัพท์" class="form-control">
              </div>
            </div>

             <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">รายละเอียด</label>
              <div class="col-md-9">
                <textarea class="form-control" id="detail" name="detail" placeholder="รายละเอียด" rows="5"></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                 <a href  = "index.php/usermanagement/admin_system" class="btn btn-success btn-lg">ย้อนกลับ</a>
                <button type="submit" class="btn btn-primary btn-lg">บันทึก</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
	</div>
	</div>