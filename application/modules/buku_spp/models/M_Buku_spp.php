<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Buku_spp extends CI_Model
{
    function TampilSPP()
    {
        $this->db->select('tbl_pembayaran.*, tbl_spp.nama_spp as nmspp ')
            ->from('tbl_pembayaran')
            ->where('nisn_siswa', $this->session->userdata('nisn_siswa'))
            ->join('tbl_spp', 'tbl_pembayaran.id_spp = tbl_spp.id_spp')
            ->order_by('tbl_pembayaran.id_pembayaran', 'ASC');
        return $this->db->get();
    }

    function tampilDataSiswa()
    {
        $this->db->select('tbl_siswa.*, tbl_kelas.kompetensi_keahlian as nmjurusan, tbl_siswa.alamat_siswa as nmalamatsiswa, tbl_siswa.telp_siswa as nmtelpsiswa, tbl_kelas.nama_kelas as nmkelas, tbl_kelas.wali_kelas as nmwakel, tbl_kelas.telp_walikelas as nmtelpwakel, tbl_spp.nama_spp as nmspp, tbl_spp.nominal as nmnominal')
            ->from('tbl_siswa')
            ->where('tbl_siswa.nisn_siswa', $this->session->userdata('nisn_siswa'))
            ->join('tbl_kelas', 'tbl_siswa.id_kelas = tbl_kelas.id_kelas')
            ->join('tbl_spp', 'tbl_siswa.id_spp = tbl_spp.id_spp')
            ->order_by('tbl_siswa.nisn_siswa', 'DESC');
        return $this->db->get();
    }
}
