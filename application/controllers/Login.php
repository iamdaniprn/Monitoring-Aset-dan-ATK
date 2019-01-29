<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_login');
		$this->load->model('model_aset');
		$this->load->model('model_atk');
	}

	public function index(){
        $this->load->view('login');
    }

    public function proses_login(){
        $username = $this->input->post('username');
		$password = $this->input->post('password');
		$passwordx = md5($password); 
		$where = array(
			'username' => $username,
			'password' => $passwordx
			);
		echo"$where[username] <br>";
		echo"$where[password] <br>";

		$cek = $this->model_login->cek_user("admin", $where)->num_rows();
		if($cek > 0){
			$data_session = array(
				'username' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
			redirect(base_url("login/beranda"));
 
		}else{
			header('location:'.base_url().'login');
			$this->session->set_flashdata("sukses", "
		    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Gagal!</h4> Username atau Password salah
		    	</div>");
		}
    }

    public function beranda(){
        $data = array(  'title' =>  'Home | Aplikasi Monitoring Aset',
                        'isi'   =>  'beranda');
        $data['jumlah_aset'] = $this->model_aset->hitung_jumlah_aset();
        $data['jumlah_atk'] = $this->model_atk->hitung_jumlah_atk();
        $data['total_harga_aset'] = $this->model_aset->hitung_total_aset();
        $data['total_harga_atk'] = $this->model_atk->hitung_total_atk();
        $this->load->view('layout/wrapper',$data);
    }

    public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

}
