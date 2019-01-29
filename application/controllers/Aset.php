<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_aset');
		$this->load->model('model_kategori');
	}

	public function index(){
        $data = array(  'title' =>  'Data Aset Kantor | Aplikasi Monitoring Aset',
                        'isi'   =>  'aset/data_aset');
        $data['data_aset'] = $this->model_aset->ambil_aset();
        $this->load->view('layout/wrapper',$data);
    }

    public function tambah_aset(){
        $data = array(  'title' =>  'Tambah Aset | Aplikasi Monitoring Aset',
                        'isi'   =>  'aset/tambah_aset');
        $data['data_kategori']     = $this->model_kategori->ambil_kategori();
        $data['data_sub_kategori'] = $this->model_kategori->ambil_sub_kategori();
        $this->load->view('layout/wrapper',$data);
    }

    public function simpan_aset(){
    	$singkatan_kategori     = $_POST['singkatan_kategori'];
    	$singkatan_sub_kategori = $_POST['singkatan_sub_kategori'];
    	$bulan = date("m");
    	$tahun = date("Y");

    	// PROSES PEMBUATAN KODE BARANG OTOMATIS
    	// ambil kode terakhir di inventaris
		$this->db->select('SUBSTRING(no_inventaris, 4, 3) AS kode', FALSE);
		$this->db->order_by('no_inventaris','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('m_inventori');

		if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		else {      
		   //jika kode belum ada      
		   $kode = 1;    
		}

		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "SP/".$kodemax."/".$singkatan_kategori."/".$singkatan_sub_kategori."/".$bulan."-".$tahun;    // hasilnya ODJ-9921-0001 dst.
		echo "$kodejadi";

	    $no_inventaris= $kodejadi;
	    $nama         = $_POST['nama']; 
	    $no_seri      = $_POST['no_seri']; 
	    $tgl_pembelian= $_POST['tgl_pembelian']; 
	    $pic          = $_POST['pic'];
	    $jumlah       = $_POST['jumlah'];
	    $harga = $_POST['harga'];
	    if($harga == ''){
	    	$harganya = 0;
	    }else{
	    	$harganya = $harga;
	    }
	    
	    $keterangan   = $_POST['keterangan'];
		if($keterangan == ''){
			$keterangannya = '-';
		}else{
			$keterangannya = $keterangan;
		}

	    $kode_jenis   = 1;
	    $merk		  = '-';
	    $stok 		  = 0;
	    $sisa_stok 	  = 0;
	    $add_time     = date("Y-m-d h:i:sa");
	    $data         = array(
	    	'no_inventaris'=> $no_inventaris,
	        'nama_barang'=> $nama,
	        'kode_jenis'=> $kode_jenis,
	        'pic'=> $pic,
	        'jumlah'=> $jumlah,
	        'harga'=> $harganya,
	        'merk'=> $merk,
	        'stok'=> $stok,
	        'sisa_stok'=> $sisa_stok,
	        'keterangan'=> $keterangannya,
	        'add_time'=> $add_time,
	        'no_seri'=> $no_seri,
	        'tgl_pembelian'=> $tgl_pembelian,
	    );
	    $this->model_aset->simpan('m_inventori', $data);
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Ditambahkan
	    	</div>");
	    redirect('aset');
  	}

  	public function hapus_aset($kode = 0){
	    $result = $this->model_aset->hapus('m_inventori',array('id' => $kode));
	    if($result == 1){
	    header('location:'.base_url().'aset');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	public function edit_aset($kode = 0){
	    $data = array(  'title' =>  'Edit Aset | Aplikasi Monitoring Aset',
                        'isi'   =>  'aset/edit_aset');
	    $data['detail_aset'] = $this->model_aset->data_aset("WHERE m_inventori.id = '$kode'");
        $this->load->view('layout/wrapper',$data);
  	}

  	public function update_aset(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'no_inventaris' => $this->input->post('no_inventaris'),
	      'nama_barang' => $this->input->post('nama'),
	      'no_seri' => $this->input->post('no_seri'),
	      'tgl_pembelian' => $this->input->post('tgl_pembelian'),
	      'pic' => $this->input->post('pic'),
	      'jumlah' => $this->input->post('jumlah'),
	      'harga' => $this->input->post('harga'),
	      'keterangan' => $this->input->post('keterangan'),
	    );
	    $res = $this->model_aset->update_aset($data);
	    if($res=1){
	      header('location:'.base_url().'aset');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	public function detail_aset($kode = 0){
	    $data = array(  'title' =>  'Edit Aset | Aplikasi Monitoring Aset',
                        'isi'   =>  'aset/detail_aset');
	    $data['detail_aset'] = $this->model_aset->data_aset("WHERE m_inventori.id = '$kode'");
        $this->load->view('layout/wrapper',$data);
  	}
}
