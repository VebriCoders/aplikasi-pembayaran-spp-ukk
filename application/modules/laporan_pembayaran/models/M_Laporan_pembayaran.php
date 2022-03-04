<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Laporan_pembayaran extends CI_Model
{
    function tampil_data_pembayaran($awalTgl, $akhirTgl)
    {
        $this->db->select('tbl_pembayaran.*, tbl_siswa.nama_siswa as nmsiswa, tbl_kelas.nama_kelas as nmkelas, tbl_spp.nama_spp as nmspp')
            ->from('tbl_pembayaran')
            ->where('tbl_pembayaran.status_bayar', 1)
            ->where('tgl_bayar >=', $awalTgl)
            ->where('tgl_bayar <=', $akhirTgl)
            ->join('tbl_siswa', 'tbl_pembayaran.nisn_siswa = tbl_siswa.nisn_siswa')
            ->join('tbl_kelas', 'tbl_siswa.id_kelas = tbl_kelas.id_kelas')
            ->join('tbl_spp', 'tbl_siswa.id_spp = tbl_spp.id_spp')
            ->order_by('tbl_pembayaran.id_pembayaran', 'DESC');
        return $this->db->get();
    }

    function cari_status_data_pembayaran($status_pembayaran)
    {
        $this->db->select('tbl_pembayaran.*, tbl_siswa.nama_siswa as nmsiswa, tbl_kelas.nama_kelas as nmkelas, tbl_spp.nama_spp as nmspp')
            ->from('tbl_pembayaran')
            ->where('tbl_pembayaran.status_bayar', $status_pembayaran)
            ->join('tbl_siswa', 'tbl_pembayaran.nisn_siswa = tbl_siswa.nisn_siswa')
            ->join('tbl_kelas', 'tbl_siswa.id_kelas = tbl_kelas.id_kelas')
            ->join('tbl_spp', 'tbl_siswa.id_spp = tbl_spp.id_spp')
            ->order_by('tbl_pembayaran.id_pembayaran', 'DESC');
        return $this->db->get();
    }

    // public function get_join($awalTgl, $akhirTgl)
    // {
    //     $query = "SELECT tbl_pembayaran.*, tbl_siswa.nisn_siswa, tbl_siswa.nama_siswa, tbl_siswa.id_kelas FROM tbl_pembayaran INNER JOIN tbl_siswa ON tbl_siswa.nisn_siswa = tbl_pembayaran.nisn_siswa WHERE tgl_bayar BETWEEN '$awalTgl' AND '$akhirTgl' ORDER BY tgl_bayar ASC";
    //     return $this->db->query($query);
    // }

    public function set_admin_tampil($id_admin)
    {
        $this->db->select('*');
        $this->db->where('id_admin', $id_admin)->from('tbl_admin');
        $query = $this->db->get();
        return $query->row_array();
    }
}
