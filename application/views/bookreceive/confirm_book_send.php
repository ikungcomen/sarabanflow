<div style = "margin-left:15px; margin-right:15px">
    <div style = "width :100% ; background-color: #3e8f3e; padding-left :15px ;color:#FFFFFF"><h2><img src = "assets/img/Custom-Icon-Design-Pretty-Office-9-Email-send.ico" width = "40px">&nbsp;&nbsp;<b>ผลการพิมพ์รายงานสมุดทะเบียนส่ง</b></h2></div>
    <a href="index.php/report/book_receive/bookSend" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left " aria-hidden="true">&nbsp;ย้อนกลับ</span></a>
    <a href="index.php/report/book_receive/toDocSend" class="btn btn-success">ยืนยันการพิมพ์</a>
    <br/><br/>
</div>
<div class="container">
    <div class="row">
        <div class="panel-body form-horizontal payment-form">
            <div class="form-group">
                <label class="col-sm-12 "><center><h2>สมุดทะเบียนส่ง</h2></center></label>
            </div>
            <hr width="100%">
            <div class="form-group">
                <label class="col-sm-1 text-left"><h4>หน่วยงาน </h4></label>
                <label class="col-sm-11 text-left"><h4>:  <?php echo $this->institution_name; ?></h4></label>
            </div> 
            <div class="form-group">
                <label class="col-sm-1 text-left"><h4>วันที </h4></label>
                <label class="col-sm-11 text-left"><h4>:  <?php echo date('d-m-Y'); ?></h4></label>
            </div>
            <div class="form-group">
                <label class="col-sm-1 text-left"><h4>เวลา </h4></label>
                <label class="col-sm-11 text-left"><h4>:  <?php echo date('H:i:s'); ?></h4></label>
            </div>

        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="form-group col-lg-12 text-right">
                <div class="tab-pane fade in active" id="tab1default">
                <table id="" class="display mytd" cellspacing="0" width="100%">
                    <thead>
                    <th class="text-center">เลขทะเบียน</th>
                    <th class="text-center">เอกสารเลขที่</th>
                    <th class="text-center">วันที่</th>
                    <th class="text-center">จาก</th>
                    <th class="text-center">ถึง</th>
                    <th class="text-center">เรื่อง</th>
                    <th class="text-center">จัดการ</th>

                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        foreach ($result as $row) {
                            $count++;
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $row['number_of_run']; ?></td>
                                <td class="text-center">
                                    <?php
                                    $this->db->select('*');
                                    $this->db->from('department_of_instutition');
                                    $this->db->where('id', $row['department_of_instutition_id']);
                                    $this->db->where('active', 1);
                                    $query = $this->db->get();
                                    $result2 = $query->result_array();

                                    echo  get_number_of_instutition($row['use_instutition_id'], $row['use_instutition_level']). $result2[0]['department_id'] . '/' . $row['registration_type'] . $row['number_of_run'];//$this->instutition_number
                                    ?>
                                </td>

                                <td class="text-center">
                                    
                                    <?php 
                                    
                                    $newDate = date("d-m-Y", strtotime($row['dated_send']));
                                    echo $newDate; 
                                    
                                    
                                    ?>
                                
                                </td>
                                <td class="text-center">
                                    <?php
                                        //$from = get_name_instutition($this->level_institution_id, $this->level_institution);
                                        echo $row['from'];
                                    ?>
                                </td>
                                <td class="text-center"><?php echo $row['to_receive']; ?></td>
                                <td class="text-center"><?php echo $row['subject']; ?></td>
                                <td class="text-center">
                                    <p>
                                        <a  href="index.php/bookSend/bookSend/showDetail/<?php echo $row['id']; ?>"  class="btn btn-success btn-xs">
                                        <span class="glyphicon glyphicon-folder-open" aria-hidden="true">&nbsp;รายละเอียด</span>
                                    </a>
                                    </p>
                                    
                                </td>


                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
            </div>
            
        </div>
    </div>
</div>