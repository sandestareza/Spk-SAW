<?php

class Main extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
			$data['title'] = 'Beranda';
			$this->load->view('template_admin/admin_header', $data);
			$this->load->view('agen/main', $data);
			$this->load->view('template_admin/admin_footer');
	}

	public function proses_login()
	{

				$email		= $this->input->post('email');
				$password	= $this->input->post('password');

				$email 	= $email;
				$pass 	= MD5($password);

				$cek	= $this->m_login->cek_login($email, $pass);

				if($cek->num_rows() > 0) 
				{
					foreach ($cek->result() as $ck) 
					{
						$sess_agen['id_agen']		= $ck->id_agen;
						$sess_agen['email']			= $ck->email;
						$sess_agen['nama_agen']		= $ck->nama;
						$sess_agen['foto']			= $ck->foto;
						$sess_agen['jk']			= $ck->jk;
						$sess_agen['blokir']		= $ck->blokir;


						$this->session->set_userdata($sess_agen);
					}

					if($sess_agen['blokir'] == 'N')
					{

							redirect('agen/myprofil');
											
					} else 
						{
							$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
								Maaf Email dan Password anda diblokir!</div>');
							redirect('agen/main');
						}
				} else 
					{
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
								Maaf Email dan Password anda salah!</div>');
						redirect('agen/main');
					}
	}
}