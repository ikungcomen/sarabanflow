<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>ระบบงานสารบรรณอิเล็กทรอนิกส์ Saraban Flow</title>
        <base href = "<?php echo base_url(); ?>"/>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="assets/mycss/jquery_ui.css">
        <link rel="stylesheet" href="assets/mycss/mycss.css">
        <link rel="stylesheet" href="assets/mycss/formsearch.css">

        <!--datatable-->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.3/css/jquery.dataTables.min.css">
        <script src="assets/myjs/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <script src="assets/jvalidate/dist/jquery.validate.min.js"></script>
        
    </head>
    <body style = " font-family: 'leelawadee', sans-serif;">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-template">
                        <h1>
                            Oops!
                        </h1>
                        <?php if(isset($error)){ ?>
                            <h2>
                                404 Not Found
                            </h2>
                            <div class="error-details">
                                Sorry, an error has occured, Requested page not found!
                            </div>
                        <?php }else if(isset($no_instutition_number)){ ?>
                            <h2>
                                500 Internal Server Error
                            </h2>
                            <div class="error-details">
                                <h4>Sorry, an error has occured, Your not have institution number! (หน่วยงานของคุณไม่ได้ตั้งค่าหมายเลขทะเบียน กรุณาติดต่อผู้ดูแลระบบ)</h4>
                            </div>
                        <?php } ?>
                        
                        <div class="error-actions">
                            <a href="<?php echo base_url(); ?>" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                                Go To Login
                            </a>
                            <a href="#" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contact Support Administrator</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>