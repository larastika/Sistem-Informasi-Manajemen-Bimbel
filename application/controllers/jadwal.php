<?php
defined('BASEPATH') or exit('No direct script access allowed');

class jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Siswa_model');
    }
    public function index()
    {
        $data['title'] = 'Kelola Jadwal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jeprog'] = $this->Siswa_model->getAllprogram();

        $this->load->view('backend/template/header', $data);
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/jadwal/index', $data);
        $this->load->view('backend/template/footer');
    }

    public function listjadwal($id)
    {
        $data['title'] = 'Kelola Jadwal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jadwal'] = $this->Siswa_model->getAlljadwal($id);
        $data['id_prog'] = $id;


        $this->load->view('backend/template/header', $data);
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/jadwal/listjadwal', $data);
        $this->load->view('backend/template/footer');
    }

    function tambah($id)
    {
        $data['title'] = 'Kelola Jadwal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jeprog'] = $this->Siswa_model->getIdprogram($id);
        // var_dump($data1);
        // die;

        $this->form_validation->set_rules('jenis_program', 'jenis_program', 'required', [
            'required' => 'jenis program belum diisi!'
        ]);

        $data['mapel'] = $this->db->get_where('mapel')->result_array();
        $data['guru'] = $this->db->get_where('guru')->result_array();
        $data['hari'] = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
        $data['idprogram'] = $id;


        if ($this->form_validation->run() == false) {

            $this->load->view('backend/template/header', $data);
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/template/sidebar', $data);
            $this->load->view('backend/jadwal/tambah');
            $this->load->view('backend/template/footer');
        } else {
            $jeprog = $id;

            $mapel = $this->input->post('mapel', true);
            $guru = $this->input->post('guru', true);
            $hari = $this->input->post('hari', true);
            $jam = $this->input->post('jam', true);
            $keterangan = $this->input->post('keterangan', true);

            $data = array(
                'id_mapel' => $mapel,
                'id_guru' => $guru,
                'id_jenis_program' => $jeprog,
                'hari' => $hari,
                'jam' => $jam,
                'keterangan' => $keterangan,
            );
            $this->db->insert('jadwal', $data);
            $this->session->set_flashdata('flash', ' Berhasil Ditambahkan');
            redirect('jadwal/listjadwal/' . $id);
        }
    }

    public function edit($id, $id_prog)
    {
        $data['title'] = 'Kelola Jadwal';
        $data['user'] =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['jadwal'] = $this->Siswa_model->getAlleditjadwal($id);
        $data['mapel'] = $this->db->get_where('mapel')->result_array();
        $data['guru'] = $this->db->get_where('guru')->result_array();
        $data['hari'] = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
        $data['idprogram'] = $id;
        $this->form_validation->set_rules('mapel', 'mapel', 'required', [
            'required' => 'jenis program belum diisi!'
        ]);


        if ($this->form_validation->run() == false) {

            $this->load->view('backend/template/header', $data);
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/template/sidebar', $data);
            $this->load->view('backend/jadwal/edit');
            $this->load->view('backend/template/footer');
        } else {
            $mapel = $this->input->post('mapel', true);
            $guru = $this->input->post('guru', true);
            $hari = $this->input->post('hari', true);
            $jam = $this->input->post('jam', true);
            $keterangan = $this->input->post('keterangan', true);

            $data = array(
                'id_mapel' => $mapel,
                'id_guru' => $guru,
                'hari' => $hari,
                'jam' => $jam,
                'keterangan' => $keterangan,
            );
            $this->db->where('id', $id);
            $this->db->update('jadwal', $data);
            $this->session->set_flashdata('flash', 'Berhasil diedit');
            redirect('jadwal/listjadwal/' . $id_prog);
        }
    }

    public function hapus($id, $id_prog)
    {
        $this->db->where('id', $id);
        $this->db->delete('jadwal');
        $this->session->set_flashdata('flash', 'Berhasil Dihapus');
        redirect('jadwal/listjadwal/' . $id_prog);
    }
}
