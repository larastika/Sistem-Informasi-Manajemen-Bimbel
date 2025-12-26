<?php


class Frontend_model extends CI_model
{
    public function getPaket($id)
    {
        $sql = "SELECT jenis_program.*, tb_program.nama_program as namprog
        from jenis_program, tb_program where jenis_program.id_program = tb_program.id and jenis_program.id=$id";
        $result = $this->db->query($sql);
        return $result->row_array();
    }

    public function getKSiswa()
    {
        return $this->db->get('user');
    }
    public function getKPem()
    {
        return $this->db->get('pembayaran');
    }
    public function getKPen()
    {
        return $this->db->get('pendaftaran');
    }

    public function getPembayaranWhere($kode)
    {
        $sql = "SELECT user.*, pembayaran.*, pembayaran.status as stapem, pendaftaran.* from user, pembayaran, pendaftaran
        where user.id=pendaftaran.id_user and pendaftaran.id = pembayaran.id_pendaftaran AND pembayaran.id='$kode'";
        $result = $this->db->query($sql);
        return $result->row_array();
    }
}
