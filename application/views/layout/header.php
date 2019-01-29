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