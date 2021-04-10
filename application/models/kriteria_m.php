<?php 

class Kriteria_m extends CI_Model
{

	public function tampil_data()
	{
		return $this->db->get('kriteria');
	}

	public function banyak_data()
	{
		$query = $this->db->get('kriteria');
		if($query->num_rows()>0){
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function tambah_data($data)
	{ 
		$this->db->insert('kriteria', $data);
	}

	public function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);

	}

	public function hapus_data($kd_kriteria)
	{
		$this->db->where('kd_kriteria', $kd_kriteria);
		$this->db->delete('kriteria');
	}
}