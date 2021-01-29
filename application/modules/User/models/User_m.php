<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    public function get()
    {
        $db2 = $this->load->database('db2', TRUE);
        $query = $db2->select('nama')
            ->from('user_ho')
            ->order_by('id_user', 'DESC')
            ->get();

        return $query;
        # code...
    }
}

/* End of file User_m.php */