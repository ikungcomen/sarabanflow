
<div class="container-fluid">
    <section class="container">
        <div class="">				
            <div class="col-md-12">

                <div class="row">
                    <div class="form-group col-lg-12 text-left">
                       <div style = "width :100% ; background-color: #3e8f3e; padding-left :15px;color:#FFFFFF"><h3><img src = "assets/img/icon07.jpg" width = "40px">&nbsp;&nbsp;<b>ส่งเอกสาร (แผนก)</b></h3></div>
                    </div>
                </div>
                <br/>
					<?php
					if ($this->session->flashdata('sendToDep_false')) {
					?>
						<div class="alert alert-danger-alt alert-dismissable">
						<span class="glyphicon glyphicon-certificate"></span>
						<strong>มีข้อผิดพลาด</strong> คุณไม่ได้เลือกหน่วยงานที่จะส่งถึง!
						<a target="_blank"></a> กรุณาทำรายการใหม่อีกครั้ง</div>
					<?php } ?>
                <br/>
                <div class="row">
                    <div class="form-group col-lg-12 text-left">
                        <a  class="btn btn-danger backhear"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true">&nbsp;ย้อนกลับ</span></a>
                    </div>
                </div>
			
                <hr width="100%">
                <form action = "index.php/bookSend/sending_dep/sendToDep" method="post" id = "post_send" >
                <input type = 'hidden' name = 'id_receive' id = 'id_receive' value = '<?php echo $id_receive;?>'>
                <input type = 'hidden' name = 'id_create_number' id = 'id_create_number' value = '<?php echo $id_create_number;?>'>
                <div class="row">
                   <div class="container">
					<div class="row">
				      <div class="col-md-12">
				        <div class="well well-sm">
				          <form class="form-horizontal" action="" method="post">
				          <fieldset>
				            <legend class="text-center"> <h2><b>ส่งเอกสาร  (แผนก)</b></h2> </legend>
				    		<div class = 'row'>				         
					         <div class="col-md-3"></div>
					           <div class="col-md-6">
					           	<h4><b>เลือกแผนกที่ต้องการส่ง</b></h4>
					           	<input type = 'submit' class="btn btn-primary" value = 'ส่งเอกสาร'/>
					           	<?php 
					           		if(($this->designation == 'governor' || $this->designation == 'prefect' ) && $get_type_receive[0]['receive_type']  == 'online'){
					           	?>
					           	<a class="btn btn-success" href = 'index.php/bookSend/bookSend/Send_To/<?php echo $id_create_number; ?>'>ส่งเอกสารหาหน่วยงานอื่น</a>
					           	<?php } ?>
					           	 <br/>
									&nbsp;&nbsp;
					    			   <div class="table-responsive">
							            <table id="myTables" class="table table-bordred table-striped mytd">
							                <thead>
							                <th style ='text-align:center!important;'><input type = 'checkbox' id = 'selecctall' name = 'selecctall'></th>
							                <th style ='text-align:center!important;'>ชื่อแผนก</th>
							                </thead>
							                <tbody>
							                	<?php 
							                	foreach ($depart_list as $key => $row) { ?>
							                    <tr>
							                    	<td style ='text-align:center!important;'><input value = '<?php echo $row['id'];?>' type = 'checkbox' name ='item_dep[]' id ='item_dep' class = 'item_select'></td>
			     			                        <td style ='text-align:center!important;'>
							                        	<?php echo $row['department_name']." ".'('.$row['department_id'].')';?>
							                        </td>
							                    </tr>
							                    <?php }?>
							                </tbody>
							            </table>
							        </div>
					           </div>
					           <div class="col-md-3"></div>
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
		$('#selecctall').click(function(event) {  //on click 
            if(this.checked) { // check select status
                $('.item_select').each(function() { //loop through each checkbox
                    this.checked = true;  //select all checkboxes with class "checkbox1"               
                });
            }else{
                $('.item_select').each(function() { //loop through each checkbox
                    this.checked = false; //deselect all checkboxes with class "checkbox1"                       
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
