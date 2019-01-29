
<div id="page-wrapper">
<div id="page-inner">
<!--ROW -->
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<a href="<?php echo base_url(); ?>riwayat/riwayat_masuk"><button class="btn btn-primary"><span ></span style="color: white"> Kembali</button></a>
	</div>
</div>
<div style="height: 10px"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <h4>Silahkan Pilih Metode Cetak Laporan Dibawah Ini:</h4>
    </div>
</div>
<div style="height: 20px"></div>
<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #2d3d5e">
                 Cetak Data Barang Masuk Per Hari
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo base_url(); ?>riwayat/cetak_riwayat_masuk_pertanggal" method="post">
                  <div class="form-group">
                    <label class="control-label col-sm-5">Tanggal:</label>
                    <div class="col-sm-7">
                      <input type="date" class="form-control" name="tanggal">
                    </div>
                  </div>
                  <div style="height: 50px"></div>
                  <div class="form-group"> 
                    <div class="col-sm-offset-5 col-sm-7">
                      <button type="submit" class="btn btn-primary">Cetak</button>
                    </div>
                  </div>
                </form>                
            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
     <div class="col-md-4 col-sm-4 col-xs-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: #FF8C00">
                 Cetak Data Barang Masuk Per Minggu
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo base_url(); ?>riwayat/cetak_riwayat_masuk_perminggu" method="post">
                  <div class="form-group">
                    <label class="control-label col-sm-5">Tanggal Awal:</label>
                    <div class="col-sm-7">
                      <input type="date" class="form-control" name="tanggal_awal">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-5">Tanggal Akhir:</label>
                    <div class="col-sm-7">
                      <input type="date" class="form-control" name="tanggal_akhir">
                    </div>
                  </div>
                  <div class="form-group"> 
                    <div class="col-sm-offset-5 col-sm-7">
                      <button type="submit" class="btn btn-primary">Cetak</button>
                    </div>
                  </div>
                </form>                
            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: green">
                 Cetak Data Barang Masuk Per Bulan
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo base_url(); ?>riwayat/cetak_riwayat_masuk_perbulan" method="post">
                  <div class="form-group">
                    <label class="control-label col-sm-5">Bulan:</label>
                    <div class="col-sm-7">
                      <select name="bulan" class="form-control">
                        <option selected="selected">Bulan</option>
                        <?php
                        $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                        $jlh_bln=count($bulan);
                        for($c=0; $c<$jlh_bln; $c+=1){
                            echo"<option value=$c> $bulan[$c] </option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-5">Tahun:</label>
                    <div class="col-sm-7">
                       <select name="tahun" class="form-control">
                        <option selected="selected">Tahun</option>
                        <?php
                        $now=date('Y');
                        for ($a=2018;$a<=$now;$a++)
                        {
                             echo "<option value='$a'>$a</option>";
                        }
                        ?>
                       </select>
                    </div>
                  </div>
                  <div class="form-group"> 
                    <div class="col-sm-offset-5 col-sm-7">
                      <button type="submit" class="btn btn-primary">Cetak</button>
                    </div>
                  </div>
                </form>                
            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>