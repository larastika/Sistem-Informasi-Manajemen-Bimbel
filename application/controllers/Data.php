<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Siswa_model');
    }
    public function index()
    {
        $data['title'] = 'Data Guru';
        // mengambil data user berdasarkan email yang ada di session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['guru'] =  $this->db->get_where('guru')->result_array();

        $this->load->view('backend/template/header', $data);
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/data/guru', $data);
        $this->load->view('backend/template/footer');
    }

    public function siswa()
    {
        $data['title'] = 'Data Siswa';
        // // mengambil data user berdasarkan email yang ada di session
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['siswa'] = $this->Siswa_model->getsiswa();

        // $this->load->view('backend/template/header', $data);
        // $this->load->view('backend/template/topbar', $data);
        // $this->load->view('backend/template/sidebar', $data);
        // $this->load->view('backend/data/siswa', $data);
        // $this->load->view('backend/template/footer');


        // var_dump($kelas);
        // die;
        $thn = $this->input->post('th');
        $bln = $this->input->post('bln');
        $kelas = $this->input->post('kelas');

        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        if (empty($thn) || empty($bln)  || empty($thn)) {
            $thn = $this->input->post('th');
            $bln = $this->input->post('bln');
            $kelas = $this->input->post('kelas');
            $data['list_th'] = $this->Siswa_model->getTahun();
            $data['list_bln'] = $this->Siswa_model->getBln();
            $data['program'] =  $this->db->get_where('tb_program')->result_array();

            $data['blnnya'] = $bln;
            $data['thn'] = $thn;
            $data['kelasnya'] = $kelas;
            $this->load->view('backend/template/header', $data);
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/template/sidebar', $data);
            $this->load->view('backend/data/siswa', $data);
            $this->load->view('backend/template/footer');
        } else {
            $thn = $this->input->post('th');
            $bln = $this->input->post('bln');

            $kelas = $this->input->post('kelas');
            if ($kelas != '') {
                $kelas = $kelas;
            } else {
                $kelas = 100;
            }
            // var_dump($kelas);
            // die;
            $data['user'] =  $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();
            $data['list_th'] = $this->Siswa_model->getTahun();
            $data['list_bln'] = $this->Siswa_model->getBln();
            $data['program'] =  $this->db->get_where('tb_program')->result_array();

            $data['blnnya'] = $bln;
            $data['thn'] = $thn;
            $data['kelasnya'] = $kelas;


            $thnpilihan1 = $thn . '-' . '0' . $bln . '-' . '01';
            $thnpilihan2 = $thn . '-' . '0' . $bln . '-' . '31';

            $data['siswa'] = $this->Siswa_model->getsiswa($thnpilihan1, $thnpilihan2, $kelas);

            ///
            $data['list_th'] = $this->Siswa_model->getTahun();
            $data['list_bln'] = $this->Siswa_model->getBln();

            $this->load->view('backend/template/header', $data);
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/template/sidebar', $data);
            $this->load->view('backend/data/siswa', $data);
            $this->load->view('backend/template/footer');
        }
    }

    public function reset_password()
    {
        $id_user = $_GET['id_user'];
        $password = 123456;
        $data = [
            "password" => password_hash($password, PASSWORD_DEFAULT)
        ];

        $this->db->where('id', $id_user);
        $this->db->update('user', $data);

        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="success">
            password berhasil direset!!
          </div>');
        redirect('data/siswa');
    }

    public function reset_gpassword()
    {
        $id_user = $_GET['id_user'];
        $password = 123456;
        $data = [
            "password" => password_hash($password, PASSWORD_DEFAULT)
        ];

        $this->db->where('id', $id_user);
        $this->db->update('user', $data);

        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="success">
            password berhasil direset!!
          </div>');
        redirect('data');
    }

    public function cetak_guru()
    {

        $this->load->library('mypdf');
        $data['guru'] =  $this->db->get_where('guru')->result_array();
        $this->mypdf->generate('backend/data/cetak_guru.php', $data);
    }

    public function cetak_siswa($thn, $bln, $kelas)
    {
        $this->load->library('mypdf');
        $thnpilihan1 = $thn . '-' . '0' . $bln . '-' . '01';
        $thnpilihan2 = $thn . '-' . '0' . $bln . '-' . '31';
        $data['siswa'] = $this->Siswa_model->getsiswa($thnpilihan1, $thnpilihan2, $kelas);
        $this->mypdf->generate('backend/data/cetak_siswa.php', $data);
    }
}
