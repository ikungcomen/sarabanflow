<table id="mytable" class="table table-bordred table-striped mytd">
                <thead>
                <th style ='text-align:center!important;'>&nbsp;</th>
                <th style ='text-align:center!important;'>วันที่</th>
                <!--<th>ผู้ส่ง</th>-->
                <th style ='text-align:center!important;'>ถึง</th>
                <!--<th>หมายเหตุ</th>-->
                </thead>
                <tbody>
                  <?php foreach($result as $row){?>
                    <tr>
                        <td style ='text-align:center!important;'> 
                             <?php echo "<a class = 'get_see_file' id = '".$id_create."' target = '_blank' href = '"."uploads/registration_create_file/".$row['file_upload_name']."'>".getFileExtension($row['file_upload_name'])."</a>"; ?>
                            <!--<a target="_blank" href = "uploads/registration_create_file/<?php echo $row['file_upload_name'];?>" class = "btn btn-success btn-sm"><i class = "glyphicon glyphicon-eye-open"></i>&nbsp;เปิดเอกสาร</a>-->
                          <!--   <a><?php 
                            $array_name = explode("_", $row['file_upload_name']);
                            echo base64_decode($array_name[1]);
                            ?>
                            </a> -->

                        </td>
                        <td style ='text-align:center!important;'><?php echo $row['created'];?></td>
                        <!--<td>1111</td>-->
                        <td style ='text-align:center!important;'><?php echo $this->institution_name; ?></td>
                        <!--<td></td>-->
                    </tr>
                   <?php }?>
                </tbody>
            </table>
            <script>

            </script>