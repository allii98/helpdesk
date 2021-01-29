<?php
class Login_m extends CI_Model {
        
    function prosesLogin($username){
        $this->db->where('username',$username);
        
        return $this->db->get('tbuser')->row();
    }

    public function get($id = null)
	{
		$this->db->from('tbuser');
		if($id != null) {
			$this->db->where('user_id', $id);
		}
		$query = $this->db->get();
		return $query;
    }

    
    function viewDataByID($username){
        $query = $this->db->where('username',$username);
        $q = $this->db->get('tbuser');
        $data = $q->result();
        
        return $data;
    }

    

    function checkDataUsrbyID($id,$pass){
        $this->db->where('user_id',$id);
        $this->db->where('password',$pass);
        
        return $this->db->get('tbuser')->row();
    }

    function changepassUser($id,$data){
        $this->db->where('id_user', $id);
        $this->db->update('tb_admin', $data);

        return TRUE;
    }

    

}
