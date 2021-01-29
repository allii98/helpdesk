<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tiket extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Tiket_m');
        if (!$this->session->userdata('userlogin')) {
            $pemberitahuan = "<div class='alert alert-warning'>Anda harus login dulu </div>";
            $this->session->set_flashdata('pesan', $pemberitahuan);
            redirect('Login');
        }
    }


    public function index()
    {
        $data = [
            'tittle' => "Tiket Masuk",
            'tiket' => $this->Tiket_m->getTiket()->result_array()
        ];
        // print_r($data);
        $this->template->load('template', 'v_diterima', $data);
    }

    public function tugas()
    {
        $data = [
            'tittle' => "Daftar Tugas",
            'tugas' => $this->Tiket_m->getTugas()->result_array()
        ];
        // print_r($data);
        $this->template->load('template', 'v_tugas', $data);
    }

    public function selesai()
    {
        $data = [
            'tittle' => "List Tugas Selesai",
            'selesai' => $this->Tiket_m->getSelesai()->result_array()
        ];
        // print_r($data);
        $this->template->load('template', 'v_tugas', $data);
    }

    public function detail($id = null)
    {
        $data = [
            'tittle' => "Detail Tiket",
            'isi' => $this->Tiket_m->get_id($id),
            'tracking' => $this->Tiket_m->gettracking($id),
            'proses' => $this->Tiket_m->get_proses()
        ];
        // print_r($data);
        $this->template->load('template', 'v_detail', $data);
    }

    public function approve($id = null)
    {
        $data = [
            'tittle' => "Form solusi",
            'isi' => $this->Tiket_m->get_id($id),
            'tracking' => $this->Tiket_m->gettracking($id),
            'petugas' => $this->Tiket_m->get_petugas()->result_array()
        ];
        // print_r($data);
        $this->template->load('template', 'v_approve', $data);
    }

    public function getisiaset()
    {
        $data = $this->Tiket_m->get_cmb_aset();
        echo json_encode($data);
    }

    public function getisinonaset()
    {
        $data = $this->Tiket_m->get_cmb_non_aset();
        echo json_encode($data);
    }

    public function getnamapetugas()
    {
        $data = $this->Tiket_m->get_nama_petugas();
        echo json_encode($data);
    }



    public function getisipetugas()
    {
        $data = $this->Tiket_m->get_cmb_petugas();
        echo json_encode($data);
    }

    public function edit($id = null)
    {
        $data = [
            'tittle' => "Update tindakan",
            'isi' => $this->Tiket_m->get_id($id),
            'tindakan' => $this->Tiket_m->getidtindakan($id),
            'tracking' => $this->Tiket_m->gettracking($id),
            'petugas' => $this->Tiket_m->get_petugas()->result_array(),
            'kat' => $this->Tiket_m->get_kat()->result_array(),
            'kategori' => $this->Tiket_m->get_kategori()->result_array(),
        ];
        $this->template->load('template', 'v_update', $data);
    }

    public function tes()
    {
        $waktu_awal        = strtotime($this->input->post('tglmulai'));
        $waktu_akhir    = strtotime($this->input->post('tgl')); // bisa juga waktu sekarang now()

        //menghitung selisih dengan hasil detik
        $diff    = $waktu_akhir - $waktu_awal;

        //membagi detik menjadi jam
        $jam    = floor($diff / (60 * 60));


        $menit    = $diff - $jam * (60 * 60);
        echo $jam . 'jam' . '-' . floor($menit / 60) . 'menit';
    }
    public function editpost()
    {
        $id = $this->input->post('no_tiket');
        $user = $this->input->post('user');
        $bantuan = $this->input->post('bantuan');
        $petugas = $this->input->post('petugas');
        $kat = $this->input->post('kat');
        $asets = $this->input->post('aset');
        $katnon = $this->input->post('kat_non');
        $id_non = $this->input->post('id_non');
        $jenis = $this->input->post('jenis');
        $tindakan = $this->input->post('tindakan');
        $solusi = $this->input->post('solusi');
        $catatan = $this->input->post('catatan');
        $faktor = $this->input->post('faktor');

        if ($_FILES['img']['name'] != "") {
            $config['upload_path'] = './assets/uploads/tiket/';
            $config['allowed_types'] =     'gif|jpg|png|jpeg|jpe|pdf|doc|docx|rtf|text|txt';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('img')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $upload_data = $this->upload->data();
                $foto = $upload_data['file_name'];
            }
        } else {
            $foto = $this->input->post('old');
        }

        // untuk progres
        if ($solusi == 2) {
            $progres = 50;
            $selesai = "";
        } else if ($solusi == 4) {
            $progres = 50;
            $selesai = "";
        } else if ($solusi == 3) {
            $progres = 100;
            $selesai = date("Y-m-d  H:i:s");

            $waktu_awal        = strtotime($this->input->post('tglmulai'));
            $waktu_akhir    = strtotime($this->input->post('tgl')); // bisa juga waktu sekarang now()

            //menghitung selisih dengan hasil detik
            $diff    = $waktu_akhir - $waktu_awal;

            //membagi detik menjadi jam
            $jam    = floor($diff / (60 * 60));


            $menit    = $diff - $jam * (60 * 60);
            $durasi = $jam . 'jam' . floor($menit / 60) . 'menit';
        }

        if ($asets == null) {
            $aset = 0;
        } else {
            $aset = $this->input->post('aset');
        }

        if ($bantuan == null) {
            $Pbantuan = "";
        } else {
            $Pbantuan = $this->input->post('bantuan');
        }

        $data = array(
            'solusi' => $solusi,
            'nama_bantuan' => $this->input->post('p'),
            'id_bantuan' => $Pbantuan,
            'progres' => $progres,
            'date_done' => $selesai,
            'durasi' => $durasi
        );
        $this->Tiket_m->updateTiket($id, $data);

        $d = array(

            'nama_petugas' => $Pbantuan,
            'solusi' => $solusi,
            'catatan' => $catatan,
            'faktor' => $$faktor,
            'foto_hasil' => $foto
        );
        $this->Tiket_m->updateTindakan($id, $d);

        if ($solusi == 2) {
            $status = "Ditangani";
        } else if ($solusi == 4) {
            $status = "Butuh bantuan";
        } else if ($solusi == 3) {
            $status = "Selesai";
        }

        if ($bantuan == null) {
            $Petugasbantuan = $this->input->post('nama_petugas');
        } else {
            $Petugasbantuan = $this->input->post('p');
        }

        $datatracking = array(
            'id_ticket'  => $id,
            'tanggal'    => date("Y-m-d  H:i:s"),
            'status'     => $status,
            'deskripsi' => $catatan,
            'nama' => $Petugasbantuan,
            'id_user'    => $user,
            'filefoto' => $foto
        );
        $this->Tiket_m->insertTracking($datatracking);
        $this->session->set_flashdata("pesan", "Berhasil");
        redirect(base_url('Tiket'));
    }

    public function updateTugas($id = null)
    {
        $data = [
            'tittle' => "Form tindakan",
            'isi' => $this->Tiket_m->get_id_($id),
            'tracking' => $this->Tiket_m->gettracking($id),
            'petugas' => $this->Tiket_m->get_petugas()->result_array(),
            'kat' => $this->Tiket_m->get_kat()->result_array(),
            'kategori' => $this->Tiket_m->get_kategori()->result_array(),
            // 'aset' => $this->Tiket_m->get_aset()->result_array()
        ];
        // print_r($data);
        $this->template->load('template', 'v_updateTugas', $data);
    }

    public function updatePost()
    {
        $id = $this->input->post('no_tiket');
        $user = $this->input->post('user');
        $nama_petugas = $this->input->post('nama_petugas');
        $petugas = $this->input->post('petugas');
        $kat = $this->input->post('kat');
        $asets = $this->input->post('aset');
        $katnon = $this->input->post('kat_non');
        $id_non = $this->input->post('id_non');
        $jenis = $this->input->post('jenis');
        $tindakan = $this->input->post('tindakan');
        $solusi = $this->input->post('solusi');
        $catatan = $this->input->post('catatan');
        $faktor = $this->input->post('faktor');

        if ($_FILES['img']['name'] != "") {
            $config['upload_path'] = './assets/uploads/tiket/';
            $config['allowed_types'] =     'gif|jpg|png|jpeg|jpe|pdf|doc|docx|rtf|text|txt';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('img')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $upload_data = $this->upload->data();
                $foto = $upload_data['file_name'];
            }
        } else {
            $foto = $this->input->post('old');
        }

        // untuk progres
        if ($solusi == 2) {
            $progres = 50;
            $selesai = "";
        } else if ($solusi == 4) {
            $progres = 50;
            $selesai = "";
        } else if ($solusi == 3) {
            $progres = 100;
            $selesai = date("Y-m-d  H:i:s");
        }

        if ($asets == null) {
            $aset = 0;
        } else {
            $aset = $this->input->post('aset');
        }




        $data = array(
            'solusi' => $solusi,
            'nama_petugas' => $nama_petugas,
            'progres' => $progres,
            'date_acc' => date("Y-m-d  H:i:s"),
            'date_done' => $selesai,
            'solusi' => $solusi = $this->input->post('solusi'),
            'id_kategori' => $katnon,
            'id_aset' => $id_non,
            'id_kat' => $kat,
            'kat_aset' => $this->input->post('merk'),
            'kategori' => $jenis,
        );
        $this->Tiket_m->updateTiket($id, $data);

        if ($kat == null) {
            $kategori = 0;
        } else {
            $kategori = $this->input->post('kat');
        }

        if ($asets == null) {
            $assets = 0;
        } else {
            $assets = $this->input->post('aset');
        }

        if ($katnon == null) {
            $kategorinon = 0;
        } else {
            $kategorinon = $this->input->post('kat_non');
        }
        if ($id_non == null) {
            $id_non_aset = 0;
        } else {
            $id_non_aset = $this->input->post('id_non');
        }

        $d = array(
            'tanggal' => $this->input->post('tgl') . ' ' . date('H:i:s'),
            'id_kat_aset' => $kategori,
            'id_aset' => $assets,
            'id_kat_non' => $kategorinon,
            'id_non_aset' => $id_non_aset,
            'id_tiket' => $id,
            'id_user' => $user,
            'nama_petugas' => $nama_petugas,
            'tindakan' => $tindakan,
            'solusi' => $solusi,
            'catatan' => $catatan,
            'faktor' => $faktor,
            'foto_hasil' => $foto
        );
        $this->Tiket_m->insertTindakan($d);

        if ($solusi == 2) {
            $status = "Ditangani";
        } else if ($solusi == 4) {
            $status = "Butuh bantuan";
        } else if ($solusi == 3) {
            $status = "Selesai";
        }

        $datatracking = array(
            'id_ticket'  => $id,
            'tanggal'    => date("Y-m-d  H:i:s"),
            'status'     => $status,
            'deskripsi' => $catatan,
            'nama' => $petugas,
            'id_user'    => $user,
            'filefoto' => $foto
        );
        $this->Tiket_m->insertTracking($datatracking);

        $this->session->set_flashdata("pesan", "Berhasil");
        redirect(base_url('Tiket'));
    }

    public function apply()
    {
        $id = $this->input->post('no_tiket');
        $prioritas = $this->input->post('prioritas');
        $nama_acc = $this->input->post('nama_acc');
        $id_user = $this->input->post('user');

        $data = array(
            'prioritas' => $prioritas,
            'nama_acc' => $nama_acc,
            'date_acc' => date("Y-m-d  H:i:s"),


        );

        if ($prioritas == 2) {
            $deskripsi = "Normal";
        } else if ($prioritas == 4) {
            $deskripsi = "Utama";
        } else if ($prioritas == 3) {
            $deskripsi = "Luar biasa";
        }


        $datatracking = array(
            'id_ticket'  => $id,
            'tanggal'    => date("Y-m-d  H:i:s"),
            'status'     => "Admin memberikan prioritas",
            'nama' => $nama_acc,
            'deskripsi' => $deskripsi,
            'id_user'    => $id_user
        );

        $this->Tiket_m->updateTiket($id, $data);
        $this->Tiket_m->insertTracking($datatracking);

        $this->session->set_flashdata("pesan", "Berhasil");
        redirect(base_url('Tiket'));
    }

    public function delete($id)
    {
        $data = array('id_tiket' => $id);
        $this->Tiket_m->delete($data);
        $this->session->set_flashdata("pesan", "Berhasil Hapus");
        redirect(base_url('Tiket'));
    }
}

/* End of file Controllername.php */