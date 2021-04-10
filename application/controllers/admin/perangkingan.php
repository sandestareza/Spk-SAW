<?php

class Perangkingan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('penilaian_m');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();

		$data['nilai'] = $this->penilaian_m->tampil_penilaian()->result();
		$data['rating'] = $this->penilaian_m->tampil_rating()->
						  result_array();
		/*Ambil model nilai max*/
		$data['c1max'] = $this->penilaian_m->get_maxC1();
		$data['c2max'] = $this->penilaian_m->get_maxC2();
		$data['c3max'] = $this->penilaian_m->get_maxC3();

		$data['bobotc1'] = $this->penilaian_m->get_bobotc1();
		$data['bobotc2'] = $this->penilaian_m->get_bobotc2();
		$data['bobotc3'] = $this->penilaian_m->get_bobotc3();

		$data['title'] = 'Proses SPK';
		$this->load->view('template_admin/admin_header', $data);
		$this->load->view('template_admin/admin_sidebar', $data);
		$this->load->view('admin/perangkingan', $data);
		$this->load->view('template_admin/admin_footer');
	}

}