<?php


class Program_model extends CI_model
{
    public function getAlljeprog()
    {

        // $query = "SELECT transaksi.*, history_trans.pemasukan as spemasukan,history_trans.pengeluaran as spengeluaran FROM transaksi,history_trans WHERE transaksi.id_trans = history_trans.id_trans and tanggal between $tgl1 and $tgl2;
        // return $this->db->query($query)->result_array();

        $sql = "SELECT tb_program.nama_program as nama_program, jenis_program.*
        from tb_program, jenis_program where tb_program.id = jenis_program.id_program";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getKonfirmasi()
    {
        $sql = "SELECT user.*, pembayaran.*, pembayaran.status as stapem, pembayaran.id as idpem ,pendaftaran.*,tb_program.nama_program from user, pembayaran, pendaftaran,tb_program
        where user.id=pendaftaran.id_user and pendaftaran.id = pembayaran.id_pendaftaran and pendaftaran.id_jenis_program=tb_program.id";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getUser($id)
    {
        $sql = "SELECT user.id as idusr from user, pembayaran, pendaftaran
        where user.id=pendaftaran.id_user and pendaftaran.id = pembayaran.id_pendaftaran and pembayaran.id='$id'";
        $result = $this->db->query($sql);
        return $result->row_array();
    }

    public function getkuota($idpen)
    {
        $sql = "SELECT pendaftaran.id_jenis_program as idprog, jenis_program.kuota from pembayaran, pendaftaran, jenis_program
        where pembayaran.id_pendaftaran=pendaftaran.id and pendaftaran.id_jenis_program=jenis_program.id_program
        and pembayaran.id_pendaftaran=$idpen;";
        $result = $this->db->query($sql);
        return $result->row_array();
    }

    //guru
    public function getKonGuru()
    {
        $sql = "SELECT guru.*,guru.id as idgur, user.* 
        from guru,user
        where guru.id_user=user.id";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
}
