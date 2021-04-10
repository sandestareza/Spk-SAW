<?php

/**
 * 
 */
class Transaksi extends CI_Controller
{
	
	function index() {
		
		$data['agen'] = $this->db->get_where('agen', array('email' => $this->session->userdata('email')))->row_array();

		$data['transaksi']	= $this->transaksi_m->tampil_data()->result();

		$data['title'] = 'Data Transaksi';
		$this->load->view('template_admin/admin_header', $data);
		$this->load->view('agen/sidebar_agen', $data);
		$this->load->view('agen/transaksi', $data);
		$this->load->view('template_admin/admin_footer');
	}

	function tambah_aksi()
	{

		$this->_rules();

		if($this->form_validation->run() == False)
		{
			$this->index();
		} else 
		{
			$data = array(

				'id_agen'=> $this->session->userdata('id_agen'),
				'omset'	 => $this->input->post('omset'),
				'j_nasabah'=> $this->input->post('j_nasabah'),
				'tanggal'	 => $this->input->post('tanggal')

			);
				
			$this->transaksi_m->tambah_data($data);
			$this->session->set_flashdata('pesan', 'ditambahkan!');
			redirect('agen/transaksi');
		}
	}

	function edit_aksi($id_transaksi)
	{

			$id_transaksi   = $this->input->post('id_transaksi');
			$tanggal   = $this->input->post('tanggal');
			$omset = $this->input->post('omset');
			$j_nasabah = $this->input->post('j_nasabah');
		
			$data 	=	array(

				'id_transaksi'	=> $id_transaksi,
				'tanggal'			=> $tanggal,
				'omset'   		=> $omset,
				'j_nasabah'   	=> $j_nasabah
			);
			$where	=	array('id_transaksi' => $id_transaksi);

		$this->transaksi_m->update_data($where,$data, 'transaksi');
		$this->session->set_flashdata('pesan', 'diedit!');
		redirect('agen/transaksi');
	}

	function hapus($id_transaksi)
	{
		
		$this->transaksi_m->hapus_data($id_transaksi);
		$this->session->set_flashdata('pesan', 'dihapus!');
		redirect('agen/transaksi');
	}

	function _rules()
	{
		$this->form_validation->set_rules('omset', 'Omset', 'trim|required', 
			array(
				'required' => 'Omset anda harus diisi!'
			));
		$this->form_validation->set_rules('j_nasabah', 'J_nasabah', 'trim|required', 
			array(
				'required' => 'Jumlah Nasabah anda harus diisi!'
			));
	}
}
