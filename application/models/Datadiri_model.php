<?php


class Datadiri_model extends CI_model
{
    public function getKPendaftaran()
    {
        return $this->db->get('siswa');
    }
}
