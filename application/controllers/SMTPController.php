<?php
defined('BASEPATH') or exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class SMPTPController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model("Model");
        $this->load->config('email');
        $this->load->library('email');
        $this->load->database();
    }

    public function sendEmail()
    {
        $id = $this->input->post('id');

        $data = $this->Model->getDataById($id);


        $this->email->from('aldianocta178@gmail.com', 'admin');

        $this->email->to('exdarkout@gmail.com');
        $this->email->subject('Test Email dengan SMTP CodeIgniter');
        $file = 'file/bayu.png';
        $this->email->attach($file);

        // Isi email
        $this->email->message('Ini adalah email percobaan menggunakan SMTP di CodeIgniter 3.');

        // Mengirim email
        if ($this->email->send()) {
            echo 'Email berhasil dikirim!';
        } else {
            echo $this->email->print_debugger();
        }
    }
}
