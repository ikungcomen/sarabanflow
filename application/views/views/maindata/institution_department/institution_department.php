
<div class="container">
	<br/>
    <div class="well">
       <h3><img src="assets/img/Double-J-Design-Ravenna-3d-Database-Active.ico" width = "30px">&nbsp;<b>สร้างแผนก</b></h3>
       <br/>&nbsp;&nbsp;&nbsp;<a class = "btn btn-success" href = "index.php/main_data">กลับหน้าหลัก</a>
   		<br/><br/>
   		<div class="tab-pane fade in active" id="tab1default">
	            <h2 id = "step1"><b>สร้างแผนก <span style = "color:orange">STEP1</span></b></h2>
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">
                	 <i class = "glyphicon glyphicon-arrow-right"></i>&nbsp;&nbsp;เลือกจังหวัด<br/><br/>
                	 <div class="row">
					  <div class="col-md-4">
					  	<select class="form-control" name = "province" id = "province" width = "200px">
                		 <option value = "0" >เลือกจังหวัด</option>
						<?php
						foreach ($result as $row){ 
						?>
						<option value = "<?php echo  $row['province_id'];?>"><?php echo  $row['province_name'];?></option>
						<?php }?>
						</select>
					  </div>
					</div>
                </h3>
            </div>
            <div style = "margin : 15px!important;">
               <div id = "content1"></div>
		    </div>
        </div>    
        	<div style = "margin:20px;" id = "form2">
		    <div class="row">
		      <h2 id = "step2"><b>สร้างแผนก <span style = "color:orange">STEP2</span></b></h2>

		        <div class="panel panel-primary filterable">
		            <div class="panel-heading">
		                <h3 class="panel-title">
		                	 <i class = "glyphicon glyphicon-arrow-right"></i>&nbsp;&nbsp;เลือกหน่วยงานระดับจังหวัด<br/><br/>
		                	 <div class="row">
							  <div class="col-md-4">
							  	<select class="form-control" name = "amphur" id = "amphur" width = "200px">
		                		 <option value = "0" >เลือกหน่วยงานระดับจังหวัด</option>
								</select><br/><a data-toggle="modal" id = "add1" data-target="#myModal_provice"  class="btn btn-warning">เพิ่มแผนก</a>&nbsp<span style = "color:orange;">กรูณาเลือกหน่วยงานก่อน</span>
							  </div>
							</div>

		                </h3>
		            </div>
		            <div style = "margin : 15px!important;">
		               <div id = "content2"></div>
				    </div>
		        </div>
		    </div>
		</div> 
		
		<div style = "margin:20px;" id = "form3">
    <div class="row">
      <h2 id = "step3"><b>สร้างแผนก <span style = "color:orange">STEP3</span></b></h2>
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">
                     <i class = "glyphicon glyphicon-arrow-right"></i>&nbsp;&nbsp;เลือกหน่วยงานระดับอำเภอ<br/><br/>
                     <div class="row">
                      <div class="col-md-4">
                        <select class="form-control" name = "tambol" id = "tambol" width = "200px">
                         <option value = "0" >เลือกหน่วยงานระดับอำเภอ</option>
                        </select><br/><a data-toggle="modal" id = "add2" data-target="#myModal_amphur"  class="btn btn-warning">เพิ่มแผนก</a>&nbsp<span style = "color:orange;">กรูณาเลือกหน่วยงานก่อน</span>
                      </div>
                    </div>
                </h3>
            </div>
            <div style = "margin : 15px!important;">
               <div id = "content3"></div>
            </div>
        </div>
    </div>
</div> 
<div style = "margin:20px;" id = "form4">
    <div class="row">
      <h2 id = "step3"><b>สร้างแผนก <span style = "color:orange">STEP4</span></b></h2>
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">
                     <i class = "glyphicon glyphicon-arrow-right"></i>&nbsp;&nbsp;เลือกหน่วยงานระดับตำบล<br/><br/>
                     <div class="row">
                      <div class="col-md-4">
                        <select class="form-control" name = "tambol_de" id = "tambol_de" width = "200px">
                         <option value = "0" >เลือกหน่วยงานระดับตำบล</option>
                        </select><br/><a data-toggle="modal" id = "add3" data-target="#myModal_tambol"  class="btn btn-warning">เพิ่มแผนก</a>&nbsp<span style = "color:orange;">กรูณาเลือกหน่วยงานก่อน</span>
                      </div>
                    </div>
                </h3>
            </div>
            <div style = "margin : 15px!important;">
               <div id = "content4"></div>
            </div>
        </div>
    </div>
