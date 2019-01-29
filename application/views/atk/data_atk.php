
<div id="page-wrapper">
<div id="page-inner">
<!--ROW -->
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<a href="<?php echo base_url(); ?>atk/tambah_atk"><button class="btn btn-primary">Tambah</button></a>
	</div>
</div>
<?php echo $this->session->flashdata('sukses'); ?>
<div style="height: 10px"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #2d3d5e">
                 Data ATK
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Merk</th>
                                <th>Harga</th>
                                <th>Stok Awal</th>
                                <th>Sisa Stok</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($data_atk as $row) { ?>
                            <tr class="odd gradeX">
                                <td><?php echo $no ?></td>
                                <td><?php echo $row->nama_barang ?></td>
                                <td><?php echo $row->merk ?></td>
                                <td>Rp <?php echo number_format($row->harga) ?></td>
                                <td><?php echo $row->stok ?></td>
                                <td><?php echo $row->sisa_stok ?></td>
                                <td><?php echo $row->keterangan ?></td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>atk/edit_atk/<?php echo $row->id_inventori; ?>" data-toggle="tooltip" data-placement="top" title="EDIT">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>atk/hapus_atk/<?php echo $row->id_inventori; ?>" onclick="return confirm('Yakin Hapus?')" data-toggle="tooltip" data-placement="top" title="HAPUS">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
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