<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Program_model');
    }
    public function index()
    {
        $data['title'] = 'Program';
        // mengambil data user berdasarkan email yang ada di session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['program'] = $this->db->get_where('tb_program')->result_array();
        // var_dump($data);
        // die;

        $this->load->view('backend/template/header', $data);
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/Program/program/index', $data);
        $this->load->view('backend/template/footer');
    }

    function tambah()
    {
        $data['title'] = 'Program';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'nama', 'required', [
            'required' => 'nama belum diisi!'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('backend/template/header', $data);
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/template/sidebar', $data);
            $this->load->view('backend/Program/program/tambah', $data);
            $this->load->view('backend/template/footer');
        } else {
            $nama = $this->input->post('nama', true);

            $data = array(
                'nama_program' => $nama,

            );
            $this->db->insert('tb_program', $data);
            $this->session->set_flashdata('flash', ' Berhasil Ditambahkan');
            redirect('program');
        }
    }


    public function edit($id)
    {
        $data['title'] = 'Program';
        $data['user'] =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['program'] =  $this->db->get_where('tb_program', ['id' => $id])->row_array();
        $this->form_validation->set_rules('nama', 'nama', 'required', [
            'required' => 'nama belum diisi!'
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('backend/template/header', $data);
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/template/sidebar', $data);
            $this->load->view('backend/Program/program/edit', $data);
            $this->load->view('backend/template/footer');
        } else {
            $nama = $this->input->post('nama', true);
            $data = [
                "nama_program" => $nama,
            ];
            $this->db->where('id', $id);
            $this->db->update('tb_program', $data);
            $this->session->set_flashdata('flash', 'Berhasil diedit');
            redirect('program');
        }
    }


    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_program');
        $this->session->set_flashdata('flash', 'Berhasil Dihapus');
        redirect('program');
    }


    ///jenis program
    public function index_JP()
    {
        $data['title'] = 'Jenis Program';
        // mengambil data user berdasarkan email yang ada di session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['jeprog'] = $this->Program_model->getAlljeprog();
        // var_dump($data);
        // die;
        $this->load->view('backend/template/header', $data);
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/Program/jenis_program/index', $data);
        $this->load->view('backend/template/footer');
    }


    function tambah_JP()
    {
        $data['title'] = 'Jenis Program';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['program'] = $this->db->get_where('tb_program')->result_array();

        $this->form_validation->set_rules('id_program', 'id_program', 'required', [
            'required' => 'id program belum diisi!'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('backend/template/header', $data);
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/template/sidebar', $data);
            $this->load->view('backend/Program/jenis_program/tambah', $data);
            $this->load->view('backend/template/footer');
        } else {
            $nama = $this->input->post('id_program', true);
            $harga = $this->input->post('harga', true);
            $kuota = $this->input->post('kuota', true);
            $data = array(
                'id_program' => $nama,
                'harga' => $harga,
                'kuota' => $kuota,
            );

            $this->db->insert('jenis_program', $data);
            $this->session->set_flashdata('flash', ' Berhasil Ditambahkan');
            redirect('program/index_JP');
        }
    }

    public function edit_JP($id)
    {
        $data['title'] = 'Jenis Program';
        $data['user'] =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['jeprog'] =  $this->db->get_where('jenis_program', ['id' => $id])->row_array();

        $data['program'] = $this->db->get_where('tb_program')->result_array();

        $this->form_validation->set_rules('id_program', 'id_program', 'required', [
            'required' => 'id program belum diisi!'
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('backend/template/header', $data);
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/template/sidebar', $data);
            $this->load->view('backend/Program/jenis_program/edit', $data);
            $this->load->view('backend/template/footer');
        } else {
            $nama = $this->input->post('id_program', true);
            $harga = $this->input->post('harga', true);
            $kuota = $this->input->post('kuota', true);
            $data = [
                'id_program' => $nama,
                'harga' => $harga,
                'kuota' => $kuota,
            ];
            $this->db->where('id', $id);
            $this->db->update('jenis_program', $data);
            $this->session->set_flashdata('flash', 'Berhasil diedit');
            redirect('program/index_JP');
        }
    }


    public function hapus_JP($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_program');
        $this->session->set_flashdata('flash', 'Berhasil Dihapus');
        redirect('program');
    }
}