</div>          
</div>
</div>

             <!-- Modal1 -->
            <div class="modal fade" id="myModal_provice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog">
                <div class="modal-content">
                 <div style = "margin :20px">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="title1" style = "color : blue;"><b>เพิ่มแผนกหน่วยงานระดับจังหวัด</b></h3>
                  </div>
                  <form class="form-horizontal" action = "index.php/maindata/institution_department/save_department1" method="post" id = "modal_create_department1">
                  <div class="modal-body">
                     <div class = "row">
                      <div class="form-group">
                        <label class="col-md-3 control-label" for="email">หมายเลขแผนก</label>
                        <div class="col-md-9">
                          <input id="department_number1" name="department_number1" type="text" placeholder="หมายเลขแผนก " class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label" for="email">ชื่อแผนก</label>
                        <div class="col-md-9">
                          <input id="department_name1" name="department_name1" type="text" placeholder="ชื่อผแนก " class="form-control">
                        </div>
                      </div>
                       <input type="hidden" name = "hide1" id = "hide1"/>
                       <input type="hidden" name = "prov1" id = "prov1"/>
                       </div>
                       <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้านี้</button>
                    <!--<button type="submit" id = "save1" class="btn btn-primary" >บันทึก</button>-->
                    <input type = "submit"  class="btn btn-primary" value="บันทึก"/>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
            </form>
     

                <!-- Modal2 -->
            <div class="modal fade" id="myModal_amphur" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog">
                <div class="modal-content">
                 <div style = "margin :20px">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="title1" style = "color : blue;"><b>เพิ่มแผนกหน่วยงานระดับอำเภอ</b></h3>
                  </div>
                  <form class="form-horizontal" action = "index.php/maindata/institution_department/save_department2" method="post" id = "modal_create_department2">
                  <div class="modal-body">
                     <div class = "row">
                      <div class="form-group">
                        <label class="col-md-3 control-label" for="email">หมายเลขแผนก</label>
                        <div class="col-md-9">
                          <input id="department_number1_am" name="department_number1_am" type="text" placeholder="หมายเลขแผนก " class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label" for="email">ชื่อแผนก</label>
                        <div class="col-md-9">
                          <input id="department_name1_am" name="department_name1_am" type="text" placeholder="ชื่อผแนก " class="form-control">
                        </div>
                      </div>
                       <input type="hidden" name = "hide1_am" id = "hide1_am"/>
                       <input type="hidden" name = "prov1_am" id = "prov1_am"/>
                       </div>
                       <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้านี้</button>
                    <input type = "submit"  class="btn btn-primary" value="บันทึก"/>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
            </form>


                       <!-- Modal2 -->
            <div class="modal fade" id="myModal_tambol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog">
                <div class="modal-content">
                 <div style = "margin :20px">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="title1" style = "color : blue;"><b>เพิ่มแผนกหน่วยงานระดับตำบล</b></h3>
                  </div>
                  <form class="form-horizontal" action = "index.php/maindata/institution_department/save_department3" method="post" id = "modal_create_department3">
                  <div class="modal-body">
                     <div class = "row">
                      <div class="form-group">
                        <label class="col-md-3 control-label" for="email">หมายเลขแผนก</label>
                        <div class="col-md-9">
                          <input id="department_number1_tam" name="department_number1_tam" type="text" placeholder="หมายเลขแผนก " class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label" for="email">ชื่อแผนก</label>
                        <div class="col-md-9">
                          <input id="department_name1_tam" name="department_name1_tam" type="text" placeholder="ชื่อผแนก " class="form-control">
                        </div>
                      </div>
                       <input type="hidden" name = "hide1_tam" id = "hide1_tam"/>
                       <input type="hidden" name = "prov1_tam" id = "prov1_tam"/>
                       </div>
                       <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้านี้</button>
                    <input type = "submit"  class="btn btn-primary" value="บันทึก"/>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
            </form>

          
