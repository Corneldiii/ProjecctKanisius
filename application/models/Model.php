<?php

class model extends CI_Model
{
    // contoh login
    public function login()
    {
        $username = $this->input->post('id');
        $password = $this->input->post('password');

        $query = "SELECT a.userId userId,userNama,LEFT(pegLastDivId,2) kodeDiv,divisiNama FROM tb_user a LEFT JOIN vUser b ON a.userId=b.userId
LEFT JOIN (SELECT LEFT(divID,2) divID,divNama divisiNama FROM db_personalia.`ref_divisi` WHERE RIGHT(divID,4)='0000' AND divAktif='Y') divisi
ON divID=LEFT(pegLastDivId,2) WHERE a.userId='" . $username . "' AND a.userPass=MD5('" . $password . "')"; //query database
        $user = $this->db->query($query)->row_array();

        // jika user ditemukan
        if ($user) {
            $this->session->set_userdata('login_surat', true);
            $this->session->set_userdata('id_surat', $user['userId']);
            $this->session->set_userdata('user_id', $user['kodeDiv']);

            redirect('menu');
        } else {
            $this->session->set_flashdata('type', 'alert-danger');
            $this->session->set_flashdata('pesan', '<strong>Gagal!</strong> ID atau Password salah');
            redirect();
        }
        return false;
    }

    //contoh query biasa
    public function getNoSurat($id)
    {
        $query = "SELECT SUBSTR(NOMOR,6,9) AS nomorForm FROM tb_surat WHERE LEFT(nomor,1)='" . $id . "' ORDER BY nomorForm DESC LIMIT 1";
        $result = $this->db->query($query)->row();
        return $result ? (string)$result->nomorForm : '0000';
    }

    public function getCount($id)
    {
        $query = "SELECT COUNT(*) as count FROM tb_surat WHERE LEFT(nomor,1)='" . $id . "' ";
        $result = $this->db->query($query)->row();
        return $result->count;
    }


    public function allData()
    {
        $query = "SELECT * FROM tb_surat";
        return $this->db->query($query);
    }

    public function getDataUser($kodeDivisi)
    {
        $query = "SELECT nomor, Tanggal, noSurat, tglSurat, relasiID, namaPerson, namaLembaga, hal, lampiran, keterangan FROM 
                    tb_surat WHERE LEFT(nomor,1)='1' AND (divisi='" . $kodeDivisi . "' OR dispoDivisi1 LIKE '" . $kodeDivisi . "%' OR dispoDivisi2 LIKE '" . $kodeDivisi . "%' 
                    OR dispoDivisi3 LIKE '" . $kodeDivisi . "%' OR dispoDivisi4 LIKE '" . $kodeDivisi . "%' OR dispoDivisi5 LIKE '" . $kodeDivisi . "%') ORDER BY nomor DESC";
        return $this->db->query($query);
    }

    public function getSuratKeluar($kodeDivisi)
    {
        $query = "SELECT nomor, Tanggal, noSurat, tglSurat, relasiID, namaPerson, namaLembaga, hal, lampiran, keterangan FROM tb_surat WHERE LEFT(nomor,1)='2' AND divisi='" . $kodeDivisi . "' ORDER BY nomor DESC ";
        return $this->db->query($query);
    }

    public function getDataById($nomor)
    {
        $query = "SELECT * FROM 
                    tb_surat WHERE LEFT(nomor,1)='1' AND nomor = '" . $nomor . "'";
        $result = $this->db->query($query);
        return $result->row_array();
    }


    //contoh query dengan input dari AJAX
    public function contoh2($inputAjax)
    {
        $query = "SELECT kolom FROM tabel WHERE kolom = '" . $inputAjax . "'";
        return $this->db->query($query);
    }

    public function getDivisi($ID)
    {
        $query = "SELECT divID, DivNama FROM db_personalia.ref_divisi WHERE divAktif = 'Y' AND divID = ?";
        return $this->db->query($query, array($ID))->row();
    }

    public function getPerson($id){
        $query = "SELECT userId,userNama FROM vUser WHERE userId = ?";
        return $this->db->query($query,array($id))->row();
    }

    public function get_divisi()
    {
        $this->db->select('divID, DivNama');
        $this->db->from('db_personalia.ref_divisi');
        $this->db->where('divAktif', 'Y');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_karyawan($divisiID)
    {
        $this->db->select('userId, userNama');
        $this->db->from('vUser');
        $this->db->where('pegLastDivId', $divisiID);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function getRelasiData($person)
    {
        $this->db->select('milistId, namaPerson, namaLembaga, alamat, kotanama, kodepos, propNama');
        $this->db->from('db_referensi.ref_alamat a');
        $this->db->join('db_referensi.ref_kota b', 'b.kotakode=a.kota', 'left');
        $this->db->join('db_referensi.ref_propinsi c', 'c.propKode=a.propinsi', 'left');
        $this->db->where('STATUS', 'Y');
        $this->db->like('namaPerson', $person);
        $this->db->or_like('namaLembaga', $person);

        $query = $this->db->get();
        return $query->result();
    }


    public function insertMasuk($data)
    {
        $this->db->insert('tb_surat', $data);
    }

    //update model

    
}
