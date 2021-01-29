<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_m');
        $this->load->model('Admin_m');
        if (!$this->session->userdata('userlogin')) {
            $pemberitahuan = "<div class='alert alert-warning'>Anda harus login dulu </div>";
            $this->session->set_flashdata('pesan', $pemberitahuan);
            redirect('Login');
        }
    }

    public function index()
    {
        $jlmtiket = $this->db->query("SELECT COUNT(id_tiket) AS jlm FROM tb_tiket WHERE solusi IN (1,2,4)")->row();
        $proses = $this->db->query("SELECT COUNT(id_tiket) AS pro FROM tb_tiket WHERE solusi IN (2,4)")->row();
        $done = $this->db->query("SELECT COUNT(id_tiket) AS don FROM tb_tiket WHERE solusi IN (3)")->row();
        $kategori = $this->db->query("SELECT COUNT(*) total, b.id_qty, b.category FROM db_helpdesk.tb_tindakan a INNER JOIN db_masis.tb_qty_assets b ON b.id_qty = a.id_kat_aset GROUP BY b.id_qty, b.category
        ")->result();
        $kategorinon = $this->db->query("SELECT COUNT(*) total, b.id_kategori, b.nama_kategori FROM tb_tindakan a INNER JOIN tb_kategori b ON b.id_kategori = a.id_kat_non GROUP BY b.id_kategori, b.nama_kategori
        ")->result();

        $nama_user = $this->db->query("SELECT COUNT(*) user_total, b.id_user, b.nama FROM tb_tiket a INNER JOIN user_ho b ON b.id_user = a.id_user GROUP BY b.id_user, b.nama
        ")->result();

        $nama_petugas = $this->db->query("SELECT COUNT(*) petugas_total, b.id_petugas, b.nama_petugas FROM tb_tiket a INNER JOIN tb_petugas b ON b.id_petugas = a.nama_petugas GROUP BY b.id_petugas, b.nama_petugas")->result();

        $data = [
            'tittle' => 'Dashboard',
            'jml_tiket' => $this->Admin_m->getTicket()->num_rows(),
            'jlm_new' => $jlmtiket->jlm,
            'proses' => $proses->pro,
            'done' => $done->don,
            'jml_kat' => $kategori,
            'jml_kat_non' => $kategorinon,
            'user' => $nama_user,
            'petugas' => $nama_petugas,
            'tes' => $this->Admin_m->jmlh_new_tiket()
        ];
        // print_r($data);
        $this->template->load('template', 'dashboard', $data);
    }
}