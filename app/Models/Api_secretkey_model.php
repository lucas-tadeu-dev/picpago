<?php 
namespace App\Models;

use CodeIgniter\Model;

class Api_secretkey_model extends Model
{
    protected $table = 'rise_api_secretkey';
    protected $allowedFields = ['user_id', 'mercadopago', 'pagarme', 'stripe', 'paghiper', 'pkmercadopago', 'pkpagarme','pkstripe','pkpaghiper','payment_method'];
    protected $primaryKey = 'user_id';


    public function updateSecretKey($user_id, $mercadopago, $pagarme, $stripe,  $paghiper, $pkmercadopago,$pkpagarme,$pkstripe,$pkpaghiper,$payment_method) 
{
    // Obtenha os dados existentes
    $existingData = $this->where('user_id', $user_id)->first();

    $data = [
        'user_id' => $user_id,
        'mercadopago' => !empty($mercadopago) ? $mercadopago : $existingData['mercadopago'],
        'pagarme' => !empty($pagarme) ? $pagarme : $existingData['pagarme'],
        'stripe' => !empty($stripe) ? $stripe : $existingData['stripe'],
        'paghiper' => !empty($paghiper) ? $paghiper : $existingData['paghiper'],
        'pkmercadopago' => !empty($pkmercadopago) ? $pkmercadopago : $existingData['pkmercadopago'],
        'pkpagarme' => !empty($pkpagarme) ? $pkpagarme : $existingData['pkpagarme'],
        'pkstripe' => !empty($pkstripe) ? $pkstripe : $existingData['pkstripe'],
        'pkpaghiper' => !empty($pkpaghiper) ? $pkpaghiper : $existingData['pkpaghiper'],
        'payment_method' => !empty($payment_method) ? $payment_method : $existingData['payment_method'],
    ];

    return $this->replace($data);
}

 
    public function insertSecretKey($data)
    {   
         $session = session();  // Obtain the session instance
        $userId = $session->get('user_id');
        

        $encryptedData = [
            'user_id'    => $userId,  // We are not encrypting user_id
            'stripe'     => $data['stripe'],
            'pagarme'    => $data['pagarme'],
            'paghiper'   => $data['paghiper'],
            'mercadopago'=> $data['mercadopago'],
            'pkstripe'     => $data['stripe'],
            'pkpagarme'    => $data['pagarme'],
            'pkpaghiper'   => $data['paghiper'],
            'pkmercadopago'=> $data['mercadopago']
        ];

        $this->insert($encryptedData);
    }
    
     public function insertSecretMp($data)
    {   
         $session = session();  // Obtain the session instance
        $userId = $session->get('user_id');
        

        $encryptedData = $data;

        $this->insert($encryptedData);
    }
    

    
   
  public function getSecretKeys($userId)
{
    $result = $this->find($userId);
     
    if (!$result) {
        // Return an array with empty values for each field
        return [
            'user_id' => $userId,
            'stripe' => '',
            'pagarme' => '',
            'paghiper' => '',
            'mercadopago' => '',
            'pkstripe' => '',
            'pkpagarme' => '',
            'pkpaghiper' => '',
            'pkmercadopago' => '',
            'payment_method' => '',
        ];
    }

    // Decrypt the secret keys
    $result['stripe'] = $result['stripe'];
    $result['pagarme'] = $result['pagarme'];
    $result['paghiper'] = $result['paghiper'];
    $result['mercadopago'] = $result['mercadopago'];
    $result['pkstripe'] = $result['pkstripe'];
    $result['pkpagarme'] = $result['pkpagarme'];
    $result['pkpaghiper'] = $result['pkpaghiper'];
    $result['pkmercadopago'] = $result['pkmercadopago'];
    $result['payment_method'] = $result['payment_method'];

    return $result;
}


    public function deleteSecretKey($id)
    {
        return $this->delete($id);
    }
    
}
