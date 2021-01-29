<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Asset_m extends CI_Model
{



    public function get_aset()
    {
        $query = $this->db->query("SELECT a.id_aset, a.id_kat_non, a.kode, a.nama_aset, a.merk, a.spek, k.id_kategori, k.nama_kategori FROM tb_non_aset a LEFT JOIN tb_kategori k ON k.id_kategori = a.id_kat_non ORDER BY a.id_aset DESC");

        return $query;
        # code...
    }

    public function get_assets()
    {
        $query = $this->db->query("SELECT a.id_aset, a.id_kat_non, a.kode, a.nama_aset, k.id_kategori, k.nama_kategori FROM tb_non_aset a LEFT JOIN tb_kategori k ON k.id_kategori = a.id_kat_non ORDER BY a.id_aset DESC");

        return $query;
        # code...
    }

    public function get_kat()
    {
        $query = $this->db->query("SELECT id_kategori, nama_kategori FROM tb_kategori ORDER BY id_kategori DESC");

        return $query;
        # code...
    }

    public function get_id($id)
    {
        $this->db->where('id_aset', $id);
        $q = $this->db->get('tb_non_aset');
        $data = $q->result_array();

        return $data;
    }


    public function insert($data)
    {
        $this->db->insert('tb_kategori', $data);
        return TRUE;
    }

    public function insertAset($data)
    {
        $this->db->insert('tb_non_aset', $data);
        return TRUE;
    }

    public function update($id, $data)
    {
        $this->db->where('id_kategori', $id);
        $this->db->update('tb_kategori', $data);

        return TRUE;
    }

    public function updateAset($id, $data)
    {
        $this->db->where('id_aset', $id);
        $this->db->update('tb_non_aset', $data);

        return TRUE;
    }

    public function delete($data)
    {
        $this->db->where($data);
        $this->db->delete('tb_non_aset');

        return TRUE;
    }

    public function getkodeaset()
    {
        //Query untuk mengembalikan value terbesar yang ada di kolom id_tiket
        $query = $this->db->query("SELECT max(kode) AS max_code FROM tb_non_aset");

        //Menampung fungsi yang akan mengembalikan hasil 1 baris dari query ke dalam variabel $row
        $row = $query->row_array();

        //Menampung hasil kode tiket terbesar dari query
        $max_id = $row['max_code'];
        //Mengambil kode tiket pada database posisi 9 dan panjang kode 4
        $max_fix = (int) substr($max_id, 9, 4);

        //Hasil dari kode terbesar yang sudah didapatkan ditambah dengan 1, hasil dari penjumlahan ini akan digunakan sebagai kode tiket terbaru
        $max_tiket = $max_fix + 1;

        //Mengambil tanggal sekarang
        $tanggal = date("d");
        //Mengambil bulan sekarang
        $bulan = date("m");
        //Mengambil tahun sekarang
        $tahun = date("Y");

        //Membuat id_tiket dengan format T + tahun + bulan + tanggal + kode user terbaru (%04s merupakan fungsi untuk menentukan lebar minimum yang dimiliki nilai variable serta mengubah int menjadi string, %04s menandakan lebar minimum dari tiket yaitu 4 dengan padding berupa angka 0)
        $tiket = "MSAL" . $tahun . $bulan . $tanggal . sprintf("%04s", $max_tiket);
        return $tiket;
    }
}

/* End of file Asset_m.php */