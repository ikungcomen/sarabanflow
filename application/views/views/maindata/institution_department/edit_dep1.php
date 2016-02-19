   <!-- Modal1 -->
              
              <?php foreach($result as $row){?>
              <div class="modal-dialog">
                <div class="modal-content">
                 <div style = "margin :20px">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="title1" style = "color : blue;"><b>แก้ไขแผนก</b></h3>
                  </div>
                  <form class="form-horizontal" action = "index.php/maindata/institution_department/edit_department1/<?php echo $row['id'];?>" method="post" id = "modal_create_department1">
                  <div class="modal-body">
                     <div class = "row">
                      <div class="form-group">
                        <label class="col-md-3 control-label" for="email">หมายเลขแผนก</label>
                        <div class="col-md-9">
                          <input value = "<?php echo $row['department_id'];?>" id="department_number1" name="department_number1" type="text" placeholder="หมายเลขแผนก " class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label" for="email">ชื่อแผนก</label>
                        <div class="col-md-9">
                          <input value = "<?php echo $row['department_name'];?>" id="department_name1" name="department_name1" type="text" placeholder="ชื่อผแนก " class="form-control">
                        </div>
                      </div>
                       <input value = "<?php echo $row['instutition_id'];?>" type="hidden" name = "hide1" id = "hide1"/>
                       <input value = "<?php echo $row['province_id'];?>" type="hidden" name = "prov1" id = "prov1"/>
                       </div>
                       <div class="modal-footer">
                    <a href = "index.php/maindata/institution_department" class="btn btn-default" >ย้อนกลับ</a>
                    <input type = "submit" id = "save1" class="btn btn-primary" value="บันทึก"/>
                  </div>
                </div>
                </div>
              </div>
            </div>
            </form>
            <?php }?>