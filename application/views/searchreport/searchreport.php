<hr/>
<div style = "margin-left:15px; margin-right:15px">
<div style = "width :100% ; background-color: #0431B4; padding-left :15px;color:#FFFFFF"><h2><img src = "assets/img/Custom-Icon-Design-Pretty-Office-9-Email-receive.ico" width = "40px">&nbsp;&nbsp;<b>ค้นหาสมุดทะเบียนรับ</b></h2></div>
&nbsp;&nbsp;<a href = "index.php/searchreport/searchreport/recieve_report" class = "btn btn-primary btn-lg">สมุดทะเบียนรับ</a>
&nbsp;&nbsp;<a href = "index.php/searchreport/searchreport/send_report"    class = "btn btn-warning btn-lg">สมุดทะเบียนส่ง</a>
  <br/><br/>
</div>
<div class="container">
    <div class="row">
        <div class="panel-body form-horizontal payment-form">
            <form   id="submitSearch" action="index.php/report/book_receive/confirmBookReceive" method="post">
                <!--<div class="form-group">
                    <label for="status" class="col-sm-2 control-label">สถานะ :</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="status" name="status">
                            <option>2557</option>
                            <option>2556</option>
                            <option>2555</option>
                            <option>2554</option>
                            <option>2553</option>
                        </select>
                    </div>
                </div> -->
                <div class="form-group">
                    <label  class="col-sm-12 text-center "><h2>สมุดทะเบียนรับ</h2></label>
                </div>
                <hr width="100%">
                <div class="form-group">
                    <label  class="col-sm-12 text-left "><h4><u><font color="red">พิมพ์รายงานจากเงื่อนไข</font></h4></u></label>
                </div>
                <div class="form-group">
                    <label for="status" class="col-sm-2 control-label ">ประเภททะเบียน :</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="typeSelect" name="typeSelect">
                            <option value="">ทะเบียนปกติ</option>
                            <option value="(ว)">ทะเบียนหนังสือเวียน</option>
                            <option value="(คำสั่ง)">ทะเบียนคำสั่ง</option>
                            <option value="(วิทยุ)">ทะเบียนวิทยุ</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-sm-2 control-label">เลขทะเบียน :</label>
                    <div class="col-sm-4">
                        <input type="text" class="col-sm-4 form-control selectValue" id="from_number_of_run" name="from_number_of_run" placeholder="เลขทะเบียน">
                    </div>
                    <label for="status" class="col-sm-2 control-label">ถึงเลขทะเบียน :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control selectValue" id="to_number_of_run" name="to_number_of_run" placeholder="ถึงเลขทะเบียน">
                    </div>
                </div>
                <div class="form-group">
                     <label for="status" class="col-sm-2 control-label">ระบุเลขทะเบียน :</label>
                     <div class="col-sm-2">
                         <input type="text"  class="form-control selectValue" placeholder="เลขทะเบียนที่1" id="number_of_run_1" name="number_of_run_1">
                     </div>
                     <div class="col-sm-2">
                         <input type="text"  class="form-control selectValue" placeholder="เลขทะเบียนที่2" id="number_of_run_2" name="number_of_run_2">
                     </div>
                     <div class="col-sm-2">
                         <input type="text"   class="form-control selectValue" placeholder="เลขทะเบียนที่3" id="number_of_run_3" name="number_of_run_3">
                     </div>
                     <div class="col-sm-2">
                         <input type="text"  class="form-control selectValue" placeholder="เลขทะเบียนที่4" id="number_of_run_4" name="number_of_run_4">
                     </div>
                 </div>
                 <div class="form-group">
                     <div class="col-sm-2">
                         
                     </div>
                     <div class="col-sm-2">
                         <input type="text"  class="form-control selectValue" placeholder="เลขทะเบียนที่5" id="number_of_run_5" name="number_of_run_5">
                     </div>
                     <div class="col-sm-2">
                         <input type="text"  class="form-control selectValue" placeholder="เลขทะเบียนที่6" id="number_of_run_6" name="number_of_run_6">
                     </div>
                     <div class="col-sm-2">
                         <input type="text"   class="form-control selectValue" placeholder="เลขทะเบียนที่7" id="number_of_run_7" name="number_of_run_7">
                     </div>
                     <div class="col-sm-2">
                         <input type="text"  class="form-control selectValue" placeholder="เลขทะเบียนที่8" id="number_of_run_8" name="number_of_run_8">
                     </div>
                     
                 </div> 
                <div class="form-group">
                    <label for="status" class="col-sm-2 control-label">เอกสารเลขที่ :</label>
                    <div class="col-sm-4">
                        <input type="text"    class="form-control selectValue" id="department_id" name="department_id" value="<?php echo $this->instutition_number?>" readonly="readonly"  placeholder="เอกสารเลขที่">
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-sm-2 control-label">วันที่ :</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control"  id="startDate" name="startDate" placeholder="วันที่เริ่ม">
                    </div>
                    <label for="status" class="col-sm-2 control-label">ถึงวันที่ :</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control "  id="endDate" name="endDate" placeholder="วันที่สิ้นสุด">
                    </div>
                </div>

                <div class="form-group">
                    <label for="status" class="col-sm-2 control-label">จาก/ผู้ส่ง :</label>
                    <div class="col-sm-4">
                        <input type="text"    class="form-control selectValue" id="form_send" name="form_send" value="<?php echo get_name_instutition($this->level_institution_id, $this->level_institution); ?>"   readonly="readonly" placeholder="จาก/ผู้ส่ง">
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-sm-2 control-label">เรื่อง :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control selectValue" id="subject" name="subject" placeholder="เรื่อง">
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-sm-2 control-label">เรียน :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control selectValue" id="to_receive" name="to_receive" placeholder="เรียน">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 text-right">
                        <a class="btn btn-success AAA"><span class="glyphicon glyphicon-search" aria-hidden="true">&nbsp;ค้นหา</span></a>
                        <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-repeat" aria-hidden="true">&nbsp;ยกเลิก</span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>