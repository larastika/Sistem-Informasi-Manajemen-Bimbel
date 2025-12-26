<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Siswa_model');
        $this->load->model('Frontend_model');
    }
    public function index()
    {
        $data['jeprog'] = $this->Siswa_model->getAllprogram();

        $this->load->view('frontend/template/header');
        $this->load->view('frontend/home/index', $data);
        $this->load->view('frontend/template/footer');

        // $this->load->view('backend/template/header');
        // $this->load->view('frontend/paket/index', $data);
        // $this->load->view('backend/template/footer');
    }

    // public function registrasi($id)
    // {

    //     // mengambil data user berdasarkan email yang ada di session

    //     // $data['jeprog'] = $this->db->get_where('jenis_program')->result_array();
    //     // var_dump($id);
    //     // die;
    //     $data['paket'] = $this->Frontend_model->getPaket($id);
    //     $cek = $this->Frontend_model->getKSiswa()->num_rows() + 1;
    //     $data['kode_siswa'] = 'S00' . $cek;

    //     $this->load->view('backend/template/header', $data);
    //     $this->load->view('frontend/paket/registrasi', $data);
    //     $this->load->view('backend/template/footer');
    // }


    public function registrasi($id)
    {
        $data['paket'] = $this->Frontend_model->getPaket($id);
        // $cek = $this->Frontend_model->getKSiswa()->num_rows() + 1;
        // $data['kode_siswa'] = 'U-00' . $cek;
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah terdaftar'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password tidak sama!',
            'min_length' => 'password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('frontend/template/header');
            $this->load->view('frontend/paket/registrasi', $data);
            $this->load->view('frontend/template/footer');
        }
    }

    public function PesanPaket()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah terdaftar'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password tidak sama!',
            'min_length' => 'password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $id_program = $this->input->post('id_prog', true);
        // var_dump($id_program);
        // die;


        if ($this->form_validation->run() != false) {
            // $cek = $this->Frontend_model->getKPem()->num_rows() + 1;


            // $no_pembayaran = 'PBY298' . $cek;
            $data = [
                'id' => htmlspecialchars($this->input->post('id_user', true)),
                'name' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'no_telp' => htmlspecialchars($this->input->post('telp', true)),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];
            $this->db->insert('user', $data);
            // $cekpen = $this->Frontend_model->getKPen()->num_rows() + 1;
            $data1 = [

                'id' => htmlspecialchars($this->input->post('id_pen', true)),
                'id_jenis_program' => $id_program,
                'id_user' => htmlspecialchars($this->input->post('id_user', true)),
                'harga' => htmlspecialchars($this->input->post('harga', true)),
                'status' => 0,
            ];
            $harga = $this->input->post('harga', true);
            $this->db->insert('pendaftaran', $data1);

            $data2 = [
                'id' => htmlspecialchars($this->input->post('id_pem', true)),
                'id_pendaftaran' => htmlspecialchars($this->input->post('id_pen', true)),
                'status' => 0,
            ];
            $this->db->insert('pembayaran', $data2);
            $no_pembayaran = htmlspecialchars($this->input->post('id_pem', true));

            $this->session->set_flashdata('nomor', $no_pembayaran);
            $this->session->set_flashdata('harga', $harga);
            redirect('pembayaran', $harga);
        } else {
            $this->session->set_flashdata('kesalahan_data', 'Pastikan data diinputkan dengan benar(email sudah terdaftar, password tidak sama)');

            redirect('paket/registrasi/' . $id_program);
        }
    }

    public function printpembayaran()
    {
        $data['judul'] = 'Print Pembayaran';

        $kopem = $this->input->post('kopem');
        // var_dump($kopem);
        // die;
        $harga = $this->input->post('harga');

        $data['kopem'] = $kopem;
        $data['harga'] = $harga;

        $this->load->view('backend/template/header', $data);
        $this->load->view('frontend/paket/printpembayaran', $data);
        $this->load->view('backend/template/footer');
    }

    public function keHalamanPembayaran()
    {
        // $this->load->view('backend/template/header');
        $this->load->view('backend/template/header');
        $this->load->view('frontend/paket/pembayaran');
        $this->load->view('backend/template/footer');
    }


    public function konfirmasiPage()
    {

        $data['error'] = '';

        if (isset($_GET['kode'])) :
            $kode = $_GET['kode'];
            $data['pembayaran'] = $this->Frontend_model->getPembayaranWhere($kode);
        endif;

        $this->load->view('frontend/template/header', $data);
        $this->load->view('frontend/konfirmasi/halaman_konfirmasi');
        $this->load->view('frontend/template/footer');
    }

    public function cekKonfirmasi()
    {
        $kode = $this->input->post('kode');
        redirect('konfirmasi?kode=' . $kode);
    }

    public function kirimKonfirmasi()
    {

        $upload_image = $_FILES['userfile']['name'];
        if ($upload_image) {
            $config['upload_path']          = './assets/bukti/';
            $config['allowed_types']        = 'gif|jpg|png|PNG';
            $config['max_size']             = 10000;
            $config['max_width']            = 10000;
            $config['max_height']           = 10000;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('userfile')) {
                $new_image = $this->upload->data('file_name');
                $data = $this->db->set('bukti', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $no = $this->input->post('nomor_pembayaran');
        // var_dump($no);
        // die;
        $harga = $this->input->post('jumlah_bayar');
        date_default_timezone_set('Asia/Jakarta');
        $date = new DateTime('now');
        $tglhariini = $date->format('Y-m-d');
        // var_dump($tglhariini);
        // die;

        //tanpa model
        $data = [

            "jumlah_bayar" => $harga,
            "tgl_bayar" => $tglhariini,
            'status' => 1,
        ];

        $this->db->where('id', $no);
        $this->db->update('pembayaran', $data);


        // $this->Berita_model->editDataBerita();
        $this->session->set_flashdata('surat', 'Berhasil Mengirim Bukti, Silahkan Cek Kembali 5 Jam
        Kemudian Untuk Mengecek Pembayaran Anda');
        redirect('konfirmasi');
    }
}
