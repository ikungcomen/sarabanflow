<?php 
$this->load->view('include/header');

?>
<script src="assets/myjs/normal_system.js"></script>
<div class="container">
    <br/>
    <div class="well">
        <h3><img src="assets/img/Aha-Soft-Free-Large-Boss-Admin.ico" width = "30px">&nbsp;<b>ผู้ใช้งานระบบ</b></h3>
        &nbsp;&nbsp;&nbsp;
        <a class = "btn btn-success" href = "index.php/manageuser">กลับหน้าหลัก</a>&nbsp;
        <!--<a class = "btn btn-primary" href = "index.php/usermanagement/admin_system/showforminsert">เพิ่มผู้ดูแลระบบ</a>-->
        <br/>
        <div class="tab-pane fade in active" id="tab1default">
            <!-- select province -->
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="box">
                        <div class="box-icon">
                            <span class="fa fa-4x fa-th-list"></span>
                        </div>
                        <div class="info">
                            <h4 class="text-center">เลือกจังหวัด</h4>
                            <div class="center-block ">
                                <select name="province_id" id="province_id" class="form-control">
                                    <option value="">เลือกจังหวัด</option>
                                    <?php foreach($province as $row){ ?>
                                    <option value="<?php echo $row->province_id; ?>"><?php echo $row->province_name; ?></option>
                                    <?php } ?>
                                </select>
                                
                            </div>
                            <br>
                            <div class="text-center ">
                                <!--<a class = "btn btn-info">ยืนยันการเลือก</a>-->
                                <div class="oaerror info-province">
                                    <strong>คุณอยู่ที่จังหวัด</strong> - <label id="show_province_name"></label>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    
                </div>
            </div>
            <!-- end select province -->
            
            <!-- step 1 institution_province -->
            <div class="row" id="show_page_institution_province">
                <!-- แสดงหน้าจัดการส่วนราชการในระดับจังหวัด -->
            </div>
            <!-- end step 1 institution_province -->
            <!-- step 2 institution_province -->
            <div class="row" id="show_page_institution_amphur">
                <!-- แสดงหน้าจัดการส่วนราชการในระดับอำเภอ -->
            </div>
            <!-- end step 2 institution_province -->
            
            <!-- step 3 institution_province -->
            <div class="row" id="show_page_institution_district">
                <!-- แสดงหน้าจัดการส่วนราชการในระดับตำบล -->
            </div>
            <!-- end step 3 institution_province -->
            
        </div>
    </div>
</div>

<style>
    @import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
.box {
    border-radius: 3px;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    padding: 10px 25px;
    text-align: right;
    display: block;
    margin-top: 60px;
}
.box-icon {
    background-color: #57a544;
    border-radius: 50%;
    display: table;
    height: 100px;
    margin: 0 auto;
    width: 100px;
    margin-top: -61px;
}
.box-icon span {
    color: #fff;
    display: table-cell;
    text-align: center;
    vertical-align: middle;
}
.info h4 {
    font-size: 26px;
    letter-spacing: 2px;
    text-transform: uppercase;
}
.info > p {
    color: #717171;
    font-size: 16px;
    padding-top: 10px;
    text-align: justify;
}
.info > a {
    background-color: #03a9f4;
    border-radius: 2px;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    color: #fff;
    transition: all 0.5s ease 0s;
}
.info > a:hover {
    background-color: #0288d1;
    box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.16), 0 2px 5px 0 rgba(0, 0, 0, 0.12);
    color: #fff;
    transition: all 0.5s ease 0s;
}

.oaerror {
  width: 90%; /* Configure it fit in your design  */
  margin: 0 auto; /* Centering Stuff */
  background-color: #FFFFFF; /* Default background */
  padding: 20px;
  border: 1px solid #eee;
  border-left-width: 5px;
  border-radius: 3px;
  margin: 0 auto;
  font-family: 'Open Sans', sans-serif;
  font-size: 16px;
}

.info-province {
    border-left-color: #5bc0de;
    background-color: rgba(91, 192, 222, 0.1);
}

.info strong {
  color: #5bc0de;
}

</style>
<script>
    $(document).ready(function(){
        
    });
</script>
<?php $this->load->view('include/footer'); ?>