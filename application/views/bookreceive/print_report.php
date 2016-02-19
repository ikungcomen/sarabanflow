<hr/>
<div style = "margin-left:15px; margin-right:15px">
    <div style = "width :100% ; background-color: #B40404; padding-left :15px ;color:#FFFFFF"><h2><img src = "assets/img/Custom-Icon-Design-Pretty-Office-9-Email-send.ico" width = "40px">&nbsp;&nbsp;<b>พิมพ์รายงานสถิติ</b></h2></div>
    &nbsp;&nbsp;<a href = "index.php/report/book_receive/bookReceive" class = "btn btn-primary btn-lg"><span class="glyphicon glyphicon-print" aria-hidden="true">&nbsp;สมุดทะเบียนรับ</span></a>
    &nbsp;&nbsp;<a href = "index.php/report/book_receive/bookSend"    class = "btn btn-success btn-lg"><span class="glyphicon glyphicon-print" aria-hidden="true">&nbsp;สมุดทะเบียนส่ง</span></a>
    &nbsp;&nbsp;<a href = "index.php/report/book_receive/printReport" class = "btn btn-danger btn-lg"><span class="glyphicon glyphicon-print" aria-hidden="true">&nbsp;พิมพ์รายงานสถิติ</span></a>
    <br/><br/>
</div>
<div class="container">
    <div class="row">
        <div class="form-group">
            <label  class="col-sm-12 text-center "><h2><font color="red">รายงานสถิติ</font></h2></label>
        </div>
        <hr width="100%">
        <label><h4><font color="red"><u>พิมพ์รายงานสถิติจากเงื่อนไข</u></font></h4></label><br>
        <div class="panel-body form-horizontal payment-form">
            <form  id="submitSearch" method="post" action="index.php/report/book_receive/confirmPrintReport">
                <div class="form-group">
                    <div class="col-sm-1">
                        <label>จากวันที่ : </label>
                    </div>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" id="startDate" name="startDate" placeholder="วันที่">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-1">
                        <label>ถึงวันที่ : </label>
                    </div>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" id="endDate" name="endDate" placeholder="ถึงวันที่">
                    </div><br>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 text-right">
                        <a class="btn btn-success aaa"><span class="glyphicon glyphicon-search" aria-hidden="true">&nbsp;ค้นหารายงานสถิติ</span></a>
                        <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-repeat" aria-hidden="true">&nbsp;ยกเลิก</span></button>
                    </div>
                </div>
            </form>
        </div>

    </div>    
</div>
<script>
    $(document).ready(function(event) {
        $(".aaa").click(function() {
            var startDate = $("#startDate").val();
            var endDate = $("#endDate").val();
            if (startDate == "") {
                alert("กรุณาระบุข้มูล วันที่ ค่ะ!");
                event.preventDefault();
            } else if (endDate == "") {
                alert("กรุณาระบุข้มูล ถึงวันที่ ค่ะ!");
                event.preventDefault();
            } else {
                //campareDate(startDate,endDate);
                $("#submitSearch").submit();
            }
        });

    });

</script>