<div style = "margin-left:15px; margin-right:15px">
    <div style = "width :100% ; background-color: #DF7401; padding-left :15px ;color:#FFFFFF">
        <h2><img src = "assets/img/Custom-Icon-Design-Pretty-Office-9-Email-send.ico" width = "40px">&nbsp;&nbsp;<b>ผลการค้นหา</b></h2>
    </div>
    &nbsp;&nbsp;<a href = "index.php/searchreport/searchreport/recieve_report" class = "btn btn-danger"><span class="glyphicon glyphicon-chevron-left " aria-hidden="true">&nbsp;ย้อนกลับ</span></a>
</div><br/><br/>
<div class="container">
    <div class="row">
        <div class="panel-body form-horizontal payment-form">
            <div class="form-group">
                <label  class="col-sm-12 text-center "><h2>สมุดทะเบียนรับ</h2></label>
            </div>

        </div>
    </div>
    <hr width="100%">
    <div class="row">
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
                        foreach ($result as $row) {
                            ?>

                            <tr>
                                <td class="text-center"><?php echo $row['number_of_run']; ?></td>
                                <td class="text-center"><?php echo $row['document_no']; ?></td>
                                <td class="text-center">
                                    <?php 
                                        $newDate = date("d-m-Y", strtotime($row['receive_date']));
                                        echo $newDate; 
                                    ?>
                                
                                </td>
                                <td class="text-center">
                                    <?php
                                    //$from = get_name_instutition($row['instutition_sender_id'], $row['instutition_sender_level']);
                                    echo $row['from'];
                                    ?>
                                </td>
                                <td class="text-center"><?php echo $row['to_receive']; ?></td>
                                <td class="text-center"><?php echo $row['subject']; ?></td>
                                <td class="text-center">
                                    <p>
                                    <a  href = "index.php/detailReceiveOutsite/detailReceiveOutsite/show_detail/<?php echo $row['registration_receive_document_id'];?>/<?php echo $row['registration_create_number_id'];?>" class =  "btn btn-success btn-xs">
                                        <span class="glyphicon glyphicon-folder-open">&nbsp;รายละเอียด&nbsp;</span>
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