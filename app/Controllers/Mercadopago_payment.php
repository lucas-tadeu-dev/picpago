<?php

namespace App\Controllers;

use CodeIgniter\View\View;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\Admin_model;
use App\Models\Webhook_mercadopago_model;


class Mercadopago_payment extends Security_Controller{
    
    function index() {
        
       return view("teste/index");
    }
    
     public function processPayment()
{
     $dealer = $this->request->getPost('dealer');
     
     $email = $this->login_user->email;
     
      $model = new Admin_model();
      $data['admin'] = $model->getAdminSettings();
      $admin = $model->getAdminSettings();
      $accessToken = $admin['mercadopago'];
  
    
    if($dealer == 2){
        $plan_value = intval($admin['ultra_value']);
    } else{
       $plan_value = intval($admin['master_value']);
    }
    
    $month_quantity = $this->request->getPost('month_quantity');
    $six_desc = $admin['six_months_descount'];
    $twelve_desc = $admin['one_year_descount'];
    
   
    
    if($month_quantity == 'twelve'){
        $plan_value = $plan_value*12;
         $discount = $plan_value * ($twelve_desc / 100);
           $plan_value = $plan_value - $discount;
           
     }if($month_quantity == 'six'){
        $plan_value = $plan_value*6;
        $discount = $plan_value * ($six_desc / 100);
        $plan_value = $plan_value - $discount;
        
     }else{
        $plan_value = $plan_value + 0;
    }
        
    // Dados do pagamento
    $paymentData = array(
        'transaction_amount' => $plan_value,
        'description' => 'Exemplo de pagamento',
        'payment_method_id' => 'pix',
        'payer' => array(
            'email' =>"lucastmb2016@gmail.com",
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
   

    // Passar os dados da resposta para a view
    $data['status'] = $responseData['status'];
    $data['transactionId'] = $responseData['id'];
    $data['buyerEmail'] = $responseData['payer']['email'];
    $data['amount'] = $responseData['transaction_amount'];
    $data['pixcode'] = $responseData['point_of_interaction']['transaction_data']['qr_code'];
    $data['qrcode'] = $responseData['point_of_interaction']['transaction_data']['qr_code_base64']; 

    // Carregar a view e passar os dados
     return $this->template->rander("mercadopago_payment/index", $data);
}

 public function creditCard()
    {
    $model = new Admin_model();
      $data['admin'] = $model->getAdminSettings();
      $admin = $model->getAdminSettings();
      
      
        // 5% FEE EACH TRANSACTION  
        $token = $this->request->getPost('token');
        $issuer_id = $this->request->getPost('issuer_id');
        $month_quantity = $this->request->getPost('month_quantity');
        
        $installments = $this->request->getPost('installments');
       
       
       $accessToken = $admin['mercadopago'];
       $publicKey = $admin['pkmercadopago'] ;
        
        if($issuer_id == 0){
            $issuer_id = 24;
            $payment_method_id = "master";
        } else{
            $issuer_id = 25;
             $payment_method_id = "visa";
        }
        
        if($dealer == 2){
            $plan_value = intval($admin['ultra_value']);
        } else{
           $plan_value = intval($admin['master_value']);
        }
        
         $month_quantity = $this->request->getPost('month_quantity');
    $six_desc = $admin['six_months_descount'];
    $twelve_desc = $admin['one_year_descount'];
    
   
    
    if($month_quantity == 'twelve'){
        $plan_value = $plan_value*12;
         $discount = $plan_value * ($twelve_desc / 100);
           $plan_value = $plan_value - $discount;
           
     }if($month_quantity == 'six'){
        $plan_value = $plan_value*6;
        $discount = $plan_value * ($six_desc / 100);
        $plan_value = $plan_value - $discount;
        
     }else{
        $plan_value = $plan_value + 0;
    }
        
        
        $data = [
            "additional_info" => [
                "items" => [
                    [
                        "id" => "MLB2907679857",
                        "title" => "PicPago",
                        "description" => "Plano na plataforma PicPago",
                        "picture_url" => "https://http2.mlstatic.com/resources/frontend/statics/growth-sellers-landings/device-mlb-point-i_medium@2x.png",
                        "category_id" => "Sistema",
                        "quantity" => 1,
                        "unit_price" => 5.8
                    ]
                ],
                "payer" => [
                    "first_name" => "Test",
                    "last_name" => "Test",
                    "phone" => [
                        "area_code" => 11,
                        "number" => "987654321"
                    ],
                    "address" => new \stdClass()
                ],
                "shipments" => [
                    "receiver_address" => [
                        "zip_code" => "12312-123",
                        "state_name" => "São Paulo",
                        "city_name" => "Penha",
                        "street_name" => "Av das Nacoes Unidas",
                        "street_number" => 300
                    ],
                ]
            ],
            "description" => "Payment for product",
            "external_reference" => "MP0001",
            "installments" => $installments,
            "issuer_id" => $issuer_id,
            "metadata" => new \stdClass(),
            "payer" => [
                "entity_type" => "individual",
                "type" => "customer",
                "email" => "lucastmb2016@gmail.com",
                "identification" => new \stdClass()
            ],
            "payment_method_id" => $payment_method_id,
            "token" => $token,
            "transaction_amount" => $plan_value
        ];
        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.mercadopago.com/v1/payments");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $accessToken,
            'Content-Type: application/json'
        ));

        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        if ($httpCode >= 200 && $httpCode < 300) {
            $paymentData = json_decode($result, true);
            $data['paymentData'] = $paymentData;
            return $this->template->rander('creditcard_succes/index', $data);
        } else {
            show_404();
        }
        
        curl_close($ch);
    }





public function consultaSaldo()
    {
        // Substitua "seu_access_token" pelo seu token de acesso real
           $access_token = "APP_USR-4979649439226832-061012-abc7bf8f73e82bcac24ce23565a68be9-706796429";

        // Define a URL da API
        $apiUrl = "https://api.mercadopago.com/v1/account/settlement_report/config";

        // Inicia a sessão cURL
        $ch = curl_init();

        // Define a URL para a sessão cURL
        curl_setopt($ch, CURLOPT_URL, $apiUrl);

        // Define a transferência como uma string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Define o cabeçalho da solicitação incluindo o token de acesso
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $access_token));

        // Executa a sessão cURL e armazena a resposta
        $response = curl_exec($ch);

        // Captura o código de resposta HTTP
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Fecha a sessão cURL
        curl_close($ch);

        // Decodifica a resposta em formato de array
        $data = json_decode($response, true);

        if ($httpcode >= 200 && $httpcode < 300) {
            // Passa os dados para a view
            return view('teste/index', ['success' => true, 'data' => $data]);
        } else {
            // Passa a mensagem de erro para a view juntamente com o código HTTP
            return view('teste/index', ['success' => false, 'data' => $data['message'], 'httpcode' => $httpcode]);
        }
    }

 
 
 
public function webhook() {
    
    // Capture o transaction_id da resposta do Mercado Pago
    $data = $this->request->getJSON(true);
    $payment_id = isset($data['transaction_id']) ? $data['transaction_id'] : null;

    // Se o payment_id estiver definido, proceda
    if($payment_id) {
        $model = new Webhook_mercadopago_model();
        $details = $model->getDetailsByPaymentId($payment_id);
        
        // echo "User ID: " . $details['user_id'];
        // echo "Payment ID: " . $details['payment_id'];
        // echo "Amount: " . $details['amount'];

        // Continue com a sua lógica
        $transactionController = new Transaction();
        $transactionController->transfer_piccoins_after_payment($details['created_by'], $details['user_id'], $details['amount']);
        
         return view('teste/index', $data);
    } else {
        echo "transaction_id não foi encontrado na resposta do webhook.";
    }

   
}

  
  
  
  
  
  
  
  
  
  
  
  
    
}

/* End of file About.php */
/* Location: ./app/controllers/About.php */