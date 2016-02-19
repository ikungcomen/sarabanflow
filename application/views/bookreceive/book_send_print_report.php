<!DOCTYPE html>
<html lang="en">
    <!--<style type="text/css" >
        div.page { 
            writing-mode: horizontal-tb;
            height: 80%;
            margin: 10% 0%;
        }
    </style>-->
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
            //$date = date("d/m/Y", strtotime(date('y-m-d')));
            header("Content-Type: application/vnd.ms-word");
            header("Expires: 0");
            header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
            header("Content-disposition: attachment; filename=\"สมุดทะเบียนส่ง / ".date('d-m-Y').".doc\"");
        ?>
        <br><br>
    <center><h2>สมุดทะเบียนส่ง</h2></center>
    <left><label><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หน่วยงาน :   &nbsp;&nbsp;&nbsp;<?php echo $this->institution_name; ?></h3></label></left>
    <left><label>
            <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันที่ :   &nbsp;&nbsp;&nbsp;
                <?php
                //$newDate = date("d/m/Y", strtotime(date('y-m-d')));
                echo date('d-m-Y');
                ?>


            </h3></label></left>

    <hr width="100%">
    <center><br><br>
        <!--<div class="page"> </div> -->
            <table border="1" width="90%" class="table table-bordred table-striped">
            <thead>
                <th><h2>เลขทะเบียน</h2></th>
                <th><h2>เอกสารเลขที่</h2></th>
                <th><h2>วันที่</h2></th>
                <th><h2>จาก</h2></th>
                <th><h2>ถึง</h2></th>
                <th><h2>เรื่อง</h2></th>
                <th><h2>การปฎิบัติ</h2></th>
                <th><h2>ลงชื่อ รับวันที่</h2></th>
            </thead>

            <?php
            $count = 0;
            foreach($result as $row) {
                $count++;
             ?>
                <tr>
                    <td align="center"><?php echo $row['number_of_run']; ?></td>
                    <td align="center">
                        <?php
                        $this->db->select('*');
                        $this->db->from('department_of_instutition');
                        $this->db->where('id', $row['department_of_instutition_id']);
                        $this->db->where('active', 1);
                        $query = $this->db->get();
                        $result2 = $query->result_array();
                        echo get_number_of_instutition($row['use_instutition_id'], $row['use_instutition_level']). $result2[0]['department_id'] . '/' . $row['registration_type'] . $row['number_of_run'];
                        ?>
                    </td>
                    <td align="center">
                        <?php
                        $date = date("d-m-Y", strtotime($row['dated_send']));
                        echo $date; 
                        
                        ?>
                    
                    </td>
                    <td align="center">
                        <?php
                        //$from = get_name_instutition($row['use_instutition_id'], $row['use_instutition_level']);//level_institution_id//level_institution
                        echo $row['from'];
                        ?>
                    </td>
                    <td align="center"><?php echo $row['to_receive']; ?></td>
                    <td align="center"><?php echo $row['subject']; ?></td>
                    <td align="center"></td>
                    <td align="center"></td>

                </tr>
            <?php } ?>
        </table>
            
        
        
    </center>
</body>
</html>