<?php 

class Subkriteria_m extends CI_Model
{

	public function tampil_data()
	{
		$this->db->select('subkriteria.*,kriteria.ket as nm_kriteria');
		$this->db->from('subkriteria');
		$this->db->join('kriteria','kriteria.kd_kriteria=subkriteria.kd_kriteria');
		$query = $this->db->get();
		return $query;
	}

	public function tambah_data($data)
	{ 
		$this->db->insert('subkriteria', $data);
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

	public function hapus_data($id_subkriteria)
	{
		$this->db->where('id_subkriteria', $id_subkriteria);
		$this->db->delete('subkriteria');
	}
}