<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Login extends CI_Model
{
    function cekuser($email_username)
    {
        $query = $this->db->query("SELECT * FROM tbl_admin WHERE email_username = '$email_username' ");

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function ceklogin($email_username, $password)
    {
        $query = $this->db->query("SELECT * FROM tbl_admin WHERE email_username = '$email_username' AND password = '$password' ");

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}
