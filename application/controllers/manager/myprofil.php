<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myprofil extends CI_Controller 
{	
	public function index()
	{
		$data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();

		$data['title'] = 'Myprofil';
		$this->load->view('template_admin/admin_header', $data);
		$this->load->view('manager/sidebar_manager', $data);
		$this->load->view('manager/myprofil', $data);
		$this->load->view('template_admin/admin_footer');	
	}

	public function edit_aksi()
	{

			$nama   = $this->input->post('nama');
			$email = $this->input->post('email');

			// cek gambar
			$image = $_FILES['image']['name'];

			if($image) {
				$config['upload_path'] = './assets/img/profile';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size'] = 2048;

				$this->load->library('upload', $config);

				if($this->upload->do_upload('image')) {
					$old_image = $data['user']['image'];
					// berfungsi untuk hapus file di folder
					if($old_image != 'default.png') {
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}
					$image = $this->upload->data('file_name');
					$this->db->set('image', $image);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('nama', $nama);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->set_flashdata('pesan', 'diedit!');
			redirect('manager/myprofil');
	}
}