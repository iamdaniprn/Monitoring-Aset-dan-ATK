
<div id="page-wrapper">
<div id="page-inner">
<!--ROW -->
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<a href="<?php echo base_url(); ?>pegawai/tambah_pegawai"><button class="btn btn-primary">Tambah</button></a>
	</div>
</div>
<?php echo $this->session->flashdata('sukses'); ?>
<div style="height: 10px"></div>
<div class="row">
    <div class="col-md-8 col-sm-8 col-xs-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #2d3d5e">
                 Data Pegawai
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th style="width: 420px">Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($data_pegawai as $row) { ?>
                            <tr class="odd gradeX">
                                <td><?php echo $no ?></td>
                                <td><?php echo $row->nama ?></td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>pegawai/edit_pegawai/<?php echo $row->id; ?>" data-toggle="tooltip" data-placement="top" title="EDIT">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>pegawai/hapus_pegawai/<?php echo $row->id; ?>" onclick="return confirm('Hapus')" data-toggle="tooltip" data-placement="top" title="HAPUS">
                                        <i class="fa fa-times"></i> Hapus
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