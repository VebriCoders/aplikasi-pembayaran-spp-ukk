<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Kelas extends CI_Model
{
    private $_table = "tbl_kelas";

    function tampilDataKelas()
    {
        $this->db->select('tbl_kelas.*, ')
            ->from('tbl_kelas')
            ->order_by('tbl_kelas.id_kelas', 'DESC');
        return $this->db->get();
    }

    function Tambah()
    {
        $data = [
            'nama_kelas' => $this->input->post('nama_kelas'),
            'wali_kelas' => $this->input->post('wali_kelas'),
            'telp_walikelas' => $this->input->post('telp_walikelas'),
            'kompetensi_keahlian' => $this->input->post('kompetensi_keahlian'),
            'created_on' => date('Y-m-d H:i:s'),
        ];
        $this->db->insert($this->_table, $data);
    }

    function Edit()
    {
        $data = [
            'nama_kelas' => $this->input->post('nama_kelas'),
            'wali_kelas' => $this->input->post('wali_kelas'),
            'telp_walikelas' => $this->input->post('telp_walikelas'),
            'kompetensi_keahlian' => $this->input->post('kompetensi_keahlian'),
            'update_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->where('id_kelas', $this->input->post('query_id'))->update($this->_table, $data);
    }

    function Hapus()
    {
        $this->db->where('id_kelas', $this->input->post('query_id'))->delete($this->_table);
    }
}
