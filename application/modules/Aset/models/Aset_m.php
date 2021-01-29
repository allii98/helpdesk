<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Aset_m extends CI_Model
{

    public function get()
    {
        $this->db->select('*');
        $this->db->from('tb_assets');
        $this->db->join('tb_qty_assets', 'tb_qty_assets.id_qty=tb_assets.qty_id', 'inner');
        $this->db->order_by('id_assets', 'desc');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function get_aset()
    {
        $db3 = $this->load->database('db3', TRUE);
        $data = array();
        $start = $_POST['start'];
        $length = $_POST['length'];
        $no = $start + 1;




        if (!empty($_POST['search']['value'])) {
            $keyword = $_POST['search']['value'];
            $query = "SELECT tb_assets .*, tb_qty_assets.category 
            FROM tb_assets JOIN tb_qty_assets ON tb_assets.qty_id = tb_qty_assets.id_qty
            WHERE tb_assets.id_assets AND
                        (tb_assets.kode_assets,tb_assets.merk LIKE '%$keyword%'
                        OR tb_qty_assets.category LIKE '%$keyword%')
                        ORDER BY tb_assets.id_assets DESC";
            $count_all = $db3->query($query)->num_rows();
            $data_tabel = $db3->query($query . " LIMIT $start,$length")->result();
        } else {
            $query = "SELECT tb_assets .*, tb_qty_assets.category 
            FROM tb_assets JOIN tb_qty_assets ON tb_assets.qty_id = tb_qty_assets.id_qty
            WHERE tb_assets.id_assets ORDER BY tb_assets.id_assets DESC";
            $count_all = $db3->query($query)->num_rows();
            $data_tabel = $db3->query($query . " LIMIT $start,$length")->result();
        }
        foreach ($data_tabel as $hasil) {
            $row   = array();
            $row[] = $no++;
            $row[] = $hasil->kode_assets;
            $row[] = $hasil->merk;
            $row[] = $hasil->category;
            $row[] = $hasil->kuantitas;

            // $row[] = '<a href="' . site_url('Stc/update/' . $hasil->id_stc) . '" class="btn btn-link btn-primary btn-lg"><i class="fa fa-edit" title="Edit"></i></a>
            // <a href="' . site_url('Stc/printPDF/' . $hasil->id_stc . '/' . $hasil->id_pt) . '"  class="btn btn-link btn-primary" target="_blank"><i class="fa fa-print" title="Print"></i></a>
            // <a href="' . site_url('Stc/delete/' . $hasil->id_stc) . '" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-link btn-danger" ><i class="fa fa-times" title="Hapus"></i></a>
            // ';
            $data[] = $row;
        }
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $count_all,
            "recordsFiltered"   => $count_all,
            "data"              => $data,
        );
        return $output;
        // return $data;
        // return var_dump($output);
    }
}

/* End of file Aset_m.php */