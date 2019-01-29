<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aplikasi Monitoring Aset</title>
    <!-- Bootstrap Styles-->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="<?php echo base_url(); ?>assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="<?php echo base_url(); ?>assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>login"><h3>Monitoring Aset</h3></a>
            </div>
        </nav>
        <div id="page-wrappe" style="background: white">
            <div id="page-inner">
                <div style="height: 130px"></div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4"></div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="background: #2d3d5e">
                                <center><h4>Aplikasi Monitoring Aset</h4></center>
                            </div>
                            <div class="panel-body">
                                <?php echo $this->session->flashdata('sukses'); ?>
                                <form role="form" action="<?php echo base_url(); ?>login/proses_login" method="post">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"></span>
                                        <input type="text" name="username" class="form-control" placeholder="Username">
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"></span>
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div style="text-align: center;">
                                        <button type="submit" class="btn btn-primary" style="background: #2d3d5e">Login</button>
                                        <button type="reset" class="btn btn-warning" style="background: #FF8C00">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4"></div>
                </div>
                <!-- /. ROW  -->
                <div style="height: 130px;"></div>
                <footer><p>Copyright &copy; 2018 <a href="">Aplikasi Monitoring Aset</a>. All rights reserved.</p></footer>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="<?php echo base_url(); ?>assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/js/custom-scripts.js"></script>


</body>

</html>