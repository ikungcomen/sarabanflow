<div class="table-responsive">
            <table id="myTables" class="table table-bordred table-striped mytd">
                <thead>
                <th style = 'width:90px!important;text-align:center!important;'>สถานะเอกสาร</th>
                <th style ='text-align:center!important;'>วันที่-เวลา</th>
                <!-- <th style ='text-align:center!important;'>เวลา</th> -->
                <th style ='text-align:center!important;'>ผู้ส่ง</th>
                <th style ='text-align:center!important;'>ถึง</th>
                <th style ='width:350px!important;text-align:center!important;'>หมายเหตุ</th>
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
                        <td style ='text-align:center!important;'><?php echo $row['udate'];?></td>
  <!--                       <td style ='text-align:center!important;'><?php echo $row['implementation_time'];?></td> -->
                        <td style ='text-align:center!important;'><?php echo $this->institution_name;?></td>
                        <td style ='text-align:center!important;'><?php echo get_name_instutition($row['institution_id_for_send'],$row['institution_level_for_send']);?></td>
                        <td style ='text-align:center!important;'>
                            <?php 
                                if($row['status_return_document'] == 'yes')
                                {
                                    if($row['active'] == 0)
                                    {  
                                        echo "<span style = 'color:red'><b>รับทราบแล้ว</b></span><br>";
                                        echo $row['reason_return_document']."<br/>";
                                        echo $row['udate']."<br/>";
                                    }
                                    else
                                    {
                                        echo "ยังไม่รับทราบ";
                                    }
                                    
                                }
                                if($row['status_receive'] == 'yes')
                                {
                                    echo "<p style = 'color:blue'><b>ลงทะเบียนรับเอกสารแล้ว</b></p>".$row['udate'];
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