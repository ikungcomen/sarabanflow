<div class="container-fluid">
    <section class="container">
        <div class="container-page">				
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-lg-12">
                        <div style = "width :100% ; background-color: #3e8f3e; padding-left :15px;color:#FFFFFF"><h3><img src = "assets/img/icon04.jpg" width = "40px">&nbsp;&nbsp;<b>เอกสารตีกลับ</b></h3></div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12 text-left">
                        <a href="index.php/welcome" class="btn btn-danger"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true">&nbsp;ย้อนกลับ</span></a>
                    </div>
                </div>
                <hr width="100%">
                <div class="row">
                       <div class="table-responsive">
            <table id="myTables" class="table table-bordred table-striped mytd">
                <thead>
                <th style ='width:100px!important;text-align:center!important;'>สถานะเอกสาร</th>
                <th style ='width:150px!important;text-align:center!important;'>วันที่ - เวลา </th>
                <th style ='width:250px!important;text-align:center!important;'>เรื่อง</th>
                <th>ผู้ส่ง</th>
                <!-- <th>ถึง</th> -->
                <th>หมายเหตุ</th>
                <th>รับทราบ</th>
                </thead>
                <tbody>
                 <?php foreach($result as $row){
                    ?>
                    <tr>
                        <td style ='text-align:center!important;'>
                            <?php                                 
                                if($row['status_return_document'] == 'yes')
                                {
                                     echo "<img src = 'assets/img/return.png' title = 'ตีกลับแล้ว' width = '30px'>";
                                }

                            ?>
                          <?php
                                    $this->db->select('*');
                                    $this->db->from('department_of_instutition');
                                    $this->db->where('id', $row['department_of_instutition_id']);
                                    $this->db->where('active', 1);
                                    $query = $this->db->get();
                                    $result2 = $query->result_array();
                                    echo get_number_of_instutition($row['use_instutition_id'],$row['use_instutition_level']) . $result2[0]['department_id'] . '/' . $row['typing'] . $row['number_of_run'];
                           ?>
                        </td>
                        <td style ='text-align:center!important;'><?php echo $row['udate'];?></td>
                        <td style ='text-align:center!important;'><?php echo $row['subject'];?></td>
                        <!-- <td style ='text-align:center!important;'><?php echo $row['implementation_time'];?></td> -->
                        <td style ='text-align:center!important;'><?php echo $this->institution_name;?></td>
                        <!-- <td style ='text-align:center!important;'><?php echo get_name_instutition($row['institution_id_for_send'],$row['institution_level_for_send']);?></td> -->
                        <td style ='text-align:center!important;'>
                            <?php 
                               // if($row['active'] == 0)
                               // {
                               //     echo $row['reason_return_document'];  
                               // }
                               echo $row['reason_return_document'];  
                            ?>
                        </td>
                        <td style ='text-align:center!important;'>
                            <?php
                                if($row['active'] == 1){
                            ?>
                            <a onclick="return confirm('ต้องการรับทราบการตีกลับเอกสารจริงหรือไม่');" href = '<?php echo base_url();?>index.php/reportReturn/reportReturn/accept_return/<?php echo $row['out_id'];?>' class = 'btn btn-warning'>รับทราบ</a>
                            <?php }else{?>
                            <span style = 'color:green'>รับทราบแล้ว</span><br/>
                            <span style = 'color:green'><?php echo $row['udate'];?></span>
                            <?php }?>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){

                <?php
                if ($this->session->flashdata('insert_dep1')) {
                    ?>
                       alert('รับทราบการตีกลับแล้ว');
                <?php } ?>

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
                    
                </div>
            </div>
        </div>
    </section>
</div>