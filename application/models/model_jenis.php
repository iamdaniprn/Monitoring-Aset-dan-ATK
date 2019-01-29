<?php 
 
class Model_jenis extends CI_Model{	

	public function ambil_jenis_aset(){
		$data = $this->db->query("SELECT * From m_jenis");
		return $data->result();
	}

	public function data_jenis($where= "") {
		$data = $this->db->query('SELECT * From m_jenis '.$where);
		return $data->result();
	}

	public function update_jenis($data){
        $this->db->where('id',$data['id']);
        $this->db->update('m_jenis',$data);
    }
}