<?php

/**
 * 
 */
class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		//jika memang sudah login
		if ($this->login_model->is_logged_in())
		{
			//jika sudah login bukan admin
			if ($this->login_model->level()!= "admin"){
			redirect('manager/dashboard');
		} else {
			
			redirect('admin/dashboard');
		}
		} else {

			$data['title'] = 'Login';
			$this->load->view('template_admin/admin_header', $data);
			$this->load->view('admin/login');
			$this->load->view('template_admin/admin_footer');
		}
		
	}

	public function proses_login()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', 
			array(
				'required' => 'Email harus diisi!',
				'valid_email' => 'Email dimasukan harus sesuai dengan format email!'
			));
		$this->form_validation->set_rules('password', 'Password', 'trim|required',
			array(
				'required' => 'Password harus diisi!'
			));

		if($this->form_validation->run() == false)
		{
			$data['title'] = 'Login';
			$this->load->view('template_admin/admin_header', $data);
			$this->load->view('admin/login');
			$this->load->view('template_admin/admin_footer');
		} else 
			{
				$email		= $this->input->post('email');
				$password	= $this->input->post('password');
				$image 		='default.png';

				$email 	= $email;
				$pass 	= MD5($password);

				$cek	= $this->login_model->cek_login($email, $pass);

				if($cek->num_rows() > 0) 
				{
					foreach ($cek->result() as $ck) 
					{
						$sess_data['email']		= $ck->email;
						$sess_data['nama']		= $ck->nama;
						$sess_data['level']		= $ck->level;
						$sess_data['blokir']	= $ck->blokir;
						$sess_data['image']		= $ck->image;

						$this->session->set_userdata($sess_data);
					}

					if($sess_data['blokir'] == 'N')
					{

						if ($sess_data['level'] == 'admin') {

							redirect('admin/dashboard');

						} else {

							redirect('manager/dashboard');

							}
						
					} else 
						{
							$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
								Maaf Username dan Password tidak aktif</div>');
							redirect('auth');
						}
				} else 
					{
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
								Maaf Username dan Password anda salah!</div>');
						redirect('auth');
					}
					
			} 
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

	public function ganti_password()
	{
		if(!$this->session->userdata('email'))
		{
			redirect('auth');
		}

		$data['title'] = 'Ganti password';
		$this->load->view('template_admin/admin_header', $data);
		$this->load->view('ganti_password');
		$this->load->view('template_admin/admin_footer');
	}
	public function proses_ganti()
	{
		$pass_new	    =$this->input->post('pass_new');
		$ulang_pass		=$this->input->post('ulang_pass');

		$this->form_validation->set_rules('pass_new', 'Password baru',
				'required|matches[ulang_pass]|min_length[5]',
			array(
				'required' => 'Password baru harus diisi!',
				'matches'  => 'Password baru harus sama dengan Ulangi password',
				'min_length'=>'Password anda kuarang panjang'
				  ));

		$this->form_validation->set_rules('ulang_pass', 'Ualngi password',
				'required',
			array(
				'required' => 'Ulangi password harus diisi!'
				  ));
		
		$data['user'] = $this->db->get_where('user', array(
			'email' => $this->session->userdata('email')))->row_array();
			
		$data['title'] = 'Ganti password';
		
		if($this->form_validation->run() == false){
			$this->load->view('template_admin/admin_header', $data);
			$this->load->view('ganti_password', $data);
			$this->load->view('template_admin/admin_footer');
		} else{
			$data = array('password' =>MD5($pass_new));

			$id = array('email' => $this->session->userdata('email'));
			$this->login_model->update_pass($id, $data, 'user');
			$this->session->set_flashdata('msg', 'diganti!');
			redirect('auth/ganti_password');
		}

	}

}	

