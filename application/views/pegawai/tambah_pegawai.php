
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
                 Data Pegawai
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo base_url(); ?>pegawai/simpan_pegawai" method="post">
                  <div class="form-group">
                    <label class="control-label col-sm-2">Nama:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama">
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