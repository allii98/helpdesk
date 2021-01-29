<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Asset extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_m');
        if (!$this->session->userdata('userlogin')) {
            $pemberitahuan = "<div class='alert alert-warning'>Anda harus login dulu </div>";
            $this->session->set_flashdata('pesan', $pemberitahuan);
            redirect('Login');
        }
        $this->load->model('Asset_m');
    }

    public function index()
    {
        // $data = [
        //     'tittle' => "Daftar Category",
        //     'kat' => $this->Asset_m->get_kat()->result_array()
        // ];
        // $this->template->load('template', 'v_category', $data);
        $this->category();
    }

    function category()
    {
        $data = [
            'tittle' => "Daftar Category",
            'kat' => $this->Asset_m->get_kat()->result_array()
        ];
        // print_r($data);
        $this->template->load('template', 'v_category', $data);
    }

    public function data()
    {
        $data = [
            'tittle' => "Data Asset",
            'aset' => $this->Asset_m->get_assets()->result_array(),
            'kat' => $this->Asset_m->get_kat()->result_array(),
            'isi' => $this->Asset_m->get_kat()->result_array()
        ];
        // print_r($data);
        $this->template->load('template', 'v_data', $data);
    }

    public function editaset($id = null)
    {
        $data = [
            'tittle' => "Data Asset",
            'aset' => $this->Asset_m->get_id($id),
            'kat' => $this->Asset_m->get_kat()->result_array()
        ];
        // print_r($data);
        $this->load->view('Asset/v_editaset', $data);
    }

    public function tambahAset()
    {
        $kd = '1234567890';
        $string = 'MSAL' . date("Ymd");
        for ($i = 0; $i < 3; $i++) {
            $pos = rand(0, strlen($kd) - 1);
            $string .= $pos;
        }
        $kat = $this->input->post('kat');
        $merk = $this->input->post('merk');
        $data = array(
            'id_kat_non' => $kat,
            'kode' => $string,
            'nama_aset' => $merk
        );
        $this->Asset_m->insertAset($data);

        // $this->db->set('qty', 'qty+1', FALSE);
        // $this->db->where('id_qty', $data['qty_id']);
        // $this->db->update('tb_qty_assets');


        $this->session->set_flashdata("pesan", "Berhasil Simpan");
        redirect(base_url('Asset/data'));
    }

    public function updateAset()
    {
        $id = $this->input->post('id');
        $kat = $this->input->post('kat');
        $merk = $this->input->post('merk');
        $data = array(
            'id_kat_non' => $kat,
            'nama_aset' => $merk
        );

        $this->Asset_m->updateAset($id, $data);
        $this->session->set_flashdata("pesan", "Berhasil Update");
        redirect(base_url('Asset/data'));
    }

    public function hapusAset($id)
    {
        $data = array('id_aset' => $id);
        $this->Asset_m->delete($data);
        $this->session->set_flashdata("pesan", "Berhasil Hapus");
        redirect(base_url('Asset/data'));
    }

    public function tambah()
    {
        $data = array('category' => $this->input->post('kat'));
        $this->Asset_m->insert($data);
        $this->session->set_flashdata("pesan", "Berhasil Simpan");
        redirect(base_url('Asset'));
        # code...
    }

    public function update()
    {
        $id = $this->input->post('id');
        $data = array('category' => $this->input->post('kat'));
        $this->Asset_m->update($id, $data);
        $this->session->set_flashdata("pesan", "Berhasil Update");
        redirect(base_url('Asset'));
        # code...
    }
}

/* End of file Controllername.php */