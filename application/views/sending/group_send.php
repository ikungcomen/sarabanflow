<div class="container-fluid">
    <section class="container">
        <div class="container-page">				
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-lg-12 text-left">
                       <div style = "width :100% ; background-color: #3e8f3e; padding-left :15px;color:#FFFFFF"><h3><img src = "assets/img/icon07.jpg" width = "40px">&nbsp;&nbsp;<b>ส่งแบบกลุ่ม</b></h3></div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12 text-left">
                        <a href="index.php/bookSend/bookSend/Send_To/<?php echo $id_data;?>" class="btn btn-danger"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true">&nbsp;ย้อนกลับ</span></a>
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
					 <form class="form-horizontal" action = "index.php/bookSend/bookSend/Send_To_instutition" id = "add_group" name = "add_group" method="post">	
				      <div class="col-md-offset-2 col-md-8 col-md-offset-2">
				      	<span class = 'pull-right'><!--<a href = "index.php/bookSend/bookSend/add_group/<?php echo $id_data;?>" class = "btn btn-warning btn-lg">ลบกลุ่ม</a>&nbsp;--><input type = 'submit' class="btn btn-primary btn-lg" value = 'ส่งแบบกลุ่ม'/></span> <br/><br/><br/>
				        <div class="well well-sm">
				        	<input type = 'hidden' id = 'send_create' name = 'send_create' value = '<?php echo $id_data;?>'>
					          <fieldset>
					           <div class="form-group">
						              <label class="col-md-3 control-label" for="name">เลือกกลุ่มงาน</label>
						              <div class="col-md-9">
						              <select class="form-control" name = "group_name" id = "group_name">
						              	<option value="0"><?php echo "เลือกกลุ่มงาน";?></option>
						              	<?php foreach ($gruop_data as $key => $row) { ?>
						              		<option value="<?php echo $row['id']; ?>"><?php echo $row['group_name']; ?></option>
						              	<?php } ?>
						              </select>
						              </div>
						       </div>
					          </fieldset>
					            <fieldset>
					           <div class="form-group">
						              <label class="col-md-3 control-label" for="name"></label>
						              <div class="col-md-9">
						              <div id = 'group_content'></div>
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
<script>
	$(document).ready(function(){
		$("#group_name").change(function(){
			$.post( "index.php/bookSend/sending/show_group_data/",{ 'id_group':$("#group_name").val() }, function( data ) {
			   $("#group_content").html( data );
			});
		});
	});
</script>