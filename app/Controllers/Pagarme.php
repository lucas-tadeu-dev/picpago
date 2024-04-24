<?php 

namespace App\Controllers;
use App\Controllers\BaseController;
use CodeIgniter\IHTTPClient;

class Pagarme extends BaseController
{   
    
    public function index(){
        return view('pagarme/index');
    }
    
       public function createOrder()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.pagar.me/core/v5/orders",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"customer\":{\"name\":\"Lucas\",\"type\":\"individual\",\"email\":\"lucastmb2016@gmail.com\"},\"items\":[{\"amount\":30,\"description\":\"Chaveiro\",\"quantity\":1,\"code\":\"12\"}],\"payments\":[{\"Pix\":{\"additional_information\":{\"Name\":\"Lucas\",\"Value\":\"Chaveiro\"},\"expires_in\":86400},\"payment_method\":\"pix\",\"amount\":300}],\"customer_id\":\"1\"}",
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                'Authorization: Basic ' . base64_encode('ak_live_xSf36SXvmnNtirTkFu8aR0Kzx3ZQ6L'),
                "content-type: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $data['error'] = "cURL Error #:" . $err;
        } else {
            $data['response'] = $response;
        }
        
        return view('pagarme/index', $data);
    }
}
