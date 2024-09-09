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
        $this->load->database();
    }

    public function login()
    {
        $user = $this->Model->login();
        if (empty($user)) {
            $this->session->set_flashdata('type', 'alert-success'); //bootstrap alert
            $this->session->set_flashdata('pesan', '<strong>Sukses!</strong> Anda berhasil login.');
            redirect($this->index());
        }
        // jika user tidak ditemukan
        else {
            $this->session->set_flashdata('type', 'alert-danger');
            $this->session->set_flashdata('pesan', '<strong>Gagal!</strong> ID atau Password salah');
            redirect();
        }


        // echo "test";
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect();
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
}
