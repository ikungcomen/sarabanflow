<div class="container-fluid">
    <section class="container">
        <div class="container-page">				
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-lg-12 text-left">
                        <div style = "width :100% ; background-color: #3e8f3e; padding-left :15px;color:#FFFFFF"><h3><img src = "assets/img/icon07.jpg" width = "40px">&nbsp;&nbsp;<b>รายงานสมุดทะเบียนส่ง&nbsp;(<?php echo $type_data; ?>)</b></h3></div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12 text-left">
                        <a href="index.php/welcome" class="btn btn-danger"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true">&nbsp;ย้อนกลับ</span></a>
                        <a href="index.php/dataExport/dataExport" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true">&nbsp;ออกเลขทะเบียนส่ง</span></a>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-2 text-right">
                        <label>ข้อความในการค้นหา</label>
                    </div>
                    <form action="index.php/datdReciept/datdReciept/search_word" method="post" id = "search1">
                        <div   class="form-group col-lg-3">

                            <div class="form-group has-feedback ">
                                <label for="search" class="sr-only">Search</label>
                                <input type="text" class="form-control " name="search" id="search" placeholder="" value="<?php echo @$search_word; ?>">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>
                        <div   class="form-group col-lg-7">
                            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true">&nbsp;ค้นหา</span></button>
                            <a href = "index.php/datdReciept/datdReciept" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open" aria-hidden="true">&nbsp;แสดงทั้งหมด</a>
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
                <form action="index.php/datdReciept/datdReciept/search_date" method="post" id = "search2">
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
                <hr width="100%">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group col-lg-12 text-right">
                            <div class="tab-pane fade in active" id="tab1default">
                            <table id="" class="display mytd" cellspacing="0" width="100%">
                                <thead>
                                <th style = 'width:70px!important;text-align:center!important;'>สถานะ</th>
                                <th style = 'width:70px!important;text-align:center!important;'>เลขทะเบียน</th>
                                <th style = 'width:150px!important;text-align:center!important;'>เอกสารเลขที่</th>
                                <th style ='width:120px!important;text-align:center!important;'>วันที่</th>
                                <th style ='width:120px!important;text-align:center!important;'>เวลา</th>
                                <th style ='width:150px!important;text-align:center!important;'>เรื่อง</th>
                                <th style ='width:150px!important;text-align:center!important;'>เรียน</th>
                                <th style ='width:120px!important;'>จัดการ</th>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($result as $row) {
                                        $arr = explode(" ", $row['created']);
                                        $newDate = date("d-m-Y", strtotime($row['implementation_date']));
                                        $this->db->select('*');
                                        $this->db->from('registration_create_number_of_run');
                                        $this->db->where('registration_create_number_id', $row['id']);
                                        $this->db->where('active', 1);
                                        $query = $this->db->get();
                                        $data_result = $query->result_array();
                                        ?>
                                        <tr>
                                           <td style ='text-align:center!important;'>
                                                <?php if ($row['status_sending'] == 1) { ?>
                                                    <font color="#009900"><img src = 'assets/file/finish.gif' title = 'ส่งเอกสารแล้ว'/></font>

                                                <?php } else { ?>
                                                    <font color="#FF0000"><img src = 'assets/file/process.gif' title = 'ยังไม่ส่งเอกสาร'/></font>
                                                <?php } ?>
                                                <?php
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
                                                $col = $data_result[0]['registration_create_number_id'];
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

                                            <td style ='text-align:center!important;'><?php echo $data_result[0]['number_of_run']; ?></td>
                                            <td style ='text-align:center!important;'>
                                                <?php
                                                $this->db->select('*');
                                                $this->db->from('department_of_instutition');
                                                $this->db->where('id', $row['department_of_instutition_id']);
                                                $this->db->where('active', 1);
                                                $query = $this->db->get();
                                                $result2 = $query->result_array();

                                                //echo get_number_of_instutition($row['level_institution_id'],$row['level_institution'])    . $result2[0]['department_id'] . '/' . $row['registration_type'] . $data_result[0]['number_of_run'];
                                                echo get_number_of_instutition($row['use_instutition_id'],$row['use_instutition_level'])    . $result2[0]['department_id'] . '/' . $row['registration_type'] . $data_result[0]['number_of_run'];
                                                ?>
                                            </td>
                                            <td style ='text-align:center!important;'><?php echo $newDate; ?></td>
                                            <td style ='text-align:center!important;'><?php echo $row['implementation_time']; ?></td>
                                            <td style ='text-align:center!important;'><?php echo ($row['layer_secret_id'] > 1 && $this->permission_level < 3) ? '-???-' : $row['subject']; ?></td>
                                            <td style ='text-align:center!important;'><?php echo ($row['layer_secret_id'] > 1 && $this->permission_level < 3) ? '-???-' : $row['to_receive']; ?></td>
                                            <?php
                                                if($row['layer_secret_id'] > 1 && $this->permission_level < 3)
                                                {
                                                    $dis ="disabled";
                                                }
                                                else
                                                {
                                                    $dis ="";
                                                }
                                            ?>
                                            <td style ='text-align:center!important;'><p><a <?php echo $dis;?>  class="btn btn-success btn-xs" href="index.php/bookSend/bookSend/showDetail/<?php echo $row['id']; ?>" data-target="#delete"><span class="glyphicon glyphicon-folder-open">&nbsp;รายละเอียด&nbsp;</span></a></p></td>
                                        </tr>
                                    <?php } ?>
                                    <!--  <?php
                                    foreach ($result_center as $row) {
                                        $arr = explode(" ", $row['created']);
                                        $newDate = date("d/m/Y", strtotime($row['dated_send']));
                                        $this->db->select('*');
                                        $this->db->from('registration_create_number_of_run');
                                        $this->db->where('registration_create_number_id', $row['id']);
                                        $this->db->where('active', 1);
                                        $query = $this->db->get();
                                        $data_result = $query->result_array();
                                        ?>
                                        <tr>
                                            <?php if ($row['status_sending'] == 1) { ?>
                                                <td><font color="#009900">ส่งเรียบเรียบร้อย</font></td>

                                            <?php } else { ?>
                                                <td><font color="#FF0000">ยังไม่ได้ส่ง</font></td>
                                            <?php } ?>

                                            <td><?php echo $data_result[0]['number_of_run']; ?></td>
                                            <td>
                                                <?php
                                                $this->db->select('*');
                                                $this->db->from('department_of_instutition');
                                                $this->db->where('id', $row['department_of_instutition_id']);
                                                $this->db->where('active', 1);
                                                $query = $this->db->get();
                                                $result2 = $query->result_array();

                                                echo get_number_of_instutition($row['level_institution_id'],$row['level_institution'])   . '.' . $result2[0]['department_id'] . '/' . $row['registration_type'] . $data_result[0]['number_of_run'];
                                                ?>
                                            </td>
                                            <td><?php echo $newDate; ?></td>
                                            <td><?php echo $arr[1]; ?></td>
                                            <td><?php echo $row['subject']; ?></td>
                                            <td><?php echo $row['to_receive']; ?></td>
                                            <td><?php echo ($row['central_registration'] == 'yes' ) ? "<p style ='color : red'>ส่งจากหน่วยงานอื่น</p>":"&nbsp;"; ?></td>
                                            <?php
                                                if($row['layer_secret_id'] > 1 && $this->permission_level < 3)
                                                {
                                                    $dis ="disabled";
                                                }
                                                else
                                                {
                                                    $dis ="";
                                                }
                                            ?>
                                            <td><p><a <?php echo $dis;?> class="btn btn-success btn-xs" href="index.php/bookSend/bookSend/showDetail/<?php echo $row['id']; ?>" data-target="#delete"><span class="glyphicon glyphicon-folder-open">&nbsp;รายละเอียด&nbsp;</span></a></p></td>
                                        </tr>
                                    <?php } ?> -->

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
        </div>
</div>
</section>
</div>
<script>
    $(document).ready(function() {
<?php
if ($this->session->flashdata('insert_dep_send_success')) {
    ?>
            alert("ส่งเอกสารเรียบร้อยแล้ว ท่านสามารถตรวจสอบความคืบหน้าในการส่งเอกสาร ในสมุดทะเบียนส่งของท่าน");
<?php } ?>
<?php
if ($this->session->flashdata('insert_dep1')) {
    ?>
            alert("บันทึกข้อมูลเรียบร้อยแล้ว");
<?php } ?>
<?php
if ($this->session->flashdata('delete')) {
    ?>
            alert("ลบข้อมูลเรียบร้อยแล้ว");
<?php } ?>
        $("#btnSearch").click(function() {
            var search = $("#search").val();
            if (search == "") {
                alert("กรุณาระบุคำค้นหาก่อนค่ะ !!");
            } else {
                var url = "index.php/bookSend/bookSend/serach/";
                $.post(url, {'search': search}, function(data) {
                    $("content").html(data);
                    //alert(data);
                });
            }
        });
        $('#search').click(function() {
            $(this).select();
        });

    });
</script>
