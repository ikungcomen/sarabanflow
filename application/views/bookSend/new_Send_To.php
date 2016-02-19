<div class="container-fluid">
    <section class="container">
        <div class="">				
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-lg-12 text-left">
                       <div style = "width :100% ; background-color: #3e8f3e; padding-left :15px;color:#FFFFFF"><h3><img src = "assets/img/icon07.jpg" width = "40px">&nbsp;&nbsp;<b>ส่งเอกสาร</b></h3></div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12 text-left">
                        <a  class="btn btn-danger backhear"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true">&nbsp;ย้อนกลับ</span></a>
                    </div><!--href="index.php/bookSend/bookSend"-->
                </div>
		
                <hr width="100%">
                <form action = "index.php/bookSend/bookSend/Send_To_instutition" method="post" id = "post_send" >
                <div class="row">
                   <div class="container">
                   			<?php
							if ($this->session->flashdata('not_found_data')) {
							?>
								<div class="alert alert-danger-alt alert-dismissable">
				                <span class="glyphicon glyphicon-certificate"></span>
				                <strong>มีข้อผิดพลาด</strong> คุณไม่ได้เลือกหน่วยงานที่จะส่งถึง!<a href="http://www.jquery2dotnet.com"
				                 target="_blank"></a> กรุณาทำรายการใหม่อีกครั้ง</div>
						<?php } ?>
                    <input type = "hidden" id = "send_create" name = "send_create" value="<?php echo $id_data;?>"/>
					<div class="row">
				      <div class="col-md-12">
				        <div class="well well-sm">
				          <form class="form-horizontal" action="" method="post">
				          <fieldset>
				            <legend class="text-center"> <h2><b>ส่งเอกสาร</b></h2> </legend>
				    		<div class = 'row'>
				    			<div class="col-md-6">
				    				<br/><br/><br/>
						           <!-- Name input-->
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
						                <!--  <?php foreach(getAllDataProvince() as $row){?>
						                   	 <option value="<?php echo $row->province_id;?>"><?php echo $row->province_name;?></option>
						                 <?php }?> -->
						                 </select>
						              </div>
						            </div> 

						           <!-- Name input-->
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
						                 <div id = "list_instutision"></div>
						              </div>
						            </div>
					           </div>
					         
					         <input type = "hidden" id = "send_create" name = "send_create" value="<?php echo $id_data;?>"/><!-- Name input-->
					           <div class="col-md-6">
					           	<span class = 'pull-right'><!--<a href = "index.php/bookSend/bookSend/add_group/<?php echo $id_data;?>" class = "btn btn-warning btn-lg">เพิ่มกลุ่ม</a>-->&nbsp;<input type = 'submit' class="btn btn-primary btn-lg" value = 'ส่งเอกสาร'/></span> <br/><br/>			
									&nbsp;&nbsp;
					    			   <div class="table-responsive">
							            <table id="myTables" class="table table-bordred table-striped mytd">
							                <thead>
							                <th style ='text-align:center!important;'>ชื่อหน่วยงาน</th>
							                <th style ='text-align:center!important;'>ลบ</th>
							                </thead>
							                <tbody>
							                	<?php 
							                	if($this->session->userdata('item_select')){
							                	foreach ($this->session->userdata('item_select') as $key => $row) { ?>
							                    <tr>
			     			                        <td style ='text-align:center!important;'>
							                        	<?php 
							                        		$my_ar = explode(',',$row);
							                        		echo get_name_instutition($my_ar[0],$my_ar[1]);
							                        	;?>
							                        </td>
							                        <td style ='text-align:center!important;'>
							                        	<a  onclick="return confirm('คุณต้องการจะลบหน่วยงานนี้จริงหรือไม่?')" href = 'index.php/bookSend/sending/del_item/?item=<?php echo $row ;?>&id_re=<?php echo $id_data;?>' class = 'btn btn-danger'>ลบ</a>
							                        </td>
							                    </tr>
							                    <?php }}?>
							                </tbody>
							            </table>
							        </div>
					           </div>
					       </form>
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
			    		$.post( "index.php/bookSend/sending/sending_data/",{'id_redirect':id_redirect,'select_ins':$(this).val(),'id_data':<?php echo $id_data;?>}, function( data ) {
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

<style>
	.alert-purple { border-color: #694D9F;background: #694D9F;color: #fff; }
	.alert-info-alt { border-color: #B4E1E4;background: #81c7e1;color: #fff; }
	.alert-danger-alt { border-color: #B63E5A;background: #E26868;color: #fff; }
	.alert-warning-alt { border-color: #F3F3EB;background: #E9CEAC;color: #fff; }
	.alert-success-alt { border-color: #19B99A;background: #20A286;color: #fff; }
	.glyphicon { margin-right:10px; }
	.alert a {color: gold;}
</style>