<script type="text/javascript">
    $(document).ready(function(){

      $("#add1").click(function( event ){
          if($("#hide1").val() == "")
          {
            alert("กรุณาเลือกหน่วยงานก่อน");
            event.preventDefault();
          }
      });
      $("#add2").click(function( event ){
          if($("#hide1_am").val() == "")
          {
            alert("กรุณาเลือกหน่วยงานก่อน");
            event.preventDefault();
          }
      });
      $("#add3").click(function( event ){
          if($("#hide1_tam").val() == "")
          {
            alert("กรุณาเลือกหน่วยงานก่อน");
            event.preventDefault();
          }
      });

      <?php 
        if($this->session->flashdata('insert_dep1'))
        { ?>
          alert("บันทึกข้อมูลเรียบร้อยแล้ว");
       <?php }?>  
        <?php 
        if($this->session->flashdata('delete'))
        { ?>
          alert("ลบข้อมูลเรียบร้อยแล้ว");
       <?php }?>  
      

       $("#form2").hide();
       $("#form3").hide();
       $("#form4").hide();


      /////////////////////////////////// province ///////////////////////////////////////////////////

       $("#province").change(function(event) {
           var province_id = $(this).val();
           if(province_id == 0)
           {
               $("#form2").hide();
               $("#form3").hide();
               $("#form4").hide();
           }
           else
           {   
               $("#form2").show();
               $("#form3").hide();
               $("#form4").hide();
                $('#amphur option[value!="0"]').remove();
                    $.post( "index.php/maindata/institution/get_institution_province2",{'id':province_id}, function( data ) {     
                         $('#amphur').attr('enabled', 'true');
                         $.each(data, function() {
                              $('#amphur').append(
                         $("<option></option>").text(this.institution_province_name).val(this.id)
                          );
                        });
                  });
                  //animation
                  $('html, body').animate({
                               scrollTop: $("#step2").offset().top
                  }, 1000);

                 

               }
       });

       ////////////////////////////////// amphur ///////////////////////////////////////////////////////
       $("#amphur").change(function(event) {
           var id = $(this).val();

           if(id == 0)
           {
              $("#form3").hide();
              $("#content2").hide();
                          $("#department_number1").val('');
                          $("#department_name1").val('');
                          $("#hide1").val('');
                          $("#prov1").val('');
           }
           else
           {  
              $("#hide1").val(id);
              $("#content2").show();
              $("#prov1").val($("#province").val());
              $("#form3").show();
              var amphur = $(this).val();
                          $('#tambol option[value!="0"]').remove();
                           $.post( "index.php/maindata/institution/get_institution_province3",{'id':amphur}, function( data ) {
                            
                                 $('#tambol').attr('enabled', 'true');
                                 $.each(data, function() {
                                    $('#tambol').append(
                                        $("<option></option>").text(this.institution_amphur_name).val(this.id)
                           );
                       });
                    });
               //animation
              $('html, body').animate({
                           scrollTop: $("#step3").offset().top
              }, 1000);

               $.post( "index.php/maindata/institution_department/get_province_dep",{'id':id}, function( data ) {
                    $( "#content2" ).html( data );
                });
           }
           
       });
       ////////////////////////////////// tambol ///////////////////////////////////////////////////////
       $("#tambol").change(function(event) {
            var id = $(this).val();

           if(id == 0)
           {
              $("#form4").hide();
                $("#content3").hide();
                          $("#department_number1_am").val('');
                          $("#department_name1_am").val('');
                          $("#hide1_am").val('');
                          $("#prov1_am").val('');
           }
           else
           {  
              $("#hide1_am").val(id);
              $("#content3").show();
              $("#prov1_am").val($("#province").val());
              $("#form4").show();


                          $('#tambol_de option[value!="0"]').remove();
                           $.post( "index.php/maindata/institution/get_institution_province4",{'id':id}, function( data ) {
                            
                                 $('#tambol_de').attr('enabled', 'true');
                                 $.each(data, function() {
                                    $('#tambol_de').append(
                                        $("<option></option>").text(this.institution_district_name).val(this.id)
                           );
                       });
                    });
               //animation
              $('html, body').animate({
                           scrollTop: $("#step3").offset().top
              }, 1000);

              $.post( "index.php/maindata/institution_department/get_amphur_dep",{'id':id}, function( data ) {
                    $( "#content3" ).html( data );
                });
           }
       });

     $("#tambol_de").change(function(event) {
            var id = $(this).val();

           if(id == 0)
           {

                          $("#content4").hide();
                          $("#department_number1_tam").val('');
                          $("#department_name1_tam").val('');
                          $("#hide1_tam").val('');
                          $("#prov1_tam").val('');
           }
           else
           {  
              $("#hide1_tam").val(id);
              $("#content4").show();
              $("#prov1_tam").val($("#province").val());

                //animation
              $('html, body').animate({
                           scrollTop: $("#step3").offset().top
              }, 1000);

              $.post( "index.php/maindata/institution_department/get_tambol_dep",{'id':id}, function( data ) {
                    $( "#content4" ).html( data );
                });
           }
       });
    });
</script>




