<?php

namespace App\Controllers;

use CodeIgniter\View\View;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
require_once(APPPATH.'ThirdParty/stripe-php/init.php');

class Api extends BaseController{
    
    public function __construct() {
        parent::__construct();
        \Stripe\Stripe::setApiKey('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');
    }
        
    function index() {
       return view("teste/index");
    }
    
   //--------------------------------------------------------------------------------------------------------------
    // -------------------------------------------------------------------------------------------------------------
    // ----------------------------------------START MERCADO PAGO PAYMENTS------------------------------------------
    // -------------------------------------------------------------------------------------------------------------
    // -------------------------------------------------------------------------------------------------------------
     public function mercadopago()
{

     $accessToken = 'APP_USR-4979649439226832-061012-abc7bf8f73e82bcac24ce23565a68be9-706796429';

    // Use o método getPost para obter os dados POST
     $transaction_amount = str_replace(',', '.', $this->request->getPost('transaction_amount'));
        $transaction_amount = floatval($transaction_amount);
        $description = $this->request->getPost('description');
        $payment_method_id = $this->request->getPost('payment_method_id');
        $payer_email = $this->request->getPost('payer_email');
       

        
        $paymentData = array(
            'transaction_amount' => $transaction_amount,
            'description' => $description,
            'payment_method_id' => $payment_method_id,
            'payer' => array(
                'email' => $payer_email
            )
        );
    
        $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $accessToken
            ),
            'content' => json_encode($paymentData),
            'ignore_errors' => true
        )
    );
    
    
    // Faça a solicitação HTTP para criar o pagamento
    $url = 'https://api.mercadopago.com/v1/payments';
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    $responseData = json_decode($response, true);
    
        // Verifique a resposta da API
    if ($responseData && isset($responseData['status'])) {
        echo var_dump($responseData);  // Para depurar a resposta
        if ($responseData['status'] === 'approved' && isset($responseData['transaction_details']['external_resource_url'])) {
            echo 'Chave do Pix: ' . $responseData['transaction_details']['external_resource_url'];
        }
    } else {
        echo 'Erro ao processar o pagamento';
    }
    
    // ... código para obter a resposta da API do Mercado Pago ...

    // Passar os dados da resposta para a view
    $data['status'] = $responseData['status'];
    $data['transactionId'] = $responseData['id'];
     $data['buyerEmail'] = $responseData['payer']['email'];
    $data['amount'] = $responseData['transaction_amount'];

    
}

    //--------------------------------------------------------------------------------------------------------------
    // -------------------------------------------------------------------------------------------------------------
    // ----------------------------------------START STRIPE PAYMENTS------------------------------------------------
    // -------------------------------------------------------------------------------------------------------------
    // -------------------------------------------------------------------------------------------------------------

    public function stripe()
        {   
            $request = \Config\Services::request();
            
            $transaction_amount = str_replace(',', '.', $request->getPost('amount'));
            $amount = floatval($transaction_amount);
            $token  = $request->getPost('stripeToken');
            $email  = $request->getPost('stripeEmail');
            $description = $request->getPost('description');
            
            try {
                $charge = \Stripe\Charge::create([
                    'amount' => $amount,
                    'currency' => 'brl',
                    'description' => $description,
                    'source' => $token,
                ]);
               
               $response = [
            'status' => 'success',
            'amount' => $amount,
            'email' => $email,
            'charge' => $charge
            ];

               
            } catch (\Stripe\Exception\CardException $e) {
             
             $response = [
            'status' => 'error',
            'message' => $e->getError()->message
          ];
          }
            
        return $this->response->setJSON($response);    
        
    }


   //--------------------------------------------------------------------------------------------------------------
    // -------------------------------------------------------------------------------------------------------------
    // ----------------------------------------START PAGARME PAYMENTS-----------------------------------------------
    // -------------------------------------------------------------------------------------------------------------
    // -------------------------------------------------------------------------------------------------------------

   public function pagarme() {
    $customerName = $this->request->getPost('customerName');
    $customerType = $this->request->getPost('customerType');
    $customerEmail = $this->request->getPost('customerEmail');
    $itemName = $this->request->getPost('itemName');
    $itemAmount = $this->request->getPost('itemAmount');
    $itemDescription = $this->request->getPost('itemDescription');
    $itemQuantity = $this->request->getPost('itemQuantity');
    $itemCode = $this->request->getPost('itemCode');
    $paymentMethod = $this->request->getPost('paymentMethod');
    $paymentAmount = $this->request->getPost('paymentAmount');
    $customerId = $this->request->getPost('customerId');

    $curl = curl_init();

    $postFields = array(
        'customer' => array(
            'name' => $customerName,
            'type' => $customerType,
            'email' => $customerEmail
        ),
        'items' => array(
            array(
                'amount' => $itemAmount,
                'description' => $itemDescription,
                'quantity' => $itemQuantity,
                'code' => $itemCode
            )
        ),
        'payments' => array(
            array(
                'payment_method' => $paymentMethod,
                'amount' => $paymentAmount
            )
        ),
        'customer_id' => $customerId
    );

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.pagar.me/core/v5/orders",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($postFields),
        CURLOPT_HTTPHEADER => [
            "accept: application/json",
            'Authorization: Basic ' . base64_encode('ak_live_xSf36SXvmnNtirTkFu8aR0Kzx3ZQ6L'),
            "content-type: application/json"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    // Declarando um array para armazenar os dados de resposta
    $data = array();

    if ($err) {
        $data['error'] = "cURL Error #:" . $err;
    } else {
        $data['response'] = $response;
    }
    
    // Retornando os dados como JSON
    return $this->response->setStatusCode(200)
                          ->setContentType('application/json')
                          ->setBody(json_encode($data));
}





   //--------------------------------------------------------------------------------------------------------------
    // -------------------------------------------------------------------------------------------------------------
    // ----------------------------------------START PAGHIPER-------------------------------------------------------
    // -------------------------------------------------------------------------------------------------------------
    // -------------------------------------------------------------------------------------------------------------


     public function paghiper()
    {
        // Carrega a biblioteca do CodeIgniter para lidar com solicitações POST
        helper('form');

        // Obtenha os dados das solicitações POST
        $payment_method = $this->request->getPost('payment_method');
        $orderId = floatval($this->request->getPost('order_id'));
        $email = $this->request->getPost('payer_email');
        $cpfCnpj = $this->request->getPost('payer_cpf_cnpj');
        $name = $this->request->getPost('payer_name');
        $daysDueDate =floatval($this->request->getPost('days_due_date'));
        $description = $this->request->getPost('description');
        $quantity = floatval($this->request->getPost('quantity'));
        $item_id = floatval($this->request->getPost('item_id'));
        $price_cents = floatval($this->request->getPost('price_cents'));
        
        
            // Cria um array com os dados coletados
        $data = [
            'payment_method'->$payment_method,
            'apiKey' => 'apk_42642779-yaNXMOcjQBWWcnmiwsPfMtmrPDbaruxl',
            'order_id' => $orderId,
            'payer_email' => $email,
            'payer_cpf_cnpj' => $cpfCnpj,
            'payer_name' => $name,
            'fixed_description' => true,
            'days_due_date' => $daysDueDate,
            'items' => [
                ['description' => $description, 'quantity' => $quantity, 'item_id' => $item_id, 'price_cents' => $price_cents],
            ],
        ];
        
        if($payment_method == 'pix'){
            
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
             $response = [
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
                ];
            
                return $this->response->setStatusCode(200)
                                      ->setJSON($response);
            }else{
            $response = [
                'error' => 'Alguma coisa deu errado.',
            ];
            return $this->response->setStatusCode(400)->setJSON($response);
            }
         }
         
        //---------------------------------- ---------------------------------------------------------------------------
        // ----------------------------------------------BOLETO---------------------------------------------------------
        // -------------------------------------------------------------------------------------------------------------
        
        
         if($payment_method == 'boleto'){
             
        // Carregar o serviço HTTP do Codeigniter
        $http = service('request');

        // Configurar a chamada à API
        $data = array(
          'apiKey' => 'apk_42642779-yaNXMOcjQBWWcnmiwsPfMtmrPDbaruxl',
          'order_id' => $orderId,
          'payer_email' => $email,
          'payer_name' => $name,
          'payer_cpf_cnpj' => $cpfCnpj,
          'days_due_date' => $daysDueDate,
          'type_bank_slip' => 'boletoA4',
          'items' => array(
         array ('description' => $description,
        'quantity' => $quantity,
        'item_id' => $item_id,
        'price_cents' => $price_cents), // em centavos
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
        $response = [
            'transaction_id' => $json['create_request']['transaction_id'],
            'url_slip' => $json['create_request']['bank_slip']['url_slip'],
            'digitable_line' => $json['create_request']['bank_slip']['digitable_line'],
            ];
            return $this->response->setStatusCode(200)->setJSON($response);
        } else {
            $response = [
                'error' => $result,
            ];
            return $this->response->setStatusCode(400)->setJSON($response);
        }
    }
    
    

}






}
/* End of file About.php */
/* Location: ./app/controllers/About.php */