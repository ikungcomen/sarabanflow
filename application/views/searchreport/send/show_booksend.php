<div style = "margin-left:15px; margin-right:15px">
    <div style = "width :100% ; background-color: #DF7401; padding-left :15px ;color:#FFFFFF">
        <h2><img src = "assets/img/Custom-Icon-Design-Pretty-Office-9-Email-send.ico" width = "40px">&nbsp;&nbsp;<b>ผลการค้นหา</b></h2>
    </div>
    &nbsp;&nbsp;<a href = "index.php/searchreport/searchreport/send_report" class = "btn btn-danger"><span class="glyphicon glyphicon-chevron-left " aria-hidden="true">&nbsp;ย้อนกลับ</span></a>
</div><br/><br/>
<div class="container">
    <div class="row">
        <div class="panel-body form-horizontal payment-form">
            <div class="form-group">
                <label  class="col-sm-12 text-center "><h2>สมุดทะเบียนส่ง</h2></label>
            </div>

        </div>
    </div>
    <hr width="100%">
    <div class="row">
        <div class="form-group col-lg-12 text-right">
            <div class="tab-pane fade in active" id="tab1default">
                <table id="" class="display mytd" cellspacing="0" width="100%">
                    <thead>
                    <th class="text-center">สถานะเอกสาร</th>
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
                        foreach ($result as $row) {
                            ?>
                         <tr>
                            <?php if ($row['status_sending'] == 1) { ?>
                            <td class="text-center">
                                <font color="#009900"><img src = 'assets/file/finish.gif' title = 'ส่งเอกสารแล้ว'/></font>
                            </td>
                        <?php } else { ?>
                            <td class="text-center"> <font color="#FF0000"><img src = 'assets/file/process.gif' title = 'ยังไม่ส่งเอกสาร'/></font></td>
                        <?php } ?>
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
                            // $from = get_name_instutition($row['level_institution_id'], $row['level_institution']);
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
                        <!-- index.php/searchreport/searchreport/show_booksend_detail/<?php echo $row['id']; ?> -->
                        </tr>

                    <?php } ?>


                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>