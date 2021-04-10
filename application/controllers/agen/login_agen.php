<?php

class Login_agen extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('agen/main/');
	}

	public function proses_ganti()
	{
		$pass_new	    =$this->input->post('pass_new');
		$ulang_pass		=$this->input->post('ulang_pass');
		
		$data['agen'] = $this->db->get_where('agen', array(
			'id_agen' => $this->session->userdata('id_agen')))->row_array();
			
			$data = array('password' =>MD5($pass_new));
			$id = array('id_agen' => $this->session->userdata('id_agen'));
			$this->m_login->update_pass($id, $data, 'agen');
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					Password anda berhasil diganti. Silahkan login kembali!</div>');
			redirect('agen/main');
		}
}