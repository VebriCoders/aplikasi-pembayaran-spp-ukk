<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_History_pembayaran extends CI_Model
{
    function HistoryPembayaran()
    {
        $this->db->select('tbl_pembayaran.*, tbl_spp.nama_spp as nmspp, tbl_kelas.nama_kelas as nmkelas')
            ->from('tbl_pembayaran')
            ->where('tbl_pembayaran.status_bayar', 1)
            ->join('tbl_siswa', 'tbl_pembayaran.nisn_siswa = tbl_siswa.nisn_siswa')
            ->join('tbl_kelas', 'tbl_siswa.id_kelas = tbl_kelas.id_kelas')
            ->join('tbl_spp', 'tbl_siswa.id_spp = tbl_spp.id_spp')
            ->order_by('tbl_pembayaran.id_pembayaran', 'DESC');
        return $this->db->get();
    }
}
