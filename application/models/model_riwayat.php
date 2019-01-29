<?php 
 
class Model_riwayat extends CI_Model{		

	public function ambil_riwayat_masuk(){
		$data = $this->db->query("SELECT m_inventori.id AS id_inventori, m_inventori.nama_barang, log_masuk.jumlah, m_employee.nama ,log_masuk.tanggal FROM m_inventori JOIN m_jenis ON m_inventori.kode_jenis = m_jenis.id JOIN log_masuk ON m_inventori.id= log_masuk.kode_inventori JOIN m_employee ON log_masuk.reg_employee = m_employee.id WHERE m_jenis.id = 2 ORDER BY log_masuk.id DESC");
		return $data->result();
	}

	public function ambil_riwayat_keluar(){
		$data = $this->db->query("SELECT m_inventori.id AS id_inventori, m_inventori.nama_barang, log_keluar.jumlah, m_employee.nama ,log_keluar.tanggal FROM m_inventori JOIN m_jenis ON m_inventori.kode_jenis = m_jenis.id JOIN log_keluar ON m_inventori.id= log_keluar.kode_inventori JOIN m_employee ON log_keluar.reg_employee = m_employee.id WHERE m_jenis.id = 2 ORDER BY log_keluar.id DESC");
		return $data->result();
	}
}