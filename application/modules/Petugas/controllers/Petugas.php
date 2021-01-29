<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
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
        $this->load->model('Petugas_m');
    }


    public function index()
    {
        $data = [
            'tittle' => "Daftar Petugas",
            'petugas' => $this->Petugas_m->get_petugas()->result_array()
        ];
        // print_r($data);
        $this->template->load('template', 'v_petugas', $data);
    }

    public function tambah()
    {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $no = $this->input->post('no');
        $dept = $this->input->post('dept');

        $data = array(
            'nama_petugas' => $nama,
            'email' => $email,
            'no_hp' => $no,
            'dept' => $dept
        );
        $this->Petugas_m->insert($data);

        $this->session->set_flashdata("pesan", "Berhasil Simpan");
        redirect(base_url('Petugas'));
    }

    public function update()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $no = $this->input->post('no');
        $dept = $this->input->post('dept');

        $data = array(
            'nama_petugas' => $nama,
            'email' => $email,
            'no_hp' => $no,
            'dept' => $dept
        );
        $this->Petugas_m->update($id, $data);

        $this->session->set_flashdata("pesan", "Berhasil Update");
        redirect(base_url('Petugas'));
    }

    public function hapus($id)
    {
        $data = array('id_petugas' => $id);
        $this->Petugas_m->delete($data);
        $this->session->set_flashdata("pesan", "Berhasil Hapus");
        redirect(base_url('Petugas'));
    }
}

/* End of file Controllername.php */