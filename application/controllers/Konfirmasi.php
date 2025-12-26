<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfirmasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Program_model');
    }
    public function Siswa()
    {
        $data['title'] = 'Konfirmasi Siswa';
        // mengambil data user berdasarkan email yang ada di session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['konfirmasi'] = $this->Program_model->getKonfirmasi();
        $this->load->view('backend/template/header', $data);
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/konfirmasi/konfirmasi_siswa/index', $data);
        $this->load->view('backend/template/footer');
    }

    public function Lunas()
    {
        $data['title'] = 'Konfirmasi Siswa';
        // mengambil data user berdasarkan email yang ada di session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['konfirmasi'] = $this->Program_model->getKonfirmasi();

        $kode = $_GET['kopem'];
        $idpen = $_GET['idpen'];


        if (isset($_GET['status'])) :
            $data['user'] = $this->Program_model->getUser($kode);
            $id_user =   $data['user']['idusr'];

            $data = [
                "status" => 1,
            ];
            $this->db->where('id', $kode);
            $this->db->update('pembayaran', $data);
            $data = [
                "is_active" => 0,
            ];

            $this->db->where('id', $id_user);
            $this->db->update('user', $data);

            $data = [
                "status" => 0,
            ];
            $this->db->where('id_user', $id_user);
            $this->db->update('pendaftaran', $data);

            $kuota = $this->Program_model->getkuota($idpen);
            $idprogram = $kuota['idprog'];
            $kuotakonfirm = $kuota['kuota'] + 1;
            $data = [
                "kuota" => $kuotakonfirm,
            ];

            $this->db->where('id_program', $idprogram);
            $this->db->update('jenis_program', $data);

        else :
            $data['user'] = $this->Program_model->getUser($kode);
            $id_user =   $data['user']['idusr'];
            $data = [
                "status" => 2,
            ];
            $this->db->where('id', $kode);
            $this->db->update('pembayaran', $data);


            $data = [
                "is_active" => 1,
            ];
            $this->db->where('id', $id_user);
            $this->db->update('user', $data);

            $data = [
                "status" => 1,
            ];
            $this->db->where('id_user', $id_user);
            $this->db->update('pendaftaran', $data);

            $kuota = $this->Program_model->getkuota($idpen);
            $idprogram = $kuota['idprog'];
            $kuotakonfirm = $kuota['kuota'] - 1;
            $data = [
                "kuota" => $kuotakonfirm,
            ];

            $this->db->where('id_program', $idprogram);
            $this->db->update('jenis_program', $data);

        endif;

        redirect('Konfirmasi/siswa');
    }


    //guru
    public function guru()
    {
        $data['title'] = 'Konfirmasi Guru';
        // mengambil data user berdasarkan email yang ada di session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['konfirmasiguru'] = $this->Program_model->getKonGuru();
        $this->load->view('backend/template/header', $data);
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/konfirmasi/konfirmasi_guru/index', $data);
        $this->load->view('backend/template/footer');
    }


    public function status()
    {
        $data['title'] = 'Konfirmasi Guru';
        // mengambil data user berdasarkan email yang ada di session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['konfirmasi'] = $this->Program_model->getKonfirmasi();

        $id_user = $_GET['id_user'];

        if (isset($_GET['status']) == 1) {
            $data = [
                "is_active" => 0,
            ];
            $this->db->where('id', $id_user);
            $this->db->update('user', $data);
        } else {
            $data = [
                "is_active" => 1,
            ];
            $this->db->where('id', $id_user);
            $this->db->update('user', $data);
        }

        // if (isset($_GET['status']) == 0) {
        // }

        redirect('Konfirmasi/guru');
    }

    public function hapus()
    {
        $idpem = $_GET['kopem'];
        $idpen = $_GET['idpen'];
        $iduser = $_GET['iduser'];


        $this->db->where('id', $idpem);
        $this->db->delete('pembayaran');

        $this->db->where('id', $idpen);
        $this->db->delete('pendaftaran');

        $this->db->where('id_user', $iduser);
        $this->db->delete('siswa');

        $data['siswa_pen'] = $this->db->get_where('siswa_pendaftaran', ['id_pendaftaran' => $idpen])->row_array();
        $id_siswa = $data['siswa_pen']['id_siswa'];
        $this->db->where('id_siswa', $id_siswa);
        $this->db->delete('siswa_pendaftaran');

        $this->db->where('id', $iduser);
        $this->db->delete('user');


        $this->session->set_flashdata('flash', 'Berhasil Dihapus');
        redirect('konfirmasi/siswa');
    }

    public function hapusguru()
    {
        $id_user = $_GET['id_user'];
        $id_guru = $_GET['id_guru'];



        $this->db->where('id', $id_guru);
        $this->db->delete('guru');

        $this->db->where('id', $id_user);
        $this->db->delete('user');

        $this->db->where('id_guru', $id_guru);
        $this->db->delete('jadwal');

        $this->session->set_flashdata('flash', 'Berhasil Dihapus');
        redirect('konfirmasi/guru');
    }
}
