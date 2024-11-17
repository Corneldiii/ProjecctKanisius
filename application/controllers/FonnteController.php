<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FonnteController extends CI_Controller {
    private $apiKey;

    public function __construct(){
        parent::__construct();
        $this->apiKey = 'eLoxe#RX5v+um8nXdXtE';
        $this->load->model("Model");
    }

    public function kirimWhatsApp($data){
        $url = 'https://api.fonnte.com/send';

        $headers = [
            'Authorization: ' . $this->apiKey
        ];

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => $headers,
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }



    public function kirimPesan(){
        $message = $this->input->post('message');
        $url = $this->input->post('url');
        $id = $this->input->post('userid');
        $jam = date('H');
        $Ucapan = '';

        if($jam >= 0 && $jam <= 9){
            $ucapan = 'Selamat Pagi,Maaf menganggu kepada Bpk/Ibu';
        }else if($jam >= 10 && $jam <= 14){
            $ucapan = 'Selamat Siang,Maaf menganggu kepada Bpk/Ibu';
        }else if($jam >= 15 && $jam <= 18){
            $ucapan = 'Selamat Sore,Maaf menganggu kepada Bpk/Ibu';
        }else{
            $ucapan = 'Selamat Malam,Maaf menganggu kepada Bpk/Ibu';
        }

        var_dump($id);

        foreach ($id as $value) {
            if(!empty($value)){
                $nomor = $this->Model->getNoTelp($value);

                $data = [
                    // 'target' => $nomor->pegHP,
                    'target' => '6285640835130',
                    'message' => $ucapan.':'. $nomor->userNama .','. $message . ' Lihat detail di: ' . $url,
                ];
                
                $response = $this->kirimWhatsApp($data); 
            }
        }

    }
}