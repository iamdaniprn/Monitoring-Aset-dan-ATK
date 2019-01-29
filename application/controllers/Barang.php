<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_barang');
		$this->load->model('model_atk');
	}

	public function barang_masuk(){
		$atk = $this->model_barang->ambil_atk();
        if ($atk)
        {
            $data['data_atk'] = $atk;
        }

        $pegawai = $this->model_barang->ambil_pegawai();
        if ($pegawai)
        {
            $data['data_pegawai'] = $pegawai;
        }
        $this->load->view('barang/barang_masuk', $data);
    }

    public function tambah_barang(){
	    $id_atk     = $_POST['atk']; 
	    $jumlah     = $_POST['jumlah']; 
	    $id_pegawai = $_POST['pegawai']; 
	    $tanggal    = date("Y-m-d h:i:sa");

	    $data = array(
	    		'tanggal'=> $tanggal,
	    		'kode_inventori'=> $id_atk,
	    		'reg_employee'=> $id_pegawai,
		        'jumlah'=> $jumlah,
		);
	    $this->model_barang->simpan('log_masuk', $data);

	    $ambil_id = $this->db->query("SELECT id, stok, sisa_stok FROM m_inventori WHERE id = $id_atk");
	    foreach ($ambil_id ->result_array() as $row) {
	        $id        = $row['id'];
	        $stok      = $row['stok'];
	        $sisa_stok = $row['sisa_stok'];
	        //tambah stok
	        // $tambah_stok = $stok + $jumlah;
	        //tambah sisa stok
	        $tambah_sisa_stok = $sisa_stok + $jumlah;

	        $data = array( 
	            'id'=> $id,
		        // 'stok'=> $tambah_stok,
		        'sisa_stok'=> $tambah_sisa_stok,
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

  	public function barang_keluar(){
		$atk = $this->model_barang->ambil_atk();
        if ($atk)
        {
            $data['data_atk'] = $atk;
        }

        $pegawai = $this->model_barang->ambil_pegawai();
        if ($pegawai)
        {
            $data['data_pegawai'] = $pegawai;
        }
        $this->load->view('barang/barang_keluar', $data);
    }

    public function tarik_barang(){
	    $id_atk     = $_POST['atk']; 
	    $jumlah     = $_POST['jumlah']; 
	    $id_pegawai = $_POST['pegawai']; 
	    $tanggal    = date("Y-m-d h:i:sa");

	    $data = array(
	    		'tanggal'=> $tanggal,
	    		'kode_inventori'=> $id_atk,
	    		'reg_employee'=> $id_pegawai,
		        'jumlah'=> $jumlah,
		);
	    $this->model_barang->simpan('log_keluar', $data);

	    $ambil_id = $this->db->query("SELECT id, stok, sisa_stok FROM m_inventori WHERE id = $id_atk");
	    foreach ($ambil_id ->result_array() as $row) {
	        $id        = $row['id'];
	        $stok      = $row['stok'];
	        $sisa_stok = $row['sisa_stok'];
	        //tambah stok
	        // $tambah_stok = $stok + $jumlah;
	        //tarik sisa stok
	        $tarik_sisa_stok = $sisa_stok - $jumlah;

	        $data = array( 
	            'id'=> $id,
		        'sisa_stok'=> $tarik_sisa_stok,
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
}
