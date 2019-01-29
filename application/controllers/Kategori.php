<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_kategori');
	}

	public function index(){
        $data = array(  'title' =>  'Data kategori Aset | Aplikasi Monitoring Aset',
                        'isi'   =>  'kategori/data_kategori');
        $data['data_kategori'] = $this->model_kategori->ambil_kategori();
        $this->load->view('layout/wrapper',$data);
    }

    public function tambah_kategori(){
        $data = array(  'title' =>  'Tambah kategori | Aplikasi Monitoring Aset',
                        'isi'   =>  'kategori/tambah_kategori');
        $this->load->view('layout/wrapper',$data);
    }

    public function simpan_kategori(){
	    $nama= $_POST['nama']; 
	    $singkatan = $_POST['singkatan'];
	    $data = array(
	      'kategori'=> $nama,
	      'singkatan'=> $singkatan,
	    );
	    $this->model_kategori->simpan('m_kategori', $data);
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Ditambahkan
	    	</div>");
	    redirect('kategori');
  	}

  	public function hapus_kategori($kode = 0){
	    $result = $this->model_kategori->hapus('m_kategori',array('id' => $kode));
	    if($result == 1){
	    header('location:'.base_url().'kategori');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

    public function edit_kategori($kode = 0){
	    $data = array(  'title' =>  'Edit kategori Aset| Aplikasi Monitoring Aset',
                        'isi'   =>  'kategori/edit_kategori');
	    $data['detail_kategori'] = $this->model_kategori->data_kategori("WHERE m_kategori.id = '$kode'");
        $this->load->view('layout/wrapper',$data);
  	}

  	public function update_kategori(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'kategori' => $this->input->post('kategori'),
	      'singkatan' => $this->input->post('singkatan'),
	    );
	    $res = $this->model_kategori->update_kategori($data);
	    if($res=1){
	      header('location:'.base_url().'kategori');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}


	//Sub Kategori
	public function sub_kategori(){
        $data = array(  'title' =>  'Data kategori Aset | Aplikasi Monitoring Aset',
                        'isi'   =>  'kategori/data_sub_kategori');
        $data['data_sub_kategori'] = $this->model_kategori->ambil_sub_kategori();
        $this->load->view('layout/wrapper',$data);
    }

    public function tambah_sub_kategori(){
        $data = array(  'title' =>  'Tambah kategori | Aplikasi Monitoring Aset',
                        'isi'   =>  'kategori/tambah_sub_kategori');
        $data['data_kategori'] = $this->model_kategori->ambil_kategori();
        $this->load->view('layout/wrapper',$data);
    }

    public function simpan_sub_kategori(){
	    $id_kategori  = $_POST['id_kategori']; 
	    $sub_kategori = $_POST['sub_kategori'];
	    $singkatan    = $_POST['singkatan'];
	    $data = array(
	      'id_kategori'=> $id_kategori,
	      'sub_kategori'=> $sub_kategori,
	      'singkatan'=> $singkatan,
	    );
	    $this->model_kategori->simpan('m_sub_kategori', $data);
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Ditambahkan
	    	</div>");
	    redirect('kategori/sub_kategori');
  	}

  	public function edit_sub_kategori($kode = 0){
	    $data = array(  'title' =>  'Edit sub_kategori Aset| Aplikasi Monitoring Aset',
                        'isi'   =>  'kategori/edit_sub_kategori');
	    $data['detail_sub_kategori'] = $this->model_kategori->data_sub_kategori("WHERE m_sub_kategori.id = '$kode'");
        $this->load->view('layout/wrapper',$data);
  	}

  	public function update_sub_kategori(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'id_kategori' => $this->input->post('id_kategori'),
	      'sub_kategori' => $this->input->post('sub_kategori'),
	      'singkatan' => $this->input->post('singkatan'),
	    );
	    $res = $this->model_kategori->update_sub_kategori($data);
	    if($res=1){
	      header('location:'.base_url().'kategori/sub_kategori');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	public function hapus_sub_kategori($kode = 0){
	    $result = $this->model_kategori->hapus('m_sub_kategori',array('id' => $kode));
	    if($result == 1){
	    header('location:'.base_url().'kategori/sub_kategori');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}
}
