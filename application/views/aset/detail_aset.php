
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
                 Detail Data Aset
            </div>
            <div class="panel-body">
                  <?php foreach ($detail_aset as $row) { ?>
                  <input type="hidden" name="id" value="<?php echo $row->id ?>">
                  <table class="table">
                      <tr>
                          <td><b>No Inventaris</b></td>
                          <td>:</td>
                          <td><?php echo $row->no_inventaris ?></td>
                      </tr>
                      <tr>
                          <td><b>Nama Barang</b></td>
                          <td>:</td>
                          <td><?php echo $row->nama_barang ?></td>
                      </tr>
                      <tr>
                           <td><b>Nomor Seri</b></td>
                           <td>:</td>
                           <td><?php echo $row->no_seri ?></td>
                      </tr>
                      <tr>
                          <td><b>Tanggal Pembelian</b></td>
                          <td>:</td>
                          <td><?php echo $row->tgl_pembelian ?></td>
                      </tr>
                      <tr>
                          <td><b>PIC</b></td>
                          <td>:</td>
                          <td><?php echo $row->pic ?></td>
                      </tr>
                      <tr>
                          <td><b>Jumlah</b></td>
                          <td>:</td>
                          <td><?php echo $row->jumlah ?></td>
                      </tr>
                      <tr>
                          <td><b>Harga</b></td>
                          <td>:</td>
                          <td><?php echo 'Rp '.number_format($row->harga) ?></td>
                      </tr>
                      <tr>
                          <td><b>Keterangan</b></td>
                          <td>:</td>
                          <td><?php echo $row->keterangan ?></td>
                      </tr>
                  </table>
                  <?php } ?>          
            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>