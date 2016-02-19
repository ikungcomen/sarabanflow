<div class="container">
<br><br>
    <?php $this->load->view('bookSend/headmenu/headmenu'); ?>
    <?php
    $this->db->select('*');
    $this->db->from('registration_create_number_of_run');
    $this->db->where('registration_create_number_id', $result[0]['id']);
    $this->db->where('active', 1);
    $query = $this->db->get();
    $data_result = $query->result_array();
    ?>
    <div class="row" align="center">
        <table border="0" width="80%">
            <tr>
                <td width="15%" class="text-right"><label>เลขทะเบียน :</label></td>
                <td>&nbsp;&nbsp;<?php echo $data_result[0]['number_of_run']; ?></td>
                <td width="15%" class="text-right"><label>เอกสารเลขที่ :</label></td>
                <td>&nbsp;&nbsp;
                    <?php
                    $this->db->select('*');
                    $this->db->from('department_of_instutition');
                    $this->db->where('id', $result[0]['department_of_instutition_id']);
                    $this->db->where('active', 1);
                    $query = $this->db->get();
                    $result2 = $query->result_array();

                    //echo get_number_of_instutition($result[0]['level_institution_id'],$result[0]['level_institution'])  . $result2[0]['department_id'] . '/' . $result[0]['registration_type'] . $data_result[0]['number_of_run'];
                    echo get_number_of_instutition($result[0]['use_instutition_id'],$result[0]['use_instutition_level'])  . $result2[0]['department_id'] . '/' . $result[0]['registration_type'] . $data_result[0]['number_of_run'];
                    ?>
                </td>
            </tr>
            <tr>
                <td class="text-right"><label>ลงวันที่ :</label></td>
                <td>&nbsp;&nbsp;<?php
                    $dateTemp = date("d-m-Y", strtotime($result[0]['dated_send']));
                    echo $dateTemp;
                    ?>
                </td>
                <td class="text-right"><label>จาก :</label></td>
                <td>&nbsp;&nbsp;<?php echo $result[0]['from']; ?></td>
            </tr>
            <tr>
                <td class="text-right"><label>เรื่อง :</label></td>
                <td>&nbsp;&nbsp;<?php echo $result[0]['subject']; ?></td>
                <td class="text-right"><label>เรียน :</label></td>
                <td>&nbsp;&nbsp;<?php echo $result[0]['to_receive']; ?></td>
            </tr>
            <tr>
                <td class="text-right"><label>สิ่งที่ส่งมาด้วย :</label></td>
                <td>&nbsp;&nbsp;<?php echo $result[0]['attach_detail']; ?></td>
                <td class="text-right"><label>อ้างถึง :</label></td>
                <td>&nbsp;&nbsp;<?php echo $result[0]['reference_to']; ?></td>
            </tr>
            <tr>
                <td class="text-right"><label>รายละเอียด :</label></td>
                <td>&nbsp;&nbsp;<?php echo $result[0]['detail']; ?></td>
                <td class="text-right"><label>วัตถุประสงค์ :</label></td>
                <td>&nbsp;&nbsp;
                    <?php
                    $object = getAllDataObjective();
                    foreach ($object as $row) {
                        if ($result[0]['objective_id'] == $row->id) {
                            echo $row->objective_name ;
                        }
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td class="text-right"><label>ชั้นความเร็ว :</label></td>
                <td>&nbsp;&nbsp;
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
                <td class="text-right"><label>ชั้นความลับ :</label></td>
                <td>&nbsp;&nbsp;
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
                <td class="text-right"><label>วันที่ดำเนินการ :</label></td>
                <td>&nbsp;&nbsp;
                    <?php
                    $arr = explode(" ", $result[0]['created']);
                    $date = date("d-m-Y", strtotime($arr[0]));
                    echo date("d-m-Y", strtotime($result[0]['implementation_date']));
                    ?>
                </td>
                <td class="text-right"><label>เวลาดำเนินการ :</label></td>
                <td>&nbsp;&nbsp;
                    <?php
                    $arr = explode(" ", $result[0]['created']);
                    echo $result[0]['implementation_time'];
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
        <?php
        if ($this->session->flashdata('insert_dep1')) {
        ?>
           alert("รับทราบการตีกลับแล้ว");
        <?php } ?>
       //$( "#contact" ).html( "<img src = 'assets/img/loading.gif'>" );
       $.post( "index.php/bookSend/bookSend/getContact/<?php echo $id_send;?>", function( data ) {
          $( "#contact" ).html( data );
        });
    });
</script>
