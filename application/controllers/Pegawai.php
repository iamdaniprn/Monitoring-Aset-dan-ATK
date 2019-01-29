<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_pegawai');
	}

	public function index(){
        $data = array(  'title' =>  'Data Pegawai | Aplikasi Monitoring Aset',
                        'isi'   =>  'pegawai/data_pegawai');
        $data['data_pegawai'] = $this->model_pegawai->ambil_pegawai();
        $this->load->view('layout/wrapper',$data);
    }

    public function tambah_pegawai(){
        $data = array(  'title' =>  'Tambah Pegawai | Aplikasi Monitoring Aset',
                        'isi'   =>  'pegawai/tambah_pegawai');
        $this->load->view('layout/wrapper',$data);
    }

    public function simpan_pegawai(){
	    $nama= $_POST['nama']; 
	    $data = array(
	      'nama'=> $nama,
	    );
	    $this->model_pegawai->simpan('m_employee', $data);
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Ditambahkan
	    	</div>");
	    redirect('pegawai');
  	}

  	public function hapus_pegawai($kode = 0){
	    $result = $this->model_pegawai->hapus('m_employee',array('id' => $kode));
	    if($result == 1){
	    header('location:'.base_url().'pegawai');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	public function edit_pegawai($kode = 0){
	    $data = array(  'title' =>  'Edit Pegawai | Aplikasi Monitoring Aset',
                        'isi'   =>  'pegawai/edit_pegawai');
	    $data['detail_pegawai'] = $this->model_pegawai->data_pegawai("WHERE m_employee.id = '$kode'");
        $this->load->view('layout/wrapper',$data);
  	}

  	public function update_pegawai(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'nama' => $this->input->post('nama'),
	      );
	    $res = $this->model_pegawai->update_pegawai($data);
	    if($res=1){
	      header('location:'.base_url().'pegawai');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}
}
