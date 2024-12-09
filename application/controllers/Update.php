<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Update extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->helper('date');
        $this->load->model("Model");
        $this->load->library('session');
        $this->load->config('email');
        $this->load->library('email');
        $this->load->database();
    }


    public function update_data()
    {
        var_dump($_POST);

        $nomor = $this->input->post('nomorSurat');
        $tanggal = $this->input->post('tanggal');
        $jenis = $this->input->post('jenis');
        $nomorSuratFisik = $this->input->post('nomorSuratFisik');
        $tanggalSurat = $this->input->post('tanggalSurat');
        $hal = $this->input->post('hal');
        $lampiran = $this->input->post('lampiran');
        $keterangan = $this->input->post('keterangan');
        $kodeRelasi = $this->input->post('kodeRelasi');
        $namaPerson = $this->input->post('namaPerson');
        $namaLembaga = $this->input->post('namaLembaga');
        $alamat = $this->input->post('alamat');
        $kota = $this->input->post('kota');
        $propinsi = $this->input->post('propinsi');
        $kodepos = $this->input->post('kodepos');
        $divisi1 = $this->input->post('divisi1');
        $divisi2 = $this->input->post('divisi2');
        $divisi3 = $this->input->post('divisi3');
        $divisi4 = $this->input->post('divisi4');
        $divisi5 = $this->input->post('divisi5');
        $person1 = $this->input->post('person1');
        $person2 = $this->input->post('person2');
        $person3 = $this->input->post('person3');
        $person4 = $this->input->post('person4');
        $person5 = $this->input->post('person5');

        $filePath = null;
        if (!empty($_FILES['file']['name'])) {
            $config['upload_path'] = FCPATH . 'file/';
            $config['allowed_types'] = 'pdf|jpg|png|docx';
            $config['max_size'] = 2048;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                $uploadData = $this->upload->data();
                $filePath = 'file/' . $uploadData['file_name'];
            } else {
                echo $this->upload->display_errors();
            }
        }

        if ($jenis == 'surat') {
            $jenis = 1;
        } else if ($jenis == 'email') {
            $jenis = 2;
        } else if ($jenis == 'penawaran') {
            $jenis = 3;
        } else {
            $jenis = null;
        }

        // Data array untuk disimpan di database
        $data = array(
            'nomor' => $nomor,
            'tanggal' => $tanggal,
            'jenis' => $jenis,
            'noSurat' => $nomorSuratFisik,
            'tglSurat' => $tanggalSurat,
            'hal' => $hal,
            'lampiran' => $lampiran,
            'keterangan' => $keterangan,
            'relasiID' => $kodeRelasi,
            'namaPerson' => $namaPerson,
            'namaLembaga' => $namaLembaga,
            'alamat' => $alamat,
            'kota' => $kota,
            'propinsi' => $propinsi,
            'kodepos' => $kodepos,
            'divisi' => isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '',
            'createUserID' => isset($_SESSION['id_surat']) ? $_SESSION['id_surat'] : '',
            'createDate' => date('Y-m-d H:i:s'),
            'file' => $filePath,
            'dispoDivisi1' => $divisi1,
            'dispoDivisi2' => $divisi2,
            'dispoDivisi3' => $divisi3,
            'dispoDivisi4' => $divisi4,
            'dispoDivisi5' => $divisi5,
            'dispoNoreg1' => $person1,
            'dispoNoreg2' => $person2,
            'dispoNoreg3' => $person3,
            'dispoNoreg4' => $person4,
            'dispoNoreg5' => $person5
        );

        var_dump($data);

        // Update data di database
        $this->Model->update($nomor, $data);

        echo json_encode(array("status" => "success"));
    }


    public function update_Keluar()
    {
        var_dump($_POST);

        $nomor = $this->input->post('nomorSurat');
        $tanggal = $this->input->post('tanggal');
        $jenis = $this->input->post('jenis');
        $nomorSuratFisik = $this->input->post('nomorSuratFisik');
        $tanggalSurat = $this->input->post('tanggalSurat');
        $hal = $this->input->post('hal');
        $lampiran = $this->input->post('lampiran');
        $keterangan = $this->input->post('keterangan');
        $kodeRelasi = $this->input->post('kodeRelasi');
        $namaPerson = $this->input->post('namaPerson');
        $namaLembaga = $this->input->post('namaLembaga');
        $alamat = $this->input->post('alamat');
        $kota = $this->input->post('kota');
        $propinsi = $this->input->post('propinsi');
        $kodepos = $this->input->post('kodepos');

        $filePath = null;
        if (!empty($_FILES['file']['name'])) {
            $config['upload_path'] = FCPATH . 'file/';
            $config['allowed_types'] = 'pdf|jpg|png|docx';
            $config['max_size'] = 2048;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                $uploadData = $this->upload->data();
                $filePath = 'file/' . $uploadData['file_name'];
            } else {
                echo $this->upload->display_errors();
            }
        }

        if ($jenis == 'surat') {
            $jenis = 1;
        } else if ($jenis == 'email') {
            $jenis = 2;
        } else if ($jenis == 'penawaran') {
            $jenis = 3;
        } else {
            $jenis = null;
        }

        // Data array untuk disimpan di database
        $data = array(
            'nomor' => $nomor,
            'tanggal' => $tanggal,
            'jenis' => $jenis,
            'noSurat' => $nomorSuratFisik,
            'tglSurat' => $tanggalSurat,
            'hal' => $hal,
            'lampiran' => $lampiran,
            'keterangan' => $keterangan,
            'relasiID' => $kodeRelasi,
            'namaPerson' => $namaPerson,
            'namaLembaga' => $namaLembaga,
            'alamat' => $alamat,
            'kota' => $kota,
            'propinsi' => $propinsi,
            'kodepos' => $kodepos,
            'divisi' => isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '',
            'createUserID' => isset($_SESSION['id_surat']) ? $_SESSION['id_surat'] : '',
            'createDate' => date('Y-m-d H:i:s'),
            'file' => $filePath
        );

        var_dump($data);

        // Update data di database
        $this->Model->update($nomor, $data);

        echo json_encode(array("status" => "success"));
    }

    public function update_Memo()
    {
        var_dump($_POST);

        $nomor = $this->input->post('nomorSurat');
        $tanggal = $this->input->post('tanggal');
        $jenis = $this->input->post('jenis');
        $nomorSuratFisik = $this->input->post('nomorSuratFisik');
        $tanggalSurat = $this->input->post('tanggalSurat');
        $hal = $this->input->post('hal');
        $lampiran = $this->input->post('lampiran');
        $keterangan = $this->input->post('keterangan');
        $divisi1 = $this->input->post('divisi1');
        $divisi2 = $this->input->post('divisi2');
        $divisi3 = $this->input->post('divisi3');
        $divisi4 = $this->input->post('divisi4');
        $divisi5 = $this->input->post('divisi5');
        $person1 = $this->input->post('person1');
        $person2 = $this->input->post('person2');
        $person3 = $this->input->post('person3');
        $person4 = $this->input->post('person4');
        $person5 = $this->input->post('person5');

        $filePath = null;
        if (!empty($_FILES['file']['name'])) {
            $config['upload_path'] = FCPATH . 'file/';
            $config['allowed_types'] = 'pdf|jpg|png|docx';
            $config['max_size'] = 2048;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                $uploadData = $this->upload->data();
                $filePath = 'file/' . $uploadData['file_name'];
            } else {
                echo $this->upload->display_errors();
            }
        }

        if ($jenis == 'surat') {
            $jenis = 1;
        } else if ($jenis == 'email') {
            $jenis = 2;
        } else if ($jenis == 'penawaran') {
            $jenis = 3;
        } else {
            $jenis = null;
        }

        // Data array untuk disimpan di database
        $data = array(
            'nomor' => $nomor,
            'tanggal' => $tanggal,
            'jenis' => $jenis,
            'noSurat' => $nomorSuratFisik,
            'tglSurat' => $tanggalSurat,
            'hal' => $hal,
            'lampiran' => $lampiran,
            'keterangan' => $keterangan,
            'divisi' => isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '',
            'createUserID' => isset($_SESSION['id_surat']) ? $_SESSION['id_surat'] : '',
            'createDate' => date('Y-m-d H:i:s'),
            'file' => $filePath,
            'dispoDivisi1' => $divisi1,
            'dispoDivisi2' => $divisi2,
            'dispoDivisi3' => $divisi3,
            'dispoDivisi4' => $divisi4,
            'dispoDivisi5' => $divisi5,
            'dispoNoreg1' => $person1,
            'dispoNoreg2' => $person2,
            'dispoNoreg3' => $person3,
            'dispoNoreg4' => $person4,
            'dispoNoreg5' => $person5
        );

        var_dump($data);

        // Update data di database
        $this->Model->update($nomor, $data);

        echo json_encode(array("status" => "success"));
    }
}
