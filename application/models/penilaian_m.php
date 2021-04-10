<?php 

class Penilaian_m extends CI_Model
{
	public function tampil_agen()/*menampilkan data transaksi agen*/
	{	
		$this->db->select('agen.*, cabang.nama_cabang as cbg_nama, unit.nama_unit as unt_nama');
		$this->db->select('transaksi.*');
		$this->db->join('agen','agen.id_agen=transaksi.id_agen');
		$this->db->join('cabang','cabang.kd_cabang = agen.kd_cabang');
		$this->db->join('unit','unit.kd_unit = agen.kd_unit');
		$this->db->select_sum('omset','omset');
		$this->db->select_sum('j_nasabah','j_nasabah');
		$this->db->group_by('nama_agen');/*untuk menggabungkan satu field*/
		$this->db->from('transaksi');
		$query = $this->db->get();
 		return $query;
	}

	public function getOmset()
	/*menampilkan berdasarkan kode kriteria C3*/
	{
		$this->db->select('*');
		$this->db->from('subkriteria');
		$this->db->where('subkriteria.kd_kriteria="C1"');
		$query = $this->db->get();
		return $query;

	}

	public function getNasabah()
	/*menampilkan berdasarkan kode kriteria C2*/
	{
		$this->db->select('*');
		$this->db->from('subkriteria');
		$this->db->where('subkriteria.kd_kriteria="C2"');
		$query = $this->db->get();
		return $query;
	}

	public function getPengetahuan()
	/*menampilkan berdasarkan kode kriteria*/
	{
		$this->db->select('*');
		$this->db->from('subkriteria');
		$this->db->where('subkriteria.kd_kriteria="C3"');
		$query = $this->db->get();
		return $query;
	}

	public function tampil_penilaian()/*menampilkan data penilaian*/
	{	
		$this->db->select('*,agen.nama_agen as nm_ag, sk.ket_sub as nm_sub, sb.ket_sub as sub, st.ket_sub as nmsub'); 
		$this->db->order_by('id_nilai ASC');
		$this->db->from('nilai n');
		$this->db->join('agen','agen.id_agen=n.id_agen');
		$this->db->join('subkriteria sk','sk.id_subkriteria=n.C1');
		$this->db->join('subkriteria sb','sb.id_subkriteria=n.C2');
		$this->db->join('subkriteria st','st.id_subkriteria=n.C3');

		$query = $this->db->get();
		return $query;
	}

	public function tambah_data($data)
	{ 
		$this->db->insert('nilai', $data);
	}

	public function hapus_data($id_nilai)
	{
		$this->db->where('id_nilai', $id_nilai);
		$this->db->delete('nilai');
	}

	public function tampil_rating()/*menampilkan rating kecocokan*/
	{	
		$this->db->select('*,agen.nama_agen as nm_ag, sk.bobot as b1, sb.bobot as b2, st.bobot as b3'); 
		$this->db->from('nilai n');
		$this->db->join('agen','agen.id_agen=n.id_agen');
		$this->db->join('subkriteria sk','sk.id_subkriteria=n.C1');
		$this->db->join('subkriteria sb','sb.id_subkriteria=n.C2');
		$this->db->join('subkriteria st','st.id_subkriteria=n.C3');

		$query = $this->db->get();
		return $query;
	}

	public function get_maxC1()/*mencari nilai max C1*/
	{
		$this->db->select('*, sb.bobot as b1');
		$this->db->select_max('bobot');
		$this->db->join('subkriteria sb','sb.id_subkriteria=n.C1');
		$query = $this->db->get('nilai n');
		if($query->num_rows()>0){
			return $query->row()->bobot;
		} else{
			return 0;
		}
	}

	public function get_maxC2()/*mencari nilai max C2*/
	{
		$this->db->select('*, sb.bobot as b2');
		$this->db->select_max('bobot');
		$this->db->join('subkriteria sb','sb.id_subkriteria=n.C2');
		$query = $this->db->get('nilai n');
		if($query->num_rows()>0){
			return $query->row()->bobot;
		} else{
			return 0;
		}
	}

	public function get_maxC3()/*mencari nilai max C3*/
	{
		$this->db->select('*, st.bobot as b3');
		$this->db->select_max('bobot');
		$this->db->join('subkriteria st','st.id_subkriteria=n.C3');
		$query = $this->db->get('nilai n');
		if($query->num_rows()>0){
			return $query->row()->bobot;
		} else{
			return 0;
		}
	}

	public function get_bobotc1()/*ambil bobot berdasarkan kriteria*/
	{
		$this->db->select('bobot');
		$this->db->where('kriteria.kd_kriteria="C1"');
		$query = $this->db->get('kriteria');
		if($query->num_rows()>0){
			return $query->row()->bobot;
		} else{
			return 0;
		}
	}

	public function get_bobotc2()
	{
		$this->db->select('bobot');
		$this->db->where('kriteria.kd_kriteria="C2"');
		$query = $this->db->get('kriteria');
		if($query->num_rows()>0){
			return $query->row()->bobot;
		} else{
			return 0;
		}
	}

	public function get_bobotc3()
	{
		$this->db->select('bobot');
		$this->db->where('kriteria.kd_kriteria="C3"');
		$query = $this->db->get('kriteria');
		if($query->num_rows()>0){
			return $query->row()->bobot;
		} else{
			return 0;
		}
	}

	public function edit($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);

	}
}