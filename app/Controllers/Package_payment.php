<?php
namespace App\Controllers;

use CodeIgniter\View\View;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\Package_model;
use App\Models\Api_secretkey_model;
use App\Models\Piccoin_model;
use App\Models\Transaction_model;
use App\Controllers\Transaction;
use App\Models\Webhook_mercadopago_model;

class Package_payment extends Security_Controller{
    
    protected $Api_secretkey;
    
    public function __construct()
    {
        parent::__construct();
        helper('form');
        $this->Api_secretkey = new Api_secretkey_model();
    }
    
     public function index($package_id)
    {   
       
       $createdById = $this->login_user->created_by;
    
       $secretkey_data = $this->Api_secretkey->getSecretKeys($createdById);
       
       $mercadopagoKey = $secretkey_data['mercadopago'];
       $pagarmeKey = $secretkey_data['pagarme'];
       $stripeKey = $secretkey_data['stripe'];
       $paghiperKey = $secretkey_data['paghiper'];
       $pkmercadopagoKey = $secretkey_data['pkmercadopago'];
       $pkpagarmeKey = $secretkey_data['pkpagarme'];
       $pkstripeKey = $secretkey_data['pkstripe'];
       $pkpaghiperKey = $secretkey_data['pkpaghiper'];
       
        
        $packageModel = new Package_model();
        
        // Buscar pacote do banco de dados
        $package = $packageModel->find($package_id);
        
         $data['email'] = $this->login_user->email;

        // Verificar se o pacote foi encontrado
        if (!$package) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('O plano de ID: ' . $package_id . ' não foi encontrado.');
        }
       
       
        if(($mercadopagoKey && $pkmercadopagoKey) || ($pagarmeKey && $pkpagarmeKey) || ($stripeKey && $pkstripeKey) || ($paghiperKey || $pkpaghiperKey)){
        // Enviar pacote para a view
       return $this->template->rander('package_payment/index', [
        'package' => $package, 
        'email' => $data['email'],
        'pkmercadopagoKey' => $pkmercadopagoKey,
       ]);
        } else{
            return $this->template->rander("payment_error/index", $data);
        }
    }
    
    
// public function getSecretKeys($userId)
     public function mercadoPagoPix()
    {
     $amount = $this->request->getPost('amount');
     $email = $this->request->getPost('email');
     $coins_quantity = $this->request->getPost('coins_quantity');
     
     $id = $this->login_user->id;    
     $createdById = $this->login_user->created_by;
    
     $secretkey_data = $this->Api_secretkey->getSecretKeys($createdById);
     
     $mercadopagoKey = $secretkey_data['mercadopago'];
     $pagarmeKey = $secretkey_data['pagarme'];
     $stripeKey = $secretkey_data['stripe'];
     $paghiperKey = $secretkey_data['paghiper'];
        
    // Dados do pagamento
    $paymentData = array(
        'transaction_amount' => floatval($amount),
        'description' => 'PicCoins PicPago',
        'payment_method_id' => 'pix',
        'payer' => array(
            'email' =>$email,
            'id'=>$id
        )
    );
    
        $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $mercadopagoKey
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


  

// Verificar se a solicitação foi bem-sucedida
if (isset($responseData['status']) && $responseData['status'] == 'approved') {
    // O pagamento foi bem-sucedido, preparar os dados para a view
    $data['status'] = $responseData['status'];
    $data['transactionId'] = $responseData['id'];
    $data['buyerEmail'] = $responseData['payer']['email'];
    $data['amount'] = $responseData['transaction_amount'];
    $data['pixcode'] = $responseData['point_of_interaction']['transaction_data']['qr_code'];
    $data['qrcode'] = $responseData['point_of_interaction']['transaction_data']['qr_code_base64'];

    // Adicionar $email, $amount e $secretkey_data
    $data['email'] = $email;
    $data['amount'] = $amount;
    $data['secretkey_data'] = $mercadopagoKey;
    
    $model = new Webhook_mercadopago_model();
    $model->insertDetails($id, $createdById, $responseData['id'], $coins_quantity);
    
    
    //  $transactionController = new Transaction();
    //  $transactionController->transfer_piccoins_after_payment($createdById, $id, $coins_quantity);

    // Carregar a view e passar os dados
    return $this->template->rander("mercadopago_payment/index", $data);
} else {
    // Houve um erro com o pagamento, preparar os dados para a view de erro
    $data['error'] = isset($responseData['error']) ? $responseData['error'] : 'Erro desconhecido';

    // Carregar a view de erro e passar os dados
    return $this->template->rander("payment_error/index", $data);
}

}



public function mercadoPagoCreditCard()
    {
    $id = $this->login_user->id;    
    $createdById = $this->login_user->created_by;
    
     $secretkey_data = $this->Api_secretkey->getSecretKeys($createdById);
     
     $mercadopagoKey = $secretkey_data['mercadopago'];
     $pagarmeKey = $secretkey_data['pagarme'];
     $stripeKey = $secretkey_data['stripe'];
     $paghiperKey = $secretkey_data['paghiper'];
     $pkmercadopagoKey = $secretkey_data['pkmercadopago'];
     $pkpagarmeKey = $secretkey_data['pkpagarme'];
     $pkstripeKey = $secretkey_data['pkstripe'];
     $pkpaghiperKey = $secretkey_data['pkpaghiper'];
     
     $coins_quantity = $this->request->getPost('coins_quantity');
      
      
        // 5% FEE EACH TRANSACTION  
        $token = $this->request->getPost('token');
        $issuer_id = $this->request->getPost('issuer_id');
        $amount = $this->request->getPost('amount');
        $installments = $this->request->getPost('installments');
        $package_value = $this->request->getPost('package_value');
      
        
        if($issuer_id == 0){
            $issuer_id = 24;
            $payment_method_id = "master";
        } else{
            $issuer_id = 25;
             $payment_method_id = "visa";
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
            "transaction_amount" => $amount
        ];
        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.mercadopago.com/v1/payments");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $mercadopagoKey,
            'Content-Type: application/json'
        ));

       $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        if ($httpCode >= 200 && $httpCode < 300) {
            
            $paymentData = json_decode($result, true);
           
            // O pagamento foi bem-sucedido, preparar os dados para a view
            $data['status'] = $paymentData['status'];
            $data['transactionId'] = $paymentData['id'];
            $data['paymentData'] = $paymentData;
            
            $transactionController = new Transaction();
            $transactionController->transfer_piccoins_after_payment($createdById, $id, $coins_quantity);
    
            // Carregar a view e passar os dados
            return $this->template->rander('creditcard_succes/index', $data);
            
        } else {
            // Se o código HTTP não está entre 200 e 300, houve um erro HTTP
            $data['error'] = 'HTTP error: ' . $httpCode;
        
            // Carregar a view de erro e passar os dados
            return $this->template->rander("payment_error/index", $data);
        }
        curl_close($ch);
    }

























}