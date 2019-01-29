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
                 Edit Data Kategori
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo base_url(); ?>kategori/update_sub_kategori" method="post">
                  <?php foreach ($detail_sub_kategori as $row) { ?>
                  <input type="hidden" name="id" value="<?php echo $row->id ?>">
                  <input type="hidden" name="id_kategori" value="<?php echo $row->id_kategori ?>">
                  <div class="form-group">
                    <label class="control-label col-sm-3">Nama Kategori:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="<?php echo $row->kategori ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-3">Sub_kategori:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="sub_kategori" value="<?php echo $row->sub_kategori ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-3">Singkatan:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="singkatan" value="<?php echo $row->singkatan ?>">
                    </div>
                  </div>
                  <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
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