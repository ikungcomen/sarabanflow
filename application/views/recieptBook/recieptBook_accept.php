<div class="container-fluid">
    <section class="container">
        <div class="container-page">				
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-lg-12 text-left">
                       <div style = "width :100% ; background-color: #3e8f3e; padding-left :15px;color:#FFFFFF"><h3><img src = "assets/img/icon01.jpg" width = "40px">&nbsp;&nbsp;<b>รายงานสมุดทะเบียนรับ</b></h3></div>
                    </div>
                </div>
                <div class="row">
                     <div class="form-group col-lg-12 text-left">
                        <a href="index.php/receiveDocumentOnline/receiveDocumentOnline" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true">&nbsp;ลงรับเอกสารจากตะกร้า Online</span></a>
                        <a href="index.php/welcome" class="btn btn-danger backhear"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true">&nbsp;ย้อนกลับ</span></a>
                    </div> 
                </div>
                <script>
                    <?php
                    if ($this->session->flashdata('sendToDep_success')) {
                    ?>  
                        alert("ส่งเอกสารหาแผนกเรียบร้อยแล้ว");
                    <?php } ?>
                </script>
                <div class="row">
                    <div class="form-group col-lg-2 text-right">
                        <label>ข้อความในการค้นหา</label>
                    </div>
                    <form action="index.php/recieptBook/recieptBook/search_word" method="post" id = "search1">
                        <div   class="form-group col-lg-3">

                            <div class="form-group has-feedback ">
                                <label for="search" class="sr-only">Search</label>
                                <input type="text" class="form-control " name="search" id="search" placeholder="" value="<?php echo @$search_word; ?>">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>
                        <div   class="form-group col-lg-7">
                            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true">&nbsp;ค้นหา</span></button>
                            <a href = "index.php/recieptBook/recieptBook" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open" aria-hidden="true">&nbsp;แสดงทั้งหมด</a>
                            <!--<button class="btn btn-primary"><span class="glyphicon glyphicon-eye-open" aria-hidden="true">&nbsp;แสดงทั้งหมด</span></button>-->
                        </div>
                    </form>
                    <script>
                        $(document).ready(function(){
                            $("#search1").submit(function(event){
                                var txt = $("#search").val();
                                if(txt == "")
                                {
                                    alert('กรุณากรอกคำค้นหา');
                                   event.preventDefault();
                                }
                            });
                        });
                    </script>
                </div>
                
                <form action="index.php/recieptBook/recieptBook/search_date" method="post" id = "search2">
                <div class="row">
                    <div class="form-group col-lg-2 text-right">
                        <label>ค้นหาตามวันที่</label>
                    </div>
                    <div class="form-group col-lg-2">
                        <input type="text" class="form-control" id="start_date" name="start_date" value="<?php echo @$start_date; ?>">
                    </div>
                    <div class="form-group col-lg-1 text-center">
                        <label>ถึง</label>
                    </div>
                    <div class="form-group col-lg-2">
                        <input type="text" class="form-control" id="end_date" name="end_date" value="<?php echo @$end_date; ?>">
                    </div>
                    <div   class="form-group col-lg-2">
                        <button type = "submit" class="btn btn-primary"><span class="glyphicon glyphicon-eye-close" aria-hidden="true">&nbsp;แสดงผล</span></button>
                    </div>
                </div>
                </form>
                
                <style>
                    
                    .truncate1 {
                            width:25%;
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;
                        }
                </style>
                <hr width="100%">
                <div class="row">
                    <div class="form-group col-lg-12 text-right">
                    <div class="tab-pane fade in active" id="tab1default">
                        <table id="" class="display mytd" cellspacing="0" width="100%" style="">
                            <thead>
                                <th style = 'text-align:center!important;'>สถานะ</th>
                                <th style = 'text-align:center!important;'>เลขทะเบียน</th>
                                <th style = 'text-align:center!important;'>เอกสารเลขที่</th>
                                <th style ='text-align:center!important;'>วันที่</th>
                                <th style ='text-align:center!important;'>เวลา</th>
                                <th style ='text-align:center!important;'>จาก</th>
                                <th style ='text-align:center!important;'>เรื่อง</th>
                                <th style ='text-align:center!important;'>เรียน</th>
                                <th style ='text-align:center!important;'>จัดการ</th>
                            </thead>
                            <tbody>
                        <?php 
                        
                        foreach($recieve_doc as $row_online){
                            //---  $row_online['receive_type']; // บอกว่ารับจากไหน online , other
                            ?>
                            <tr>
                                <td style ='text-align:center!important;'>
                                    <?php if ($row_online['status_sender_to_department'] == 1) { ?>
                                        <font color="#009900"><img src = 'assets/file/finish.gif' title = 'ส่งเอกสารให้แผนกแล้ว'/></font>

                                        <?php } else { ?>

                                    <?php } ?>
                                    <?php 
                                        if($row_online['receive_type'] == "online"){
                                            $this->db->select('*');
                                            $this->db->from('registration_send_document_outside');
                                            $this->db->where('id', $row_online['registration_document_outside_id']);
                                            $this->db->where('active', 1);
                                            $query = $this->db->get();
                                            $temp1 = $query->result_array();
                                            //echo ($temp1[0]['type_send'] == 1)? "<p style = 'color:blue;'>พร้อมแนบเอกสารสำเนา</p>" : "<p style = 'color:red;'>พร้อมมีเอกสารตัวจริง</p> ";
                                            
                                            echo "<img src = 'assets/file/wtype02.gif' title = 'เอกสารรับจากระบบออนไลน์'>";
                                              if($temp1[0]['status_reading'] == 'yes')
                                                {
                                                 echo "&nbsp;<img src = 'assets/file/open.gif' title = 'เปิดอ่านแล้ว'>&nbsp;";
                                                }
                                        }else{
                                            echo "<img src = 'assets/file/wtype00.gif' title = 'เอกสารรับจากระบบอื่น'>";
                                        }

                                        if($row_online['layer_priority_id'] == 2)
                                        {
                                             echo "&nbsp;<img src = 'assets/file/a2.gif' title = 'ด่วน'>&nbsp;";
                                        }
                                        else if($row_online['layer_priority_id'] == 3)
                                        {
                                             echo "&nbsp;<img src = 'assets/file/a3.gif' title = 'ด่วนมาก'>&nbsp;";
                                        }
                                        else if($row_online['layer_priority_id'] == 4)
                                        {
                                             echo "&nbsp;<img src = 'assets/file/a4.gif' title = 'ด่วนที่สุด'>&nbsp;";
                                        }

                                      
                                        $col = $row_online['registration_create_number_id'];
                                        $col1 = $row_online['registration_receive_document_id'];

                                        // echo  $col ;
                                        // exit;
                                        $sql = "select * from registration_create_number_file_upload where registration_create_number_id =  $col ";
                                        $result = $this->db->query($sql);
                                        $temp2 = $result->result_array();

                                        $sql = "select * from registration_receive_document_file_upload where registration_receive_document_id =  $col1 ";
                                        $result = $this->db->query($sql);
                                        $temp3 = $result->result_array();

                                        if(count($temp2) > 0 || count($temp3) > 0 )
                                        {
                                            echo "&nbsp;<img src = 'assets/file/attachmore.gif' title = 'มีเอกสารแนบ'>&nbsp;";
                                        }
                                    ?>
                                </td>
                                <td style ='text-align:center!important;'><?php echo $row_online['number_of_run']; ?></td>
                                <td style ='text-align:center!important;'><?php echo $row_online['document_no']; ?></td>
                                <td style ='text-align:center!important;'><?php echo date("Y-m-d", strtotime($row_online['implementation_date'])); ?></td>
                                <td style ='text-align:center!important;'><?php echo $row_online['implementation_time']; ?></td>
                                <td style ='text-align:center!important;'>
                                    <?php 
                                        if($row_online['receive_type'] == "online"){
                                            if($this->permission_level > 2 || $row_online['layer_secret_id'] == 1)
                                            {
                                                //echo get_name_instutition($row_online['instutition_sender_id'], $row_online['instutition_sender_level']);
                                                echo $row_online['from'];
                                            }
                                            else
                                            {
                                                echo "--?--";
                                            }
                                            
                                        }else{
                                            if($this->permission_level > 2 || $row_online['layer_secret_id'] == 1)
                                            {
                                                echo $row_online['from'];
                                            }
                                            else
                                            {
                                                echo "--?--";
                                            }
                                            
                                        }
                                        
                                    ?>    
                                </td>
                                <td style ='text-align:center!important;'>
                                    <span style="display: block;" class="truncate">
                                        <span>
                                                 <?php 
                                               if($this->permission_level > 2 || $row_online['layer_secret_id'] == 1)
                                                      {
                                                          echo $row_online['subject'];
                                                      }
                                                      else
                                                      {
                                                          echo "--?--";
                                                      }

                                              ?>
                                            
                                        </span>
                                    </span>
                                  
                                </td>
                                <td style ='text-align:center!important;'>
                                      <span style="display:block;" class="truncate">
                                        <span>
                                     <?php 
                                          if($this->permission_level > 2 || $row_online['layer_secret_id'] == 1)
                                           {
                                            echo $row_online['to_receive'];
                                            }
                                            else
                                            {
                                                echo "--?--";
                                            }
                                    ?>
                                                </span>
                                    </span>
                                    
                                </td>
                                <td style ='text-align:center!important;'>
                                    <p>
                                    <a  href = "index.php/detailReceiveOutsite/detailReceiveOutsite/show_detail/<?php echo $row_online['registration_receive_document_id'];?>/<?php echo $row_online['registration_create_number_id'];?>" class =  "btn btn-success btn-xs">
                                        <span class="glyphicon glyphicon-folder-open">&nbsp;รายละเอียด&nbsp;</span>
                                    </a>
                                    </p>    
                                </td>
                            </tr>
                            <?php }?>
                            
                            
                            </tbody>
                        </table>
                        <!-- ------------------------------------------------------- -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row text-right" style="padding-right: 15px;"><?php echo $this->pagination->create_links(); ?></div> 
                            </div>
                        </div>
                        <!-- ------------------------------------------------------- -->
                        
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
</script>