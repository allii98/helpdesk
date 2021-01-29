<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Aset extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Aset_m');
        if (!$this->session->userdata('userlogin')) {
            $pemberitahuan = "<div class='alert alert-warning'>Anda harus login dulu </div>";
            $this->session->set_flashdata('pesan', $pemberitahuan);
            redirect('Login');
        }
    }

    function get_ajax()
    {
        $list = $this->Aset_m->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $d) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $d->kode_assets;
            $row[] = $d->merk;
            $row[] = $d->category;
            $row[] = $d->serial_number;
            $row[] = $d->lokasi;
            // add html for action

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Aset_m->count_all(),
            "recordsFiltered" => $this->Aset_m->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }

    public function get_aset()
    {
        $data = $this->Aset_m->get_aset();
        print_r($data);
        # code...
    }

    public function index()
    {
        $data = [
            'tittle' => "Data Aset",
            'isi' => $this->Aset_m->get()
        ];
        $this->template->load('template', 'v_aset', $data);
    }
}

/* End of file Controllername.php */