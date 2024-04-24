<?php 
namespace App\Models;

use CodeIgniter\Model;

class Webhook_mercadopago_model extends Model
{
    protected $table = 'rise_webhook_mercadopago';
    protected $allowedFields = ['id', 'user_id', 'created_by', 'payment_id', 'amount'];
    protected $primaryKey = 'id';

    public function getDetailsByPaymentId($payment_id) 
    {
        return $this->select('user_id, created_by, payment_id, amount')
                    ->where('payment_id', $payment_id)
                    ->first();
    }
    
    public function insertDetails($user_id, $created_by, $payment_id, $amount) 
{
    $db      = \Config\Database::connect();
    $builder = $db->table($this->table);
    
    $data = [
        'user_id' => $user_id,
        'created_by' => $created_by,
        'payment_id' => $payment_id,
        'amount' => $amount
    ];
    
    // Apenas insira o registro
    return $builder->insert($data);
}

    
}
