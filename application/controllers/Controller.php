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

        if ($person != '') {
            $result = $this->Model->getRelasiData($person);

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

    // http://localhost/surat/
    public function index()
    {
        $this->load->view('login');
    }

    // http://localhost/surat/menu
    public function menu()
    {
        $data['kodeDiv'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        $this->load->view('header', $data);
        $this->load->view('menu');
    }
    public function input()
    {
        $data['divisi'] = $this->Model->get_divisi();
        $data['kodeDiv'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        $data['noFinal'] = $this->Model->getNoSurat(1);
        $data['kodeForm'] = $this->Model->getCount(1);

        $this->load->view('header', $data);
        $this->load->view('insert', $data);
    }

    public function get_persons($divisiID)
    {
        $persons = $this->Model->get_karyawan($divisiID);
        header('Content-Type: application/json');
        echo json_encode($persons);
        // var_dump($persons);
    }
    public function menuKeluar()
    {
        $data['kodeDiv'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        $this->load->view('header', $data);
        $this->load->view('menuKeluar');
    }
    public function inputKeluar()
    {
        $data['divisi'] = $this->Model->get_divisi();
        $data['kodeDiv'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        $data['noFinal'] = $this->Model->getNoSurat(2);
        $data['kodeForm'] = $this->Model->getCount(2);

        // var_dump($this->Model->getCount());

        $this->load->view('header', $data);
        $this->load->view('insertKeluar', $data);
    }

    // http://localhost/surat/memo
    public function memo()
    {
        $data['kodeDiv'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        $this->load->view('header', $data); 
        $this->load->view('memo');

    }

    public function inputMemo()
    {
        $data['divisi'] = $this->Model->get_divisi();
        $data['kodeDiv'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        $data['noFinal'] = $this->Model->getNoSurat(3);
        $data['kodeForm'] = $this->Model->getCount(3);

        // var_dump($this->Model->getCount());

        $this->load->view('header', $data);
        $this->load->view('inputMemo', $data);
    }

    public function detailMasuk(){
        $data['kodeDiv'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        $data['divisi'] = $this->Model->get_divisi();
        $this->load->view('header', $data); 
        $this->load->view('detailMasuk',$data);
    }
    public function detailKeluar(){
        $data['kodeDiv'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        $this->load->view('header', $data); 
        $this->load->view('detailKeluar');
    }
    public function detailMemo(){
        $data['kodeDiv'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        $this->load->view('header', $data); 
        $this->load->view('detailMemo');
    }
}
