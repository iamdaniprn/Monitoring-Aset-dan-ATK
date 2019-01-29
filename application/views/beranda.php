<!-- /. NAV SIDE  -->
<div id="page-wrapper">
<div id="page-inner">

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background: #2d3d5e">
                    Home
                </div>
                <div class="panel-body">
                    <h3>Selamat Datang, Administrator</h3>
                    <p>Silahkan Mengelola Aplikasi Monitoring Aset Menggunakan Menu-Menu Yang Telah Disediakan</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /. ROW  -->

    <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-blue" >
                <div class="panel-body">
                    <i class="fa fa-shopping-cart fa-5x"></i>
                    <?php foreach ($jumlah_aset as $row) { ?>
                    <h3><?php echo $row->id ?></h3>
                    <?php } ?>
                </div>
                <div class="panel-footer back-footer-green" style="background: #2d3d5e">
                   Total Barang Aset
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-brown">
                <div class="panel-body">
                    <i class="fa fa-shopping-cart fa-5x"></i>
                    <?php foreach ($jumlah_atk as $row) { ?>
                    <h3><?php echo $row->id ?></h3>
                    <?php } ?>
                </div>
                <div class="panel-footer back-footer-blue" style="background: #FF8C00">
                    Total Barang ATK
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-blue">
                <div class="panel-body">
                    <i class="fa fa fa-money fa-5x"></i>
                    <?php foreach ($total_harga_aset as $row) { ?>
                    <h3>Rp <?php echo number_format($row->total) ?></h3>
                    <?php } ?>
                </div>
                <div class="panel-footer back-footer-red" style="background: #2d3d5e">
                    Total Harga Aset
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-brown">
                <div class="panel-body">
                    <i class="fa fa-money fa-5x"></i>
                    <?php foreach ($total_harga_atk as $row) { ?>
                    <h3>Rp <?php echo number_format($row->total) ?></h3>
                    <?php } ?>
                </div>
                <div class="panel-footer back-footer-brown" style="background: #FF8C00">
                    Total Harga ATK
                </div>
            </div>
        </div>
    </div>
    <!-- /. ROW  -->