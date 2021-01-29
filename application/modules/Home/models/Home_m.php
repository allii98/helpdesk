<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home_m extends CI_Model
{

    var $table = 'tb_tiket'; //nama tabel dari database
    var $column_order = array(null, 'id_tiket', 'tanggal_tiket', 'nama', 'kondisi', 'foto',  'prioritas', 'solusi'); //field yang ada di table user
    var $column_search = array('id_tiket', 'tanggal_tiket',  'nama'); //field yang diizin untuk pencarian 
    var $order = array('id_tiket' => 'DESC'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        // $Value = ;
        $this->db->select('*');
        $this->db->from('tb_tiket');
        $this->db->join('user_ho', 'user_ho.id_user=tb_tiket.id_user', 'inner');
        $this->db->where('solusi !=', 3);

        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_cmb_nama()
    {
        $query = "SELECT nama FROM user_ho WHERE id_user = '" . $this->input->post('id') . "'";
        $aset = $this->db->query($query)->result_array();
        return $aset;
    }


    public function get()
    {
        $query = $this->db->get('user_ho');

        return $query;
        # code...
    }

    public function get_id($id)
    {
        $this->db->where('id_petugas', $id);
        $q = $this->db->get('tb_petugas');
        $data = $q->result();

        return $data;
    }

    public function getkategori()
    {
        $query = $this->db->get('tb_qty_assets');

        return $query;
        # code...
    }

    public function insert($data)
    {
        $this->db->insert('tb_tiket', $data);
        return TRUE;
    }

    public function inserttracking($data)
    {
        $this->db->insert('tracking', $data);
        return TRUE;
    }

    public function getkodetiket()
    {
        //Query untuk mengembalikan value terbesar yang ada di kolom id_tiket
        $query = $this->db->query("SELECT max(id_tiket) AS max_code FROM tb_tiket");

        //Menampung fungsi yang akan mengembalikan hasil 1 baris dari query ke dalam variabel $row
        $row = $query->row_array();

        //Menampung hasil kode tiket terbesar dari query
        $max_id = $row['max_code'];
        //Mengambil kode tiket pada database posisi 9 dan panjang kode 4
        $max_fix = (int) substr($max_id, 9, 4);

        //Hasil dari kode terbesar yang sudah didapatkan ditambah dengan 1, hasil dari penjumlahan ini akan digunakan sebagai kode tiket terbaru
        $max_tiket = $max_fix + 1;

        //Mengambil tanggal sekarang
        // $tanggal = date("d");
        //Mengambil bulan sekarang
        // $bulan = date("m");
        //Mengambil tahun sekarang
        // $tahun = date("Y");

        //Membuat id_tiket dengan format T + tahun + bulan + tanggal + kode user terbaru (%04s merupakan fungsi untuk menentukan lebar minimum yang dimiliki nilai variable serta mengubah int menjadi string, %04s menandakan lebar minimum dari tiket yaitu 4 dengan padding berupa angka 0)
        $tiket = sprintf("%04s", $max_tiket);
        return $tiket;
    }

    public function buat_kode()
    {

        $this->db->select('RIGHT(tb_tiket.id_tiket,4) as kode', FALSE);
        $this->db->order_by('id_tiket', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_tiket');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }

        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $kodejadi = $kodemax;    // hasilnya ODJ-9921-0001 dst.
        return $kodejadi;
    }
}

/* End of file Home_m.php */