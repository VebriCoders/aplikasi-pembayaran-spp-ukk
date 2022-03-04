<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Dashboard extends CI_Model
{
    public function jmlKelas()
    {
        $query = $this->db->get('tbl_kelas');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function jmlSpp()
    {
        $query = $this->db->get('tbl_spp');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function jmlSiswa()
    {
        $query = $this->db->get('tbl_siswa');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function jmlPembayaran()
    {
        $query = $this->db->where('status_bayar', 1)->get('tbl_pembayaran');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
