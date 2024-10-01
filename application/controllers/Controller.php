<?php
defined('BASEPATH') or exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->model("Model");
        $this->load->library('session');
        $this->load->config('email');
        $this->load->library('email');
        $this->load->database();
    }

    public function login()
    {
        $user = $this->Model->login();
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect();
    }

    public function searchKodeRelasi()
    {
        $person = $this->input->post('person');
        $lembaga = $this->input->post('lembaga');

        if ($person != '' || $lembaga != '') {
            $result = $this->Model->getRelasiData($person, $lembaga);

            // Mengubah hasil menjadi array
            $output = array();
            // echo var_dump($result);
            foreach ($result as $row) {
                $output[] = array(
                    'milistId' => $row->milistId,
                    'namaPerson' => $row->namaPerson,
                    'namaLembaga' => $row->namaLembaga,
                    'alamat' => $row->alamat,
                    'kotanama' => $row->kotanama,
                    'pronama' => $row->propNama,
                    'kodepos' => $row->kodepos
                );
            }

            // Mengembalikan hasil dalam format JSON
            echo json_encode($output);
        }
    }


    public function sendEmail()
    {
        $id = $this->input->post('id');

        $data = $this->Model->getDataById($id);


        $this->email->from('aldianocta178@gmail.com', 'admin');

        $this->email->to('exdarkout@gmail.com');
        $this->email->subject('Test Email dengan SMTP CodeIgniter');
        $foto = './assets/pictSurat/bayu.png';
        $this->email->attach($foto);

        // Isi email
        $this->email->message('Ini adalah email percobaan menggunakan SMTP di CodeIgniter 3.');

        // Mengirim email
        if ($this->email->send()) {
            echo 'Email berhasil dikirim!';
        } else {
            echo $this->email->print_debugger();
        }
    }

    // http://localhost/surat/
    public function index()
    {
        $this->load->view('login');
    }

    // http://localhost/surat/menu
    public function menu()
    {
        $this->load->view('header');
        $this->load->view('menu');
    }
    public function input()
    {
        $data['divisi'] = $this->Model->get_divisi();
        $data['karyawan'] = $this->Model->get_karyawan();

        $this->load->view('header');
        $this->load->view('insert',$data);

    }
    public function menuKeluar()
    {
        $this->load->view('header');
        $this->load->view('menuKeluar');
    }
    public function inputKeluar()
    {
        $this->load->view('header');
        $this->load->view('insertKeluar');
    }
}
