<div class="container">
    <br><br>
    <?php $this->load->view('searchreport/headermenu/headermenu'); ?>
    <hr width="100%">
    <div class="row">
        <div class="form-group">
            <label for="status" class="col-sm-2 control-label">เลขทะเบียน</label>
            <label for="status" class="col-sm-4 control-label">: &nbsp;<?php echo $result[0]['number_of_run']; ?></label>
            <label for="status" class="col-sm-2 control-label">ชั้นความเร็ว</label>
            <label for="status" class="col-sm-4 control-label">: &nbsp;
                <?php
                    $layer_priority = getAllDataLayerPriority();
                    foreach ($layer_priority as $row) {
                        if ($result[0]['layer_priority_id'] == $row->id) {
                            echo '<label>' . $row->pio_name . '</label>';
                        }
                    }
                ?>
            
            </label>
        </div>
        <div class="form-group">
            <label for="status" class="col-sm-2 control-label">เอกสารเลขที่</label>
            <label for="status" class="col-sm-4 control-label">:&nbsp; 
                <?php
                    $this->db->select('*');
                    $this->db->from('department_of_instutition');
                    $this->db->where('id', $result[0]['department_of_instutition_id']);
                    $this->db->where('active', 1);
                    $query = $this->db->get();
                    $result2 = $query->result_array();
                    echo $this->instutition_number . $result2[0]['department_id'] . '/' . $result[0]['registration_type'] . $result[0]['number_of_run'];
                ?>
            </label>
            <label for="status" class="col-sm-2 control-label">ชั้นความลับ</label>
            <label for="status" class="col-sm-4 control-label">: &nbsp;
                <?php
                    
                        if ($result[0]['layer_secret_id'] == 1) {
                            echo '<label>ปกติ</label>';
                        }else if($result[0]['layer_secret_id'] == 2){
                            echo '<label>ลับ</label>';
                        }else if($result[0]['layer_secret_id'] == 3){
                            echo '<label>ลับมาก</label>';
                        }else if($result[0]['layer_secret_id'] == 4){
                            echo '<label>ลับมากที่สุด</label>';
                        }
                    
                    ?>
            
            </label>
        </div>
        <div class="form-group">
            <label for="status" class="col-sm-2 control-label">วันที่</label>
            <label for="status" class="col-sm-4 control-label">: &nbsp;<?php echo $result[0]['dated_send']; ?></label>
            <label for="status" class="col-sm-2 control-label">วันที่ดำเนินการ</label>
            <label for="status" class="col-sm-4 control-label">: &nbsp;
                <?php
                    echo '<label>' . date("d-m-Y", strtotime($result[0]['implementation_date'])) . '</label>';
                ?>
            </label>
        </div>
        <div class="form-group">
            <label for="status" class="col-sm-2 control-label">จาก</label>
            <label for="status" class="col-sm-4 control-label">: &nbsp;
                <?php
                                $from = get_name_instutition($result[0]['level_institution_id'], $result[0]['level_institution']);
                                echo $from;
                            ?>
            </label>
            <label for="status" class="col-sm-2 control-label">เวลาดำเนินการ</label>
            <label for="status" class="col-sm-4 control-label">: &nbsp;
                <?php
                    echo '<label>' . $result[0]['implementation_time'] . '</label>';
                ?>
            </label>
        </div>
        <div class="form-group">
            <label for="status" class="col-sm-2 control-label">เรื่อง</label>
            <label for="status" class="col-sm-10 control-label">: &nbsp;<?php echo $result[0]['subject']; ?></label>
        </div>
        <div class="form-group">
            <label for="status" class="col-sm-2 control-label">เรียน</label>
            <label for="status" class="col-sm-10 control-label">: &nbsp;<?php echo $result[0]['to_receive']; ?></label>

        </div>
        <div class="form-group">
            <label for="status" class="col-sm-2 control-label">สิ่งที่ส่งมาด้วย</label>
            <label for="status" class="col-sm-10 control-label">: &nbsp;</label>
        </div>
        <div class="form-group">
            <label for="status" class="col-sm-2 control-label">อ้างถึง</label>
            <label for="status" class="col-sm-10 control-label">: &nbsp;<?php echo $result[0]['reference_to']; ?></label>
        </div>
        <div class="form-group">
            <label for="status" class="col-sm-2 control-label">รายละเอียด</label>
            <label for="status" class="col-sm-10 control-label">: &nbsp;<?php echo $result[0]['detail']; ?></label>
        </div>
        <div class="form-group">
            <label for="status" class="col-sm-2 control-label">วัตถุประสงค์</label>
            <label for="status" class="col-sm-10 control-label">: &nbsp;
                <?php 
                    $this->db->select('*');
                    $this->db->from('objective');
                    $this->db->where('id', $result[0]['objective_id']);
                    $query = $this->db->get();
                    $result2 = $query->result_array();
                    echo $result2[0]['objective_name'] ;
                
                ?>
            
            </label>
        </div>
    </div>
    <hr width="100%">
</div>