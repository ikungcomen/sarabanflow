<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
        header("Content-Type: application/vnd.ms-word");
        header("Expires: 0");
        header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
        header("Content-disposition: attachment; filename=\"printReport.doc\"");
        ?>
        <br><br>
    <center><h1>รายงานสถิติ</h1></center>
    <left><label><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หน่วยงาน :   &nbsp;&nbsp;&nbsp;<?php echo $this->institution_name; ?></h3></label></left>
    <left><label>
            <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันที่ :   &nbsp;&nbsp;&nbsp;
                <?php
                //$newDate = date("d/m/Y", strtotime(date('y-m-d')));
                echo $date('d-m-Y');
                ?>
            </h3></label></left>
    <left><label>
            <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สถิติการออกเลขทะเบียน จากวันที่ :&nbsp;&nbsp;&nbsp;
                <?php echo $newStartDate;?>&nbsp;&nbsp;&nbsp;ถึงวันที่ : &nbsp;&nbsp;&nbsp;
                <?php 
                //$a = date('d/m/(Y + 543)',strtotime($newEndDate));
                echo $newEndDate;
                ?>
    </h3></label></left>

    <hr width="100%">
    <center><br><br>
        <table border="1" width="90%" class="table table-bordred table-striped">
            <thead>
            <th align="center">ลำดับ</th>
            <th align="center">ชื่อผู้ใช้งานในหน่วยงาน</th>
            <th align="center">สถิติการลงรับเอกสาร</th>
            <th align="center">สถิติการออกเลขส่งภายนอก</th>
            </thead>

            <tbody>
                <?php
                $count = 0;
                foreach ($result as $row) {
                    $count++;
                    ?>
                    <tr>
                        <td align="center"><?php echo $count; ?></td>
                        <td align="center"><?php echo $this->institution_name; ?></td>
                        <td align="center"><?php echo $count; ?></td>
                        <td align="center"><?php echo $row['count_row']; ?></td>
                        
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </center>
</body>
</html>