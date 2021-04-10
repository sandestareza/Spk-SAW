<?php

class Unit extends CI_Controller {

	public function index()
	{
		$data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();
		
		$data['unit']  = $this->unit_m->tampil_data('unit')->result();
		$data['title'] = 'Data Unit';
		$this->load->view('template_admin/admin_header', $data);
		$this->load->view('template_admin/admin_sidebar', $data);
		$this->load->view('admin/unit', $data);
		$this->load->view('template_admin/admin_footer');
	}
	public function tambah_aksi()
	{
			$data = array(
			
				'kd_unit'	 => $this->input->post('kd_unit', TRUE),
				'kd_cabang'	 => $this->input->post('kd_cabang', TRUE),
				'nama_unit'=> $this->input->post('nama_unit', TRUE)

			);
		
			$this->unit_m->tambah_data($data);
			$this->session->set_flashdata('pesan', 'ditambahkan!');
			redirect('admin/unit');
	}

	public function edit_aksi($kd_unit)
	{

			$kd_unit   = $this->input->post('kd_unit');
			$kd_cabang   = $this->input->post('kd_cabang');
			$nama_unit = $this->input->post('nama_unit');
		
			$data 	=	array(
				'kd_cabang'	  => $kd_cabang,
				'nama_unit'   => $nama_unit
			);
			$where	=	array('kd_unit' => $kd_unit);

		$this->unit_m->update_data($where,$data, 'unit');
		$this->session->set_flashdata('pesan', 'diedit!');
		redirect('admin/unit');
	}

	public function hapus($kd_unit)
	{
		
		$this->unit_m->hapus_data($kd_unit);
		$this->session->set_flashdata('pesan', 'dihapus!');
		redirect('admin/unit');
	}
}