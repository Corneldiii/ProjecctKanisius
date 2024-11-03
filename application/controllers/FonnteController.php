<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FonnteController extends CI_Controller {
    private $apiKey;

    public function __construct(){
        parent::__construct();
        $this->apiKey = 'eLoxe#RX5v+um8nXdXtE';
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

        $data = [
            'target' => '6285640835130',
            'message' => $message . ' Lihat detail di: ' . $url,
        ];

        $response = $this->kirimWhatsApp($data);

        echo $response;
    }
}