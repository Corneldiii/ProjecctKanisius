<?php

class model extends CI_Model
{
    // contoh login
    public function login(){
        $username = $this->input->post('id');
        $password = $this->input->post('password');
        
        $query = "SELECT username, password FROM user WHERE username = '".$username."'"; //query database
        $user = $this->db->query($query)->row_array();
        
        // jika user ditemukan
        if ($user) {
            if (md5($password) == $user['password']){ //if user password input = user password di database
                $_SESSION['login_surat'] = true;
                $_SESSION['id_surat'] = $user['userId'];
				
                return $user;
            }
        }
        return false;
    }
	
    //contoh query biasa
    public function contoh1(){
        $query = "SELECT kolom FROM tabel";
        return $this->db->query($query);
    }
	
    //contoh query dengan input dari AJAX
    public function contoh2($inputAjax){
        $query = "SELECT kolom FROM tabel WHERE kolom = '".$inputAjax."'";
        return $this->db->query($query);
    }
}

