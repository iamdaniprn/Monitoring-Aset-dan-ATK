
<div id="page-wrapper">
<div id="page-inner">
<!--ROW -->
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<button type="button" onclick="javascript:history.back()" class="btn btn-primary"><span ></span style="color: white"> Kembali</button>
	</div>
</div>
<div style="height: 10px"></div>
<div class="row">
    <div class="col-md-8 col-sm-8 col-xs-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #2d3d5e">
                 Edit Data Aset
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo base_url(); ?>aset/update_aset" method="post">
                  <?php foreach ($detail_aset as $row) { ?>
                  <input type="hidden" name="id" value="<?php echo $row->id ?>">
                  <div class="form-group">
                    <label class="control-label col-sm-3">No Inventaris:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="no_inventaris" value="<?php echo $row->no_inventaris ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-3">Nama:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="nama" value="<?php echo $row->nama_barang ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-3">Nomor Seri:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="no_seri" value="<?php echo $row->no_seri ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-3">Tanggal Pembelian:</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" name="tgl_pembelian" value="<?php echo $row->tgl_pembelian ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-3">PIC:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="pic" value="<?php echo $row->pic ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-3">Jumlah:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="jumlah" value="<?php echo $row->jumlah ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-3">Harga:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="harga" value="<?php echo $row->harga ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-3">Keterangan:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="keterangan" value="<?php echo $row->keterangan ?>">
                    </div>
                  </div>
                  <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-9">
                      <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                  </div>
                  <?php } ?>
                </form>                
            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>