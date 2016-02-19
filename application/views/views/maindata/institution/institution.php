
<div class="container">
	<br/>

    <div class="well">
       <h3><img src="assets/img/Double-J-Design-Ravenna-3d-Database-Active.ico" width = "30px">&nbsp;<b>ส่วนราชการ/หน่วยงาน</b></h3>
       <br/>&nbsp;&nbsp;&nbsp;<a class = "btn btn-success" href = "index.php/main_data">กลับหน้าหลัก</a>&nbsp;
   		<br/><br/>
   	<div style = "margin:20px;">
    <div class="row">
       <h2 id = "step1"><b>STEP1</b></h2>
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

                </h3><br/>
                <a class = "btn btn-warning" id = "getcontent1"  data-toggle="modal" data-target="#myModal" >เพิ่มกลุ่มหน่วยงานจังหวัด</a><span style = "color :yellow;" id = "btn_add1"><b>&nbsp;กรุณาเลือก</b></span>
            </div>
            <div style = "margin : 15px!important;">
               <div id = "content1"></div>
		    </div>
        </div>
    </div>
</div>
 	<div style = "margin:20px;" id = "form2">
    <div class="row">
      <h2 id = "step2"><b>STEP2</b></h2>
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">
                	 <i class = "glyphicon glyphicon-arrow-right"></i>&nbsp;&nbsp;เลือกหน่วยงานระดับจังหวัด<br/><br/>
                	 <div class="row">
					  <div class="col-md-4">
					  	<select class="form-control" name = "amphur" id = "amphur" width = "200px">
                		 <option value = "0" >เลือกหน่วยงานระดับจังหวัด</option>
						</select>
					  </div>
					</div>

                </h3><br/>
                <a class = "btn btn-warning" id = "getcontent2"  data-toggle="modal" data-target="#myModal_2" >เพิ่มกลุ่มหน่วยงานอำเภอภายใน</a><span style = "color :yellow;" id = "btn_add2"><b>&nbsp;กรุณาเลือก</b></span>
            </div>
            <div style = "margin : 15px!important;">
               <div id = "content2"></div>
		    </div>
        </div>
    </div>
</div>
    <div style = "margin:20px;" id = "form3">
    <div class="row">
      <h2 id = "step3"><b>STEP3</b></h2>
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">
                     <i class = "glyphicon glyphicon-arrow-right"></i>&nbsp;&nbsp;เลือกหน่วยงานระดับอำเภอ<br/><br/>
                     <div class="row">
                      <div class="col-md-4">
                        <select class="form-control" name = "tambol" id = "tambol" width = "200px">
                         <option value = "0" >เลือกหน่วยงานระดับอำเภอ</option>
                        </select>
                      </div>
                    </div>

                </h3><br/>
                <a class = "btn btn-warning" id = "getcontent3"  data-toggle="modal" data-target="#myModal_3" >เพิ่มกลุ่มหน่วยงานตำบลภายใน</a><span style = "color :yellow;" id = "btn_add3"><b>&nbsp;กรุณาเลือก</b></span>
            </div>
            <div style = "margin : 15px!important;">
               <div id = "content3"></div>
            </div>
        </div>
    </div>
</div>
</div>
						
<?php $this->load->view('maindata/institution/step/middle');?>
<?php $this->load->view('maindata/institution/modal/model_step1');?>
<?php $this->load->view('maindata/institution/modal/model_step2');?>
<?php $this->load->view('maindata/institution/modal/model_step3');?>
					
<?php $this->load->view('maindata/institution/step/firststep');?>
<?php $this->load->view('maindata/institution/step/secondestep');?>				
<?php $this->load->view('maindata/institution/step/thirdstep');?>   	
 

