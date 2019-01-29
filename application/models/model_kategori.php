<?php 
 
class Model_kategori extends CI_Model{	

	public function ambil_kategori(){
		$data = $this->db->query("SELECT * From m_kategori ORDER BY id ASC");
		return $data->result();
	}

	public function simpan($table, $data){
		return $this->db->insert($table, $data);
	}

	public function hapus($table,$where){
		return $this->db->delete($table,$where);
	}

	public function data_kategori($where= "") {
		$data = $this->db->query('SELECT * From m_kategori '.$where);
		return $data->result();
	}

	public function update_kategori($data){
        $this->db->where('id',$data['id']);
        $this->db->update('m_kategori',$data);
    }

    public function ambil_sub_kategori(){
		$data = $this->db->query("SELECT m_sub_kategori.*, m_kategori.kategori FROM m_sub_kategori JOIN m_kategori ON m_sub_kategori.id_kategori = m_kategori.id ORDER BY m_sub_kategori ASC");
		return $data->result();
	}

	public function data_sub_kategori($where= "") {
		$data = $this->db->query('SELECT m_sub_kategori.*, m_kategori.kategori FROM m_sub_kategori JOIN m_kategori ON m_sub_kategori.id_kategori = m_kategori.id '.$where);
		return $data->result();
	}

	public function update_sub_kategori($data){
        $this->db->where('id',$data['id']);
        $this->db->update('m_sub_kategori',$data);
    }
}