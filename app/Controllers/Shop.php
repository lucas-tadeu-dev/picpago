<?php
namespace App\Controllers;

use App\Models\Package_model;
use App\Models\Piccoin_model;

class Shop extends Security_Controller
{
    protected $piccoinModel;
    protected $packageModel;

    public function __construct()
    {
        parent::__construct();
        helper('form');
        $this->piccoinModel = new Piccoin_model();
        $this->packageModel = new Package_model();
    }
    
    
    
    public function index()
    {
        $session = session();  
        $userId = $session->get('user_id'); 

        $piccoinData = $this->piccoinModel->getPiccoinData($userId);
         
        // Fetch user's packages
        $packages = $this->packageModel->getUserPackages($userId);

        // Pass the packages to the view
        return $this->template->rander('shop/index', ['packages' => $packages,'piccoinData' => $piccoinData]);
    }
    
    public function buy()
{
    $session = session();  
    $userId = $session->get('user_id'); 
        
    $createdById = $this->login_user->created_by;
    
    if ($createdById == 0) {
        return redirect()->to('/dashboard'); 
    }

    // Agora obtemos os dados da loja do usuário que criou o usuário logado
    $piccoinDataCreatedBy = $this->piccoinModel->getPiccoinData($createdById);
    
     // Agora obtemos os dados da loja do usuário que criou o usuário logado
    $piccoinData = $this->piccoinModel->getPiccoinData($userId);
     
    // Busca os pacotes do usuário que criou o usuário logado
    $packages = $this->packageModel->getUserPackages($createdById);

    // Passa os pacotes para a view
    return $this->template->rander('shop/buy', ['packages' => $packages, 'piccoinData' => $piccoinData, 'piccoinDataCreatedBy' =>$piccoinDataCreatedBy]);
}



    
    
    public function createPlan()
    {
       $session = session();  // Obtain the session instance
        $userId = $session->get('user_id'); 
        
      $piccoinData = $this->piccoinModel->getPiccoinData($userId);    
        
     return $this->template->rander('shop/createPlan', ['packages' => $packages]);
    }
    
    public function createPackage()
    {
        $session = session();  // Obtain the session instance
        $userId = $session->get('user_id'); 
        
        // Pegue a quantidade de PicCoins do formulário
        $coins_quantity = $this->request->getPost('coins_quantity');
        $package_value = $this->request->getPost('package_value');

        // Insira um novo pacote na tabela rise_packages
        // $model = new Package_model();
         $packages= $this->packageModel->insertPackage($userId, $coins_quantity,$package_value);
        $packages= $this->packageModel->getUserPackages($userId);
        

        // Redirecione o usuário de volta para a loja
          echo json_encode(array("success" => true, 'message' => 'Plano Criado com sucesso! Vamos para loja agora?'));
    }
    
    public function excluir() {
    // Obtemos o package_id do formulário
    $packageId = $this->request->getPost('package_id');

    // Deletamos o pacote
    $this->packageModel->deletePackage($packageId);

    // Redirecionamos para a página da loja
   echo json_encode(array("success" => true, 'message' => 'Plano excluido com sucesso!'));
}


    
     public function insertValue()
    {
        $session = session();  // Obtain the session instance
        $userId = $session->get('user_id'); 
        $value = $this->request->getPost('value');

        if (!$value) {
        echo json_encode(array("success" => false, 'message' => 'Sucesso, agora suas PicCoins já têm valor!'));
        return;
         }
    try {
        $this->piccoinModel->insertValue($userId, $value);
        echo json_encode(array("success" => true, 'message' => 'Valor por PicCoin atualizado com sucesso!'));
    } catch (\Exception $e) {
        echo json_encode(array("success" => false, 'message' => 'Erro: ' . $e->getMessage()));
    }
    }
    
    
    // renderiza view send_piccoin
    public function send_piccoin() {
        
         $session = session();  
        $userId = $session->get('user_id'); 
        
         // Agora obtemos os dados da loja do usuário que criou o usuário logado
        $piccoinData = $this->piccoinModel->getPiccoinData($userId);
    
        if (!$this->can_view_team_members_list()) {
            app_redirect("forbidden");
        }

        // $view_data["show_contact_info"] = $this->can_view_team_members_contact_info();

        $view_data["custom_field_headers"] = $this->Custom_fields_model->get_custom_field_headers_for_table("team_members", $this->login_user->is_admin, $this->login_user->user_type);
        $view_data["custom_field_filters"] = $this->Custom_fields_model->get_custom_field_filters("team_members", $this->login_user->is_admin, $this->login_user->user_type);
        
        // Adicione a variável $piccoinData ao array $view_data
        $view_data["piccoinData"] = $piccoinData;

        return $this->template->rander("send_piccoin/index", $view_data);
    }
 
  
    
    
}
