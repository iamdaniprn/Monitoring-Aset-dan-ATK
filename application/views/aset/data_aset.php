
<div id="page-wrapper">
<div id="page-inner">
<!--ROW -->
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<a href="<?php echo base_url(); ?>aset/tambah_aset"><button class="btn btn-primary">Tambah</button></a>
	</div>
</div>
<?php echo $this->session->flashdata('sukses'); ?>
<div style="height: 10px"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #2d3d5e">
                 Data Aset Kantor
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Inventaris</th>
                                <th>Nama Barang</th>
                                <th>Nomor Seri</th>
                                <th>Tanggal Pembelian</th>
                                <th>PIC</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($data_aset as $row) { ?>
                            <tr class="odd gradeX">
                                <td><?php echo $no ?></td>
                                <td><?php echo $row->no_inventaris ?></td>
                                <td><?php echo $row->nama_barang ?></td>
                                <td><?php echo $row->no_seri ?></td>
                                <td><?php echo $row->tgl_pembelian ?></td>
                                <td><?php echo $row->pic ?></td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>aset/detail_aset/<?php echo $row->id_inventori; ?>" data-toggle="tooltip" data-placement="top" title="DETAIL">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>aset/edit_aset/<?php echo $row->id_inventori; ?>" data-toggle="tooltip" data-placement="top" title="EDIT">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>aset/hapus_aset/<?php echo $row->id_inventori; ?>" onclick="return confirm('Yakin Hapus?')"  data-toggle="tooltip" data-placement="top" title="HAPUS">
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