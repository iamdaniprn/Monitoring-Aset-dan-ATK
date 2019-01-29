
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
                 Data Kategori
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo base_url(); ?>kategori/simpan_sub_kategori" method="post">
                  <div class="form-group">
                    <label class="control-label col-sm-3">Pilih Kategori:</label>
                    <div class="col-sm-9">
                      <select name="id_kategori" class="form-control">
                          <?php foreach ($data_kategori as $row) { ?>
                          <option value="<?php echo $row->id ?>"><?php echo $row->kategori ?></option>
                          <?php } ?>
                      </select>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="control-label col-sm-3">Nama Sub Kategori:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="sub_kategori">
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="control-label col-sm-3">Singkatan:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="singkatan">
                    </div>
                  </div>
                  <div class="form-group"> 
                    <div class="col-sm-offset-3 col-sm-9">
                      <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                  </div>
                </form>                
            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>