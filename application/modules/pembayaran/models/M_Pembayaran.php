<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Pembayaran extends CI_Model
{
    function cek_nisn($nisn_siswa)
    {
        $query = $this->db->query("SELECT * FROM tbl_siswa WHERE nisn_siswa = '$nisn_siswa' ");

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function tampilDataSppSiswa($nisn_siswa)
    {
        $this->db->select('tbl_pembayaran.*,')
            ->from('tbl_pembayaran')
            ->where('tbl_pembayaran.nisn_siswa', $nisn_siswa)
            ->order_by('tbl_pembayaran.nisn_siswa', 'DESC');
        return $this->db->get();
    }

    function tampilDataSiswa($nisn_siswa)
    {
        $this->db->select('tbl_siswa.*, tbl_kelas.kompetensi_keahlian as nmjurusan, tbl_siswa.alamat_siswa as nmalamatsiswa, tbl_siswa.telp_siswa as nmtelpsiswa, tbl_kelas.nama_kelas as nmkelas, tbl_kelas.wali_kelas as nmwakel, tbl_kelas.telp_walikelas as nmtelpwakel, tbl_spp.nama_spp as nmspp, tbl_spp.nominal as nmnominal')
            ->from('tbl_siswa')
            ->where('tbl_siswa.nisn_siswa', $nisn_siswa)
            ->join('tbl_kelas', 'tbl_siswa.id_kelas = tbl_kelas.id_kelas')
            ->join('tbl_spp', 'tbl_siswa.id_spp = tbl_spp.id_spp')
            ->order_by('tbl_siswa.nisn_siswa', 'DESC');
        return $this->db->get();
    }

    function cek_data_pembayaran_bulanan($kode_pembayaran)
    {
        $this->db->select('tbl_pembayaran.*, tbl_siswa.nisn_siswa as nmnisn, tbl_spp.nominal as nmnominal, tbl_spp.nama_spp as nmnamaspp, tbl_siswa.alamat_siswa as nmalamatsiswa, tbl_siswa.telp_siswa as nmtelpsiswa, tbl_siswa.nama_siswa as nmsiswa, tbl_kelas.nama_kelas as nmkelas, tbl_kelas.kompetensi_keahlian as nmjurusan')
            ->from('tbl_pembayaran')
            ->where('tbl_pembayaran.kode_pembayaran', $kode_pembayaran)
            ->join('tbl_siswa', 'tbl_pembayaran.nisn_siswa = tbl_siswa.nisn_siswa')
            ->join('tbl_kelas', 'tbl_siswa.id_kelas = tbl_kelas.id_kelas')
            ->join('tbl_spp', 'tbl_siswa.id_spp = tbl_spp.id_spp')
            ->order_by('tbl_pembayaran.kode_pembayaran', 'DESC');
        return $this->db->get();
    }

    function cek_data_pembayaran($nisn_siswa)
    {
        $this->db->select('tbl_pembayaran.*, tbl_siswa.nisn_siswa as nmnisn, tbl_spp.nominal as nmnominal, tbl_spp.nama_spp as nmnamaspp, tbl_siswa.alamat_siswa as nmalamatsiswa, tbl_siswa.telp_siswa as nmtelpsiswa, tbl_siswa.nama_siswa as nmsiswa, tbl_kelas.nama_kelas as nmkelas, tbl_kelas.kompetensi_keahlian as nmjurusan')
            ->from('tbl_pembayaran')
            ->where('tbl_pembayaran.nisn_siswa', $nisn_siswa)
            ->join('tbl_siswa', 'tbl_pembayaran.nisn_siswa = tbl_siswa.nisn_siswa')
            ->join('tbl_kelas', 'tbl_siswa.id_kelas = tbl_kelas.id_kelas')
            ->join('tbl_spp', 'tbl_siswa.id_spp = tbl_spp.id_spp')
            ->order_by('tbl_pembayaran.id_pembayaran', 'ASC');
        return $this->db->get();
    }

    public function set_admin_tampil($id_admin)
    {
        $this->db->select('*');
        $this->db->where('id_admin', $id_admin)->from('tbl_admin');
        $query = $this->db->get();
        return $query->row_array();
    }
}
