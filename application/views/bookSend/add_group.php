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
				          <form class="form-horizontal" onsubmit="return false" id = "add_group"  method="post">
				          <fieldset>
				            <legend class="text-center"> <b>เพิ่มกลุ่ม</b> </legend>
				            <!-- Name input-->
				            <div class="form-group">
				              <label class="col-md-3 control-label" for="name">ชื่อกลุ่ม</label>
				              <div class="col-md-9">
				                 <input type = "text"  class="form-control"  id = "group_name" name = "group_name"/>
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
			<div class="col-md-12">
				<hr width="100%">
				<div class="row">
					<div class="container">
						<div class="row">
							<div class="col-md-offset-2 col-md-8 col-md-offset-2">
								<div class="well well-sm">
									<section class="container">
								<div class="container-page">
								 <div class="col-md-12">
										<br/><br/><br/>
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

								       <br/><br/>
								        <div class="form-group">
								          <label class="col-md-3 control-label" for="name">เลือกระดับหน่วยงาน</label>
								          <div class="col-md-9">
								          <select class="form-control" name = "institution_select" id = "institution_select">
								          	<option value="0"><?php echo "เลือกระดับหน่วยงาน";?></option>
								          	<option value="1"><?php echo "หน่วยงานระดับจังหวัด";?></option>
								          	<option value="2"><?php echo "หน่วยงานระดับอำเภอ";?></option>
								          	<option value="3"><?php echo "หน่วยงานระดับตำบล";?></option>
								             </select>
								             <br/>
								             
								          </div>
								        </div>
								   </div>		         
							  </div>
							</section>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div id = "list_instutision"></div>
							</div>
							 <div class="col-md-6">
								  <form action = 'index.php/bookSend/sending/set_session/<?php echo $id_data;?>' method = 'post'>
								   <div class="table-responsive">
								    <span class = 'pull-right'><input type = 'submit' class="btn btn-primary btn-lg" value = 'เสร็จสิ้น'/></span><br/><br/><br/>
								            <table id="myTables" class="table table-bordred table-striped mytd">
								                <thead>
								                <th style = 'width:90px!important;text-align:center!important;'><input id = 'selecctall' name = 'selecctall' type = 'checkbox'></th>
								                <th style ='text-align:center!important;'>ชื่อหน่วยงาน</th>
								                </thead>
								                <tbody>
								                </tbody>
								            </table>
								        </div>
								    </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> 
<script>

	$(document).ready(function(){

		<?php
		if ($this->session->flashdata('insert_dep1')) {
		    ?>
		       alert('สร้างกลุ่มใหม่คุณยังไม่ได้เลือกหน่วยงาน');
		<?php } ?>

		$("#add_group_detail").submit(function( event ){
			//alert($("#institution_id_send").val());
			//event.preventDefault();
		});
		$(".formhide2").hide();
		$("#add_group").submit(function( event ){
			var group_name = $("#group_name").val();
			if(group_name == '')
			{
				alert('กรุณากรอกชื่อกลุ่ม');
			}
			else
			{
				$.post( "index.php/bookSend/bookSend/save_group",{'data':group_name}, function( data ) {
					$(".formhide2").show();
					$("#group_name").val('');
					$("#group_name").attr('disabled',true);
					alert("บันทึกกลุ่มเรียบร้อยแล้วกรุณาเลือกหน่วยงาน");
					$('html, body').animate({
						scrollTop: $("#link2").offset().top
					}, 1000);
				});
			}
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


<script>
	$(document).ready(function(){
		$("#institution_select").change(function( event ){
			var id_redirect = $("#province").val();
		    
				if(id_redirect == 0)
				{
					alert("กรุณาเลือกจังหวัด");
				}
				else
				{
					if( $(this).val() == 0 )
		    		{
		    			 $("#list_instutision").html( " " );
		    		}
		    		else
		    		{
		    			 $( "#list_instutision" ).html( "<img src = 'assets/img/loading.gif'>" );
			    		$.post( "index.php/bookSend/sending/create_group_data/",{'id_redirect':id_redirect,'select_ins':$(this).val(),'id_data':<?php echo $id_send;?>}, function( data ) {
						   $("#list_instutision").html( data );
						});
		    		}
				}
	    });
	    $("#province").change(function(){
	    	   $("#list_instutision").html( " " );
	    	   $("#institution_select").prop('selectedIndex',0)
	    });
	});
</script>