<?php 
class Model_barang extends CI_Model{

	public function ambil_atk(){
        $query='SELECT * from  m_inventori where kode_jenis = 2';
        $cari = $this->db->query($query);
        if($cari->num_rows()>0)
        {
            foreach($cari->result() as $baris)
            {
                $data_atk[]=$baris;
            }
            return $data_atk;
        }
    }

    public function ambil_pegawai(){
        $query='SELECT * from m_employee';
        $cari = $this->db->query($query);
        if($cari->num_rows()>0)
        {
            foreach($cari->result() as $baris)
            {
                $data_pegawai[]=$baris;
            }
            return $data_pegawai;
        }
    }

    public function simpan($table, $data){
		return $this->db->insert($table, $data);
	}
}