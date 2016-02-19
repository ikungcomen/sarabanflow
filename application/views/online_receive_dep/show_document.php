<hr/>
<div style = "margin-left:15px; margin-right:15px">
    <div style = "width :100% ; background-color: #3e8f3e; padding-left :15px ;color:#FFFFFF"><h2><img src = "assets/img/icon-re.ico" width = "40px">&nbsp;&nbsp;<b>ลงรับเอกสารจากระบบ Online</b></h2></div>
    <h3 style = "color:blue;"><b>&nbsp;รายละเอียดเอกสาร</b></h3>
<?php $this->load->view('online_receive_dep/headerMenu'); ?>
<div class="container"><br>
    
    <div class="row" align="center">
        <table border="0" width="80%">
            <tr>
                <td width="15%" class="text-right"><label>เลขทะเบียน :</label></td>
                <td>&nbsp;&nbsp;
                <?php  
                $this->db->select('*');
                $this->db->from('registration_receive_document_of_run');
                $this->db->where('registration_receive_document_id', $result[0]['registration_receive_document_id']);
                $query = $this->db->get();
                $temp = $query->result_array();
                
                echo $temp[0]['number_of_run'];
                ?>
                </td>
                <td width="15%" class="text-right"><label>เอกสารเลขที่ :</label></td>
                <td>&nbsp;&nbsp;
                    <?php echo $result[0]['document_no']; ?>
                </td>
            </tr>
            <tr>
                <td class="text-right"><label>ลงวันที่ :</label></td>
                <td>&nbsp;&nbsp;
                    <?php echo date("d-m-Y", strtotime($result[0]['receive_date'])); ?>
                    
                </td>
                <td class="text-right"><label>จาก :</label></td>
                
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
                <td class="text-right"><label>เสนอ/ผู้ปฏิบัติ :</label></td>
                <td>&nbsp;&nbsp;<?php echo $result[0]['offer_the_operating']; ?></td>
                <td class="text-right"><label></label></td>
                <td>&nbsp;&nbsp;</td>
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
                    <?php echo date("d-m-Y", strtotime($result[0]['implementation_date'])); ?>
                </td>
                <td class="text-right"><label>เวลาดำเนินการ :</label></td>
                <td>&nbsp;&nbsp;
                    <?php echo $result[0]['implementation_time']; ?>
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
        
        $.post( "index.php/receiveDocumentOnline/receiveDocumentOnline/get_content_file/<?php echo $result[0]['registration_create_number_id'];?>/<?php echo $result[0]['registration_receive_document_id'];?>/<?php echo $receive_document_department_id; ?>", function( data ) {
             $( "#content" ).html( data );
             
        });
    });
</script>