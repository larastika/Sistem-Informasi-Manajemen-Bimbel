<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datadiri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Datadiri_model');
    }
    public function index()
    {
        $data['title'] = 'Paket';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id =  $data['user']['id'];
        $data['siswa'] =  $this->db->get_where('siswa', ['id_user' => $id])->row_array();
        $this->load->view('backend/template/header', $data);
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/siswa/datadiri/index', $data);
        $this->load->view('backend/template/footer');
    }


    function lengkapidata()
    {
        $data['title'] = 'Data Diri';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['jeniskel'] = ['L', 'P'];


        $this->form_validation->set_rules('nama', 'nama', 'required', [
            'required' => 'nama belum diisi!'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('backend/template/header', $data);
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/template/sidebar', $data);
            $this->load->view('backend/siswa/datadiri/tambah', $data);
            $this->load->view('backend/template/footer');
        } else {
            $id_user = $this->input->post('id_user', true);
            $nama = $this->input->post('nama', true);
            $kelas = $this->input->post('kelas', true);
            $jekel = $this->input->post('jekel', true);
            $tempatlahir = $this->input->post('tempatlahir', true);
            $tanggallahir = $this->input->post('tanggallahir', true);
            $sekolah = $this->input->post('sekolah', true);
            $namaortu = $this->input->post('namaortu', true);
            $pekerjaanortu = $this->input->post('pekerjaanortu', true);
            $alamat = $this->input->post('alamat', true);

            $cek = $this->Datadiri_model->getKPendaftaran()->num_rows() + 1;
            $id_siswa = 'S-00' . $cek;
            $data = array(
                'id' => $id_siswa,
                'id_user' => $id_user,
                'nama' => $nama,
                'kelas' => $kelas,
                'jenis_kelamin' => $jekel,
                'tempat_lahir' => $tempatlahir,
                'tgl_lahir' => $tanggallahir,
                'sekolah' => $sekolah,
                'nama_ortu' => $namaortu,
                'pekerjaan_ortu' => $pekerjaanortu,
                'alamat' => $alamat,
            );
            $this->db->insert('siswa', $data);

            $data['pendaftaran'] = $this->db->get_where('pendaftaran', ['id_user' => $id_user])->row_array();
            $idpen = $data['pendaftaran']['id'];
            $data = array(
                'id_siswa' => $id_siswa,
                'id_pendaftaran' => $idpen,
                'status' => 1,
                'keterangan' => 'lunas',
            );
            $this->db->insert('siswa_pendaftaran', $data);
            $this->session->set_flashdata('flash', ' Data Siswa Berhasil Ditambahkan');
            redirect('Datadiri');
        }
    }


    public function perbarui($id)
    {
        $data['title'] = 'Data Diri';
        $data['user'] =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['siswa'] =  $this->db->get_where('siswa', ['id' => $id])->row_array();
        $data['jekel'] = ['L', 'P'];

        $this->form_validation->set_rules('nama', 'nama', 'required', [
            'required' => 'nama belum diisi!'
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('backend/template/header', $data);
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/template/sidebar', $data);
            $this->load->view('backend/siswa/datadiri/edit', $data);
            $this->load->view('backend/template/footer');
        } else {

            $nama = $this->input->post('nama', true);
            $kelas = $this->input->post('kelas', true);
            $jekel = $this->input->post('jekel', true);
            $tempatlahir = $this->input->post('tempatlahir', true);
            $tanggallahir = $this->input->post('tanggallahir', true);
            $sekolah = $this->input->post('sekolah', true);
            $namaortu = $this->input->post('namaortu', true);
            $pekerjaanortu = $this->input->post('pekerjaanortu', true);
            $alamat = $this->input->post('alamat', true);
            $data = array(

                'nama' => $nama,
                'kelas' => $kelas,
                'jenis_kelamin' => $jekel,
                'tempat_lahir' => $tempatlahir,
                'tgl_lahir' => $tanggallahir,
                'sekolah' => $sekolah,
                'nama_ortu' => $namaortu,
                'pekerjaan_ortu' => $pekerjaanortu,
                'alamat' => $alamat,
            );
            $this->db->where('id', $id);
            $this->db->update('siswa', $data);

            $this->session->set_flashdata('flash', ' Data Siswa Berhasil Diperbarui');
            redirect('Datadiri');
        }
    }
}
