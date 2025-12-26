<?php


class Pegawai_model extends CI_model
{
    public function getAllpegawai()
    {

        // $query = "SELECT transaksi.*, history_trans.pemasukan as spemasukan,history_trans.pengeluaran as spengeluaran FROM transaksi,history_trans WHERE transaksi.id_trans = history_trans.id_trans and tanggal between $tgl1 and $tgl2;
        // return $this->db->query($query)->result_array();

        $sql = "SELECT tb_pegawai.*, tb_posisi.posisi as namapos 
        FROM tb_pegawai,tb_posisi WHERE tb_pegawai.posisi = tb_posisi.id";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
}
