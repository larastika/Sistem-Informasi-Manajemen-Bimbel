<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Siswa_model');
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        // mengambil data user berdasarkan email yang ada di session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('backend/template/header', $data);
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/guru/dashboard/index', $data);
        $this->load->view('backend/template/footer');
    }

    public function jadwal()
    {
        $data['title'] = 'jadwal ku';
        // mengambil data user berdasarkan email yang ada di session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['jeprog'] = $this->db->get_where('jenis_program')->result_array();
        $id_user = $data['user']['id'];
        $data['guru'] = $this->db->get_where('guru', ['id_user' => $id_user])->row_array();
        $id_guru = $data['guru']['id'];
        $data['jadmapel'] = $this->Siswa_model->getAllJadGuru($id_guru);

        $this->load->view('backend/template/header', $data);
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/guru/jadwal/index', $data);
        $this->load->view('backend/template/footer');
    }
    public function ganti_pass()
    {
        $data['title'] = 'Ganti Password';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('password1', 'Password Lama', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'password tidak sama!',
            'min_lenght' => 'password terlalu singkat!'
        ]);
        $this->form_validation->set_rules('password2', 'password2', 'required|trim|min_length[6]|matches[password1]', [
            'matches' => 'password tidak sama!',
            'min_lenght' => 'password terlalu singkat!'
        ]);
        $this->form_validation->set_rules('id_user', 'id_user', 'required');
        if ($this->form_validation->run() == false) {

            $this->load->view('backend/template/header', $data);
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/template/sidebar', $data);
            $this->load->view('backend/guru/gantipass/index', $data);
            $this->load->view('backend/template/footer');
        } else {

            $data = [
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),

            ];
            // var_dump($data);
            // die;

            $this->db->where('id', $this->input->post('id_user'));
            $this->db->update('user', $data);
            // $this->Berita_model->editDataBerita();
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="success">
            Password Berhasil Diperbarui
          </div>');
            redirect('guru');
        }
    }
}
