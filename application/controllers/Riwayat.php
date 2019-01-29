<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_riwayat');
		$this->load->library('Pdf');
	}

	public function riwayat_masuk(){
        $data = array(  'title' =>  'Data Riwayat Barang Masuk | Aplikasi Monitoring aset',
                        'isi'   =>  'riwayat/riwayat_masuk');
        $data['riwayat_masuk'] = $this->model_riwayat->ambil_riwayat_masuk();
        $this->load->view('layout/wrapper',$data);
    }

    public function riwayat_keluar(){
        $data = array(  'title' =>  'Data Riwayat Barang Keluar | Aplikasi Monitoring aset',
                        'isi'   =>  'riwayat/riwayat_keluar');
        $data['riwayat_keluar'] = $this->model_riwayat->ambil_riwayat_keluar();
        $this->load->view('layout/wrapper',$data);
    }

    public function cetak_masuk(){
        $data = array(  'title' =>  'Cetak Data Riwayat Barang Masuk | Aplikasi Monitoring aset',
                        'isi'   =>  'riwayat/cetak_masuk');
        $this->load->view('layout/wrapper', $data);
    }

    public function cetak_keluar(){
        $data = array(  'title' =>  'Cetak Data Riwayat Barang Keluar | Aplikasi Monitoring aset',
                        'isi'   =>  'riwayat/cetak_keluar');
        $this->load->view('layout/wrapper', $data);
    }

    public function cetak_riwayat_masuk_pertanggal(){
    	$tanggal  = $_POST['tanggal'];
    	$tgl_indo = date('d-m-Y', strtotime($tanggal));
    	if($tanggal == ''){
    		redirect('riwayat/cetak_masuk');
    	}elseif($tanggal != ''){
    		$pdf = new FPDF('l','mm','A4');
	        // membuat halaman baru
	        $pdf->AddPage();
	        // setting jenis font yang akan digunakan
	        $pdf->SetFont('Arial','B',16);
	        // mencetak string 
	        $pdf->Cell(280,7,'LAPORAN DATA ATK PER TANGGAL '."$tgl_indo",0,1,'C');
	        $pdf->Image('assets/img/logo.png',10,10,20,20);
	        $pdf->SetFont('Arial','B',12);
	        $pdf->Cell(280,7,'CV SOLUSI PRIMA',0,1,'C');
	        $pdf->SetFont('Arial','B',10);
	        $pdf->Cell(280,7,'Jl. Laguna Seca I No.257, Karang Pamulang, Mandalajati, Kota Bandung, Jawa Barat 40195',0,1,'C');

	        //membuat garis
	        $pdf->SetLineWidth(1);
			$pdf->Line(10,36,287,36);
			$pdf->SetLineWidth(0);
			$pdf->Line(10,37,287,37);

	        // Memberikan space kebawah agar tidak terlalu rapat
	        $pdf->Cell(10,10,'',0,1);
	        $pdf->SetFont('Arial','B',10);
	        $pdf->SetFillColor(192,192,192);
	        $pdf->Cell(85,6,'NAMA BARANG',1,0,'C');
	        $pdf->Cell(50,6,'JUMLAH BARANG MASUK',1,0,'C');
	        $pdf->Cell(43,6,'NAMA PEGAWAI',1,0,'C');
	        $pdf->Cell(45,6,'TANGGAL TRANSAKSI',1,1,'C');
	        
	        $pdf->SetFont('Arial','',10);
	   		$mahasiswa = $this->db->query("SELECT m_inventori.id AS id_inventori, m_inventori.nama_barang, log_masuk.jumlah, m_employee.nama ,log_masuk.tanggal FROM m_inventori JOIN m_jenis ON m_inventori.kode_jenis = m_jenis.id JOIN log_masuk ON m_inventori.id= log_masuk.kode_inventori JOIN m_employee ON log_masuk.reg_employee = m_employee.id WHERE m_jenis.id = 2 AND log_masuk.tanggal = '$tanggal' ORDER BY log_masuk.id DESC");
	   		foreach ($mahasiswa->result_array() as $row) {
	            $pdf->Cell(85,6,$row['nama_barang'],1,0);
	            $pdf->Cell(50,6,$row['jumlah'],1,0); 
	            $pdf->Cell(43,6,$row['nama'],1,0); 
	            $pdf->Cell(45,6, date('d-m-Y', strtotime($row['tanggal'])),1,1); 
	        }
	        $pdf->Output();
    	}
    }

    public function cetak_riwayat_masuk_perminggu(){
    	$tanggal_masuk  = $_POST['tanggal_awal'];
    	$tanggal_1 = date('d-m-Y', strtotime($tanggal_masuk));
    	$tanggal_keluar = $_POST['tanggal_akhir'];
    	$tanggal_2 = date('d-m-Y', strtotime($tanggal_keluar));

    	if($tanggal_masuk == '' AND $tanggal_keluar == ''){
    		redirect('riwayat/cetak_masuk');
    	}elseif($tanggal_masuk == '' AND $tanggal_keluar != ''){
    		redirect('riwayat/cetak_masuk');
    	}elseif($tanggal_masuk != '' AND $tanggal_keluar == ''){
    		redirect('riwayat/cetak_masuk');
    	}else{
    		$pdf = new FPDF('l','mm','A4');
	        // membuat halaman baru
	        $pdf->AddPage();
	        // setting jenis font yang akan digunakan
	        $pdf->SetFont('Arial','B',16);
	        // mencetak string 
	        $pdf->Cell(280,7,'LAPORAN DATA ATK PER TANGGAL '."$tanggal_1". ' SAMPAI TANGGAL ' ."$tanggal_2",0,1,'C');
	        $pdf->Image('assets/img/logo.png',10,10,20,20);
	        $pdf->SetFont('Arial','B',12);
	        $pdf->Cell(280,7,'CV SOLUSI PRIMA',0,1,'C');
	        $pdf->SetFont('Arial','B',10);
	        $pdf->Cell(280,7,'Jl. Laguna Seca I No.257, Karang Pamulang, Mandalajati, Kota Bandung, Jawa Barat 40195',0,1,'C');

	        //membuat garis
	        $pdf->SetLineWidth(1);
			$pdf->Line(10,36,287,36);
			$pdf->SetLineWidth(0);
			$pdf->Line(10,37,287,37);

	        // Memberikan space kebawah agar tidak terlalu rapat
	        $pdf->Cell(10,10,'',0,1);
	        $pdf->SetFont('Arial','B',10);
	        $pdf->SetFillColor(192,192,192);
	        $pdf->Cell(85,6,'NAMA BARANG',1,0,'C');
	        $pdf->Cell(50,6,'JUMLAH BARANG MASUK',1,0,'C');
	        $pdf->Cell(43,6,'NAMA PEGAWAI',1,0,'C');
	        $pdf->Cell(45,6,'TANGGAL TRANSAKSI',1,1,'C');
	        
	        $pdf->SetFont('Arial','',10);
	   		$mahasiswa = $this->db->query("SELECT m_inventori.id AS id_inventori, m_inventori.nama_barang, log_masuk.jumlah, m_employee.nama ,log_masuk.tanggal FROM m_inventori JOIN m_jenis ON m_inventori.kode_jenis = m_jenis.id JOIN log_masuk ON m_inventori.id = log_masuk.kode_inventori JOIN m_employee ON log_masuk.reg_employee = m_employee.id WHERE m_jenis.id = 2 AND (log_masuk.tanggal BETWEEN '$tanggal_masuk' AND '$tanggal_keluar') ORDER BY log_masuk.id DESC");
	   		foreach ($mahasiswa->result_array() as $row) {
	            $pdf->Cell(85,6,$row['nama_barang'],1,0);
	            $pdf->Cell(50,6,$row['jumlah'],1,0); 
	            $pdf->Cell(43,6,$row['nama'],1,0); 
	            $pdf->Cell(45,6,date('d-m-Y', strtotime($row['tanggal'])),1,1); 
	        }
	        $pdf->Output();
    	}
    }

    public function cetak_riwayat_masuk_perbulan(){
    	$bulan = $_POST['bulan'] + 1;
    	if($bulan == 1){
    		$namanya = 'JANUARI';
    	}elseif ($bulan == 2) {
    		$namanya = 'FEBRUARI';
    	}elseif ($bulan == 3) {
    		$namanya = 'MARET';
    	}elseif ($bulan == 4) {
    		$namanya = 'APRIL';
    	}elseif ($bulan == 5) {
    		$namanya = 'MEI';
    	}elseif ($bulan == 6) {
    		$namanya = 'JUNI';
    	}elseif ($bulan == 7) {
    		$namanya = 'JULI';
    	}elseif ($bulan == 8) {
    		$namanya = 'AGUSTUS';
    	}elseif ($bulan == 9) {
    		$namanya = 'SEPTEMBER';
    	}elseif ($bulan == 10) {
    		$namanya = 'OKTOBER';
    	}elseif ($bulan == 11) {
    		$namanya = 'NOVEMBER';
    	}elseif ($bulan == 12) {
    		$namanya = 'DESEMBER';
    	}
    	$tahun = $_POST['tahun'];
    	if($bulan == '' AND $tahun == 'Tahun'){
    		redirect('riwayat/cetak_masuk');
    	}elseif($bulan == '' OR $tahun == 'Tahun'){
    		redirect('riwayat/cetak_masuk');
    	}elseif($bulan != '' AND $tahun != ''){
    		$pdf = new FPDF('l','mm','A4');
	        // membuat halaman baru
	        $pdf->AddPage();
	        // setting jenis font yang akan digunakan
	        $pdf->SetFont('Arial','B',16);
	        // mencetak string 
	        $pdf->Cell(280,7,'LAPORAN DATA ATK PER BULAN '."$namanya "."$tahun",0,1,'C');
	        $pdf->Image('assets/img/logo.png',10,10,20,20);
	        $pdf->SetFont('Arial','B',12);
	        $pdf->Cell(280,7,'CV SOLUSI PRIMA',0,1,'C');
	        $pdf->SetFont('Arial','B',10);
	        $pdf->Cell(280,7,'Jl. Laguna Seca I No.257, Karang Pamulang, Mandalajati, Kota Bandung, Jawa Barat 40195',0,1,'C');

	        //membuat garis
	        $pdf->SetLineWidth(1);
			$pdf->Line(10,36,287,36);
			$pdf->SetLineWidth(0);
			$pdf->Line(10,37,287,37);

	        // Memberikan space kebawah agar tidak terlalu rapat
	        $pdf->Cell(10,10,'',0,1);
	        $pdf->SetFont('Arial','B',10);
	        $pdf->SetFillColor(192,192,192);
	        $pdf->Cell(85,6,'NAMA BARANG',1,0,'C');
	        $pdf->Cell(50,6,'JUMLAH BARANG MASUK',1,0,'C');
	        $pdf->Cell(43,6,'NAMA PEGAWAI',1,0,'C');
	        $pdf->Cell(45,6,'TANGGAL TRANSAKSI',1,1,'C');
	        
	        $pdf->SetFont('Arial','',10);
	   		$mahasiswa = $this->db->query("SELECT m_inventori.id AS id_inventori, m_inventori.nama_barang, log_masuk.jumlah, m_employee.nama ,log_masuk.tanggal FROM m_inventori JOIN m_jenis ON m_inventori.kode_jenis = m_jenis.id JOIN log_masuk ON m_inventori.id= log_masuk.kode_inventori JOIN m_employee ON log_masuk.reg_employee = m_employee.id WHERE m_jenis.id = 2 AND date_part('month', tanggal) = '$bulan' AND date_part('YEAR', tanggal) = '$tahun'  ORDER BY log_masuk.id DESC;");
	   		foreach ($mahasiswa->result_array() as $row) {
	            $pdf->Cell(85,6,$row['nama_barang'],1,0);
	            $pdf->Cell(50,6,$row['jumlah'],1,0); 
	            $pdf->Cell(43,6,$row['nama'],1,0); 
	            $pdf->Cell(45,6,date('d-m-Y', strtotime($row['tanggal'])),1,1); 
	        }
	        $pdf->Output();
    	}
    }

    public function cetak_riwayat_keluar_pertanggal(){
      $tanggal  = $_POST['tanggal'];
      $tgl_indo = date('d-m-Y', strtotime($tanggal));
      $tanggal  = $_POST['tanggal'];
      if($tanggal == ''){
        redirect('riwayat/cetak_keluar');
      }elseif($tanggal != ''){
	      $pdf = new FPDF('l','mm','A4');
	      // membuat halaman baru
	      $pdf->AddPage();
	      // setting jenis font yang akan digunakan
	      $pdf->SetFont('Arial','B',16);
	      // mencetak string 
	      $pdf->Cell(280,7,'LAPORAN DATA ATK PER TANGGAL '."$tgl_indo",0,1,'C');
	      $pdf->Image('assets/img/logo.png',10,10,20,20);
	      $pdf->SetFont('Arial','B',12);
	      $pdf->Cell(280,7,'CV SOLUSI PRIMA',0,1,'C');
	      $pdf->SetFont('Arial','B',10);
	      $pdf->Cell(280,7,'Jl. Laguna Seca I No.257, Karang Pamulang, Mandalajati, Kota Bandung, Jawa Barat 40195',0,1,'C');
	      //membuat garis
	      $pdf->SetLineWidth(1);
	      $pdf->Line(10,36,287,36);
	      $pdf->SetLineWidth(0);
	      $pdf->Line(10,37,287,37);

	      // Memberikan space kebawah agar tidak terlalu rapat
	      $pdf->Cell(10,10,'',0,1);
	      $pdf->SetFont('Arial','B',10);
	      $pdf->SetFillColor(192,192,192);
	      $pdf->Cell(85,6,'NAMA BARANG',1,0,'C');
	      $pdf->Cell(50,6,'JUMLAH BARANG KELUAR',1,0,'C');
	      $pdf->Cell(43,6,'NAMA PEGAWAI',1,0,'C');
	      $pdf->Cell(45,6,'TANGGAL TRANSAKSI',1,1,'C');
	      
	      $pdf->SetFont('Arial','',10);
        $mahasiswa = $this->db->query("SELECT m_inventori.id AS id_inventori, m_inventori.nama_barang, log_keluar.jumlah, m_employee.nama ,log_keluar.tanggal FROM m_inventori JOIN m_jenis ON m_inventori.kode_jenis = m_jenis.id JOIN log_keluar ON m_inventori.id= log_keluar.kode_inventori JOIN m_employee ON log_keluar.reg_employee = m_employee.id WHERE m_jenis.id = 2 AND log_keluar.tanggal = '$tanggal' ORDER BY log_keluar.id DESC");
        foreach ($mahasiswa->result_array() as $row) {
              $pdf->Cell(85,6,$row['nama_barang'],1,0);
              $pdf->Cell(50,6,$row['jumlah'],1,0); 
              $pdf->Cell(43,6,$row['nama'],1,0); 
              $pdf->Cell(45,6,date('d-m-Y', strtotime($row['tanggal'])),1,1); 
          }
          $pdf->Output();
        }
    }

    public function cetak_riwayat_keluar_perminggu(){
    	$tanggal_masuk  = $_POST['tanggal_awal'];
    	$tanggal_1 = date('d-m-Y', strtotime($tanggal_masuk));
    	$tanggal_keluar = $_POST['tanggal_akhir'];
    	$tanggal_2 = date('d-m-Y', strtotime($tanggal_keluar));

    	if($tanggal_masuk == '' AND $tanggal_keluar == ''){
    		redirect('riwayat/cetak_keluar');
    	}elseif($tanggal_masuk == '' AND $tanggal_keluar != ''){
    		redirect('riwayat/cetak_keluar');
    	}elseif($tanggal_masuk != '' AND $tanggal_keluar == ''){
    		redirect('riwayat/cetak_keluar');
    	}else{
    		$pdf = new FPDF('l','mm','A4');
	        // membuat halaman baru
	        $pdf->AddPage();
	        // setting jenis font yang akan digunakan
	        $pdf->SetFont('Arial','B',16);
	        // mencetak string 
	        $pdf->Cell(280,7,'LAPORAN DATA ATK PER TANGGAL '."$tanggal_1". ' SAMPAI TANGGAL ' ."$tanggal_2",0,1,'C');
	        $pdf->Image('assets/img/logo.png',10,10,20,20);
	        $pdf->SetFont('Arial','B',12);
	        $pdf->Cell(280,7,'CV SOLUSI PRIMA',0,1,'C');
	        $pdf->SetFont('Arial','B',10);
	        $pdf->Cell(280,7,'Jl. Laguna Seca I No.257, Karang Pamulang, Mandalajati, Kota Bandung, Jawa Barat 40195',0,1,'C');

	        //membuat garis
	        $pdf->SetLineWidth(1);
			$pdf->Line(10,36,287,36);
			$pdf->SetLineWidth(0);
			$pdf->Line(10,37,287,37);

	        // Memberikan space kebawah agar tidak terlalu rapat
	        $pdf->Cell(10,10,'',0,1);
	        $pdf->SetFont('Arial','B',10);
	        $pdf->SetFillColor(192,192,192);
	        $pdf->Cell(85,6,'NAMA BARANG',1,0,'C');
	        $pdf->Cell(50,6,'JUMLAH BARANG KELUAR',1,0,'C');
	        $pdf->Cell(43,6,'NAMA PEGAWAI',1,0,'C');
	        $pdf->Cell(45,6,'TANGGAL TRANSAKSI',1,1,'C');
	        
	        $pdf->SetFont('Arial','',10);
	   		$mahasiswa = $this->db->query("SELECT m_inventori.id AS id_inventori, m_inventori.nama_barang, log_keluar.jumlah, m_employee.nama ,log_keluar.tanggal FROM m_inventori JOIN m_jenis ON m_inventori.kode_jenis = m_jenis.id JOIN log_keluar ON m_inventori.id = log_keluar.kode_inventori JOIN m_employee ON log_keluar.reg_employee = m_employee.id WHERE m_jenis.id = 2 AND (log_keluar.tanggal BETWEEN '$tanggal_masuk' AND '$tanggal_keluar') ORDER BY log_keluar.id DESC");
	   		foreach ($mahasiswa->result_array() as $row) {
	            $pdf->Cell(85,6,$row['nama_barang'],1,0);
	            $pdf->Cell(50,6,$row['jumlah'],1,0); 
	            $pdf->Cell(43,6,$row['nama'],1,0); 
	            $pdf->Cell(45,6,date('d-m-Y', strtotime($row['tanggal'])),1,1); 
	        }
	        $pdf->Output();
    	}
    }

    public function cetak_riwayat_keluar_perbulan(){
      $bulan = $_POST['bulan'] + 1;
      $bulan = $_POST['bulan'] + 1;
    	if($bulan == 1){
    		$namanya = 'JANUARI';
    	}elseif ($bulan == 2) {
    		$namanya = 'FEBRUARI';
    	}elseif ($bulan == 3) {
    		$namanya = 'MARET';
    	}elseif ($bulan == 4) {
    		$namanya = 'APRIL';
    	}elseif ($bulan == 5) {
    		$namanya = 'MEI';
    	}elseif ($bulan == 6) {
    		$namanya = 'JUNI';
    	}elseif ($bulan == 7) {
    		$namanya = 'JULI';
    	}elseif ($bulan == 8) {
    		$namanya = 'AGUSTUS';
    	}elseif ($bulan == 9) {
    		$namanya = 'SEPTEMBER';
    	}elseif ($bulan == 10) {
    		$namanya = 'OKTOBER';
    	}elseif ($bulan == 11) {
    		$namanya = 'NOVEMBER';
    	}elseif ($bulan == 12) {
    		$namanya = 'DESEMBER';
    	}
    	$tahun = $_POST['tahun'];
      $tahun = $_POST['tahun'];

      if($bulan == '1' AND $tahun == 'Tahun'){
        redirect('riwayat/cetak_keluar');
      }elseif($bulan == '' OR $tahun == 'Tahun'){
        redirect('riwayat/cetak_keluar');
      }elseif($bulan != '' AND $tahun != ''){
        $pdf = new FPDF('l','mm','A4');
          // membuat halaman baru
          $pdf->AddPage();
          // setting jenis font yang akan digunakan
          $pdf->SetFont('Arial','B',16);
          // mencetak string 
          $pdf->Cell(280,7,'LAPORAN DATA ATK PER BULAN '."$namanya "."$tahun",0,1,'C');
          $pdf->Image('assets/img/logo.png',10,10,20,20);
          $pdf->SetFont('Arial','B',12);
          $pdf->Cell(280,7,'CV SOLUSI PRIMA',0,1,'C');
          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(280,7,'Jl. Laguna Seca I No.257, Karang Pamulang, Mandalajati, Kota Bandung, Jawa Barat 40195',0,1,'C');

          //membuat garis
          $pdf->SetLineWidth(1);
      $pdf->Line(10,36,287,36);
      $pdf->SetLineWidth(0);
      $pdf->Line(10,37,287,37);

          // Memberikan space kebawah agar tidak terlalu rapat
          $pdf->Cell(10,10,'',0,1);
          $pdf->SetFont('Arial','B',10);
          $pdf->SetFillColor(192,192,192);
          $pdf->Cell(85,6,'NAMA BARANG',1,0,'C');
          $pdf->Cell(50,6,'JUMLAH BARANG KELUAR',1,0,'C');
          $pdf->Cell(43,6,'NAMA PEGAWAI',1,0,'C');
          $pdf->Cell(45,6,'TANGGAL TRANSAKSI',1,1,'C');
          
          $pdf->SetFont('Arial','',10);
        $mahasiswa = $this->db->query("SELECT m_inventori.id AS id_inventori, m_inventori.nama_barang, log_keluar.jumlah, m_employee.nama ,log_keluar.tanggal FROM m_inventori JOIN m_jenis ON m_inventori.kode_jenis = m_jenis.id JOIN log_keluar ON m_inventori.id= log_keluar.kode_inventori JOIN m_employee ON log_keluar.reg_employee = m_employee.id WHERE m_jenis.id = 2 AND date_part('month', tanggal) = '$bulan' AND date_part('YEAR', tanggal) = '$tahun'  ORDER BY log_keluar.id DESC;");
        foreach ($mahasiswa->result_array() as $row) {
              $pdf->Cell(85,6,$row['nama_barang'],1,0);
              $pdf->Cell(50,6,$row['jumlah'],1,0); 
              $pdf->Cell(43,6,$row['nama'],1,0); 
              $pdf->Cell(45,6,date('d-m-Y', strtotime($row['tanggal'])),1,1); 
          }
          $pdf->Output();
      }
    }
}
