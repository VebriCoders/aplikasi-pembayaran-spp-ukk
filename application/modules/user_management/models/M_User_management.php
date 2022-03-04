<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_User_management extends CI_Model
{
    private $_table = "tbl_admin";

    function tampilDataAdmin()
    {
        $this->db->select('tbl_admin.*, ')
            ->from('tbl_admin')
            ->order_by('tbl_admin.id_admin', 'DESC');
        return $this->db->get();
    }

    public function getById($id_admin)
    {
        return $this->db->get_where($this->_table, ["id_admin" => $id_admin])->row();
    }


    function Tambah()
    {
        $data = [
            'email_username' => $this->input->post('email_username'),
            'password' => md5($this->input->post('password')),
            'nama_admin' => $this->input->post('nama_admin'),
            'foto_admin' => $this->_uploadImage(),
            'telp_admin' => $this->input->post('telp_admin'),
            'id_level' => $this->input->post('id_level'),
            'active' => $this->input->post('active'),
            'admin_online' => 0,
            'created_on' => date('Y-m-d H:i:s'),
        ];
        $this->db->insert($this->_table, $data);
    }

    function Edit()
    {
        if (!empty($_FILES["foto_admin"]["name"])) {
            $data = [
                'email_username' => $this->input->post('email_username'),
                'nama_admin' => $this->input->post('nama_admin'),
                'foto_admin' => $this->_uploadImage(),
                'telp_admin' => $this->input->post('telp_admin'),
                'id_level' => $this->input->post('id_level'),
                'active' => $this->input->post('active'),
                'admin_online' => 0,
                'update_at' => date('Y-m-d H:i:s'),
            ];
        } else {
            $data = [
                'email_username' => $this->input->post('email_username'),
                'nama_admin' => $this->input->post('nama_admin'),
                'telp_admin' => $this->input->post('telp_admin'),
                'id_level' => $this->input->post('id_level'),
                'active' => $this->input->post('active'),
                'admin_online' => 0,
                'update_at' => date('Y-m-d H:i:s'),
            ];
        }
        $this->db->where('id_admin', $this->input->post('query_id'))->update($this->_table, $data);
    }

    function Password()
    {
        $data = [
            'password' => md5($this->input->post('password')),
            'update_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->where('id_admin', $this->input->post('query_id'))->update($this->_table, $data);
    }

    function Hapus()
    {
        $this->_deleteImage($this->input->post('query_id'));
        $this->db->where('id_admin', $this->input->post('query_id'))->delete($this->_table);
    }

    private function _uploadImage()
    {
        //Nama File Custom Slug Model
        $file_name_sustom = $this->input->post('nama_admin');
        $file_name_sustom = str_replace(array('[\', \']'), '', $file_name_sustom);
        $file_name_sustom = preg_replace('/\[.*\]/U', '', $file_name_sustom);
        $file_name_sustom = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $file_name_sustom);
        $file_name_sustom = preg_replace(array('/[^a-z0-9]/i', '/[-]+/'), '-', $file_name_sustom);
        $hasil_custom = strtolower(trim($file_name_sustom, '-'));

        $config['upload_path']          = 'assets/upload/foto_admin/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $hasil_custom . "_" . time();
        $config['overwrite']            = true;
        $config['max_size']             = 5120; // 5MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_admin')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    private function _deleteImage($id_admin)
    {
        $data_foto = $this->getById($id_admin);
        if ($data_foto->foto_admin != "default.jpg") {
            $filename = explode(".", $data_foto->foto_admin)[0];
            return array_map('unlink', glob(FCPATH . "assets/upload/foto_admin/$filename.*"));
        }
    }
}
