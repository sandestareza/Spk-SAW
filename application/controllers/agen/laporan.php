<?php


class Laporan extends CI_Controller 
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('penilaian_m');
	}

	public function index()
	{	
		$dari= $this->input->post('dari');
		$sampai= $this->input->post('sampai');

		$this->_rules();
		if($this->form_validation->run() == FALSE){

			$data['agen'] = $this->db->get_where('agen', array('email' => $this->session->userdata('email')))->row_array();
			$data['title'] = 'Laporan Reward Agen';
			$this->load->view('template_admin/admin_header', $data);
			$this->load->view('agen/sidebar_agen',$data);
			$this->load->view('agen/laporan');
			$this->load->view('template_admin/admin_footer');
		} else {
			$data['agen'] = $this->db->get_where('agen', array('email' => $this->session->userdata('email')))->row_array();			
			$data['c1max'] = $this->penilaian_m->get_maxC1();
			$data['c2max'] = $this->penilaian_m->get_maxC2();
			$data['c3max'] = $this->penilaian_m->get_maxC3();

			$data['bobotc1'] = $this->penilaian_m->get_bobotc1();
			$data['bobotc2'] = $this->penilaian_m->get_bobotc2();
			$data['bobotc3'] = $this->penilaian_m->get_bobotc3();
			$data['title'] = 'Laporan';
			$data['laporan']= $this->db->query(
				"SELECT *, ag.nama_agen as nm_ag, sk.bobot as b1, sb.bobot as b2, st.bobot as b3 FROM nilai n, agen ag, subkriteria sk, subkriteria sb, subkriteria st WHERE n.id_agen = ag.id_agen AND n.C1 = sk.id_subkriteria AND n.C2 = sb.id_subkriteria AND n.C3 = st.id_subkriteria AND date(tanggal) >= '$dari' AND date(tanggal) <= '$sampai'"
			)->result_array();

			$this->load->view('template_admin/admin_header', $data);
			$this->load->view('agen/sidebar_agen', $data);
			$this->load->view('agen/tampil_laporan', $data);
			$this->load->view('template_admin/admin_footer');
		}
		
	}

	public function _rules()
	{
		$this->form_validation->set_rules('dari', 'Dari Tanggal', 'trim|required', 
			array(
				'required' => 'Darii tanggl harus diisi!'
			));
		$this->form_validation->set_rules('sampai', 'Sampai Tanggal', 'trim|required', 
			array(
				'required' => 'Sampai tanggal harus diisi!'
			));
	}
}