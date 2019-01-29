<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('Pdf');
	}

	public function cetak_atk(){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(280,7,'LAPORAN DATA ATK',0,1,'C');
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
        $pdf->Cell(90,6,'NAMA BARANG',1,0,'C');
        $pdf->Cell(50,6,'MERK',1,0,'C');
        $pdf->Cell(40,6,'HARGA',1,0,'C');
        $pdf->Cell(25,6,'STOK AWAL',1,0,'C');
        $pdf->Cell(25,6,'SISA STOK',1,0,'C');
        $pdf->Cell(47,6,'KETERANGAN',1,1,'C');
        
        $pdf->SetFont('Arial','',10);
   		$mahasiswa = $this->db->query('SELECT *, m_inventori.id as id_inventori, m_jenis.jenis FROM m_inventori JOIN m_jenis ON m_inventori.kode_jenis = m_jenis.id WHERE m_jenis.id = 2');
   		foreach ($mahasiswa->result_array() as $row) {
            $pdf->Cell(90,6,$row['nama_barang'],1,0);
            $pdf->Cell(50,6,$row['merk'],1,0);
            $pdf->Cell(40,6,"Rp ".number_format($row['harga']),1,0);
            $pdf->Cell(25,6,$row['stok'],1,0);  
            $pdf->Cell(25,6,$row['sisa_stok'],1,0); 
            $pdf->Cell(47,6,$row['keterangan'],1,1);
        }
        $pdf->Output();
    }

    public function cetak_aset(){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(280,7,'LAPORAN DATA ASET KANTOR',0,1,'C');
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
        $pdf->SetFont('Arial','B',8);
        $pdf->SetFillColor(192,192,192);
        $pdf->Cell(36,6,'NO INVENTARIS',1,0,'C');
        $pdf->Cell(55,6,'NAMA BARANG',1,0,'C');
        $pdf->Cell(50,6,'NO SERI',1,0,'C');
        $pdf->Cell(27,6,'TGL PEMBELIAN',1,0,'C');
        $pdf->Cell(38,6,'PIC',1,0,'C');
        $pdf->Cell(15,6,'JUMLAH',1,0,'C');
        $pdf->Cell(30,6,'HARGA',1,0,'C');
        $pdf->Cell(28,6,'KETERANGAN',1,1,'C');
        
        $pdf->SetFont('Arial','',8);
   		$mahasiswa = $this->db->query('SELECT *, m_inventori.id as id_inventori, m_jenis.jenis FROM m_inventori JOIN m_jenis ON m_inventori.kode_jenis = m_jenis.id WHERE m_jenis.id = 1');
   		foreach ($mahasiswa->result_array() as $row) {
   			$pdf->Cell(36,6,$row['no_inventaris'],1,0);
            $pdf->Cell(55,6,$row['nama_barang'],1,0);
            $pdf->Cell(50,6,$row['no_seri'],1,0);
            $pdf->Cell(27,6,$row['tgl_pembelian'],1,0);
            $pdf->Cell(38,6,$row['pic'],1,0);
            $pdf->Cell(15,6,$row['jumlah'],1,0); 
            $pdf->Cell(30,6,"Rp ".number_format($row['harga']),1,0); 
            $pdf->Cell(28,6,$row['keterangan'],1,1); 
        }
        $pdf->Output();
    }
}