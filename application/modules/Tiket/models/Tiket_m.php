<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tiket_m extends CI_Model
{
    public function get_petugas()
    {
        $query = $this->db->get('tb_petugas');

        return $query;
        # code...
    }

    public function get_kat()
    {
        $db3 = $this->load->database('db3', TRUE);
        $query = $db3->query("SELECT id_qty, category FROM tb_qty_assets ORDER BY id_qty DESC");

        return $query;
        # code...
    }

    public function get_kategori()
    {
        // $db3 = $this->load->database('db3', TRUE);
        $query = $this->db->query("SELECT id_kategori, nama_kategori FROM tb_kategori ORDER BY id_kategori DESC");

        return $query;
        # code...
    }

    public function get_cmb_aset()
    {
        $db3 = $this->load->database('db3', TRUE);
        $query = "SELECT id_assets,merk,qty_id,lokasi FROM tb_assets WHERE qty_id = '" . $this->input->post('id') . "'";
        $aset = $db3->query($query)->result_array();
        return $aset;
    }

    public function get_cmb_non_aset()
    {
        $query = "SELECT id_aset,nama_aset,id_kat_non FROM tb_non_aset WHERE id_kat_non = '" . $this->input->post('id') . "'";
        $aset = $this->db->query($query)->result_array();
        return $aset;
    }

    public function get_cmb_petugas()
    {
        $query = "SELECT nama_petugas FROM tb_petugas WHERE id_petugas = '" . $this->input->post('id') . "'";
        $aset = $this->db->query($query)->result_array();
        return $aset;
    }
    public function get_nama_petugas()
    {
        $query = "SELECT * FROM tb_petugas ";
        $aset = $this->db->query($query)->result();
        return $aset;
    }

    public function get_aset()
    {
        $query = $this->db->get('tb_aset');

        return $query;
        # code...
    }

    public function insertTracking($data)
    {
        $this->db->insert('tracking', $data);
        return TRUE;
    }
    public function insertTindakan($d)
    {
        $this->db->insert('tb_tindakan', $d);
        return TRUE;
    }

    public function updateTiket($id, $data)
    {
        $this->db->where('id_tiket', $id);
        $this->db->update('tb_tiket', $data);

        return TRUE;
    }

    public function updateTindakan($id, $data)
    {
        $this->db->where('id_tiket', $id);
        $this->db->update('tb_tindakan', $data);

        return TRUE;
    }

    public function delete($data)
    {
        $this->db->where($data);
        $this->db->delete('tb_tiket');

        return TRUE;
    }

    public function getTiket()
    {

        $query = $this->db->query("SELECT t.id_tiket, t.tanggal_tiket, t.id_user, u.id_user, u.nama, t.kondisi,  t.foto, t.prioritas, t.solusi FROM tb_tiket t LEFT JOIN user_ho u ON t.id_user = u.id_user ORDER BY t.id_tiket DESC");
        return $query;
    }

    public function getTugas()
    {

        $query = $this->db->query("SELECT t.id_tiket, t.tanggal_tiket, t.id_user, u.id_user, u.nama, t.kondisi,  t.foto, t.prioritas, t.solusi FROM tb_tiket t LEFT JOIN user_ho u ON t.id_user = u.id_user WHERE t.solusi = 2");
        return $query;
    }

    public function getSelesai()
    {

        $query = $this->db->query("SELECT t.id_tiket, t.tanggal_tiket, t.id_user, u.id_user, u.nama, t.kondisi, t.foto, t.prioritas, t.solusi FROM tb_tiket t LEFT JOIN user_ho u ON t.id_user = u.id_user WHERE t.solusi = 3");
        return $query;
    }

    public function getidtindakan($id)
    {
        $query = $this->db->query("SELECT * FROM tb_tindakan WHERE id_tiket = '$id'");
        return $query;
    }
    public function get_id($id)
    {
        $q = $this->db->query("SELECT * FROM tb_tiket t LEFT JOIN user_ho u ON t.id_user = u.id_user LEFT JOIN tb_non_aset n ON t.id_aset = n.id_aset LEFT JOIN tb_kategori k ON t.id_kategori = k.id_kategori LEFT JOIN tb_tindakan a ON a.id_tiket = t.id_tiket WHERE t.id_tiket = '$id' ");
        $data = $q->result();

        return $data;


        // $q = $this->db->query("SELECT t.id_tiket, t.tanggal_tiket, t.id_user, t.solusi, u.id_user, b.id_tiket, b.foto_hasil,b.petugas_bantuan, b.tindakan, b.catatan, t.id_qty, k.id_qty, k.category, u.nama, t.kondisi, t.date_acc, t.date_done, t.progres, t.foto, t.prioritas, t.solusi, t.nama_petugas, t.id_kategori, t.id_aset, s.id_assets, s.merk FROM tb_tiket t LEFT JOIN user_ho u ON t.id_user = u.id_user LEFT JOIN tb_qty_assets k ON k.id_qty = t.id_qty LEFT JOIN tb_assets s ON s.id_assets = t.id_aset LEFT JOIN tb_tindakan b ON b.id_tiket = t.id_tiket WHERE t.id_tiket = '$id' ");
        // $data = $q->result();

        // return $data;
    }

    public function get_id_($id)
    {
        $q = $this->db->query("SELECT t.id_tiket, t.tanggal_tiket, t.id_user, t.solusi, u.id_user, u.nama, t.kondisi, t.date_acc, t.date_done, t.progres, t.foto, t.prioritas, t.solusi, t.nama_petugas, t.id_kategori, t.id_aset FROM tb_tiket t LEFT JOIN user_ho u ON t.id_user = u.id_user WHERE t.id_tiket = '$id' ");
        $data = $q->result();

        return $data;
    }


    public function gettracking($id)
    {
        $q = $this->db->query("SELECT t.id_tracking, t.id_ticket, t.tanggal, t.nama, t.status, t.filefoto, t.deskripsi, t.id_user, t.id_petugas, u.id_user, a.id_tiket, a.kondisi, a.solusi, a.nama_acc, a.prioritas, a.foto, p.id_petugas, p.nama_petugas FROM tracking t LEFT JOIN user_ho u ON u.id_user = t.id_user LEFT JOIN tb_tiket a ON a.id_tiket = t.id_ticket LEFT JOIN tb_petugas p ON p.id_petugas = t.id_petugas  WHERE t.id_ticket ='$id' ");
        $data = $q->result_array();

        return $data;;
    }

    public function get_proses()
    {
        $query = $this->db->get('tb_tiket');

        return $query;
        # code...
    }
}

/* End of file Tiket_m.php */