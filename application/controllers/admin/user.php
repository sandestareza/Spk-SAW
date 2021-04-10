<?php

class User extends CI_Controller {

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
		$sess_data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();

		$data['user']	= $this->user_m->tampil_data()->result();
		$data['title'] = 'Data user';
		$this->load->view('template_admin/admin_header', $data);
		$this->load->view('template_admin/admin_sidebar', $sess_data);
		$this->load->view('admin/user', $data);
		$this->load->view('template_admin/admin_footer');
	}

	public function tambah_aksi()
	{
		$image	= $_FILES['image'];
		if($image=''){}else{
			$config['upload_path'] = './assets/img/profile';//lokasi file penyimpanan foto
			$config['allowed_types'] = 'jpg|png';//format foto yg diupload
			$config['max_size'] = 2048;// ukuran foto yg diupload

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('image')){
				echo $this->upload->display_errors(); die();
			}else {
				$image=$this->upload->data('file_name');
			}
		}

		$data = array(
			
				'nama'		=> $this->input->post('nama', TRUE),
				'email'		=> $this->input->post('email', TRUE),
				'password'	=> MD5($this->input->post('password')),
				'level'		=> $this->input->post('level'),
				'blokir'	=> $this->input->post('blokir'),
				'image'		=> $image

			);

			$this->user_m->tambah_data($data,'user');
			$this->session->set_flashdata('pesan', 'ditambahkan!');
			redirect('admin/user');
	}

	public function hapus($id)
	{			
		$this->user_m->hapus_data($id);
		$this->session->set_flashdata('pesan', 'dihapus!');
		redirect('admin/user');
	}
}