<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_m extends CI_Model
{

    public function getTicket()
    {
        //Query untuk mengambil data semua ticket
        return $this->db->get('tb_tiket');
    }

    public function jmlh_new_tiket()
    {
        $solusi = 2;
        $query = "SELECT id_tiket FROM tb_tiket WHERE solusi = $solusi";
        $jlmtiket = $this->db->query($query)->num_rows();

        return $jlmtiket;
    }
}

/* End of file Admin_m.php */