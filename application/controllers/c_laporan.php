<?php

class c_laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pegawai_model');
        // $this->load->helper(array('form', 'url'));
        // $this->load->model('Laporan_model');
    }
    public function cetak_laporan()
    {
        $this->load->library('mypdf');
        $data['pegawai'] = $this->Pegawai_model->getAllpegawai();
        $this->mypdf->generate('Pegawai/cetak', $data);
    }
}
