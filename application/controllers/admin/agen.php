<?php

class Agen extends CI_Controller {

	public function index()
	{
		$data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();
		
		$data['agen']  = $this->agen_m->tampil_data('agen')->result();
		$data['title'] = 'Data Agen';
		$this->load->view('template_admin/admin_header', $data);
		$this->load->view('template_admin/admin_sidebar', $data);
		$this->load->view('admin/agen', $data);
		$this->load->view('template_admin/admin_footer');
	}

	public function tambah()
	{


		$data = array(
		 	'id_agen'		=> set_value('id_agen'),
		 	'nama_agen'		=> set_value('nama_agen'),
		 	'jk'			=> set_value('jk'),
				'alamat'		=> set_value('alamat'),
				'kd_cabang'		=> set_value('kd_cabang'),
				'kd_unit'		=> set_value('kd_unit'),
				'no_hp'			=> set_value('no_hp'),
				'foto'			=> set_value('foto'),
				'email'			=> set_value('email'),
				'password'			=> set_value('password'),
				'blokir'			=> set_value('blokir')

		);

		$data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();
		$data['cabang']=$this->agen_m->fetch_cabang();
		$data['title'] = 'Tambah Agen';
		$this->load->view('template_admin/admin_header', $data);
		$this->load->view('template_admin/admin_sidebar', $data);
		$this->load->view('admin/agen_tambah', $data);
		$this->load->view('template_admin/admin_footer');
	}

	function fetch_unit()
	{
		if($this->input->post('kd_cabang'))
		{
			echo $this->agen_m->fetch_unit($this->input->post('kd_cabang'));
		}
	}

	public function tambah_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == False)
		{
			$this->tambah();
		} else 
		{
			$foto = $_FILES['foto'];
				if($foto=''){}else{
					$config['upload_path'] = './assets/img/profile';
					$config['allowed_types'] = 'jpg|png';
					$config['max_size'] = 2048;
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('foto')){
						echo $this->upload->display_errors(); die();
					}else {
						$foto = $this->upload->data('file_name');
					}
				}
			$cabang		= $this->input->post('cabang');
			$unit		= $this->input->post('unit');
			$data = array(
			
				'id_agen'	 	=> $this->input->post('id_agen', TRUE),
				'nama_agen'		=> $this->input->post('nama_agen', TRUE),
				'jk'			=> $this->input->post('jk'),
				'alamat'		=> $this->input->post('alamat'),
				'no_hp'			=> $this->input->post('no_hp'),
				'email'			=> $this->input->post('email'),
				'password'		=> MD5($this->input->post('password')),
				'blokir'		=> $this->input->post('blokir'),
				'foto'			=> $foto
			);

			$this->db->set('kd_cabang', $cabang);
			$this->db->set('kd_unit', $unit);
			$this->agen_m->tambah_data($data);
			$this->session->set_flashdata('pesan', 'ditambahkan!');
			redirect('admin/agen');
		}
	}

	public function edit($id_agen)
	{
		$data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();
		
		$where = array('id_agen' => $id_agen);
		$data['agen'] = $this->agen_m->edit($where, 'agen')->result();
		$data['cabang']=$this->agen_m->fetch_cabang();
		$data['title'] = 'Edit Agen';
		$this->load->view('template_admin/admin_header', $data);
		$this->load->view('template_admin/admin_sidebar', $data);
		$this->load->view('admin/agen_edit', $data);
		$this->load->view('template_admin/admin_footer');
	}
		
	public function edit_aksi()
	{
			$cabang		= $this->input->post('cabang');
			$unit		= $this->input->post('unit');
			$id_agen	 	= $this->input->post('id_agen');
			$nama_agen		= $this->input->post('nama_agen');
			$jk			= $this->input->post('jk');
			$alamat		= $this->input->post('alamat');
			$no_hp		= $this->input->post('no_hp');
			$email		= $this->input->post('email');
			$password	= MD5($this->input->post('password'));
			$blokir		= $this->input->post('blokir');
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

			$data = array(
				'id_agen' => $id_agen,
				'nama_agen' => $nama_agen,
				'jk' => $jk,
				'alamat' => $alamat,
				'no_hp' => $no_hp,
				'email' => $email,
				'password' => $password,
				'blokir' => $blokir
				
			);

		$where	=	array('id_agen' => $id_agen);

		$this->db->set('kd_cabang', $cabang);
		$this->db->set('kd_unit', $unit);
		$this->agen_m->update_data($where,$data, 'agen');
		$this->session->set_flashdata('pesan', 'diedit!');
		redirect('admin/agen');
		
	}

	public function hapus($id_agen)
	{
		
		$this->agen_m->hapus_data($id_agen);
		$this->session->set_flashdata('pesan', 'dihapus!');
		redirect('admin/agen');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('id_agen', 'id_agen', 'trim|required|max_length[12]', 
			array(
				'required' => 'Id Agen harus diisi!',
				'max_length' => 'Maaf Id Agen terlalu panjang! MAX 12'
			));
		$this->form_validation->set_rules('nama_agen', 'nama_agen', 'trim|required', 
			array(
				'required' => 'Nama agen harus diisi!'
			));
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required', 
			array(
				'required' => 'Alamat agen harus diisi!'
			));
		$this->form_validation->set_rules('no_hp', 'no_hp', 'trim|required', 
			array(
				'required' => 'No. Hp agen harus diisi!'
			));
		$this->form_validation->set_rules('email', 'email', 'trim|required', 
			array(
				'required' => 'Email agen harus diisi!'
			));
		$this->form_validation->set_rules('password', 'password', 'trim|required', 
			array(
				'required' => 'Password agen harus diisi!'
			));
	}

	public function cetak()
	{
		$data['agen']  = $this->agen_m->tampil_data('agen')->result();

		$this->load->view('admin/print_agen', $data);
	}
}