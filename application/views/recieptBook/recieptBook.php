<div class="container-fluid">
    <section class="container">
        <div class="container-page">				
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-lg-12 text-left">
                       <div style = "width :100% ; background-color: #3e8f3e; padding-left :15px;color:#FFFFFF"><h3><img src = "assets/img/icon01.jpg" width = "40px">&nbsp;&nbsp;<b>ลงรับเอกสารจากตระกร้าออนไลน์</b></h3></div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12 text-left">
                        <!-- <a href="index.php/receiveDocumentOnline/receiveDocumentOnline" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true">&nbsp;ลงรับเอกสารจากตะกร้า Online</span></a>-->
                        <a href="index.php/welcome" class="btn btn-danger"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true">&nbsp;ย้อนกลับ</span></a>
                    </div> 
                </div>
                <hr width="100%">
                <div class="row">
                    <div class="form-group col-lg-12 text-right">
                    <div class="tab-pane fade in active" id="tab1default">
                        <table id="example" class="display mytd" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style = 'width:70px!important;text-align:center!important;'>&nbsp;</th>
                                    <th style = 'width:80px!important;text-align:center!important;'>เลขทะเบียน</th>
                                    <th style = 'width:110px!important;text-align:center!important;'>เอกสารเลขที่</th>
                                    <th style = 'text-align:center!important;'>วันที่</th>
                                    <th style = 'text-align:center!important;'>เวลา</th>
                                    <th style = 'text-align:center!important;'>จาก</th>
                                    <th style = 'width:120px!important;text-align:center!important;'>เรื่อง</th>
                                    <th style = 'width:120px!important;text-align:center!important;'>เรียน</th>
                                    <th style = 'text-align:center!important;'>รายละเอียดเอกสาร</th>

                                </tr>
                            </thead>
                            <tbody>
                        <?php 
                        $count = 0;
                        foreach($result as $row){
                            $count++;

                            //$id    = $row['level_institution_id'];
                            //$level = $row['level_institution'];
                            $id    = $row['use_instutition_id'];
                            $level = $row['use_instutition_level'];
                            $sql = "
                            select * from number_of_institution
                            where instutition_id  =  $id
                            and instutition_level = '$level' 
                            ";
                            $result1 = $this->db->query($sql);
                            $result2 = $result1->result_array();

//                            $sql1 = "
//                            select * from  $level  where id = $id ;
//                            ";
//
//                            $result3 = $this->db->query($sql1);
//                            $result4 = $result3->result_array();
                            ?>
                            <tr>
                                <td style ='text-align:center!important;'>
                                    <?php 
                                        echo "<img src = 'assets/file/wtype02.gif' title='เอกสารรับจากออนไลน์' />&nbsp;";
                                        if($row['status_reading'] == 'yes')
                                        {
                                            echo "<img src = 'assets/file/open.gif' title='เอกสารเปิดอ่านแล้ว'/>&nbsp;";
                                        }
                                        else
                                        {
                                            echo "<img src = 'assets/file/receive.gif' title='ยังไม่เปิดอ่านเอกสาร'/>&nbsp;";
                                        }
                                                if($row['layer_priority_id'] == 2)
                                                {
                                                     echo "&nbsp;<img src = 'assets/file/a2.gif' title = 'ด่วน'>&nbsp;";
                                                }
                                                else if($row['layer_priority_id'] == 3)
                                                {
                                                     echo "&nbsp;<img src = 'assets/file/a3.gif' title = 'ด่วนมาก'>&nbsp;";
                                                }
                                                else if($row['layer_priority_id'] == 4)
                                                {
                                                     echo "&nbsp;<img src = 'assets/file/a4.gif' title = 'ด่วนที่สุด'>&nbsp;";
                                                }

                                        $col = $row['registration_create_number_id'];
                                        // echo  $col ;
                                        // exit;
                                        $sql = "select * from registration_create_number_file_upload where registration_create_number_id =  $col ";
                                        $result = $this->db->query($sql);
                                        $temp2 = $result->result_array();
                                        if(count($temp2) > 0)
                                        {
                                            echo "&nbsp;<img src = 'assets/file/attachmore.gif' title = 'มีเอกสารแนบ'>&nbsp;";
                                        }
                                    ?>
                                </td>
                                <td style ='text-align:center!important;'>
                                    <?php 
                                        // if($row['type_send'] == 1)
                                        // {
                                        //     echo "<img src = 'assets/file/doc1.jpg' title='พร้อมแนบเอกสารสำเนา' />";
                                        // }
                                        // else
                                        // {
                                        //     echo "<img src = 'assets/file/doc2.jpg' title='พร้อมมีเอกสารตัวจริง' />";
                                        // }
                                        echo $row['number_of_run']."&nbsp;";

                                    ?>
                                </td>
                                <td style ='text-align:center!important;'><?php echo $result2[0]['instutition_number'].$row['department_id']."/".$row['regis_type_for_create'].$row['number_of_run'];?></td>
                                <!--<td style ='text-align:center!important;'><?php echo $row['dated_send'];?></td>-->
                                <td style ='text-align:center!important;'><?php echo $row['implementation_date'];?></td>
                                <td style ='text-align:center!important;'><?php echo $row['implementation_time'];?></td>
                                <td style ='text-align:center!important;'>
                                    <?php 
                                        if($level == "institution_province")
                                        {   
                                            if($row['layer_secret_id'] > 1 && $this->permission_level < 3)
                                            {
                                                echo "--?--";
                                            }
                                            else
                                            {
                                                echo $row['from'];
                                            }
                                        }
                                        if($level == "institution_amphur")
                                        {   
                                            if($row['layer_secret_id'] > 1 && $this->permission_level < 3)
                                            {
                                                echo "--?--";
                                            }
                                            else
                                            {
                                                 echo $row['from'];
                                               // echo $result4[0]['institution_amphur_name'];
                                            }
                                            
                                        }
                                        if($level == "institution_district")
                                        {   
                                             if($row['layer_secret_id'] > 1 && $this->permission_level < 3)
                                            {
                                                echo "--?--";
                                            }
                                            else
                                            {
                                               //echo $result4[0]['institution_district_name'];  
                                                 echo $row['from'];
                                            }
                                               
                                        }
                                    ?>    
                                </td>
                                <td style ='text-align:center!important;'>
                                    <?php
                                           if($row['layer_secret_id'] > 1 && $this->permission_level < 3)
                                            {
                                                echo "--?--";
                                            }
                                            else
                                            {
                                                echo $row['subject'];
                                            }
                                    ?>
                                </td>
                                <td style ='text-align:center!important;'>
                                      <?php
                                           if($row['layer_secret_id'] > 1 && $this->permission_level < 3)
                                            {
                                                echo "--?--";
                                            }
                                            else
                                            {
                                                echo $row['to_receive'];
                                            }
                                    ?>
                                </td>
                                <td style ='text-align:center!important;'>
                                      <?php
                                           if($row['layer_secret_id'] > 1 && $this->permission_level < 3){?>
                                            <a disabled href = "index.php/acceptBook/acceptBook/acceptBookkeep_document/<?php echo $row['document_outside'];?>/<?php echo $row['id_create_number'];?>" class =  "btn btn-warning">จัดการเอกสาร<a>
                                      <?php }else{?>
                                            <a href = "index.php/acceptBook/acceptBook/acceptBookkeep_document/<?php echo $row['document_outside'];?>/<?php echo $row['id_create_number'];?>" class =  "btn btn-warning">จัดการเอกสาร<a>
                                      <?php }?>
                                    
                                </td>
                            </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
        <?php
             if ($this->session->flashdata('insert_send1')) {
        ?>
             alert("ลงรับเอกสารเรียบร้อยแล้ว");
        <?php } ?>
        <?php
             if ($this->session->flashdata('delete')) {
        ?>
            alert("ลบข้อมูลเรียบร้อยแล้ว");
        <?php } ?>
        <?php
             if ($this->session->flashdata('insert_send2')) {
        ?>
             alert("ตีกลับเอกสารเรียบร้อยแล้ว");
        <?php } ?>

        var tooltips = $( "[title]" ).tooltip({
          position: {
            my: "left buttom",
            at: "right+5 top-5"
          }
        });
</script>