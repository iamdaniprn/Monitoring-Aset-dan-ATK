
<div id="page-wrapper">
<div id="page-inner">
<!--ROW -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <a href="<?php echo base_url(); ?>riwayat/cetak_masuk"><button class="btn btn-success">Cetak</button></a>
    </div>
</div>
<?php echo $this->session->flashdata('sukses'); ?>
<div style="height: 10px"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #2d3d5e">
                 Riwayat Data Barang Masuk
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang Masuk</th>
                                <th>Nama Pegawai</th>
                                <th>Tanggal Transaksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($riwayat_masuk as $row) { ?>
                            <tr class="odd gradeX">
                                <td><?php echo $no ?></td>
                                <td><?php echo $row->nama_barang ?></td>
                                <td><?php echo $row->jumlah ?></td>
                                <td><?php echo $row->nama ?></td>
                                <td><?php echo date('d-m-Y', strtotime($row->tanggal)) ?></td>
                            </tr>
                            <?php $no++; } ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>