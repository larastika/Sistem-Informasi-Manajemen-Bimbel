<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Dashboard';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


		$this->db->from('siswa');
		$data['jumsis'] = $this->db->count_all_results();


		$this->db->like('status', '1');
		$this->db->from('pembayaran');
		$data['belumkonfirm'] = $this->db->count_all_results();



		$this->db->from('guru');
		$data['jum_gur'] = $this->db->count_all_results();

		$this->load->view('backend/template/header', $data);
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/template/sidebar', $data);
		$this->load->view('backend/admin/index', $data);
		$this->load->view('backend/template/footer');
	}
}
