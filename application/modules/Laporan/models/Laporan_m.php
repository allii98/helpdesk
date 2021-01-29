<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_m extends CI_Model
{


    public function get_kw()
    {
        $query = $this->db->query("SELECT id_user, nama FROM user_ho ");
        return $query;
    }

    public function getTiketRangeTanggal($iduser, $tanggal, $kategori = "", $solusi = "")
    {
        $tiket = $this->db->from('tb_tiket t')
            ->select("t.id_tiket, t.id_user, t.kategori, t.solusi, t.kondisi, t.prioritas, date(t.tanggal_tiket) as tanggal_tiket, u.id_user, u.nama ")
            ->join('user_ho u', 't.id_user = u.id_user')
            ->where("t.id_user", $iduser)
            ->where("date(tanggal_tiket)", $tanggal)
            ->where("t.kategori", $kategori)
            ->where("t.solusi", $solusi)
            ->order_by("t.id_tiket", "DESC")
            ->get()->result_array();
        // print_r($this->db->last_query());
        return $tiket;
    }

    public function getTiketKategoriTanggal($tanggal, $kategori, $solusi = "")
    {
        $tiket = $this->db->from('tb_tiket t')
            ->select("t.id_tiket, t.kategori, t.id_kategori, t.id_aset, t.id_kat, t.id_assets, t.solusi, t.kondisi, t.prioritas, date(t.tanggal_tiket) as tanggal_tiket, c.id_tiket, c.catatan")
            ->join('tb_tindakan c', 'c.id_tiket = t.id_tiket')
            ->where("date(tanggal_tiket)", $tanggal)
            ->where("t.kategori", $kategori)
            ->where("t.solusi", $solusi)
            ->order_by("t.id_tiket", "DESC")
            ->get()->result_array();

        return $tiket;
    }

    public function getTiketKategoriPenyebab($tanggal, $faktor)
    {
        $tiket = $this->db->from('tb_tiket t')
            ->select("t.id_tiket, t.kategori, t.id_kategori, t.id_aset, t.id_kat, t.id_assets, t.solusi, t.kondisi, t.prioritas, date(t.tanggal_tiket) as tanggal_tiket, c.id_tiket, c.catatan, c.faktor")
            ->join('tb_tindakan c', 'c.id_tiket = t.id_tiket')
            ->where("date(tanggal_tiket)", $tanggal)
            ->where("c.faktor", $faktor)
            ->order_by("t.id_tiket", "DESC")
            ->get()->result_array();

        return $tiket;
    }


    public function get_kat_kerusakan()
    {
        $query = "SELECT a.id_tiket, a.id_aset, a.tanggal_tiket, a.id_user, a.kategori, a.id_kategori, a.id_kat, a.id_assets, a.kondisi, a.solusi, a.prioritas, b.id_assets, b.merk, c.id_qty, c.category, d.id_kategori, d.nama_kategori, e.id_aset, e.nama_aset, y.id_user, y.nama, i.id_tiket, i.catatan, i.faktor FROM tb_tiket a LEFT JOIN db_masis.tb_assets b ON b.id_assets = a.id_assets LEFT JOIN db_masis.tb_qty_assets c ON c.id_qty = a.id_kat LEFT JOIN tb_kategori d ON d.id_kategori = a.id_kategori LEFT JOIN tb_non_aset e ON e.id_aset = a.id_aset LEFT JOIN user_ho y ON y.id_user = a.id_user LEFT JOIN tb_tindakan i ON i.id_tiket = a.id_tiket GROUP BY a.id_tiket DESC";
        $aset = $this->db->query($query)->result_array();
        return $aset;
    }


    public function getTiket()
    {
        $query = $this->db->query("SELECT * FROM tb_tiket t LEFT JOIN user_ho u ON t.id_user = u.id_user ORDER BY t.id_tiket DESC");
        return $query;
    }

    public function getTanggal($tanggal)
    {
        $query = $this->db->query("SELECT tanggal_tiket FROM tb_tiket WHERE tanggal_tiket = $tanggal");
        return $query;
    }

    public function get_user_()
    {
        $query = $this->db->query("SELECT id_user, nama FROM user_ho  ORDER BY id_user DESC");
        return $query;
    }

    public function getTik()
    {
        $query = $this->db->query("SELECT t.id_tiket, t.kondisi, t.solusi, t.nama_petugas, t.id_kategori, t.filefoto, t.id_kat, b.id_qty, b.category, c.id_kategori, c.nama_kategori, d.id_petugas, d.nama_petugas FROM tb_tiket t LEFT JOIN tb_kategori c ON t.id_kategori = c.id_kategori LEFT JOIN db_masis.tb_qty_assets b ON t.id_kat = b.id_qty LEFT JOIN tb_petugas d ON t.nama_petugas = d.id_petugas ORDER BY t.id_tiket DESC");
        return $query;
    }

    public function get_kat()
    {
        $query = $this->db->query("SELECT id_qty, category FROM tb_qty_assets ORDER BY id_qty DESC");

        return $query;
        # code...
    }

    public function get_nama_petugas()
    {
        $query = $this->db->query("SELECT id_petugas, nama_petugas FROM tb_petugas ORDER BY id_petugas DESC");

        return $query;
        # code...
    }

    public function get_kat_petugas()
    {
        $query = "SELECT a.id_tiket,a.id_aset,a.id_user,a.solusi,a.prioritas,a.durasi,a.nama_petugas,a.nama_bantuan, b.id_assets, b.merk, c.id_user, c.nama, d.id_petugas,d.nama_petugas FROM tb_tiket a LEFT JOIN tb_assets b ON b.id_assets = a.id_aset LEFT JOIN user_ho c ON c.id_user = a.id_user LEFT JOIN tb_petugas d ON d.id_petugas = a.nama_petugas WHERE a.nama_petugas ='" . $this->input->post('id') . "'";
        $aset = $this->db->query($query)->result_array();
        return $aset;
    }

    public function get_laporan()
    {
        $query = "SELECT a.id_kategori, a.id_aset, a.solusi, a.id_user, a.nama_petugas, b.id_qty, b.category, c.id_assets, c.merk, d.id_user, d.nama, e.id_petugas, e.nama_petugas FROM tb_tiket a LEFT JOIN tb_qty_assets b ON b.id_qty = a.id_kategori LEFT JOIN tb_assets c ON c.id_assets = a.id_aset LEFT JOIN user_ho d ON d.id_user = a.id_user LEFT JOIN tb_petugas e ON e.id_petugas = a.nama_petugas WHERE b.id_qty = '" . $this->input->post('id') . "'";
        $aset = $this->db->query($query)->result_array();
        return $aset;
    }



    public function get_user()
    {
        $query = "SELECT a.kondisi, a.solusi, a.prioritas, a.id_aset, a.id_kategori, b.id_user, b.nama, c.id_assets, c.merk, d.id_qty, d.category FROM tb_tiket a LEFT JOIN user_ho b ON b.id_user = a.id_user LEFT JOIN tb_assets c ON c.id_assets = a.id_aset LEFT JOIN tb_qty_assets d ON d.id_qty = a.id_kategori GROUP BY b.id_user, b.nama, a.kondisi, a.solusi, a.prioritas, c.merk, d.category DESC";
        $aset = $this->db->query($query)->result_array();
        return $aset;
    }
}

/* End of file Laporan_m.php */