<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Insert extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->library('upload');
        $this->load->config('email');
        $this->load->library('email');
        $this->load->database();
        $this->load->model("Model");
    }

    public function index() {}

    public function insert()
    {
        $data = [
            'nomor' => $this->input->post('nomor'),
            'tanggal' => $this->input->post('tanggal'),
            'jenis' => $this->input->post('jenis'),
            'noSurat' => $this->input->post('nomorSuratFisik'),
            'tglSurat' => $this->input->post('tanggalSurat'),
            'hal' => $this->input->post('hal'),
            'lampiran' => $this->input->post('lampiran'),
            'keterangan' => $this->input->post('keterangan'),
            'namaPerson' => $this->input->post('namaPerson'),
            'namaLembaga' => $this->input->post('namaLembaga'),
            'alamat' => $this->input->post('alamat'),
            'kota' => $this->input->post('kota'),
            'propinsi' => $this->input->post('propinsi'),
            'kodepos' => $this->input->post('kodepos'),
            'divisi' => $this->input->post('divisi'),
            'file' => $file,
            'dispoDivisi1' => $this->input->post('dispoDivisi1'),
            'dispoNoreg1' => $this->input->post('dispoNoreg1'),
            'dispoDivisi2' => $this->input->post('dispoDivisi2'),
            'dispoNoreg12' => $this->input->post('dispoNoreg2'),
            'dispoDivisi3' => $this->input->post('dispoDivisi3'),
            'dispoNoreg3' => $this->input->post('dispoNoreg3'),
            'dispoDivisi4' => $this->input->post('dispoDivisi4'),
            'dispoNoreg4' => $this->input->post('dispoNoreg4'),
            'dispoDivisi5' => $this->input->post('dispoDivisi5'),
            'dispoNoreg5' => $this->input->post('dispoNoreg5'),
        ];

        $insert = $this->Surat_model->insertSurat($data);

        if ($insert) {
            echo json_encode(["status" => true, "message" => "Data berhasil disimpan"]);
        } else {
            echo json_encode(["status" => false, "message" => "Data gagal disimpan"]);
        }
    }

    public function contoh2()
    {
        $inputAjax = $this->input->post('inputAjax');

        $this->Model->contoh2($inputAjax);
        redirect('menu');
    }
}
