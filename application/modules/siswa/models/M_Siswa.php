<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Siswa extends CI_Model
{
    private $_table = "tbl_siswa";
    private $_table_pembayaran = "tbl_pembayaran";
    private $_table_spp = "tbl_spp";

    function joinKelas()
    {
        $this->db->select('*')
            ->from('tbl_kelas');
        $query = $this->db->get();
        return $query;
    }

    function joinSpp()
    {
        $this->db->select('*')
            ->from('tbl_spp');
        $query = $this->db->get();
        return $query;
    }

    function tampilDataSiswa()
    {
        $this->db->select('tbl_siswa.*, tbl_kelas.nama_kelas as nmkelas, tbl_spp.nama_spp as nmspp')
            ->from('tbl_siswa')
            ->join('tbl_kelas', 'tbl_siswa.id_kelas = tbl_kelas.id_kelas')
            ->join('tbl_spp', 'tbl_siswa.id_spp = tbl_spp.id_spp')
            ->order_by('tbl_siswa.nisn_siswa', 'DESC');
        return $this->db->get();
    }

    public function getById($nisn_siswa)
    {
        return $this->db->get_where($this->_table, ["nisn_siswa" => $nisn_siswa])->row();
    }

    function Tambah()
    {
        $AwalJatuhTempo = $this->input->post('jatuh_tempo_pertama', true);
        $id_untuk_pembayaran_spp = $this->input->post('id_spp', true);

        $Bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];

        $data_siswa = [
            'nisn_siswa' => $this->input->post('nisn_siswa'),
            'nis_siswa' => $this->input->post('nis_siswa'),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'telp_siswa' => $this->input->post('telp_siswa'),
            'alamat_siswa' => $this->input->post('alamat_siswa'),
            'foto_siswa' => $this->_uploadImage(),
            'id_kelas' => $this->input->post('id_kelas'),
            'id_spp' => $this->input->post('id_spp'),
            'active' => $this->input->post('active'),
            'created_on' => date('Y-m-d H:i:s'),
        ];
        $this->db->insert($this->_table, $data_siswa);

        //Ambil Data Siswa Sesuai Dengan NISN Siswa
        $this->db->limit(1);
        $this->db->order_by('nisn_siswa', 'desc');
        $data_ambil = $this->db->get('tbl_siswa')->row_array();
        $ambil_nisn_siswa = $data_ambil['nisn_siswa'];

        //Ambil Data Jumlah Nominal SPP Sesuai Dengan ID SPP
        $ambil_nominal_spp =  $this->db->get_where($this->_table_spp, ["id_spp" => $id_untuk_pembayaran_spp])->row();

        // Tagihan 12 Bulan Sesuai Dengan Awal Jatuh Tempo)
        for ($i = 0; $i < 12; $i++) {
            // Membuat Tanggal Jatuh Tempo Setiap Bulan Sesuai Dengan Input Tanggal Pada Jatuh Tempo
            $jatuhTempo = date('Y-m-d', strtotime("+$i month", strtotime($AwalJatuhTempo)));
            $bulan_pembayaran_spp = $Bulan[date('m', strtotime($jatuhTempo))] . " " . date('Y', strtotime($jatuhTempo));

            $data_pembayaran = [
                'id_admin' => $this->session->userdata('id_admin'),
                'nisn_siswa' => $ambil_nisn_siswa,
                'jatuh_tempo' => $jatuhTempo,
                'bulan_dibayar' => $bulan_pembayaran_spp,
                'id_spp' => $id_untuk_pembayaran_spp,
                'jumlah_bayar' => $ambil_nominal_spp->nominal,
            ];
            $this->db->insert($this->_table_pembayaran, $data_pembayaran);
        }
    }

    function Edit()
    {
        if (!empty($_FILES["foto_siswa"]["name"])) {
            $data = [
                'nisn_siswa' => $this->input->post('nisn_siswa'),
                'nis_siswa' => $this->input->post('nis_siswa'),
                'nama_siswa' => $this->input->post('nama_siswa'),
                'telp_siswa' => $this->input->post('telp_siswa'),
                'alamat_siswa' => $this->input->post('alamat_siswa'),
                'foto_siswa' => $this->_uploadImage(),
                'id_kelas' => $this->input->post('id_kelas'),
                'id_spp' => $this->input->post('id_spp'),
                'active' => $this->input->post('active'),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        } else {
            $data = [
                'nisn_siswa' => $this->input->post('nisn_siswa'),
                'nis_siswa' => $this->input->post('nis_siswa'),
                'nama_siswa' => $this->input->post('nama_siswa'),
                'telp_siswa' => $this->input->post('telp_siswa'),
                'alamat_siswa' => $this->input->post('alamat_siswa'),
                'id_kelas' => $this->input->post('id_kelas'),
                'id_spp' => $this->input->post('id_spp'),
                'active' => $this->input->post('active'),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        }
        $this->db->where('nisn_siswa', $this->input->post('query_id'))->update($this->_table, $data);
    }

    function Hapus()
    {
        $this->_deleteImage($this->input->post('query_id'));
        $this->db->where('nisn_siswa', $this->input->post('query_id'))->delete($this->_table);
    }

    private function _uploadImage()
    {
        //Nama File Custom Slug Model
        $file_name_sustom = $this->input->post('nama_siswa');
        $file_name_sustom = str_replace(array('[\', \']'), '', $file_name_sustom);
        $file_name_sustom = preg_replace('/\[.*\]/U', '', $file_name_sustom);
        $file_name_sustom = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $file_name_sustom);
        $file_name_sustom = preg_replace(array('/[^a-z0-9]/i', '/[-]+/'), '-', $file_name_sustom);
        $hasil_custom = strtolower(trim($file_name_sustom, '-'));

        $config['upload_path']          = 'assets/upload/foto_siswa/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $hasil_custom . "_" . time();
        $config['overwrite']            = true;
        $config['max_size']             = 5120; // 5MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_siswa')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    private function _deleteImage($nisn_siswa)
    {
        $data_foto = $this->getById($nisn_siswa);
        if ($data_foto->foto_siswa != "default.jpg") {
            $filename = explode(".", $data_foto->foto_siswa)[0];
            return array_map('unlink', glob(FCPATH . "assets/upload/foto_siswa/$filename.*"));
        }
    }
}
