						 <!-- Modal1 -->
						<?php foreach($result as $row){?>
						<?php //echo $number_of_id;?>
						  <div class="modal-dialog">
						    <div class="modal-content">
						     <div style = "margin :20px">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						        <h3 class="modal-title" id="title1" style = "color : blue;"><b>เพิ่มเลขทะเบียน</b></h3>
						      </div>
						      <form class="form-horizontal" action="index.php/maindata/institution_create_number/update_number" method="post" id = "modal_createnumber1">
						      <input value = "<?php echo $level_id;?>" type = "hidden" name = "level_id"/>
						      <div class="modal-body">
						         <div class = "row">
						         <div class="form-group">
					              <label class="col-md-3 control-label" for="email">ส่วนราชการ<br/>/หน่วยงาน</label>
					              <div class="col-md-9">
					              
					              </div>
					            </div>
					            <div class="form-group">
					              <label class="col-md-3 control-label" for="email">เลขทะเบียน</label>
					              <div class="col-md-9">
					                <input value = "<?php echo $row['instutition_number'];?>" id="instutition_number" name="instutition_number" type="text" placeholder="เลขทะเบียน " class="form-control">
					              </div>
					            </div>
					            <div class="form-group">
					              <label class="col-md-3 control-label" for="email">เลขส่งทะเบียนหน่วยงาน </label>
					              <div class="col-md-9">
					                <input  value = "<?php echo $pro_name;?>"  readonly id="institution_send_number" name="institution_send_number" type="text" placeholder="เลขส่งทะเบียนหน่วยงาน" class="form-control">
					              </div>
					            </div>
					            <div class="form-group">
					              <label class="col-md-3 control-label" for="email">รายละเอียด</label>
					              <div class="col-md-9">
					                <textarea name = "details_of_number" id = "details_of_number" class="form-control" placeholder="รายละเอียด" rows="3"><?php echo $row['details_of_number'];?></textarea>
					              </div>
					            </div>
					            <br><hr><br>
					            <div class="form-group">
					              <label class="col-md-3 control-label" for="email">กำหนดทะเบียนกลาง</label>

					              <?php
								   	if($row['active_center'] == 1)
								   	{	
								   		$checked = "checked";
								   	}
								   	else
								   	{
								   		$checked = "";
								   	}
								   ?>
					              <div class="col-md-9">
					                <input <?php echo $checked;?> value = "1"  id="center_define" name="center_define" type="checkbox" >
					              	 <p style = "color:red;">(ถ้าไม่ ติ๊ก (กำหนดทะเบียนกลาง) ต้องเลือกทะเบียนกลางให้หน่วยงานนี้)</p>
					              </div>
					            </div>
					            <div class="form-group">
					              <label class="col-md-3 control-label" for="email">เลขส่งทะเบียนกลาง</label>
					              <div class="col-md-9">
					                <input value = "<?php echo $row['instutition_main_send'];?>"  id="federal_register" name="federal_register" type="text"  class="form-control">
					              </div>
					                <input   value = "<?php echo $row['instutition_main_id'];?>"  type = "hidden" id = "hide2" name = "hide2"/>
					                 <input  value = "<?php echo $row['instutition_main_level'];?>"  type = "hidden" id = "hide_id2" name = "hide_id2"/>
					            </div>
					              <div class="form-group">
					              <label class="col-md-3 control-label" for="email">เลือกขั้นที่1</label>
					              <div class="col-md-9">
					                <select name="instutition_level1" id="instutition_level1" class="form-control">
					                    <option value = "0" >เลือกขั้นที่1</option>
					                </select>
					              </div>
					            </div>
					               <div class="form-group">
					              <label class="col-md-3 control-label" for="email">เลือกขั้นที่2</label>
					              <div class="col-md-9"> 
					                <select name="instutition_level2" id="instutition_level2" class="form-control">
					                	 <option value = "0" >เลือกขั้นที่2</option>
					                </select>

					              </div>
					            </div>
					               <div class="form-group">
					              <label class="col-md-3 control-label" for="email">เลือกขั้นที่3</label>
					              <div class="col-md-9">
					                 <select name="instutition_level3" id="instutition_level3" class="form-control">
					                	 <option value = "0" >เลือกขั้นที่3</option>
					                </select>
					              </div>
					            </div>
					             <div class="form-group">
					              <label class="col-md-3 control-label" for="email">เลขทะเบียนรับ</label>
					              <div class="col-md-9">
					                <input value = "<?php echo $row['number_recieve'];?>" id="number_recieve" name="number_recieve" type="text" placeholder="เลขทะเบียนรับ " class="form-control">
					              </div>
					            </div>
					             <div class="form-group">
					              <label class="col-md-3 control-label" for="email">เลขทะเบียนส่งภายใน</label>
					              <div class="col-md-9">
					                <input value = "<?php echo $row['number_internal'];?>"  id="number_internal" name="number_internal" type="text" placeholder="เลขทะเบียนส่งภายใน " class="form-control">
					              </div>
					            </div>
					             <div class="form-group">
					              <label class="col-md-3 control-label" for="email">เลขทะเบียนส่งภายนอก</label>
					              <div class="col-md-9">
					                <input value = "<?php echo $row['number_external'];?>"   id="number_external" name="number_external" type="text" placeholder="เลขทะเบียนส่งภายนอก" class="form-control">
					              </div>
					            </div>
					              <div class="form-group">
					              <label class="col-md-3 control-label" for="email">ตั้งค่าเลขทะเบียน</label>
					              <div class="col-md-9">
					              
					              </div>
					            </div>
					             <div class="form-group">
					              <label class="col-md-3 control-label" for="email">แบบธรรมดา</label>
					              
					               <div class="col-md-9">
					               	<p style = "color:red;">ปัจจุบัน (แบบธรรมดา) รันถึงเลข : <?php echo isset($normal_id_max)?$normal_id_max:'ยังไม่เคยออกเลข';?></p>
					              	<div class="radio">
									  <label>
									    <input type="radio" name="normal" id="normal" value="1" <?php echo ($row['nornal_type'] == 1 ? "checked":"");?> >
									    รันเลขอัตโนมัติ
									  </label>
									</div>
									<div class="radio">
									  <label>
									    <input type="radio" name="normal" id="normal" value="2" <?php echo ($row['nornal_type'] == 2? "checked":"");?> >
									    กำหนดเอง
									  </label>
									</div>
									<input value = "<?php echo $row['nornal_text'];?>"   id="txt_normal" name="txt_normal" type="text" placeholder="แบบธรรมดา" class="form-control">
									
					              	<!--
					                 <div class="checkbox">
								  <label>
								   <?php
								   	if($row['setup_instutition_number1'] == 1)
								   	{	
								   		$checked = "checked";
								   	}
								   	else
								   	{
								   		$checked = "";
								   	}
								   ?>
								    <input <?php echo $checked;?> type="checkbox" value="1" name  = "setup_instutition_number11111111" id = "setup_instutition_number11111111" />
								    ส่งจากทะเบียนรับมองเห็นทั้งหมด
								  </label>
								</div>
								<div class="checkbox ">
								  <label>
									<?php
								   	if($row['set2_val'] == 1)
								   	{	
								   		$checked = "checked";
								   		$val2    = $row['setup_instutition_number2'];
								   	}
								   	else
								   	{
								   		$checked = "";
								   		$val2    = '';
								   	}
								   ?>
								    <input <?php echo $checked;?>  type="checkbox" value="1" name  = "check_set2" id = "check_set2">
								    ออกเลขทะเบียนส่งกำหนดเองไม่เกิน
								    <input value = "<?php echo $val2 ;?>" id="setup_instutition_number2" name="setup_instutition_number2" type="text" placeholder="" class="form-control">
								  </label>
								</div>
								<div class="checkbox ">
								  <label>
									<?php
								   	if($row['set3_val'] == 1)
								   	{	
								   		$checked = "checked";
								   		$val3    = $row['setup_instutition_number3'];
								   	}
								   	else
								   	{
								   		$checked = "";
								   		$val3    = '';
								   	}
								   ?>
								    <input <?php echo $checked;?> type="checkbox" value="1" name  = "check_set3" id = "check_set3" >
								    ออกเลขทะเบียนรับกำหนดเองไม่เกิน
								    <input   value = "<?php echo $val3;?>" id="setup_institution_number3" name="setup_institution_number3" type="text" placeholder="" class="form-control">
								  </label>
								</div>
								-->
					              </div>
					          
					            </div>
					               <div class="form-group">
					              <label class="col-md-3 control-label" for="email">แบบเวียน</label>
					              <div class="col-md-9">
					              	<p style = "color:red;">ปัจจุบัน (แบบเวียน) รันถึงเลข : <?php echo isset($vian_id_max)?$vian_id_max:'ยังไม่เคยออกเลข';?></p>
					              	<div class="radio">
									  <label>
									    <input type="radio" name="vian" id="vian" value="1" <?php echo ($row['vian_type'] == 1 ? "checked":"");?> >
									    รันเลขอัตโนมัติ
									  </label>
									</div>
									<div class="radio">
									  <label>
									    <input type="radio" name="vian" id="vian" value="2" <?php echo ($row['vian_type'] == 2 ? "checked":"");?>>
									    กำหนดเอง
									  </label>
									</div>
									<input value = "<?php echo $row['vian_text'];?>"   id="txt_vian" name="txt_vian" type="text" placeholder="แบบเวียน" class="form-control">
					              </div>
					            </div>

					             </div>
					               <div class="form-group">
					              <label class="col-md-3 control-label" for="email">แบบคำสั่ง</label>
					             
					              <div class="col-md-9">
					              	 <p style = "color:red;">ปัจจุบัน (แบบคำสั่ง) รันถึงเลข : <?php echo isset($command_id_max)?$command_id_max:'ยังไม่เคยออกเลข';?></p>
					              	<div class="radio">
									  <label>
									    <input type="radio" name="command" id="command" value="1" <?php echo ($row['command_type'] == 1 ? "checked":"");?> >
									    รันเลขอัตโนมัติ
									  </label>
									</div>
									<div class="radio">
									  <label>
									    <input type="radio" name="command" id="command" value="2" <?php echo ($row['command_type'] == 2 ? "checked":"");?> >
									    กำหนดเอง
									  </label>
									</div>
									<input value = "<?php echo $row['command_text'];?>"   id="txt_command" name="txt_command" type="text" placeholder="แบบคำสั่ง" class="form-control">
					              </div>
					            </div>

					             <div class="form-group">
					              <label class="col-md-3 control-label" for="email">แบบวิทยุ</label>
					               
					              <div class="col-md-9">
					              	<p style = "color:red;">ปัจจุบัน (แบบวิทยุ) รันถึงเลข : <?php echo isset($radio_id_max)?$radio_id_max:'ยังไม่เคยออกเลข';?></p>
					              	<div class="radio">
									  <label>
									    <input type="radio" name="radios" id="radios" value="1" <?php echo ($row['radio_type'] == 1 ? "checked":"");?> >
									    รันเลขอัตโนมัติ
									  </label>
									</div>
									<div class="radio">
									  <label>
									    <input type="radio" name="radios" id="radios" value="2" <?php echo ($row['radio_type'] == 2 ? "checked":"");?> >
									    กำหนดเอง
									  </label>
									</div>
									<input value = "<?php echo $row['radio_text'];?>"   id="txt_radios" name="txt_radios" type="text" placeholder="แบบวิทยุ" class="form-control">
					              </div>
					            </div>
					            <hr/>
					             <div class="form-group">
					              <label class="col-md-3 control-label" for="email">ทะเบียนรับ</label>
					              <div class="col-md-9">
					              	<div class="radio">
									  <label>
									    <input type="radio" name="receive_type" id="receive_type" value="1" <?php echo ($row['receive_type'] == 1 ? "checked":"");?> >
									    รับเลขอัตโนมัติ
									  </label>
									</div>
									<div class="radio">
									  <label>
									    <input type="radio" name="receive_type" id="receive_type" value="2" <?php echo ($row['receive_type'] == 2 ? "checked":"");?> >
									    รับเลขกำหนดเอง
									  </label>
									</div>
									<input value = "<?php echo $row['txt_receive'];?>"   id="txt_receive" name="txt_receive" type="text" placeholder="ทะเบียนรับ" class="form-control">
					              </div>
					            </div>
					           
					            <input value = "<?php echo $row['id'];?>" id="hide1" name="hide1" type="hidden" />
						      </div>
						    </div>
						    <div class="modal-footer">
						        <!--<button type="button" class="btn btn-default" data-dismiss="modal">ย้อนกลับ</button>-->
						        <a href = "index.php/maindata/institution_create_number" class="btn btn-default">ย้อนกลับ</a>
						        <!--<button type="submit" id = "save1" class="btn btn-primary" >บันทึก</button>-->
						        <input type = "submit" id = "save1" class="btn btn-primary" value="บันทึก"/>
						      </div>
						    </div>
						    </div>
						  </div>	
						</form>
						<?php }?>

						
						

						<script type="text/javascript">
						    var province_id = "<?php echo $result[0]['province_id'];?>";
						    //alert(province_id);
							 $('#instutition_level1 option[value!="0"]').remove();
						        $.post( "index.php/maindata/institution/get_institution_province2",{'id':province_id}, function( data ) {     
					               $('#instutition_level1').attr('enabled', 'true');
					               $.each(data, function() {
						                  $('#instutition_level1').append(
					               $("<option></option>").text(this.institution_province_name).val(this.id)
					                );
					              });
					        });

							$(document).ready(function(){

								if ($("#center_define").is(':checked')) {
										
										// $("input").prop('disabled', true);
										// $("input").prop('disabled', false);
										$("#federal_register").prop('readonly', true);
										$("#instutition_level1").prop('disabled', true);
										$("#instutition_level2").prop('disabled', true);
										$("#instutition_level3").prop('disabled', true);
								    } else {
										$("#instutition_level1").prop('disabled', false);
										$("#instutition_level2").prop('disabled', false);
										$("#instutition_level3").prop('disabled', false);			     

								    }

								$("#center_define").click(function(event) {
									if ($(this).is(':checked')) {
										
										// $("input").prop('disabled', true);
										// $("input").prop('disabled', false);
										$("#federal_register").prop('readonly', true);
										$("#instutition_level1").prop('disabled', true);
										$("#instutition_level2").prop('disabled', true);
										$("#instutition_level3").prop('disabled', true);
								    } else {
								    	$("#federal_register").prop('disabled', false);
										$("#instutition_level1").prop('disabled', false);
										$("#instutition_level2").prop('disabled', false);
										$("#instutition_level3").prop('disabled', false);			     

								    }
								});
								
								//insert data 
								$("#modal_createnumber1").submit(function(event) {

								});

								//$("#setup_instutition_number2").prop('disabled', true);
								//$("#setup_institution_number3").prop('disabled', true);
								$("#check_set2").click(function(event) {
									if ($(this).is(':checked')) {
										
										$("#setup_instutition_number2").prop('disabled', false);

								    } else {
								    
										$("#setup_instutition_number2").prop('disabled', true);	
										$("#setup_instutition_number2").val('');					     

								    }
								});

								$("#check_set3").click(function(event) {
									if ($(this).is(':checked')) {
										
										$("#setup_institution_number3").prop('disabled', false);

								    } else {
								    
										$("#setup_institution_number3").prop('disabled', true);		
										$("#setup_institution_number3").val('');				     

								    }
								});
								$("#instutition_level1").change(function(event) {
									$("#hide2").val($(this).val());
									$("#hide_id2").val("institution_province");
									var text  = $("#instutition_level1 option:selected").text();
									if($(this).val() == 0)
									{
										$("#federal_register").val('');
										$("#hide2").val('');
			             			   $("#hide_id2").val('');
			             			   $("#federal_register").attr('readonly', false);
									}
									else
									{
										$("#federal_register").attr('readonly', true);
										$("#federal_register").val(text);
									}
									
									$('#instutition_level3 option[value!="0"]').remove();
									 var amphur = $(this).val();
									        $('#instutition_level2 option[value!="0"]').remove();
									         $.post( "index.php/maindata/institution/get_institution_province3",{'id':amphur}, function( data ) {
									          
									               $('#instutition_level2').attr('enabled', 'true');
									               $.each(data, function() {
									                  $('#instutition_level2').append(
									                      $("<option></option>").text(this.institution_amphur_name).val(this.id)
									    		 );
											 });
										});			
			             		});

			             		$("#instutition_level2").change(function(event) {
			             			$("#hide2").val($(this).val());
			             			$("#hide_id2").val("institution_amphur");
			             			var text  = $("#instutition_level2 option:selected").text();
									if($(this).val() == 0)
									{
										$("#federal_register").val('');
										$("#hide2").val('');
			             			   $("#hide_id2").val('');
			             			   $("#federal_register").attr('readonly', false);
									}
									else
									{
										$("#federal_register").val(text);
										$("#federal_register").attr('readonly', true);
									}

									 var id = $(this).val();
									        $('#instutition_level3 option[value!="0"]').remove();
									         $.post( "index.php/maindata/institution/get_institution_province4",{'id':id}, function( data ) {
									          
									               $('#instutition_level3').attr('enabled', 'true');
									               $.each(data, function() {
									                  $('#instutition_level3').append(
									                      $("<option></option>").text(this.institution_district_name).val(this.id)
									    		 );
											 });
										});				
			             		});
			             		$("#instutition_level3").change(function(event) {
			             			$("#hide2").val($(this).val());
			             			$("#hide_id2").val("institution_district");
			             			var text  = $("#instutition_level3 option:selected").text();
									if($(this).val() == 0)
									{
										$("#federal_register").val('');
										$("#hide2").val('');
			             			   $("#hide_id2").val('');
			             			   $("#federal_register").attr('readonly', false);
									}
									else
									{
										$("#federal_register").val(text);
										$("#federal_register").attr('readonly', true);
									}			
			             		});
							});
						 
						</script>