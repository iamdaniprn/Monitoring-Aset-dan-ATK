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
     <!-- TABLE STYLES-->
    <link href="<?php echo base_url(); ?>assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="<?php echo base_url(); ?>login/beranda"><h3>Monitoring Aset</h3></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url(); ?>#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo base_url(); ?>login/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a class="active-menu" href="<?php echo base_url(); ?>login/beranda"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li>
                        <a class="" href="<?php echo base_url(); ?>#"><i class="fa fa-folder"></i> Master Data<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url(); ?>pegawai">Data Pegawai</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>jenis">Data Jenis Aset</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>kategori">Data Kategori</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>kategori/sub_kategori">Data Sub Kategori</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>aset"><i class="fa fa-folder-open"></i> Data Aset Kantor</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>atk"><i class="fa fa-folder-open-o"></i> Data ATK</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>barang/barang_masuk"><i class="fa fa-reply"></i> Barang Masuk</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>barang/barang_keluar"><i class="fa fa-share"></i> Barang Keluar</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>#"><i class="fa fa-refresh"></i> Riwayat<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url(); ?>riwayat/riwayat_masuk">Barang Masuk</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>riwayat/riwayat_keluar">Barang Keluar</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>#"><i class="fa fa-file-o"></i> Laporan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url(); ?>laporan/cetak_aset">Aset Kantor</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>laporan/cetak_atk">ATK</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>login/logout"><i class="fa fa-sign-out"></i> Logout</a>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
        <div id="page-inner">
        <!--ROW -->
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">
                <!-- Advanced Tables -->
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background: #2d3d5e">
                         Barang Masuk
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="<?php echo base_url(); ?>barang/tambah_barang" method="post">
                          <div class="form-group">
                            <label class="control-label col-sm-4">Pilih ATK:</label>
                            <div class="col-sm-8">
                              <select class="form-control" name="atk">
                                  <?php $no = 0; foreach($data_atk as $row)     
                                  { ?>
                                  <option value="<?php echo $row->id ?>"><?php echo $row->nama_barang ?></option>
                                  <?php
                                  } ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">Jumlah Barang Masuk:</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="jumlah">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">Pilih Pegawai:</label>
                            <div class="col-sm-8">
                              <select class="form-control" name="pegawai">
                                  <?php $no = 0; foreach($data_pegawai as $row)     
                                  { ?>
                                  <option value="<?php echo $row->id ?>"><?php echo $row->nama ?></option>
                                  <?php
                                  } ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                          </div>
                        </form>                
                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>

                <footer><p>Copyright &copy; 2018 <a href="">Aplikasi Monitoring Aset</a>. All rights reserved.</p></footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/js/custom-scripts.js"></script>
</body>

</html>