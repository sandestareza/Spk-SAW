<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myprofil extends CI_Controller 
{		
	public function __construct()
	{
		parent::__construct();

	}
	public function index()
	{
		$data['agen'] = $this->db->get_where('agen', array('email' => $this->session->userdata('email')))->row_array();

		$data['omset']	= $this->transaksi_m->total_omset();
		$data['nasabah']	= $this->transaksi_m->jum_nasabah();
		$data['title'] = 'Myprofil';
		$this->load->view('template_admin/admin_header', $data);
		$this->load->view('agen/sidebar_agen', $data);
		$this->load->view('agen/myprofil', $data);
		$this->load->view('template_admin/admin_footer');	
	}

	public function edit_aksi()
	{

			$id_agen   = $this->input->post('id_agen');
			$nama_agen   = $this->input->post('nama_agen');
			$jk   = $this->input->post('jk');
			$email = $this->input->post('email');
			$alamat = $this->input->post('alamat');
			$no_hp = $this->input->post('no_hp');
			$kd_cabang = $this->input->post('kd_cabang');

			// cek gambar
			$foto = $_FILES['foto']['name'];

			if($foto) {
				$config['upload_path'] = './assets/img/profile';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size'] = 2048;

				$this->load->library('upload', $config);

				if($this->upload->do_upload('foto')) {
					$old_foto = $data['agen']['foto'];
					if($old_foto != 'default.png') {
						unlink(FCPATH . 'assets/img/profile/' . $old_foto);
					}
					$foto = $this->upload->data('file_name');
					$this->db->set('foto', $foto);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('nama_agen', $nama_agen);
			$this->db->set('jk', $jk);
			$this->db->set('alamat', $alamat);
			$this->db->set('no_hp', $no_hp);
			$this->db->where('id_agen', $id_agen);
			$this->db->update('agen');

			$this->session->set_flashdata('pesan', 'diedit!');
			redirect('agen/myprofil');
	}
}