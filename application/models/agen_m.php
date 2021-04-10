<?php 

class Agen_m extends CI_Model
{
	function fetch_cabang()
	{
		
		$this->db->order_by('nama_cabang', 'ASC');
		$query = $this->db->get('cabang');
		return $query->result();
	}

	function fetch_unit($kd_cabang){
		$this->db->where('kd_cabang', $kd_cabang);
		$this->db->order_by('nama_unit', 'ASC');
		$query = $this->db->get('unit');
		$output= '<option value"">Pilih Unit</option>';
		foreach ($query->result() as $row) {
		$output .= '<option value="'.$row->kd_unit.'">['.$row->kd_unit.']: '.$row->nama_unit.'</option>';
        }
			return $output;
	}

	public function tampil_data()
	{	
		$this->db->select('agen.*, cabang.nama_cabang as cbg_nama, unit.nama_unit as unt_nama');
		$this->db->order_by('id_agen DESC');
		$this->db->from('agen');
		$this->db->join('cabang','cabang.kd_cabang = agen.kd_cabang');
		$this->db->join('unit','unit.kd_unit = agen.kd_unit');
		$query = $this->db->get();
 		return $query;
	}

	public function banyak_data()
	{
		$query = $this->db->get('agen');
		if($query->num_rows()>0){
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function tambah_data($data)
	{ 

		$this->db->insert('agen', $data);
	}

	public function edit($where, $table)
	{	

		$query = $this->db->get_where($table, $where);
 		return $query;
	}

	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function hapus_data($id_agen)
	{
		$this->db->where('id_agen', $id_agen);
		$this->db->delete('agen');
	}

	public function agen_donat()
	{
		$this->db->select('agen.*, count(agen.id_agen) as total,cabang.nama_cabang as cbg_nama');
		$this->db->from('agen');
		$this->db->join('cabang','cabang.kd_cabang = agen.kd_cabang');
		$this->db->group_by('cbg_nama');
		$query = $this->db->get()->result();
		return $query;
	}
}