<div class="container"><br><br>
   <?php $this->load->view('detailReceiveOutsite/headmenu'); ?>
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
        <h3><font color="red"><< ติดตามงานเอกสาร >></font></h3>
        <div id = 'contact'></div>
    </div>
    
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $( "#contact" ).html( "<img src = 'assets/img/loading.gif'>" );
       $.post( "index.php/bookSend/sending_dep/getContact/<?php echo $registration_receive_document_id;?>", function( data ) {
          $( "#contact" ).html( data );
        });
    });
</script>

