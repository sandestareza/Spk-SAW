<?php 

class Transaksi_m extends CI_Model
{
	public function tambah_data($data)
	{ 
		$this->db->insert('transaksi', $data);
	}

	public function tampil_data()
	{
		/*menampilkan data berdasarkan user yang login*/
		$this->db->select('transaksi.*');
		$this->db->where('transaksi.id_agen', $this->session->userdata('id_agen'));
		return $this->db->get('transaksi');
	}

	public function total_omset()
	{
		$this->db->select_sum('omset');
		$this->db->where('transaksi.id_agen', 
		$this->session->userdata('id_agen'));
		$query = $this->db->get('transaksi');
		if($query->num_rows()>0){
			return $query->row()->omset;
		} else{
			return 0;
		}
	}

	public function jum_nasabah()
	{
		$this->db->select_sum('j_nasabah');
		$this->db->where('transaksi.id_agen', 
		$this->session->userdata('id_agen'));
		$query = $this->db->get('transaksi');
		if($query->num_rows()>0){
			return $query->row()->j_nasabah;
		} else{
			return 0;
		}
	}

	public function total_transaksi()
	{
		$this->db->select_sum('omset');
		$query = $this->db->get('transaksi');
		if($query->num_rows()>0){
			return $query->row()->omset;
		} else{
			return 0;
		}
	}

	public function total_nasabah()
	{
		$this->db->select_sum('j_nasabah');
		$query = $this->db->get('transaksi');
		if($query->num_rows()>0){
			return $query->row()->j_nasabah;
		} else{
			return 0;
		}
	}

	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function hapus_data($id_transaksi)
	{
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->delete('transaksi');
	}

	public function chart_omset()
	{
		$this->db->select('agen.*, cabang.nama_cabang as cbg_nama');
		$this->db->select('transaksi.*');
		$this->db->select_sum('omset','omset');
		$this->db->join('transaksi','transaksi.id_agen = agen.id_agen');
		$this->db->join('cabang','cabang.kd_cabang = agen.kd_cabang');
		$this->db->from('agen');
		$this->db->group_by('cbg_nama');
		$query = $this->db->get()->result();
		return $query;
	}
}