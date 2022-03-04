<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Dashboard_siswa extends CI_Model
{
    function HistoryPembayaran()
    {
        $this->db->select('tbl_pembayaran.*, tbl_spp.nama_spp as nmspp ')
            ->from('tbl_pembayaran')
            ->where('tbl_pembayaran.status_bayar', 1)
            ->where('nisn_siswa', $this->session->userdata('nisn_siswa'))
            ->join('tbl_spp', 'tbl_pembayaran.id_spp = tbl_spp.id_spp')
            ->order_by('tbl_pembayaran.id_pembayaran', 'ASC');
        return $this->db->get();
    }

    public function sppBelumBayar()
    {
        $query = $this->db->where('nisn_siswa', $this->session->userdata('nisn_siswa'))->where('status_bayar', 0)->get('tbl_pembayaran');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function sppSudahBayar()
    {
        $query = $this->db->where('nisn_siswa', $this->session->userdata('nisn_siswa'))->where('status_bayar', 1)->get('tbl_pembayaran');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
