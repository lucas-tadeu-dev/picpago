<?php 

namespace App\Controllers;
use CodeIgniter\Controller;


class Paghiper_payment extends BaseController
{   
    
     function index(){
        return $this->template->rander("paghiper_payment/index");
     }
    
    public function createPix()
    {
        $data = [
            'apiKey' => 'apk_42642779-yaNXMOcjQBWWcnmiwsPfMtmrPDbaruxl',
            'order_id' => '96874',
            'payer_email' => 'lucastmb2016@gmail.com',
             'payer_cpf_cnpj' => '43212224860',
            'payer_name' => 'Lucas',
          'fixed_description' => true,
          'days_due_date' => '5', // dias para vencimento do Pix
            'items' => [
                ['description' => 'PicPago', 'quantity' => '1', 'item_id' => '1', 'price_cents' => '300'],
                // demais itens...
            ],
        ];

        $data_post = json_encode($data);
        $url = "https://pix.paghiper.com/invoice/create/";
        $mediaType = "application/json";
        $charSet = "UTF-8";
        $headers = [
            "Accept: " . $mediaType,
            "Accept-Charset: " . $charSet,
            "Accept-Encoding: " . $mediaType,
            "Content-Type: " . $mediaType . ";charset=" . $charSet,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_post);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        $json = json_decode($result, true);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode == 201) {
            return view('paghiper_payment/index', [
        'transaction_id' => $json['pix_create_request']['transaction_id'],
        'response_message' => $json['pix_create_request']['response_message'],
        'created_date' => $json['pix_create_request']['created_date'],
        'value_cents' => $json['pix_create_request']['value_cents'],
        'order_id' => $json['pix_create_request']['order_id'],
        'due_date' => $json['pix_create_request']['due_date'],
        'qrcode_base64' => $json['pix_create_request']['pix_code']['qrcode_base64'],
        'emv' => $json['pix_create_request']['pix_code']['emv'],
        'pix_url' => $json['pix_create_request']['pix_code']['pix_url'],
        'bacen_url' => $json['pix_create_request']['pix_code']['bacen_url'],
        ]);
            
            
        } else {
            // return view('paghiper_payment/index', ['erro' => $json['error']]);
            return view('paghiper_payment/index', ['erro' => $result]);
        }
    }
    
   
    public function createBoleto()
    {
        // Carregar o serviço HTTP do Codeigniter
        $http = service('request');

        // Configurar a chamada à API
        $data = array(
          'apiKey' => 'apk_42642779-yaNXMOcjQBWWcnmiwsPfMtmrPDbaruxl',
          'order_id' => '96874',
          'payer_email' => 'lucastmb2016@gmail.com',
          'payer_name' => 'Lucas',
          'payer_cpf_cnpj' => '43212224860',
          'days_due_date' => '5',
          'type_bank_slip' => 'boletoA4',
          'items' => array(
         array ('description' => 'PicPago',
        'quantity' => '1',
        'item_id' => '1',
        'price_cents' => '3012'), // em centavos
        ),
        );

        $options = [
            'http' => [
                'method' => 'POST',
                'header' => "Accept: application/json\r\n" .
                    "Accept-Charset: UTF-8\r\n" .
                    "Accept-Encoding: application/json\r\n" .
                    "Content-Type: application/json;charset=UTF-8\r\n",
                'content' => json_encode($data),
                'ignore_errors' => true,
            ],
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
            ],
        ];

        // Realizar a chamada à API
        $context = stream_context_create($options);
        $result = file_get_contents("https://api.paghiper.com/transaction/create/", false, $context);

        // Processar a resposta
        $json = json_decode($result, true);
        $httpCode = $http->getServer('REDIRECT_STATUS');
        
        if($json['create_request']['http_code'] == 201){
            // CÓDIGO 201 SIGNIFICA QUE O BOLETO FOI GERADO COM SUCESSO
            return view('paghiper_payment/index', [
                'transaction_id' => $json['create_request']['transaction_id'],
                'url_slip' => $json['create_request']['bank_slip']['url_slip'],
                'digitable_line' => $json['create_request']['bank_slip']['digitable_line'],
            ]);
        } else {
            // Se a chamada à API retornou um erro, redirecionar para a view de erro
            return view('paghiper_payment/index', ['erro' => $result]);
        }
    }


    
    
    
    
    
    
    
    
    
    
    
    
}




















