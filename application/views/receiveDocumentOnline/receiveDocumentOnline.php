<div class="container-fluid">
    <section class="container">
        <div class="container-page">				
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-lg-12">
                        <div style = "width :100% ; background-color: #3e8f3e; padding-left :15px;color:#FFFFFF"><h3><img src = "assets/img/icon02.jpg" width = "40px">&nbsp;&nbsp;<b>ลงรับเอกสารจากระบบ Online</b></h3></div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12 text-left">
                        <a href="index.php/welcome" class="btn btn-danger"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true">&nbsp;ย้อนกลับ</span></a>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-2 text-right">
                        <label>ข้อความในการค้นหา</label>
                    </div>
                    <div   class="form-group col-lg-3">
                        <form action="" class="search-form">
                            <div class="form-group has-feedback ">
                                <label for="search" class="sr-only">Search</label>
                                <input type="text" class="form-control " name="search" id="search" placeholder="search">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>

                            </div>
                        </form>

                    </div>
                    <div   class="form-group col-lg-7">
                        <button class="btn btn-primary"><span class="glyphicon glyphicon-eye-open" aria-hidden="true">&nbsp;แสดงทั้งหมด</span></button>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-2 text-right">
                        <label>ค้นหาตามวันที่</label>
                    </div>
                    <div class="form-group col-lg-2">
                        <input type="date" class="form-control" id="startdate" name="startdate">
                    </div>
                    <div class="form-group col-lg-1 text-center">
                        <label>ถึง</label>
                    </div>
                    <div class="form-group col-lg-2">
                        <input type="date" class="form-control" id="startdate" name="startdate">
                    </div>
                    <div   class="form-group col-lg-2">
                        <button class="btn btn-primary"><span class="glyphicon glyphicon-eye-close" aria-hidden="true">&nbsp;แสดงผล</span></button>
                    </div>
                </div>
                <hr width="100%">
                <div class="row">
                    <div class="form-group col-lg-12">
                        <div class="tab-pane fade in active" id="tab1default">
                            <table id="example" class="display mytd" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>ลำดับที่</th>
                                        <th>เลขทะเบียน</th>
                                        <th>เอกสารเลขที่</th>
                                        <th>วันที่</th>
                                        <th>เวลา</th>
                                        <th>เรื่อง</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>aa</td>
                                        <td>aa</td>
                                        <td>aa</td>
                                        <td>aa</td>
                                        <td>aa</td>
                                    </tr>
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
             if ($this->session->flashdata('insert_dep1')) {
        ?>
             alert("บันทึกข้อมูลเรียบร้อยแล้ว");
        <?php } ?>
        <?php
             if ($this->session->flashdata('delete')) {
        ?>
            alert("ลบข้อมูลเรียบร้อยแล้ว");
        <?php } ?>
</script>