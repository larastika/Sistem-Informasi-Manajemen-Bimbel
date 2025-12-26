<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Pegawai_model');
    }
    public function index()
    {
        $data['title'] = 'Pegawai';
        // mengambil data user berdasarkan email yang ada di session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['pegawai'] = $this->db->get_where('tb_pegawai')->result_array();
        $data['pegawai'] = $this->Pegawai_model->getAllpegawai();
        // var_dump($data);
        // die;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('Pegawai/index', $data);
        $this->load->view('template/footer');
    }

    function tambah()
    {
        $data['title'] = 'Pegawai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('nama', 'nama', 'required', [
            'required' => 'nama belum diisi!'
        ]);

        $data['posisi'] = $this->db->get_where('tb_posisi')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('Pegawai/tambah', $data);
            $this->load->view('template/footer');
        } else {
            $nama = $this->input->post('nama', true);
            $posisi = $this->input->post('posisi', true);

            $data['gaji_peg'] = $this->db->get_where('tb_posisi', ['id' => $posisi])->row_array();

            $gaji = $data['gaji_peg']['gaji'];
            // var_dump($gaji);
            // die;
            $data = array(
                'nama' => $nama,
                'posisi' => $posisi,
                'gajih' => $gaji,
            );
            $this->db->insert('tb_pegawai', $data);
            $this->session->set_flashdata('flash', ' Berhasil Ditambahkan');
            redirect('pegawai');
        }
    }


    public function edit($id)
    {
        $data['title'] = 'Pegawai';
        $data['user'] =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pegawai'] =  $this->db->get_where('tb_pegawai', ['id' => $id])->row_array();
        // var_dump($data1);
        // die;
        $data['posisi'] = $this->db->get_where('tb_posisi')->result_array();
        // var_dump($data1);
        // die;
        $this->form_validation->set_rules('nama', 'nama', 'required', [
            'required' => 'nama belum diisi!'
        ]);
        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('Pegawai/edit', $data);
            $this->load->view('template/footer');
        } else {
            $posisi = $this->input->post('posisi', true);

            $data['gaji_peg'] = $this->db->get_where('tb_posisi', ['id' => $posisi])->row_array();
            $gaji = $data['gaji_peg']['gaji'];
            // var_dump($gaji);
            // die;

            $data = [
                "nama" => $this->input->post('nama', true),
                "posisi" => $posisi,
                "gajih" => $gaji

            ];


            $this->db->where('id', $id);
            $this->db->update('tb_pegawai', $data);


            $this->session->set_flashdata('flash', 'Berhasil diedit');
            redirect('pegawai');
        }
    }


    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_pegawai');
        $this->session->set_flashdata('flash', 'Berhasil Dihapus');
        redirect('pegawai');
    }
}
