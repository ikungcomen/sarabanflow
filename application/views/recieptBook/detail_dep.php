<div class="container"><br><br>
    <a class="btn btn-danger" href="index.php/recieptBook/recieptBook/recieptBookForDepartment"><span class="glyphicon glyphicon-chevron-left " aria-hidden="true">&nbsp;ย้อนกลับ</span></a>
    <a class="btn btn-info" href="index.php/recieptBook/recieptBook/show_detail/<?php echo $registration_receive_document_id; ?>/<?php echo $registration_create_number_id; ?>"><span class="glyphicon glyphicon-th-list " aria-hidden="true">&nbsp;รายละเอียด</span></a>
    <div class="row" align="center">
        <table border="0" width="80%">
            <tr>
                <td width="15%"><label>เลขทะเบียน :</label></td>
                <td><?php echo $result[0]['number_of_run']; ?></td>
                <td width="15%"><label>เอกสารเลขที่ :</label></td>
                <td>
                    <?php echo $result[0]['document_no']; ?>
                </td>
            </tr>
            <tr>
                <td><label>ลงวันที่ :</label></td>
                <td><?php
                    $dateTemp = date("d-m-Y", strtotime($result[0]['receive_date']));
                    echo '<label>' . $dateTemp . '</label>';
                    ?>
                </td>
                <td><label>จาก :</label></td>
                <td>
                    <?php 
                        if($result[0]['receive_type'] == "online"){
                            //echo get_name_instutition($result[0]['instutition_sender_id'], $result[0]['instutition_sender_level']);
                            echo $result[0]['from'];
                        }else{
                            echo $result[0]['from'];
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td><label>เรื่อง :</label></td>
                <td><?php echo $result[0]['subject']; ?></td>
                <td><label>เรียน :</label></td>
                <td><?php echo $result[0]['to_receive']; ?></td>
            </tr>
            <tr>
                <td><label>สิ่งที่ส่งมาด้วย :</label></td>
                <td><?php echo $result[0]['attach_detail']; ?></td>
                <td><label>อ้างถึง :</label></td>
                <td><?php echo $result[0]['reference_to']; ?></td>
            </tr>
            <tr>
                <td><label>เสนอ/ผู้ปฎิบัติ :</label></td>
                <td><?php echo $result[0]['offer_the_operating']; ?></td>
                <td><label></label></td>
                <td></td>
            </tr>
            <tr>
                <td><label>รายละเอียด :</label></td>
                <td><?php echo $result[0]['detail']; ?></td>
                <td><label>วัตถุประสงค์ :</label></td>
                <td>
                    <?php
                    $object = getAllDataObjective();
                    foreach ($object as $row) {
                        if ($result[0]['objective_id'] == $row->id) {
                            echo '<label>' . $row->objective_name . '</label>';
                        }
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td><label>ชั้นความเร็ว :</label></td>
                <td>
                    <?php
                    
                        if ($result[0]['layer_priority_id'] == 1) {
                            echo '<label>ปกติ</label>';
                        }else if($result[0]['layer_priority_id'] == 2){
                            echo '<label>ด่วน</label>';
                        }else if($result[0]['layer_priority_id'] == 3){
                            echo '<label>ด่วนมาก</label>';
                        }else if($result[0]['layer_priority_id'] == 4){
                            echo '<label>ด่วนที่สุด</label>';
                        }
                    ?>
                </td>
                <td><label>ชั้นความลับ :</label></td>
                <td>
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
                </td>
            </tr>
            <tr>
                <td><label>วันที่ดำเนินการ :</label></td>
                <td>
                    <?php
                    echo '<label>' . date("d-m-Y", strtotime($result[0]['implementation_date'])) . '</label>';
                    ?>
                </td>
                <td><label>เวลาที่ดำเนินการ :</label></td>
                <td>
                    <?php
                    
                    echo '<label>' . $result[0]['implementation_time'] . '</label>';
                    ?>
                </td>
            </tr>
        </table>
    </div>
    
    <div class="row">
        <h3 style = "color:blue;"><b>&nbsp;รายละเอียดเอกสารที่แนบ</b></h3>
        <div class="table-responsive">
            <div id = "content">
                <table id="mytable" class="table table-bordred table-striped mytd">
                    <thead>
                        <th>&nbsp;</th>
                        <th>วันที่</th>
                        <th>ถึง</th>
                    </thead>
                    <tbody>
                        <?php foreach($attach_file_new as $row){ ?>
                          <tr style = 'text-align:center!important;' >
                              <td style = 'text-align:center!important;'>
                                  <?php echo "<a class = 'get_see_file' id = '".$registration_create_number_id."' target = '_blank' href = '"."uploads/registration_create_file/".$row['file_upload_name']."'>".getFileExtension($row['file_upload_name'])."</a>"; ?>

                              </td>
                              <td style = 'text-align:center!important;'><?php echo date("d-m-Y H:i:s", strtotime($row['cdate']));?></td>

                              <td style = 'text-align:center!important;'><?php echo $this->institution_name; ?></td>

                          </tr>
                         <?php } ?>
                        
                        <?php foreach($attach_file_old as $row){ ?>
                          <tr style = 'text-align:center!important;'>
                              <td style = 'text-align:center;'>
                                  <?php echo "<a class = 'get_see_file' id = '".$registration_create_number_id."' target = '_blank' href = '"."uploads/registration_create_file/".$row['file_upload_name']."'>".getFileExtension($row['file_upload_name'])."</a>"; ?>

                              </td >
                              <td style = 'text-align:center!important;'><?php echo date("d-m-Y H:i:s", strtotime($row['created']));?></td>

                              <td style = 'text-align:center!important;'><?php echo $this->institution_name; ?></td>

                          </tr>
                         <?php } ?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
    
</div>
<script>
    $(document).ready(function() {
        
    });

</script>

