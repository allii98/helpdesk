<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_m');
        date_default_timezone_set("asia/jakarta");
    }


    public function index()
    {
        $this->request();
    }

    public function filter()
    {
        $data['tittle']  = 'Monitor request helpdesk';
        $tanggal = $this->input->get("tanggal");
        $iduser = $this->input->get("nama");
        $kategori = $this->input->get("kategori");
        $solusi = $this->input->get("solusi");
        $data['tiket']  = $this->Laporan_m->getTiketRangeTanggal($iduser, $tanggal, $kategori, $solusi);
        $data['user']  = $this->Laporan_m->get_user_()->result_array();

        $this->template->load('template', 'v_request', $data);
    }

    public function filterKat()
    {
        $data['tittle']  = 'Laporan Category kerusakan/penanganan';
        $tanggal = $this->input->get("tanggal");
        $kategori = $this->input->get("kategori");
        $solusi = $this->input->get("solusi");
        $data['kat']  = $this->Laporan_m->getTiketKategoriTanggal($tanggal, $kategori, $solusi);
        $this->template->load('template', 'v_laporan', $data);
        // print_r($data);
    }

    public function filterPenyebab()
    {
        $data['tittle']  = 'Laporan Category penyebab kerusakan';
        $tanggal = $this->input->get("tanggal");
        $faktor = $this->input->get("faktor");
        $data['kat']  = $this->Laporan_m->getTiketKategoriPenyebab($tanggal, $faktor);
        $this->template->load('template', 'v_penyebab', $data);
        // print_r($data);
    }

    public function request()
    {
        $data['tittle']  = 'Monitor request helpdesk';

        $data['tiket']  = $this->Laporan_m->getTiket()->result_array();
        $data['user']  = $this->Laporan_m->get_user_()->result_array();
        $this->template->load('template', 'v_request', $data);
    }

    public function category()
    {
        $data = [
            'tittle'   => 'Laporan Category kerusakan/penanganan',
            'kat' => $this->Laporan_m->get_kat_kerusakan()

        ];
        $this->template->load('template', 'v_laporan', $data);
    }

    public function penyebab()
    {
        $data = [
            'tittle'   => 'Laporan Category penyebab kerusakan',
            'kat' => $this->Laporan_m->get_kat_kerusakan()

        ];
        $this->template->load('template', 'v_penyebab', $data);
    }

    public function percategory()
    {
        $kategori = $this->db->query("SELECT COUNT(*) total, b.id_qty, b.category FROM db_helpdesk.tb_tindakan a INNER JOIN db_masis.tb_qty_assets b ON b.id_qty = a.id_kat_aset GROUP BY b.id_qty, b.category
        ")->result();
        $kategorinon = $this->db->query("SELECT COUNT(*) total, b.id_kategori, b.nama_kategori FROM tb_tindakan a INNER JOIN tb_kategori b ON b.id_kategori = a.id_kat_non GROUP BY b.id_kategori, b.nama_kategori
        ")->result();


        $data = [
            'tittle'   => 'Presentasi Kerusakan berdasarkan category ',
            'kat' => $this->Laporan_m->get_kat()->result_array(),
            'jml_kat' => $kategori,
            'jml_kat_non' => $kategorinon

        ];
        $this->template->load('template', 'v_percategori', $data);
    }

    public function user()
    {
        $nama_user = $this->db->query("SELECT COUNT(*) user_total, b.id_user, LEFT(b.nama, 8 ) AS nama FROM tb_tiket a INNER JOIN user_ho b ON b.id_user = a.id_user GROUP BY b.id_user, b.nama
       ")->result();
        $data = [
            'tittle'   => 'Presentasi kerusakan berdasarkan Nama user',
            'user' => $nama_user

        ];
        $this->template->load('template', 'v_namauser', $data);
    }

    public function petugas()
    {
        $nama_petugas = $this->db->query("SELECT COUNT(*) user_total, b.id_petugas, LEFT(b.nama_petugas, 8 ) AS nama FROM tb_tiket a INNER JOIN tb_petugas b ON b.id_petugas = a.nama_petugas GROUP BY b.id_petugas, b.nama_petugas
       ")->result();
        $data = [
            'tittle'   => 'Presentasi Penanganan Berdasarkan Petugas ',
            'petugas' => $nama_petugas

        ];
        $this->template->load('template', 'v_petugas', $data);
    }

    public function masalah()
    {
        $data = [
            'tittle'   => 'Library masalah dan solusi (tracking system)',
            'tiket' => $this->Laporan_m->getTik()->result_array()

        ];
        $this->template->load('template', 'v_masalah', $data);
    }

    public function getisilaporan()
    {
        $data = $this->Laporan_m->get_laporan();
        echo json_encode($data);
    }

    public function getisipetugas()
    {
        $data = $this->Laporan_m->get_kat_petugas();
        echo json_encode($data);
    }
}

/* End of file Laporan.php */