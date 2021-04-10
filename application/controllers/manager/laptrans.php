<?php

class Laptrans extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('penilaian_m');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();

		$data['transaksi'] = $this->penilaian_m->tampil_agen('transaksi')->result();

		$data['title'] = 'Data Transaksi Agen';
		$this->load->view('template_admin/admin_header', $data);
		$this->load->view('manager/sidebar_manager', $data);
		$this->load->view('manager/laptrans', $data);
		$this->load->view('template_admin/admin_footer');
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
		$this->load->view('manager/print_transaksi', $data);
	}

}