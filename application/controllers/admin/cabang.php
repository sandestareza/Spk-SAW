<?php

class Cabang extends CI_Controller {

	public function index()
	{
		$data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();

		$data['cabang']	= $this->cabang_m->tampil_data()->result();
		$data['title'] = 'Data Cabang';
		$this->load->view('template_admin/admin_header', $data);
		$this->load->view('template_admin/admin_sidebar', $data);
		$this->load->view('admin/cabang', $data);
		$this->load->view('template_admin/admin_footer');
	}

	public function tambah_aksi()
	{
			$data = array(
			
				'kd_cabang'	 => $this->input->post('kd_cabang', TRUE),
				'nama_cabang'=> $this->input->post('nama_cabang', TRUE)

			);
		
			$this->cabang_m->tambah_data($data);
			$this->session->set_flashdata('pesan', 'ditambahkan!');
			redirect('admin/cabang');
	}

	public function edit_aksi($kd_cabang)
	{

			$kd_cabang   = $this->input->post('kd_cabang');
			$nama_cabang = $this->input->post('nama_cabang');
		
			$data 	=	array(
				'kd_cabang'		=> $kd_cabang,
				'nama_cabang'   => $nama_cabang
			);
			$where	=	array('kd_cabang' => $kd_cabang);

		$this->cabang_m->update_data($where,$data, 'cabang');
		$this->session->set_flashdata('pesan', 'diedit!');
		redirect('admin/cabang');
	}

	public function hapus($kd_cabang)
	{
		
		$this->cabang_m->hapus_data($kd_cabang);
		$this->session->set_flashdata('pesan', 'dihapus!');
		redirect('admin/cabang');
	}
}