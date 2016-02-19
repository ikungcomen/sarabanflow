<hr/>
<div style = "margin-left:15px; margin-right:15px">
    <div style = "width :100% ; background-color: #3e8f3e; padding-left :15px ;color:#FFFFFF"><h2><img src = "assets/img/Custom-Icon-Design-Pretty-Office-9-Email-send.ico" width = "40px">&nbsp;&nbsp;<b>พิมพ์รายงานสมุดทะเบียนส่ง</b></h2></div>
    &nbsp;&nbsp;<a href = "index.php/report/book_receive/bookReceive" class = "btn btn-primary btn-lg"><span class="glyphicon glyphicon-print" aria-hidden="true">&nbsp;สมุดทะเบียนรับ</span></a>
    &nbsp;&nbsp;<a href = "index.php/report/book_receive/bookSend" class = "btn btn-success btn-lg"><span class="glyphicon glyphicon-print" aria-hidden="true">&nbsp;สมุดทะเบียนส่ง</span></a>
    &nbsp;&nbsp;<a href = "index.php/report/book_receive/printReport" class = "btn btn-danger btn-lg"><span class="glyphicon glyphicon-print" aria-hidden="true">&nbsp;พิมพ์รายงานสถิติ</span></a>
    <br/><br/>
</div>
<div class="container">
    <div class="row">
        <div class="panel-body form-horizontal payment-form">
            <form id="submitSearch"  action="index.php/report/book_receive/confirmBookSend" method="post">

                <!--<div class="form-group">
                   <label for="status" class="col-sm-2 control-label">ระบบฐานข้อมูลปี พ.ศ :</label>
                   <div class="col-sm-10">
                       <select class="form-control" id="year" name="year">
                <?php
                $year = 20;
                for ($i = 0; $i <= $year; $i++) {
                    $normal = 2550 + $i;
                    ?>
                               <option value="<?php echo $normal; ?>"><?php echo $normal; ?></option>
                <?php } ?>
                       </select>
                   </div>
               </div> -->
                <div class="form-group">
                    <label  class="col-sm-12 text-center "><h2><font color="#01DF3A">สมุดทะเบียนส่ง</font></h2></label>
                </div>
                <hr width="100%">
                <div class="form-group">
                    <label  class="col-sm-12 text-left "><u><h4><font color="red">พิมพ์รายงานจากเงื่อนไข</font></h4></u></label>
                </div>
                <div class="form-group">
                    <label for="status" class="col-sm-2 control-label ">ประเภททะเบียน :</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="typeSelect" name="typeSelect">
                            <option value="">ทะเบียนปกติ</option>
                            <option value="ว">ทะเบียนหนังสือเวียน</option>
                            <option value="คำสั่ง">ทะเบียนคำสั่ง</option>
                            <option value="วิทยุ">ทะเบียนวิทยุ</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-sm-2 control-label ">เลขทะเบียน :</label>
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
                        <input type="text" class="form-control selectValue"  id="department_id" name="department_id"  value="<?php echo $this->instutition_number; ?>" readonly="readonly" placeholder="เอกสารที่">
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-sm-2 control-label">วันที่ :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control selectValue"  id="startDate" name="startDate" placeholder="วันที่">
                    </div>
                    <label for="status" class="col-sm-2 control-label">ถึงวันที่ :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control selectValue"  id="endDate" name="endDate"  placeholder="ถึงวันที่">
                    </div>
                </div>

                <div class="form-group">
                    <label for="status" class="col-sm-2 control-label">จาก/ผู้ส่ง :</label>
                    <div class="col-sm-4">
                        <input type="text"    class="form-control selectValue" id="form_send" name="form_send" placeholder="จาก/ผู้ส่ง" value="" ><!--<?php //echo get_name_instutition($this->level_institution_id, $this->level_institution); ?> -->
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
                        <a class="btn btn-success AAA"><span class="glyphicon glyphicon-search" aria-hidden="true">&nbsp;ค้นหาสมุดทะเบียนส่ง</span></a>
                        <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-repeat" aria-hidden="true">&nbsp;ยกเลิก</span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".selectValue").click(function() {
            $(this).select();
        });
        $(".AAA").click(function(event) {
            var from_number_of_run = $("#from_number_of_run").val();
            var to_number_of_run = $("#to_number_of_run").val();
            var startDate = $("#startDate").val();
            var endDate = $("#endDate").val();
            var subject = $("#subject").val();
            var form_send   = $("#form_send").val();
            var to_receive = $("#to_receive").val();
            var number_of_run_1         = $("#number_of_run_1").val();
            var number_of_run_2         = $("#number_of_run_2").val();
            var number_of_run_3         = $("#number_of_run_3").val();
            var number_of_run_4         = $("#number_of_run_4").val();
            var number_of_run_5         = $("#number_of_run_5").val();
            var number_of_run_6         = $("#number_of_run_6").val();
            var number_of_run_7         = $("#number_of_run_7").val();
            var number_of_run_8         = $("#number_of_run_8").val();
            if (from_number_of_run == "" && to_number_of_run == "" && form_send == "" && startDate == "" && endDate == "" && subject == "" && to_receive == "" && number_of_run_1 =="" && number_of_run_2 =="" && number_of_run_3 =="" && number_of_run_4 =="" && number_of_run_5 =="" && number_of_run_6 =="" && number_of_run_7 =="" && number_of_run_8 =="") {
                alert("กรุณาระบุข้อมูลในการค้นหา ครับ!");
                event.preventDefault();
            } else {
                
                if(from_number_of_run != "" && to_number_of_run != ""){
                    if(from_number_of_run > to_number_of_run){
                        alert("กรุณาระบุเลขทะเบียน น้อยกว่า ถึงเลขทะเบียน ครับ!");
                        event.preventDefault();
                        
                    }else{
                        if (form_send == "<<----------- หน่วยงานระดับจังหวัด ----------->>" || form_send == "<<----------- หน่วยงานระดับอำเภอ ----------->>" || form_send == "<<----------- หน่วยงานระดับตำบล ------------>>" || form_send ==  "<<----------------- อื่นๆ ---------------->>") {
                            $("#form_send").val('');
                            alert("กรุณาเลือกชื่อ จากผู้ส่ง ตามรายการที่มีเท่านั้นครับ");
                            event.preventDefault();
                        } else {
                            $("#submitSearch").submit();
                        }
                    }
                }else{
                     if (form_send == "<<----------- หน่วยงานระดับจังหวัด ----------->>" || form_send == "<<----------- หน่วยงานระดับอำเภอ ----------->>" || form_send == "<<----------- หน่วยงานระดับตำบล ------------>>" || form_send ==  "<<----------------- อื่นๆ ---------------->>") {
                        $("#form_send").val('');
                        alert("กรุณาเลือกชื่อ จากผู้ส่ง ตามรายการที่มีเท่านั้นครับ");
                        event.preventDefault();
                    } else {
                        $("#submitSearch").submit();
                    }
                }
            }

        });
        $("#from_number_of_run,#to_number_of_run").keyup(function(){
            var value = $(this).val();
            if(value.length > 0){
                $( "#number_of_run_1" ).prop( "disabled", true );
                $( "#number_of_run_2" ).prop( "disabled", true );
                $( "#number_of_run_3" ).prop( "disabled", true );
                $( "#number_of_run_4" ).prop( "disabled", true );
                $( "#number_of_run_5" ).prop( "disabled", true );
                $( "#number_of_run_6" ).prop( "disabled", true );
                $( "#number_of_run_7" ).prop( "disabled", true );
                $( "#number_of_run_8" ).prop( "disabled", true );
            }else{
                $( "#number_of_run_1" ).prop( "disabled", false );
                $( "#number_of_run_2" ).prop( "disabled", false );
                $( "#number_of_run_3" ).prop( "disabled", false );
                $( "#number_of_run_4" ).prop( "disabled", false );
                $( "#number_of_run_5" ).prop( "disabled", false );
                $( "#number_of_run_6" ).prop( "disabled", false );
                $( "#number_of_run_7" ).prop( "disabled", false );
                $( "#number_of_run_8" ).prop( "disabled", false );
            }
        });
        $("#number_of_run_1,#number_of_run_2,#number_of_run_3,#number_of_run_4,#number_of_run_5,#number_of_run_6,#number_of_run_7,#number_of_run_8").keyup(function(){
            var value = $(this).val();
            if(value.length > 0){
                $( "#from_number_of_run" ).prop( "disabled", true );
                $( "#to_number_of_run" ).prop( "disabled", true );
            }else{
                $( "#from_number_of_run" ).prop( "disabled", false );
                $( "#to_number_of_run" ).prop( "disabled", false );
            }
        });
        $("#form_send").autocomplete({
            source: function(request, response) {
                $.ajax({
                    type: "POST",
                    url: "index.php/report/book_receive/getLevelAuto",
                    dataType: "json",
                    data: {
                       term: request.termCode
                    },
                    success: function(data) {
                       response($.map(data, function(item) {
                          return {
                             label: item.institution_province_name
                                //value: item.value
                           };
                      }));
                  }
                });
            },minLength: 3
        });


    });


</script>
