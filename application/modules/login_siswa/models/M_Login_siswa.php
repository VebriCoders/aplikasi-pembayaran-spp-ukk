<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Login_siswa extends CI_Model
{
    function ceksiswa($nisn_siswa)
    {
        $query = $this->db->query("SELECT * FROM tbl_siswa WHERE nisn_siswa = '$nisn_siswa' ");

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}
