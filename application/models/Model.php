<?php

class model extends CI_Model
{
    // contoh login
    public function login()
    {
        $username = $this->input->post('id');
        $password = $this->input->post('password');

        $query = "SELECT username, password FROM user WHERE username = '" . $username . "'"; //query database
        $user = $this->db->query($query)->row_array();

        // jika user ditemukan
        if ($user) {
            if (md5($password) == $user['password']) { //if user password input = user password di database
                $_SESSION['login_surat'] = true;
                $_SESSION['id_surat'] = $user['userId'];

                redirect('menu');
            } else {
                $this->session->set_flashdata('type', 'alert-danger');
                $this->session->set_flashdata('pesan', '<strong>Gagal!</strong> ID atau Password salah');
                redirect();
            }
        } else {
            $this->session->set_flashdata('type', 'alert-danger');
            $this->session->set_flashdata('pesan', '<strong>Gagal!</strong> ID atau Password salah');
            redirect();
        }
        return false;
    }

    //contoh query biasa
    public function contoh1()
    {
        $query = "SELECT kolom FROM tabel";
        return $this->db->query($query);
    }

    public function allData()
    {
        $query = "SELECT * FROM surat";
        return $this->db->query($query);
    }
    public function getDataByID($id)
    {
        $query = "SELECT * FROM surat WHERE id_surat = '" . $id . "'";
        return $this->db->query($query);
    }

    //contoh query dengan input dari AJAX
    public function contoh2($inputAjax)
    {
        $query = "SELECT kolom FROM tabel WHERE kolom = '" . $inputAjax . "'";
        return $this->db->query($query);
    }

    // public function getRelasiData()
    // {
    //     $query = "SELECT milistId,namaPerson,namaLembaga,alamat,kotanama,kodepos,propNama 
    //     FROM db_referensi.ref_alamat a 
    //     LEFT JOIN db_referensi.ref_kota b ON b.kotakode=a.kota LEFT JOIN db_referensi.ref_propinsi c ON c.propKode=a.propinsi
    //     WHERE STATUS='Y' AND (namaPerson LIKE '%%' OR namaLembaga LIKE '%%')";

    //     return $this->db->query($query);



    // }

    public function get_divisi()
    {
        $this->db->select('divID, DivNama');
        $this->db->from('db_personalia.ref_divisi');
        $this->db->where('divAktif', 'Y');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_karyawan()
    {
        $this->db->select('userId, userNama');
        $this->db->from('vUser');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getRelasiData($person, $lembaga)
    {
        $this->db->select('milistId, namaPerson, namaLembaga, alamat, kotanama, kodepos, propNama');
        $this->db->from('db_referensi.ref_alamat a');
        $this->db->join('db_referensi.ref_kota b', 'b.kotakode=a.kota', 'left');
        $this->db->join('db_referensi.ref_propinsi c', 'c.propKode=a.propinsi', 'left');
        $this->db->where('STATUS', 'Y');
        $this->db->like('namaPerson', $person);
        $this->db->or_like('namaLembaga', $lembaga);

        $query = $this->db->get();
        return $query->result();
    }
}
