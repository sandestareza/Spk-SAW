<?php 

class Cabang_m extends CI_Model
{

	public function tampil_data()
	{
		return $this->db->get('cabang');
	}

	public function tambah_data($data)
	{ 
		$this->db->insert('cabang', $data);
	}

	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function hapus_data($kd_cabang)
	{
		$this->db->where('kd_cabang', $kd_cabang);
		$this->db->delete('cabang');
	}
}