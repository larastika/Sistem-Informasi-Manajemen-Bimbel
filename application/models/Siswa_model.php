<?php


class Siswa_model extends CI_model
{
    public function getAllprogram()
    {

        // $query = "SELECT transaksi.*, history_trans.pemasukan as spemasukan,history_trans.pengeluaran as spengeluaran FROM transaksi,history_trans WHERE transaksi.id_trans = history_trans.id_trans and tanggal between $tgl1 and $tgl2;
        // return $this->db->query($query)->result_array();

        $sql = "SELECT tb_program.nama_program as nama_program, tb_program.id as idprog, jenis_program.*
        from tb_program, jenis_program where tb_program.id = jenis_program.id_program";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getAlljadwal($id)
    {

        // $query = "SELECT transaksi.*, history_trans.pemasukan as spemasukan,history_trans.pengeluaran as spengeluaran FROM transaksi,history_trans WHERE transaksi.id_trans = history_trans.id_trans and tanggal between $tgl1 and $tgl2;
        // return $this->db->query($query)->result_array();

        $sql = "SELECT mapel.nama_mapel as mapel, guru.nama_guru as namgu, tb_program.nama_program as namprog, jadwal.id as idjad, jadwal.*   
        from  mapel,guru,jenis_program,jadwal,tb_program
        where mapel.id=jadwal.id_mapel and guru.id = jadwal.id_guru and jenis_program.id=jadwal.id_jenis_program and jenis_program.id_program=tb_program.id
        and jenis_program.id=$id";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getAlleditjadwal($id)
    {

        // $query = "SELECT transaksi.*, history_trans.pemasukan as spemasukan,history_trans.pengeluaran as spengeluaran FROM transaksi,history_trans WHERE transaksi.id_trans = history_trans.id_trans and tanggal between $tgl1 and $tgl2;
        // return $this->db->query($query)->result_array();

        $sql = "SELECT mapel.id as idmapel,mapel.nama_mapel as mapel, guru.id as idgur, guru.nama_guru as namgu, tb_program.id as idprog,tb_program.nama_program as namprog, jadwal.id as idjad, jadwal.*   
        from  mapel,guru,jenis_program,jadwal,tb_program
        where mapel.id=jadwal.id_mapel and guru.id = jadwal.id_guru and jenis_program.id=jadwal.id_jenis_program and jenis_program.id_program=tb_program.id
        and jadwal.id=$id";
        $result = $this->db->query($sql);
        return $result->row_array();
    }

    public function getIdprogram($id)
    {

        // $query = "SELECT transaksi.*, history_trans.pemasukan as spemasukan,history_trans.pengeluaran as spengeluaran FROM transaksi,history_trans WHERE transaksi.id_trans = history_trans.id_trans and tanggal between $tgl1 and $tgl2;
        // return $this->db->query($query)->result_array();

        $sql = "SELECT tb_program.nama_program as nama_program, tb_program.id as idprog, jenis_program.*
        from tb_program, jenis_program where tb_program.id = jenis_program.id_program and jenis_program.id='$id'";
        $result = $this->db->query($sql);
        return $result->row_array();
    }

    public function getPaketKu($id_user)
    {

        // $query = "SELECT transaksi.*, history_trans.pemasukan as spemasukan,history_trans.pengeluaran as spengeluaran FROM transaksi,history_trans WHERE transaksi.id_trans = history_trans.id_trans and tanggal between $tgl1 and $tgl2;
        // return $this->db->query($query)->result_array();

        $sql = "SELECT tb_program.nama_program as naprog, pendaftaran.*
        from tb_program,pendaftaran, jenis_program where tb_program.id = jenis_program.id_program and pendaftaran.id_jenis_program=jenis_program.id        
        and pendaftaran.id_user='$id_user'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getAllJadMapel($id_jeprog)
    {

        // $query = "SELECT transaksi.*, history_trans.pemasukan as spemasukan,history_trans.pengeluaran as spengeluaran FROM transaksi,history_trans WHERE transaksi.id_trans = history_trans.id_trans and tanggal between $tgl1 and $tgl2;
        // return $this->db->query($query)->result_array();

        $sql = "SELECT jadwal.*, mapel.*, guru.nama_guru, tb_program.nama_program from jadwal,mapel ,jenis_program,tb_program,guru
        where jadwal.id_mapel=mapel.id and jadwal.id_jenis_program=jenis_program.id 
        and jenis_program.id_program=tb_program.id and jadwal.id_guru=guru.id
        and jadwal.id_jenis_program=$id_jeprog;";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getAllJadGuru($id_guru)
    {

        // $query = "SELECT transaksi.*, history_trans.pemasukan as spemasukan,history_trans.pengeluaran as spengeluaran FROM transaksi,history_trans WHERE transaksi.id_trans = history_trans.id_trans and tanggal between $tgl1 and $tgl2;
        // return $this->db->query($query)->result_array();

        $sql = "SELECT jadwal.*, mapel.*, guru.nama_guru, tb_program.nama_program from jadwal,mapel ,jenis_program,tb_program,guru
        where jadwal.id_mapel=mapel.id and jadwal.id_jenis_program=jenis_program.id 
        and jenis_program.id_program=tb_program.id and jadwal.id_guru=guru.id
        and jadwal.id_guru='$id_guru';";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getsiswa($tgl1, $tgl2, $kelas)
    {


        $sql = "SELECT siswa.*, tb_program.nama_program as namprog from pendaftaran,tb_program ,siswa, pembayaran
        where siswa.id_user=pendaftaran.id_user and pendaftaran.id_jenis_program=tb_program.id and pembayaran.id_pendaftaran=pendaftaran.id
        and pembayaran.tgl_bayar between '$tgl1' and '$tgl2' and pendaftaran.id_jenis_program=$kelas";
        $result = $this->db->query($sql);
        return $result->result_array();
    }


    public function getTahun()
    {
        $this->db->select('year(tgl_bayar) as th');
        $this->db->from('pembayaran');
        $this->db->group_by('year(tgl_bayar)');
        return $this->db->get()->result_array();
    }
    public function getBln()
    {
        $this->db->select('month(tgl_bayar) as bln');
        $this->db->from('pembayaran');
        $this->db->group_by('month(tgl_bayar)');
        return $this->db->get()->result_array();
    }
}
