<?php 

class User_m extends CI_Model
{
	public function tampil_data()
	{
		return $this->db->get('user');
	}

	public function banyak_data()
	{
		$query = $this->db->get('user');
		if($query->num_rows()>0){
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function tambah_data($data)
	{
		$this->db->insert('user', $data);
	}

	public function hapus_data($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('user');
	}

}