						 <!-- Modal1 -->
						<div class="modal fade" id="myModal_provice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
						  <div class="modal-dialog">
						    <div class="modal-content">
						     <div style = "margin :20px">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						        <h3 class="modal-title" id="title1" style = "color : blue;"><b>เพิ่มเลขทะเบียน</b></h3>
						      </div>
						      <form class="form-horizontal" onsubmit="return false" method="post" id = "modal_createnumber1">
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
					                <input id="instutition_number" name="instutition_number" type="text" placeholder="เลขทะเบียน " class="form-control">
					              </div>
					            </div>
					            <div class="form-group">
					              <label class="col-md-3 control-label" for="email">เลขส่งทะเบียนหน่วยงาน </label>
					              <div class="col-md-9">
					                <input readonly id="institution_send_number" name="institution_send_number" type="text" placeholder="เลขส่งทะเบียนหน่วยงาน" class="form-control">
					              </div>
					            </div>
					            <div class="form-group">
					              <label class="col-md-3 control-label" for="email">รายละเอียด</label>
					              <div class="col-md-9">
					                <textarea name = "details_of_number" id = "details_of_number" class="form-control" placeholder="รายละเอียด" rows="3"></textarea>
					              </div>
					            </div>
					            <br><hr><br>
					            <div class="form-group">
					              <label class="col-md-3 control-label" for="email">เลขส่งทะเบียนกลาง</label>
					              <div class="col-md-9">
					                <input readonly id="federal_register" name="federal_register" type="text"  class="form-control">
					              </div>
					                <input type = "hidden" id = "hide2" name = "hide2"/>
					                 <input type = "hidden" id = "hide_id2" name = "hide_id2"/>
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
					                <input id="number_recieve" name="number_recieve" type="text" placeholder="เลขทะเบียนรับ " class="form-control">
					              </div>
					            </div>
					             <div class="form-group">
					              <label class="col-md-3 control-label" for="email">เลขทะเบียนส่งภายใน</label>
					              <div class="col-md-9">
					                <input id="number_internal" name="number_internal" type="text" placeholder="เลขทะเบียนส่งภายใน " class="form-control">
					              </div>
					            </div>
					             <div class="form-group">
					              <label class="col-md-3 control-label" for="email">เลขทะเบียนส่งภายนอก</label>
					              <div class="col-md-9">
					                <input id="number_external" name="number_external" type="text" placeholder="เลขทะเบียนส่งภายนอก" class="form-control">
					              </div>
					            </div>
					              <div class="form-group">
					              <label class="col-md-3 control-label" for="email">ตั้งค่าเลขทะเบียน</label>
					              <div class="col-md-9">
					              
					              </div>
					            </div>
					             <div class="form-group">
					              <label class="col-md-3 control-label" for="email"></label>
					              <div class="col-md-9">
					                 <div class="checkbox">
								  <label>
								    <input type="checkbox" value="1" name  = "setup_instutition_number11111111" id = "setup_instutition_number11111111" />
								    ส่งจากทะเบียนรับมองเห็นทั้งหมด
								  </label>
								</div>
								<div class="checkbox ">
								  <label>
								    <input type="checkbox" value="" name  = "check_set2" id = "check_set2">
								    ออกเลขทะเบียนส่งกำหนดเองไม่เกิน
								    <input id="setup_instutition_number2" name="setup_instutition_number2" type="text" placeholder="" class="form-control">
								  </label>
								</div>
								<div class="checkbox ">
								  <label>
								    <input type="checkbox" value="" name  = "check_set3" id = "check_set3" >
								    ออกเลขทะเบียนรับกำหนดเองไม่เกิน
								    <input id="setup_institution_number3" name="setup_institution_number3" type="text" placeholder="" class="form-control">
								  </label>
								</div>
					              </div>
					            </div>
					           
					            <input id="hide1" name="hide1" type="hidden" />
						      </div>
						    </div>
						    <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้านี้</button>
						        <!--<button type="submit" id = "save1" class="btn btn-primary" >บันทึก</button>-->
						        <input type = "submit" id = "save1" class="btn btn-primary" value="บันทึก"/>
						      </div>
						    </div>
						    </div>
						  </div>
						</div>
						</form>


						

						<script type="text/javascript">

							$(document).ready(function(){
								
								//insert data 
								$("#modal_createnumber1").submit(function(event) {

								});

								$("#setup_instutition_number2").prop('disabled', true);
								$("#setup_institution_number3").prop('disabled', true);
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
									}
									else
									{
										$("#federal_register").val(text);
									}
									
									$('#instutition_level2 option[value!="0"]').remove();
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
									}
									else
									{
										$("#federal_register").val(text);
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
									}
									else
									{
										$("#federal_register").val(text);
									}			
			             		});
							});
						</script>