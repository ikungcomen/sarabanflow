<div style = "margin-left:15px; margin-right:15px">
    <div style = "width :100% ; background-color: #B40404; padding-left :15px ;color:#FFFFFF"><h2><img src = "assets/img/Custom-Icon-Design-Pretty-Office-9-Email-send.ico" width = "40px">&nbsp;&nbsp;<b>พิมพ์รายงานสถิติ</b></h2></div>
    <a href="index.php/report/book_receive/printReport" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left " aria-hidden="true">&nbsp;ย้อนกลับ</span></a>
    <a href="index.php/report/book_receive/toDocReport/" class="btn btn-danger">ยืนยันการพิมพ์</a>
    <br/><br/>
</div>
<div class="container">
    <div class="row">
        <div class="panel-body form-horizontal payment-form">
            <div class="form-group">
                <label class="col-sm-12 text-center"><h2>รายงานสถิติ</h2></label>
            </div>
            <hr width="100%">
            <div class="form-group">
                <label class="col-sm-3 text-left"><h4>สถิติการออกเลขทะเบียน จากวันที่ </h4></label>
                <label class="col-sm-9 text-left"><h4>: <?php echo $newStartDate; ?></h4></label>
            </div> 
            <div class="form-group">
                <label class="col-sm-3 text-left"><h4>ถึงวันที่ </h4></label>
                <label class="col-sm-9 text-left"><h4>: <?php echo $newEndDate; ?></h4></label>
            </div>

        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
           <div class="form-group col-lg-12 text-right">
                <div class="tab-pane fade in active" id="tab1default">
                <table id="" class="display mytd" cellspacing="0" width="100%">
                    <thead>
                    <th class="text-center">ลำดับ</th>
                    <th class="text-center">ชื่อผู้ใช้งานในหน่วยงาน</th>
                    <th class="text-center">สถิติการลงรับเอกสาร</th>
                    <th class="text-center">สถิติการออกเลขส่งภายนอก</th>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        foreach ($result as $row) {
                            $count++;
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $count; ?></td>
                                <td class="text-center"><?php echo $this->institution_name; ?></td>
                                <td class="text-center"><?php echo $count; ?></td>
                                <td class="text-center"><?php echo $row['count_row']; ?></td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>