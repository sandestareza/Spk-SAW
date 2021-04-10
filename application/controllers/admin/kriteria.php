<?php

class Kriteria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//cek session yang login
		if ($this->login_model->level()!= "admin"){
			redirect("auth/");
		}
		
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();

		$data['kriteria']	= $this->kriteria_m->tampil_data()->result();
		$data['subkriteria']	= $this->subkriteria_m->tampil_data()->result();
		$data['title'] = 'Data Kriteria';
		$this->load->view('template_admin/admin_header', $data);
		$this->load->view('template_admin/admin_sidebar', $data);
		$this->load->view('admin/kriteria', $data);
		$this->load->view('template_admin/admin_footer');
	}


	public function tambah_aksi()
	{
			$data = array(
			
				'kd_kriteria'	=> $this->input->post('kd_kriteria'),
				'ket'			=> $this->input->post('ket'),
				'bobot'			=> $this->input->post('bobot'),
				'attribut'		=> $this->input->post('attribut')

			);
		
			$this->kriteria_m->tambah_data($data);
			$this->session->set_flashdata('pesan', 'ditambahkan!');
			redirect('admin/kriteria');
		

	}

	public function edit($kd_kriteria)
	{
		$data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();

		$where = array('kd_kriteria' => $kd_kriteria);
		$data['kriteria'] = $this->kriteria_m->edit_data($where, 'kriteria')->result();

		$data['title'] = 'Edit Kriteria';
		$this->load->view('template_admin/admin_header', $data);
		$this->load->view('template_admin/admin_sidebar', $data);
		$this->load->view('admin/kriteria_edit', $data);
		$this->load->view('template_admin/admin_footer');

	}

	public function edit_aksi()
	{

			$kd_kriteria   = $this->input->post('kd_kriteria');
			$ket = $this->input->post('ket');
			$bobot = $this->input->post('bobot');
			$attribut = $this->input->post('attribut');
		
			$data 	=	array(
				'kd_kriteria'		=> $kd_kriteria,
				'ket'   			=> $ket,
				'bobot'   			=> $bobot,
				'attribut'   		=> $attribut

			);
			

			$where	=	array('kd_kriteria' => $kd_kriteria);
		
		$this->kriteria_m->update_data($where, $data, 'kriteria');
		$this->session->set_flashdata('pesan', 'diedit!');
		redirect('admin/kriteria');
	}

	public function hapus($kd_kriteria)
	{
		
		$this->kriteria_m->hapus_data($kd_kriteria);
		$this->session->set_flashdata('pesan', 'dihapus!');
		redirect('admin/kriteria');
	}

	public function tambah_sub()
	{
			$data = array(
			
				'kd_kriteria'	=> $this->input->post('kd_kriteria'),
				'ket_sub'		=> $this->input->post('ket_sub'),
				'bobot'			=> $this->input->post('bobot')
			);
		
			$this->subkriteria_m->tambah_data($data);
			$this->session->set_flashdata('pesan', 'ditambahkan!');
			redirect('admin/kriteria');
	}

	public function edit_sub($id_subkriteria)
	{
		$data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();

		$where = array('id_subkriteria' => $id_subkriteria);
		$data['kriteria']	= $this->kriteria_m->tampil_data()->result();
		$data['subkriteria'] = $this->subkriteria_m->edit_data($where, 
			'subkriteria')->result();

		$data['title'] = 'Edit SubKriteria';
		$this->load->view('template_admin/admin_header', $data);
		$this->load->view('template_admin/admin_sidebar', $data);
		$this->load->view('admin/subkriteria_edit', $data);
		$this->load->view('template_admin/admin_footer');

	}

	public function sub_aksi()
	{

			$id_subkriteria   = $this->input->post('id_subkriteria');
			$kd_kriteria   = $this->input->post('kd_kriteria');
			$ket_sub = $this->input->post('ket_sub');
			$bobot = $this->input->post('bobot');
		
			$data 	=	array(
				'id_subkriteria'		=> $id_subkriteria,
				'kd_kriteria'		=> $kd_kriteria,
				'ket_sub'   		=> $ket_sub,
				'bobot'   			=> $bobot
			);
			

			$where	=	array('id_subkriteria' => $id_subkriteria);
		
		$this->subkriteria_m->update_data($where, $data, 'subkriteria');
		$this->session->set_flashdata('pesan', 'diedit subkriteria!');
		redirect('admin/kriteria');
	}

	public function del_sub($id_subkriteria)
	{
		
		$this->subkriteria_m->hapus_data($id_subkriteria);
		$this->session->set_flashdata('pesan', 'dihapus subkriteria!');
		redirect('admin/kriteria');
	}

}