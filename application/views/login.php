<!DOCTYPE html>
<html lang="en">
    <head>
        <base href = "<?php echo base_url();?>"/>

        <meta charset="utf-8">
        <title>ผู้ใช้งานระบบ</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="assets/mycss/mycss.css">
        <link rel="stylesheet" href="assets/css/mystyle.css">
        <!--datatable-->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.3/css/jquery.dataTables.min.css">
        <script src="assets/myjs/jquery-1.10.2.js"></script>
        <script src="assets/jvalidate/dist/jquery.validate.min.js"></script>

        <!--validator-->
        <script src="assets/validator/prefixname.js"></script>
        <script src="assets/validator/objective.js"></script>
        <script src="assets/validator/document_send_or_recieve.js"></script>
        <script src="assets/validator/document_category.js"></script>
        <!--show dialog-->
        <script src="assets/myjs/showdialog.js"></script>
         <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    </head>
    <body style = " font-family: 'leelawadee', sans-serif;">
        <!-- ---------------------------------------------  -->
        
        <div class="container" style="margin-top: 5%;">
            <div class="row">
                <center>
                <div style="height: 300px;">
                    <img src = "assets/img/banner/banner.gif" />
                </div>
                
                <div style = "width:500px!important">
                    <div class="panel panel-default">
                        <div class="panel-heading"> <strong class=""><h3>ลงชื่อเข้าใช้</h3></strong>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/auth_login" method="POST">
                                <div class="form-group">
                                    <label for="username" class="col-sm-3 control-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-3 control-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="">
                                    </div>
                                </div> 
                                <div class="form-group last">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-success btn-sm">Sign in</button>
                                        <button type="reset" class="btn btn-default btn-sm">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="panel-footer">
                        </div>
                    </div>
                </div>
                 </center>
            </div>
        </div>
        <style>
            /* CSS used here will be applied after bootstrap.css */

            body { 
             background: url('/assets/example/bg_suburb.jpg') no-repeat center center fixed; 
             -webkit-background-size: cover;
             -moz-background-size: cover;
             -o-background-size: cover;
             background-size: cover;
            }

            .panel-default {
             opacity: 0.9;
             margin-top:30px;
            }
            .form-group.last {
             margin-bottom:0px;
            }
        </style>
        <!-- -------------------------------------------------- -->
    </body>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/myjs/myscript.js"></script>
    <!--datatable-->
    <script src="//cdn.datatables.net/1.10.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
                $(document).ready(function() {
                    $('#example').DataTable();
                } );
        });
    </script>
	
</html>