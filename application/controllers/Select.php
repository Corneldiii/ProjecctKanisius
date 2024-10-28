<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Select extends CI_Controller {
    
    Public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->model("Model");
    }
    
    public function contoh1(){
        $data = $this->Model->contoh1()->result_array(); // buka class contoh1 di Model
        echo json_encode($data); 
    }
    public function getAllData(){
        $data = $this->Model->getDataUser(isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '')->result_array();
        // var_dump($data);
        echo json_encode($data); 
    }

    public function getDetailData() {
        $id = $this->input->get('id');
        $data = $this->Model->getDataById($id); // Sesuaikan dengan model Anda
        echo json_encode($data);
    }
    
    public function contoh2(){
        $inputAjax = $this->input->get('inputAjax');
		
        $data = $this->Model->contoh2($inputAjax)->result_array(); // buka class contoh2 di Model dengan inputAjax
        echo json_encode($data); 
    }
}