<?php 

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\View\View;
use App\Models\Api_secretkey_model;
use App\Models\Users_model;

class Api_secretkey extends Security_Controller

{   
     public function __construct() {
        parent::__construct();
       $this->Api_secretkey_model = new Api_secretkey_model();
     }
    
    public function index(){
    return view('Api_secretkey/index');
    }
    
   
    public function updateSecretKeys() {
     $session = session();  
    $userId = $session->get('user_id'); 

    $secretKeyModel = new Api_secretkey_model();

    $mercadopago = $this->request->getPost('mercadopago');
    $pagarme = $this->request->getPost('pagarme');
    $stripe = $this->request->getPost('stripe');
    $paghiper = $this->request->getPost('paghiper');
    $pkmercadopago = $this->request->getPost('pkmercadopago');
    $pkpagarme = $this->request->getPost('pkpagarme');
    $pkstripe = $this->request->getPost('pkstripe');
    $pkpaghiper = $this->request->getPost('pkpaghiper');
    $option_value = $this->request->getPost('option');


    $secretKeyModel->updateSecretKey($userId,$mercadopago,$pagarme, $stripe, $paghiper, $pkmercadopago,$pkpagarme,$pkstripe,$pkpaghiper,$option_value);
    
     echo json_encode(array("success" => true, 'message' => 'Seus dados foram salvos com sucesso'));
}
    
    public function getSecretKey() 
{
      $session = session();  // Obtain the session instance
        $userId = $session->get('user_id');

    $secretKeyModel = new Api_secretkey_model();
    $data['secretkeys'] = $secretKeyModel->getSecretKeys($userId);

    return view('teste/index', $data);
}



    public function delete()
    {
        $session = session();  // Obtain the session instance
        $userId = $session->get('user_id');
       

        if ($this->Api_secretkey_model->deleteSecretKey($userId)) {
            echo 'Secret keys deleted successfully';
        } else {
            echo 'Failed to delete secret keys';
        }
    }
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
   
}

