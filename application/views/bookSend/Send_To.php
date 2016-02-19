<div class="container-fluid">
    <section class="container">
        <div class="container-page">				
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-lg-12 text-left">
                       <div style = "width :100% ; background-color: #3e8f3e; padding-left :15px;color:#FFFFFF"><h3><img src = "assets/img/icon07.jpg" width = "40px">&nbsp;&nbsp;<b>ส่งเอกสาร</b></h3></div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12 text-left">
                        <a href="index.php/bookSend/bookSend" class="btn btn-danger"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true">&nbsp;ย้อนกลับ</span></a>
                    </div>
                </div>
		<?php
			if ($this->session->flashdata('not_found_data')) {
			?>
				<div class="alert alert-danger-alt alert-dismissable">
                <span class="glyphicon glyphicon-certificate"></span>
                <strong>มีข้อผิดพลาด</strong> คุณไม่ได้เลือกหน่วยงานที่จะส่งถึง!<a href="http://www.jquery2dotnet.com"
                 target="_blank"></a> กรุณาทำรายการใหม่อีกครั้ง</div>
		<?php } ?>

                <hr width="100%">
                <form action = "index.php/bookSend/bookSend/Send_To_instutition" method="post" id = "post_send">
                <div class="row">
                   <div class="container">
                    <input type = "hidden" id = "send_create" name = "send_create" value="<?php echo $id_data;?>"/>
					<div class="row">
				      <div class="col-md-offset-2 col-md-8 col-md-offset-2">
				        <div class="well well-sm">
				          <form class="form-horizontal" action="" method="post">
				          <fieldset>
				            <legend class="text-center"> <b>ส่งเอกสาร</b> </legend>
				    		<!-- Name input-->
				            <div class="form-group">
				              <label class="col-md-3 control-label" for="name">เพิ่มกลุ่ม</label>
				              <div class="col-md-9">
				               <a href = "index.php/bookSend/bookSend/add_group/<?php echo $id_data;?>" class = "btn btn-success btn-lg">เพิ่มกลุ่ม</a>
				              </div>
				            </div>
							<br/><br/>
				            <!-- Name input-->
				            <div class="form-group">
				              <label class="col-md-3 control-label" for="name">เลือกรูปแบบการส่ง</label>
				              <div class="col-md-9">
				               <select class="form-control" name = "send_type" id = "send_type">
								  <option value="1">กรณี ส่งถึง - พร้อมแนบเอกสารสำเนา</option>
								  <option value="2">กรณีส่งถึง - พร้อมมีเอกสารตัวจริงส่งตามภายหลัง</option>
								</select>
				              </div>
				            </div>
							<br/><br/>
							
							<!-- Name input-->
				            <div class="form-group">
				              <label class="col-md-3 control-label" for="name">ลักษณะการส่ง</label>
				              <div class="col-md-9">
				               <select class="form-control" name = "types" id = "types">
								  <option value="1">ส่งแบบเลือกเอง</option>
								  <option value="2">ส่งแบบเป็นกลุ่ม</option>
								</select>
				              </div>
				            </div>
							<br/><br/>
							
				            <!-- Name input-->
				            <div class="form-group">
				              <label class="col-md-3 control-label" for="name">เลือกหน่วยงาน</label>
				              <div class="col-md-9">
				              <select class="form-control" name = "province" id = "province">
				              	<option value="0"><?php echo "เลือกจังหวัด";?></option>
				              	<option value="1"><?php echo "กรุงเทพมหานคร";?></option>
				              	<option value="20"><?php echo "บุรีรัมย์";?></option>
				              	<option value="18"><?php echo "สระแก้ว";?></option>
				              	<option value="32"><?php echo "มหาสารคาม";?></option>
				              	<option value="31"><?php echo "หนองคาย";?></option>
				                <!--  <?php foreach(getAllDataProvince() as $row){?>
				                   	 <option value="<?php echo $row->province_id;?>"><?php echo $row->province_name;?></option>
				                 <?php }?> -->
				                 </select>
				                 <br/>
				                 <div id = "list_instutision"></div>
				              </div>
				            </div>
				    
				            <!-- Message body -->
				            <div class="form-group">
				              <label class="col-md-3 control-label" for="message">รายละเอียดการส่ง</label>
				              <div class="col-md-9">
				                <textarea class="form-control" id="message" name="message" placeholder="รายละเอียดการส่ง" rows="5"></textarea>
				              </div>
				            </div>
				    
				            <!-- Form actions -->
				            <div class="form-group">
				              <div class="col-md-12 text-right"><br>
				                <a href = "index.php/bookSend/bookSend/Send_To" class = "btn btn-danger btn-lg">ยกเลิก</a>
				                <button type="submit" class="btn btn-primary btn-lg">ยืนยัน</button>
				              </div>
				            </div>
				          </fieldset>
				          </form>
				        </div>
				      </div>
					</div>
				</div>
                </div>
				</form>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
	$(document).ready(function(){

		<?php
			if ($this->session->flashdata('insert_dep1')) {
			?>
			alert("บันทึกข้อมูลเรียบร้อยแล้ว");
		<?php } ?>

		$.post( "index.php/bookSend/bookSend/GetDataProvince", function( data ) {
			  $( "#list_instutision" ).html( data );
		});

		$("#province").change(function(event) {
			$.post( "index.php/bookSend/bookSend/GetDataProvince_change",{'id':$(this).val()}, function( data ) {
			  $( "#list_instutision" ).html( data );
		    });
		});

		$("#types").change(function(event) {
			var id = $(this).val();
			if(id == 2)
			{
				$("#province").attr('disabled', 'disabled');
				$.post( "index.php/bookSend/bookSend/grouping",{'id_re':<?php echo $id_data;?>} ,function( data ) {
					$( "#list_instutision" ).html( data );
				});
			}
			else
			{   
				$("#province").removeAttr('disabled');
				$.post( "index.php/bookSend/bookSend/GetDataProvince_change",{'id': 0}, function( data ) {
					$( "#list_instutision" ).html( data );
				});
			}
		});

		$("#post_send").live('submit',function( event ){

		});
	});
</script>
<style>
	.alert-purple { border-color: #694D9F;background: #694D9F;color: #fff; }
	.alert-info-alt { border-color: #B4E1E4;background: #81c7e1;color: #fff; }
	.alert-danger-alt { border-color: #B63E5A;background: #E26868;color: #fff; }
	.alert-warning-alt { border-color: #F3F3EB;background: #E9CEAC;color: #fff; }
	.alert-success-alt { border-color: #19B99A;background: #20A286;color: #fff; }
	.glyphicon { margin-right:10px; }
	.alert a {color: gold;}
</style>
