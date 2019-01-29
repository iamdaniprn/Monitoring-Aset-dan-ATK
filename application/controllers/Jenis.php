<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_jenis');
	}

	public function index(){
        $data = array(  'title' =>  'Data jenis Aset | Aplikasi Monitoring Aset',
                        'isi'   =>  'jenis_aset/data_jenis_aset');
        $data['data_jenis'] = $this->model_jenis->ambil_jenis_aset();
        $this->load->view('layout/wrapper',$data);
    }

    public function edit_jenis($kode = 0){
	    $data = array(  'title' =>  'Edit jenis Aset| Aplikasi Monitoring Aset',
                        'isi'   =>  'jenis_aset/edit_jenis');
	    $data['detail_jenis'] = $this->model_jenis->data_jenis("WHERE m_jenis.id = '$kode'");
        $this->load->view('layout/wrapper',$data);
  	}

  	public function update_jenis(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'jenis' => $this->input->post('nama'),
	      );
	    $res = $this->model_jenis->update_jenis($data);
	    if($res=1){
	      header('location:'.base_url().'jenis');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}
}
