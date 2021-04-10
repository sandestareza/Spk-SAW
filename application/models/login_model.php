<?php

/**
 * 
 */
class Login_model extends CI_Model
{
	//fungsi cek login 
	function is_logged_in()
	{
		return $this->session->userdata('email');
	}

	function level()
	{
		return $this->session->userdata('level');
	}
			
	public function cek_login($email, $password)
	{
		$this->db->where("email", $email);
		$this->db->where("password", $password);
		return $this->db->get('user');
	}

	public function getLoginData($email, $pass)
	{
		$e 	= $email;
		$p 	= MD5($pass);

		$query_cekLogin 	= $this->db->get_where('user', array(
			'email'    => $e,
			'password' => $p
		));

		if (count($query_cekLogin->result()) > 0) {
			foreach ($query_cekLogin->result() as $qck) {
				foreach ($query_cekLogin->result() as $qck) {
					$sess_data ['logged_in'] = true;
					$sess_data ['email']  	 = $ck->email;
					$sess_data ['password']  = $ck->password;
					$sess_data ['level']     = $ck->level;
					$sess_data ['blokir']    = $ck->blokir;


					$this->session->set_userdata($sess_data);
				}

				redirect('admin/dashboard');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
								Maaf Username dan Password salah</div>');
			redirect('auth');
		}
	}

	public function update_pass($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}