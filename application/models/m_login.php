<?php

/**
 * 
 */
class M_login extends CI_Model
{

	public function cek_login($email, $password)
	{
		$this->db->where("email", $email);
		$this->db->where("password", $password);
		return $this->db->get('agen');
	}

	public function getLoginData($email, $pass)
	{
		$e 	= $email;
		$p 	= MD5($pass);

		$query_cekLogin 	= $this->db->get_where('agen', array(
			'email'    => $e,
			'password' => $p
		));

		if (count($query_cekLogin->result()) > 0) {
			foreach ($query_cekLogin->result() as $qck) {
				foreach ($query_cekLogin->result() as $qck) {
					$sess_agen ['logged_in'] = true;
					$sess_agen ['id_agen']  	 = $ck->id_agen;
					$sess_agen ['nama_agen']  	 = $ck->nama_agen;
					$sess_agen ['email']  	 = $ck->email;
					$sess_agen ['password']  = $ck->password;
					$sess_agen ['foto']    = $ck->foto;
					$sess_agen ['jk']			= $ck->jk;
					$sess_agen ['blokir']    = $ck->blokir;


					$this->session->set_userdata($sess_agen);
				}

				redirect('agen/myprofil');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
								Maaf Email dan Password salah</div>');
			redirect('agen/login_agen');
		}
	}

	public function update_pass($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}