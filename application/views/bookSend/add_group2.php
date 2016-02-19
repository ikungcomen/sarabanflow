<div class="container-fluid">
    <section class="container">
        <div class="container-page">				
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-lg-12 text-left">
                       <div style = "width :100% ; background-color: #3e8f3e; padding-left :15px;color:#FFFFFF"><h3><img src = "assets/img/icon07.jpg" width = "40px">&nbsp;&nbsp;<b>เพิ่มกลุ่ม</b></h3></div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12 text-left">
                        <a href="index.php/bookSend/bookSend/Send_To/<?php echo $id_send;?>" class="btn btn-danger"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true">&nbsp;ย้อนกลับ</span></a>
                    </div>
                </div>

				<?php
					if ($this->session->flashdata('not_found_data')) {
					?>
					<div class="alert alert-danger-alt alert-dismissable">
					<span class="glyphicon glyphicon-certificate"></span>
					<strong>มีข้อผิดพลาด</strong> คุณไม่ได้เลือกหน่วยงานที่จะสร้างกลุ่ม!<a href="http://www.jquery2dotnet.com"
				target="_blank"></a> กรุณาทำรายการใหม่อีกครั้ง</div>
				<?php } ?>

                <hr width="100%">
                <div class="row" id = 'form1'>
                   <div class="container">
					<div class="row">
				      <div class="col-md-offset-2 col-md-8 col-md-offset-2">
				        <div class="well well-sm">
				          <form class="form-horizontal" action = "index.php/bookSend/bookSend/save_group" id = "add_group" name = "add_group" method="post">
					          <fieldset>
					            <legend class="text-center"> <b>เพิ่มชื่อกลุ่ม <span style = 'color:red;'>STEP1</span></b> </legend>
					            <!-- Name input-->
					            <div class="form-group">
					              <label class="col-md-3 control-label" for="name">ชื่อกลุ่ม</label>
					              <div class="col-md-9">
					                 <input type = "text"  class="form-control"  id = "group_name" name = "group_name"/>
					                 <input type = "hidden" name = 'hide_re' id = 'hide_re' value = '<?php echo $id_send;?>'/>
					              </div>
					            </div>
					            <!-- Form actions -->
					            <div class="form-group pull-right">
					              <div class="col-md-12 text-right"><br>
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
            </div>
        </div>
    </section>
