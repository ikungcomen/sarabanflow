
<div class="container">
	<br/>
    <div class="well">
       <h3><img src="assets/img/Double-J-Design-Ravenna-3d-Database-Active.ico" width = "30px">&nbsp;<b>สร้างเลขทะเบียน</b></h3>
       <br/>&nbsp;&nbsp;&nbsp;<a class = "btn btn-success" href = "index.php/main_data">กลับหน้าหลัก</a>
   		<br/><br/>
   		<div class="tab-pane fade in active" id="tab1default">
	            <h2 id = "step1"><b>CREATE NUMBER <span style = "color:orange">STEP1</span></b></h2>
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
		      <h2 id = "step2"><b>CREATE NUMBER <span style = "color:orange">STEP2</span></b></h2>
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
      <h2 id = "step3"><b>CREATE NUMBER <span style = "color:orange">STEP3</span></b></h2>
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
                </h3>
            </div>
            <div style = "margin : 15px!important;">
               <div id = "content3"></div>
            </div>
        </div>
    </div>
</div>         
	    </div>
	 </div>
<input type = "hidden" id  = "prov_id" name="prov_id"/>
<input type = "hidden" id  = "am_id" name="am_id"/>
<input type = "hidden" id  = "tam_id" name="tam_id"/>

<script type="text/javascript">
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
	
</script>>
<?php $this->load->view('maindata/institution_create_number/sub_main/sub1');?>
<?php $this->load->view('maindata/institution_create_number/sub_main/sub2');?>
<?php $this->load->view('maindata/institution_create_number/sub_main/sub3');?>
<?php $this->load->view('maindata/institution_create_number/model_insert/modal_provinc');?>
<?php $this->load->view('maindata/institution_create_number/model_insert/modal_amphur');?>
<?php $this->load->view('maindata/institution_create_number/model_insert/modal_tambol');?>




