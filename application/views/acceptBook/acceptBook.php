<hr/>
<div style = "margin-left:15px; margin-right:15px">
    <div style = "width :100% ; background-color: #3e8f3e; padding-left :15px ;color:#FFFFFF"><h2><img src = "assets/img/icon-re.ico" width = "40px">&nbsp;&nbsp;<b>ลงรับเอกสารจากระบบ Online</b></h2></div>
    <h3 style = "color:blue;"><b>&nbsp;รายละเอียดเอกสาร</b></h3>
<?php $this->load->view('acceptBook/headerMenu');?>
<div class="container"><br>
    <?php //$this->load->view('bookSend/headmenu/headmenu'); ?>
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
                    // echo $result[0]['level_institution_id'];
                    // echo $result[0]['level_institution'];
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
                <!--<td>&nbsp;&nbsp;<?php echo get_name_instutition($result[0]['level_institution_id'],$result[0]['level_institution']); ?></td>-->
                <td><?php echo '&nbsp;'.$result[0]['from']; ?></td>
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
                     if($result[0]['layer_priority_id'] == 1)
                     {
                        echo "ปกติ";
                     }
                      if($result[0]['layer_priority_id'] == 2)
                     {
                        echo "ด่วน";
                     }
                      if($result[0]['layer_priority_id'] == 3)
                     {
                        echo "ด่วนมาก";
                     }
                      if($result[0]['layer_priority_id'] == 4)
                     {
                        echo "ด่วนที่สุด";
                     }
                    ?>
                </td>
                <td class="text-right"><label>ชั้นความลับ :</label></td>
                <td>&nbsp;&nbsp;
                     <?php
                      if($result[0]['layer_secret_id'] == 1)
                     {
                        echo "ปกติ";
                     }
                      if($result[0]['layer_secret_id'] == 2)
                     {
                        echo "ลับ";
                     }
                      if($result[0]['layer_secret_id'] == 3)
                     {
                        echo "ลับมาก";
                     }
                      if($result[0]['layer_secret_id'] == 4)
                     {
                        echo "ลับที่สุด";
                     }
                    ?>
                </td>
            </tr>
            <tr>
                <td class="text-right"><label>วันที่ดำเนินการ :</label></td>
                <td>&nbsp;&nbsp;
                    <?php
                    $arr = explode(" ", $result[0]['created']);
                    $date = date("d/m/Y", strtotime($arr[0]));
                    echo $date;
                    ?>
                </td>
                <td class="text-right"><label>เวลาดำเนินการ :</label></td>
                <td>&nbsp;&nbsp;
                    <?php
                    $arr = explode(" ", $result[0]['created']);
                    echo $arr[1];
                    ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="row">
        <h3 style = "color:blue;"><b>&nbsp;รายละเอียดเอกสารที่แนบ</b></h3>
        <div class="table-responsive">
            <div id = "content"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        //alert("<?php echo $id_create;?>");
        $( "#content" ).html( "<img src = 'assets/img/loading.gif'>" );
        $.post( "index.php/acceptBook/acceptBook/get_content/<?php echo $id_create;?>/<?php echo $id_accept;?>", function( data ) {
             $( "#content" ).html( data );
        });
    });
</script>