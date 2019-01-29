<?php 
 
class Model_atk extends CI_Model{		

	public function ambil_atk(){
		$data = $this->db->query("SELECT *, m_inventori.	id as id_inventori, m_jenis.jenis FROM m_inventori JOIN m_jenis ON m_inventori.kode_jenis = m_jenis.id WHERE m_jenis.id = 2");
		return $data->result();
	}

	public function simpan($table, $data){
		return $this->db->insert($table, $data);
	}

	public function hapus($table,$where){
		return $this->db->delete($table,$where);
	}

	public function data_atk($where= "") {
		$data = $this->db->query('SELECT * From m_inventori '.$where);
		return $data->result();
	}

	public function update_atk($data){
        $this->db->where('id',$data['id']);
        $this->db->update('m_inventori',$data);
    }

    public function hitung_jumlah_atk(){
		$data = $this->db->query("SELECT COUNT(m_inventori.id) as id FROM m_inventori JOIN m_jenis ON m_inventori.kode_jenis = m_jenis.id WHERE m_jenis.id = 2");
		return $data->result();
	}

	public function hitung_total_atk(){
		$data = $this->db->query("SELECT SUM(m_inventori.harga) as total FROM m_inventori JOIN m_jenis ON m_inventori.kode_jenis = m_jenis.id WHERE m_jenis.id = 2");
		return $data->result();
	}
}