</div>
<div class="container-fluid formhide2" id = 'link2'>
 	<section class="container">
		<div class="container-page">
			<div class="col-md-6">
				 <div class="well well-sm">
				     <br/>
						           <!-- Name input-->
						           <legend class="text-center"> <b>เลือกหน่วยงาน&nbsp;<span style = 'color:red;'>STEP2</span></b> </legend>
						            <div class="form-group">
						              <label class="col-md-3 control-label" for="name">เลือกจังหวัด</label>
						              <div class="col-md-9">
						              <select class="form-control" name = "province" id = "province">
						              	<option value="0"><?php echo "เลือกจังหวัด";?></option>
						              	<option value="1"><?php echo "กรุงเทพมหานคร";?></option>
						              	<option value="20"><?php echo "บุรีรัมย์";?></option>
						              	<option value="18"><?php echo "สระแก้ว";?></option>
						              	<option value="32"><?php echo "มหาสารคาม";?></option>
						              	<option value="31"><?php echo "หนองคาย";?></option>
						                 </select>
						              </div>
						            </div> 
						             <div class="form-group">
						              <label class="col-md-3 control-label" for="name">เลือกหน่วยงาน(จังหวัด)</label>
						              <div class="col-md-9">
						              <select class="form-control" name = "get_j_pro" id = "get_j_pro">
						              	<option value="0"><?php echo "เลือกหน่วยงาน";?></option>
						               </select>
						              </div>
						            </div>
						            <div class="form-group">
						              <label class="col-md-3 control-label" for="name">เลือกหน่วยงาน(อำเภอ)</label>
						              <div class="col-md-9">
						              <select class="form-control" name = "get_j_am" id = "get_j_am">
						              	<option value="0"><?php echo "เลือกหน่วยงาน";?></option>
						                 </select>
						                 <br/><br/>
						                 <div id = "list_instutision"></div>
						              </div>
						            </div>
						            <br/><br/><br/><br/>
					      <br/><br/>
				</div>
			</div>
			<form action = "index.php/bookSend/sending/create_group" method="post" id = "post_send" >
			 <div class="col-md-6">
			 	 <div class="well well-sm">
			 	 	<br/>
			 	 	<legend class="text-center"> <b>สร้างกลุ่ม&nbsp;<span style = 'color:red;'>STEP3</span></b> </legend>
			 	 	<span class = 'pull-right'>&nbsp;<input type = 'submit' class="btn btn-primary btn-lg" value = 'บันทึกการสร้างกลุ่ม'/></span> <br/><br/>	
				     <br/>
				     <div class="form-group">
			              <label class="col-md-3 control-label" for="name">เลือกชื่อกลุ่มที่ต้องการสร้าง</label>
			              <div class="col-md-9">
			              <select class="form-control" name = "group_name" id = "group_name">
			              	<option value="0"><?php echo "กรุณาเลือกกลุ่ม";?></option>
			              	<?php 
			              		foreach($name_group as $row){ 
			              	?>
			              	<option value="<?php echo $row['id'];?>"><?php echo $row['group_name'];?></option>
			              	<?php } ?>
			               </select>
			               <input type = "hidden" name = 'hide_re' id = 'hide_re' value = '<?php echo $id_send;?>'/>
			                 <br/>
			              </div>
					  </div>
					 <br/><br/>
						<table id="myTables" class="table table-bordred table-striped mytd">
						    <thead>
						    <th style ='text-align:center!important;'>ชื่อหน่วยงาน</th>
						    <th style ='text-align:center!important;'>ลบ</th>
						    </thead>
						    <tbody>
						    	<?php 
						    	if($this->session->userdata('item_select2')){
						    	foreach ($this->session->userdata('item_select2') as $key => $row) { ?>
						        <tr>
						                <td style ='text-align:center!important;'>
						            	<?php 
						            		$my_ar = explode(',',$row);
						            		echo get_name_instutition($my_ar[0],$my_ar[1]);
						            	;?>
						            </td>
						            <td style ='text-align:center!important;'>
						            	<a  onclick="return confirm('คุณต้องการจะลบหน่วยงานนี้จริงหรือไม่?')" href = 'index.php/bookSend/sending/del_item_group/?item=<?php echo $row ;?>&id_re=<?php echo $id_send;?>' class = 'btn btn-danger'>ลบ</a>
						            </td>
						        </tr>
						        <?php }}?>
						    </tbody>
						</table>           
				    </div>
				</div>
			</form>
			 </div>
		</div>
	</section> 
 <script>

    $( document ).ready(function() {

    	    <?php
		       if ($this->session->flashdata('add_group_name_com')) {
		    ?>
		        alert("เพิ่มชื่อกลุ่มเรียบร้อยแล้ว");

		    <?php }?>

		     <?php
		       if ($this->session->flashdata('create_group_com')) {
		    ?>
		        alert("สร้างกลุ่มเรียบร้อยแล้ว");

		    <?php }?>

		      <?php
		       if ($this->session->flashdata('create_group_not')) {
		    ?>
		        alert("กรุณาเลือกกลุ่มหรือเลือกหน่วยงานก่อน");

		    <?php }?>

        $("#add_group").validate({
              rules: {
                      group_name: "required"
                  },

                  messages: {
                      group_name: "<p style = 'color:red;'>กรุณากรอกชื่อกลุ่ม</p>"
                  },
        });
    });
 </script>
 <script>
   $("#province").change(function(){
	    	   var id_redirect = $("#province").val();
	    	   $("#get_j_pro").prop('selectedIndex',0);
	    	   $("#get_j_am").prop('selectedIndex',0);
	    	   $('#get_j_pro option[value!="0"]').remove();
	    	   $('#get_j_am option[value!="0"]').remove();

	    	   $( "#list_instutision" ).html( "<img src = 'assets/img/loading.gif'>" );
	    	   $.post( "index.php/bookSend/sending/sending_data_group/",{'id_redirect':id_redirect ,'select_ins':1,'id_data':<?php echo $id_send; ?>} , function( data ) {
											$('#get_j_pro option[value!="0"]').remove();
						$.post( "index.php/bookSend/sending/get_j_pro/", {'id' : id_redirect } , function( data ) {
							//alert( data ); 
							$('#get_j_pro').attr('enabled', 'true');
							$.each(data, function() {
								$('#get_j_pro').append(
									$("<option></option>").text(this.institution_province_name).val(this.id)
								);
							});
						});
						
						$("#list_instutision").html( data );
			   });
	       });

   		  $("#get_j_pro").change(function(){
	    	var id_pro = $("#province").val();
	    	var id_redirect = $(this).val();
	    	//alert(id_redirect);
	    	$( "#list_instutision" ).html( "<img src = 'assets/img/loading.gif'>" );
	    	   $.post( "index.php/bookSend/sending/sending_data_group/",{'id_redirect':id_redirect ,'select_ins':2,'id_data':<?php echo $id_send;?>}, function( data ) {
						$('#get_j_am option[value!="0"]').remove();
						$.post( "index.php/bookSend/sending/get_j_am/", {'id' : id_redirect } , function( data ) {
							$('#get_j_am').attr('enabled', 'true');
							$.each(data, function() {
								$('#get_j_am').append(
									$("<option></option>").text(this.institution_amphur_name).val(this.id)
								);
							});
						});
						
						$("#list_instutision").html( data );
			   });
	    });
	     $("#get_j_am").change(function(){
	    	var id_pro = $("#province").val();
	    	var id_redirect = $(this).val();
	    	//alert(id_redirect);
	    	$( "#list_instutision" ).html( "<img src = 'assets/img/loading.gif'>" );
	    	   $.post( "index.php/bookSend/sending/sending_data_group/",{'id_redirect':id_redirect ,'select_ins':3,'id_data':<?php echo $id_send;?>}, function( data ) {						
						$("#list_instutision").html( data );
			   });
	    });
 </script>