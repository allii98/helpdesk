<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Home_m');
    }

    function get_ajax()
    {
        $list = $this->Home_m->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $d) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $d->id_tiket;
            $row[] = date_format(date_create($d->tanggal_tiket), 'd-m-Y  H:i:s');
            $row[] = $d->nama;
            $row[] = $d->kondisi;
            // $row[] = '<img src=" ' . site_url('assets/uploads/tiket/' . $d->foto) . '" width="60px">';
            $row[] = $d->foto == 0 ? 'Tidak ada foto' : '<img src=" ' . site_url('assets/uploads/tiket/' . $d->foto) . '" width="60px">';
            $row[] = $d->prioritas == 1 ?  '' : ($d->prioritas == 2 ? '<span class="badge badge-info">Normal</span>' : ($d->prioritas == 3  ? '<span class="badge badge-primary">Utama</span>' : ($d->prioritas == 4  ? '<span class="badge badge-success">Luar biasa</span>' : false)));
            $row[] =  $d->solusi == 1 ? '<span class="badge badge-warning">Waiting</span>' : ($d->solusi == 2 ? '<span class="badge badge-primary">Progress</span>' : ($d->solusi == 3  ? '<span class="badge badge-success">Selesai</span>' : ($d->solusi == 4  ? '<span class="badge badge-danger">Butuh bantuan</span>' : false)));




            // add html for action

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Home_m->count_all(),
            "recordsFiltered" => $this->Home_m->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }


    public function index()
    {
        $data = [
            'tittle'   => 'Dashboard',
            'isi' => $this->Home_m->get()->result_array(),
            'kat' => $this->Home_m->getkategori()->result_array()

        ];
        $this->template->load('template', 'v_home', $data);
    }

    public function getisiuser()
    {
        $data = $this->Home_m->get_cmb_nama();
        echo json_encode($data);
    }

    public function tes()
    {

        $travelDate = '20/01/2021';
        $date = DateTime::createFromFormat('d/m/Y', $travelDate);
        echo $date->format('Y-m-d H:i:s');
    }

    public function simpan()
    {
        $tiket = $this->Home_m->buat_kode();

        $nama = $this->input->post('nama');
        $nama_user = $this->input->post('nama_user');
        $kondisi = $this->input->post('kondisi');

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

        $data = array(
            'id_tiket' => $tiket,
            'tanggal_tiket' => $this->input->post('tgl') . ' ' . date('H:i:s'),
            'id_user' => $nama,
            'kondisi' => $kondisi,
            'foto' => $foto,
            'prioritas' => 1,
            'solusi' => 1,

        );

        $datatracking = array(
            'id_ticket'  => $tiket,
            'tanggal'    => date("Y-m-d  H:i:s"),
            'status'     => "Tiket Dikirim",
            'nama'     => $nama_user,
            'deskripsi'  => ucfirst($this->input->post('kondisi')),
            'id_user'    => $nama
        );
        $this->Home_m->insert($data);
        $this->Home_m->inserttracking($datatracking);

        $this->session->set_flashdata("status", "Berhasil");
        redirect(base_url('Home'));
    }
}

/* End of file Controllername.php */