<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        
        <?php
           // $date = date("d/m/Y", strtotime(date('y-m-d')));
            header("Content-Type: application/vnd.ms-word");
            header("Expires: 0");
            header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
            header("Content-disposition: attachment; filename=\"สมุดทะเบียนรับ / ".date('d-m-Y').".doc\"");
        ?>
        <br><br>
    <center><h2>สมุดทะเบียนรับ</h2></center>
    <left><label><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หน่วยงาน :   &nbsp;&nbsp;&nbsp;<?php echo $this->institution_name; ?></h3></label></left>
    <left><label>
            <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันที่ :   &nbsp;&nbsp;&nbsp;
                <?php
               // $newDate = date("d/m/Y", strtotime(date('d-m-Y')));
                echo date('d-m-Y');
                ?>


            </h3></label></left>

    <hr width="100%">
    <center><br><br>
        
        <table border="1" width="90%" class="table table-bordred table-striped">
            <thead>
                
                <th><h2>เลขทะเบียน</h2></th>
                <th><h2>เอกสารเลขที่</h2></th>
                <th><h2>วันที่</h2></th>
                <th><h2>จาก/ผู้ส่ง</h2></th>
                <th><h2>ถึง</h2></th>
                <th><h2>เรื่อง</h2></th>
                <th><h2>การปฎิบัติ</h2></th>
                <th><h2>ลงชื่อ รับวันที่</h2></th>
            </thead>
            <tbody>
                <?php
            $count = 0;
            foreach ($receive as $row) {
                $count++;
                ?>
                <tr>
                    <td align="center"><?php echo $row['number_of_run']; ?></td>
                    <td align="center"><?php echo $row['document_no']; ?></td>
                    <td align="center">
                        <?php 
                        $date = date("d-m-Y", strtotime($row['receive_date']));
                        echo $date; 
                        ?>
                    </td>
                    <td align="center">
                        <?php
                            $from = get_name_instutition($row['instutition_sender_id'],$row['instutition_sender_level']);
                            echo $from;
                        ?>
                    </td>
                    <td align="center"><?php echo $row['to_receive']; ?></td>
                    <td align="center"><?php echo $row['subject']; ?></td>
                    <td align="center"></td>
                    <td align="center"></td>

                </tr>
            <?php } ?>
            </tbody>
             
        </table>
    </center>
</body>
</html>