<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Petugas_m extends CI_Model
{
    public function get_petugas()
    {
        $query = $this->db->get('tb_petugas');

        return $query;
        # code...
    }

    public function insert($data)
    {
        $this->db->insert('tb_petugas', $data);
        return TRUE;
    }

    public function update($id, $data)
    {
        $this->db->where('id_petugas', $id);
        $this->db->update('tb_petugas', $data);

        return TRUE;
    }

    public function delete($data)
    {
        $this->db->where($data);
        $this->db->delete('tb_petugas');

        return TRUE;
    }
}

/* End of file Petugas_m.php */