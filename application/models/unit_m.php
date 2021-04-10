<?php 

class Unit_m extends CI_Model
{

	public function tampil_data()
	{
		$this->db->select('unit.*, cabang.nama_cabang as cbg_nama');
		$this->db->from('unit');
		$this->db->join('cabang','cabang.kd_cabang = unit.kd_cabang');
		$query = $this->db->get();
 		return $query;
	}

	public function tambah_data($data)
	{ 
		$this->db->insert('unit', $data);
	}

	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function hapus_data($kd_unit)
	{
		$this->db->where('kd_unit', $kd_unit);
		$this->db->delete('unit');
	}
}