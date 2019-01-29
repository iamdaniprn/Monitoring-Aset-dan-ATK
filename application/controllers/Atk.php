<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atk extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_atk');
	}

	public function index(){
        $data = array(  'title' =>  'Data ATK | Aplikasi Monitoring atk',
                        'isi'   =>  'atk/data_atk');
        $data['data_atk'] = $this->model_atk->ambil_atk();
        $this->load->view('layout/wrapper',$data);
    }

    public function tambah_atk(){
        $data = array(  'title' =>  'Tambah atk | Aplikasi Monitoring atk',
                        'isi'   =>  'atk/tambah_atk');
        $this->load->view('layout/wrapper',$data);
    }

    public function simpan_atk(){
    	$no_inventaris= 0;
	    $nama         = $_POST['nama']; 
	    $pic          = '-';
	    $jumlah       = 0;
	    $harga        = $_POST['harga'];
	    $keterangan   = $_POST['keterangan'];
	    if($keterangan ==''){
	    	$keterangan = '-';
	    }
	    $kode_jenis   = 2;
	    $merk		  = $_POST['merk'];
	    if($merk ==''){
	    	$merk ='-';
	    }
	    $stok 		  = $_POST['stok'];
	    $sisa_stok 	  = $_POST['stok'];
	    $add_time     = date("Y-m-d h:i:sa");
	    $data         = array(
	    	'no_inventaris'=> $no_inventaris,
	        'nama_barang'=> $nama,
	        'kode_jenis'=> $kode_jenis,
	        'pic'=> $pic,
	        'jumlah'=> $jumlah,
	        'harga'=> $harga,
	        'merk'=> $merk,
	        'stok'=> $stok,
	        'sisa_stok'=> $sisa_stok,
	        'keterangan'=> $keterangan,
	        'add_time'=> $add_time,
	    );
	    $this->model_atk->simpan('m_inventori', $data);
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Ditambahkan
	    	</div>");
	    redirect('atk');
  	}

  	public function hapus_atk($kode = 0){
	    $result = $this->model_atk->hapus('m_inventori',array('id' => $kode));
	    if($result == 1){
	    header('location:'.base_url().'atk');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	public function edit_atk($kode = 0){
	    $data = array(  'title' =>  'Edit atk | Aplikasi Monitoring atk',
                        'isi'   =>  'atk/edit_atk');
	    $data['detail_atk'] = $this->model_atk->data_atk("WHERE m_inventori.id = '$kode'");
        $this->load->view('layout/wrapper',$data);
  	}

  	public function update_atk(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'nama_barang' => $this->input->post('nama'),
	      'merk' => $this->input->post('merk'),
	      'harga' => $this->input->post('harga'),
	      'stok' => $this->input->post('stok'),
	      // 'sisa_stok' => $this->input->post('sisa_stok'),
	      'keterangan' => $this->input->post('keterangan'),
	    );
	    $res = $this->model_atk->update_atk($data);
	    if($res=1){
	      header('location:'.base_url().'atk');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}
}
