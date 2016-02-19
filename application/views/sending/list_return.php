   <div class="table-responsive">
            <table id="myTables" class="table table-bordred table-striped mytd">
                <thead>
                <th style = 'width:90px!important;text-align:center!important;'>สถานะเอกสาร</th>
                <th style ='text-align:center!important;'>วันที่</th>
                <th style ='text-align:center!important;'>ผู้ส่ง</th>
                <th style ='text-align:center!important;'>ถึง</th>
                <th style ='width:350px!important;text-align:center!important;'>หมายเหตุ</th>
                <!--<th style ='text-align:center!important;'>รับทราบ</th>-->
                </thead>
                <tbody>
                 <?php foreach($result as $row){?>
                    <tr>
                        <td style ='text-align:center!important;'>
                            <?php 
                                if($row['status_reading'] == 'yes')  
                                {
                                    echo "<img src = 'assets/img/open.gif' title = 'เปิดอ่านแล้ว' width = '20px'>&nbsp;";
                                }
                                else
                                {
                                     echo "<img src = 'assets/file/receive.gif' title='ยังไม่เปิดอ่านเอกสาร' width = '20px'/>&nbsp;";
                                }
                               
                                if($row['status_receive'] == 'yes')
                                {
                                     echo "<img src = 'assets/file/check.gif' title = 'รับเอกสารแล้ว' width = '20px'>";
                                }
                                
                                if($row['status_return_document'] == 'yes')
                                {
                                     echo "<img src = 'assets/img/return.png' title = 'ตีกลับแล้ว' width = '20px'>";
                                }
                            ?>
                        </td>
                        <?php
                            $item = $row['department_of_instutition_id'];
                            $sql = "select * from department_of_instutition where  id = $item ";
                            $result_item = $this->db->query($sql);
                            $result_item = $result_item->result_array();
                        ?>
                        <td style ='text-align:center!important;'><?php echo date('d-m-Y',strtotime($row['cdate']));?></td>
                        <td style ='text-align:center!important;'><?php echo $this->institution_name;?></td>
                        <td style ='text-align:center!important;'><?php echo $result_item[0]['department_name'];?></td>
                        <td style ='text-align:center!important;'>
                            <?php 
                                if($row['status_return_document'] == 'yes')
                                {   
                                    echo "ตีกลับแล้ว"."<br>";
                                    echo $row['reason_return_document']."<br>";
                                    echo $row['udate'];
                                }
                                if($row['status_receive'] == 'yes')
                                {
                                    echo "ลงทะเบียนรับเอกสาร"."<br/>".$row['udate'];
                                }
                              ?>
                        </td>

                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#myTables').DataTable(
               {
                  "bSort" : false
                } 
        );
        $(function() {
            $( document ).tooltip();
          });
    });
</script>