<?php

class Penilaian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('penilaian_m');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();

		$data['transaksi'] = $this->penilaian_m->tampil_agen('transaksi')->result();
		$data['omset'] = $this->penilaian_m->getOmset('subkriteria')->result_array();
		$data['nasabah'] = $this->penilaian_m->getNasabah('subkriteria')->result_array();
		$data['tahu'] = $this->penilaian_m->getPengetahuan('subkriteria')->result_array();
		$data['nilai'] = $this->penilaian_m->tampil_penilaian()->result();

		$data['title'] = 'Penilaian Alternatif';
		$this->load->view('template_admin/admin_header', $data);
		$this->load->view('template_admin/admin_sidebar', $data);
		$this->load->view('admin/penilaian', $data);
		$this->load->view('template_admin/admin_footer');
	}

	public function tambah_aksi()
	{
			$data = array(
			
				'tanggal'	=> $this->input->post('tanggal'),
				'id_agen'	=> $this->input->post('id_agen'),
				'C1'		=> $this->input->post('C1'),
				'C2'		=> $this->input->post('C2'),
				'C3'		=> $this->input->post('C3')

			);
		
			$this->penilaian_m->tambah_data($data);
			$this->session->set_flashdata('pesan', ' berhasil ditambahkan!');
			redirect('admin/penilaian');
	}

	public function hapus($id_nilai)
	{
		
		$this->penilaian_m->hapus_data($id_nilai);
		$this->session->set_flashdata('pesan', 'berhasil dihapus!');
		redirect('admin/penilaian');
	}

	public function edit($id_nilai)
	{
		$data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();
		
		$data['transaksi'] = $this->penilaian_m->tampil_agen('transaksi')->result();
		$data['omset'] = $this->penilaian_m->getOmset('subkriteria')->result();
		$data['nasabah'] = $this->penilaian_m->getNasabah('subkriteria')->result();
		$data['tahu'] = $this->penilaian_m->getPengetahuan('subkriteria')->result();

		$where = array('id_nilai' => $id_nilai);
		$data['nilai'] = $this->penilaian_m->edit($where, 'nilai')->result();

		$data['title'] = 'Edit Penilaian';
		$this->load->view('template_admin/admin_header', $data);
		$this->load->view('template_admin/admin_sidebar', $data);
		$this->load->view('admin/penilaian_edit', $data);
		$this->load->view('template_admin/admin_footer');
	}

	public function edit_aksi()
	{
				$id_nilai	= $this->input->post('id_nilai');
				$tanggal	= $this->input->post('tanggal');
				$id_agen	= $this->input->post('id_agen');
				$C1			= $this->input->post('C1');
				$C2			= $this->input->post('C2');
				$C3			= $this->input->post('C3');

			$data = array(
			
				'id_nilai'	=> $id_nilai,
				'tanggal'	=> $tanggal,
				'id_agen'	=> $id_agen,
				'C1'		=> $C1,
				'C2'		=> $C2,
				'C3'		=> $C3

			);
			
			$where	=	array('id_nilai' => $id_nilai);
		
			$this->penilaian_m->update_data($where, $data, 'nilai');
			$this->session->set_flashdata('pesan', ' berhasil diedit!');
			redirect('admin/penilaian');
	}

	public function cetak()
	{
		$dari= $this->input->post('dari');
		$sampai= $this->input->post('sampai');

		$data['title'] = 'Cetak Laporan';
		$data['laporan']= $this->db->query(
				"SELECT *, ag.nama_agen as nm_ag FROM transaksi trs, agen ag WHERE trs.id_agen = ag.id_agen AND date(tanggal) >= '$dari' AND date(tanggal) <= '$sampai'"
			)->result();
		$this->load->view('template_admin/admin_header', $data);
		$this->load->view('admin/print_transaksi', $data);
	}

}