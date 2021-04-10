<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//cek session yang login
		if ($this->login_model->level()!= "admin"){
			redirect("auth/");
		}
		$this->load->model('penilaian_m');
		
	}
	
	public function index()
	{
		$data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();
		
		$data['kriteria']	= $this->kriteria_m->tampil_data()->result();
		$data['agen']	= $this->agen_m->agen_donat();
		$data['bykkriteria']	= $this->kriteria_m->banyak_data();
		$data['bykagen']	= $this->agen_m->banyak_data();
		$data['tot_transaksi']	= $this->transaksi_m->total_transaksi();
		$data['tot_nasabah']	= $this->transaksi_m->total_nasabah();
		$data['transaksi']	= $this->transaksi_m->chart_omset();

		$data['rating'] = $this->penilaian_m->tampil_rating()->
						  result_array();
		$data['c1max'] = $this->penilaian_m->get_maxC1();
		$data['c2max'] = $this->penilaian_m->get_maxC2();
		$data['c3max'] = $this->penilaian_m->get_maxC3();
		
		$data['bobotc1'] = $this->penilaian_m->get_bobotc1();
		$data['bobotc2'] = $this->penilaian_m->get_bobotc2();
		$data['bobotc3'] = $this->penilaian_m->get_bobotc3();

		$data['title'] = 'Dashboard';
		$this->load->view('template_admin/admin_header', $data);
		$this->load->view('template_admin/admin_sidebar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('template_admin/admin_footer');
		$this->load->view('template_admin/chart');
		$this->load->view('template_admin/chartdonat');
		$this->load->view('template_admin/chartomset');
	}
}
