<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Spp extends CI_Model
{
    private $_table = "tbl_spp";

    function tampilDataSpp()
    {
        $this->db->select('tbl_spp.*, ')
            ->from('tbl_spp')
            ->order_by('tbl_spp.id_spp', 'DESC');
        return $this->db->get();
    }

    function Tambah()
    {
        $data = [
            'nama_spp' => $this->input->post('nama_spp'),
            'tahun' => $this->input->post('tahun'),
            'nominal' => str_replace(".", "", $this->input->post('nominal')),
            'created_on' => date('Y-m-d H:i:s'),
        ];
        $this->db->insert($this->_table, $data);
    }

    function Edit()
    {
        $data = [
            'nama_spp' => $this->input->post('nama_spp'),
            'tahun' => $this->input->post('tahun'),
            'nominal' => str_replace(".", "", $this->input->post('nominal')),
            'update_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->where('id_spp', $this->input->post('query_id'))->update($this->_table, $data);
    }

    function Hapus()
    {
        $this->db->where('id_spp', $this->input->post('query_id'))->delete($this->_table);
    }
}
