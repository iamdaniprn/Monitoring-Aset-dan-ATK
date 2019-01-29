<?php 
 
class Model_pegawai extends CI_Model{	

	public function ambil_pegawai(){
		$data = $this->db->query("SELECT * From m_employee");
		return $data->result();
	}

	public function simpan($table, $data){
		return $this->db->insert($table, $data);
	}

	public function hapus($table,$where){
		return $this->db->delete($table,$where);
	}

	public function data_pegawai($where= "") {
		$data = $this->db->query('SELECT * From m_employee '.$where);
		return $data->result();
	}

	public function update_pegawai($data){
        $this->db->where('id',$data['id']);
        $this->db->update('m_employee',$data);
    }
}