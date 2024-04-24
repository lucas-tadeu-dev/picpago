<?php

namespace App\Models;

use CodeIgniter\Model;

class Piccoin_model extends Model
{
    protected $table = 'rise_piccoin';
    protected $primaryKey = 'user_id';
    protected $returnType = 'array';
    protected $allowedFields = ['user_id', 'balance','value'];
    
    // Método para inserir saldo
    public function insertBalance($userId, $balance) {
        // Certifique-se de que o userId e o saldo são válidos
        if (is_numeric($userId) && is_numeric($balance)) {
            $data = [
                'user_id' => $userId,
                'balance' => $balance,
            ];
            return $this->insert($data);
        }
        return false;
    }

    // Método para atualizar saldo
   public function updateBalance($userId, $balance) {
        // Certifique-se de que o userId e o saldo são válidos
        if (!is_numeric($userId) || !is_numeric($balance)) {
            throw new \Exception("O userId e o saldo devem ser numéricos.");
        }

        // Obter o saldo atual
        $currentBalance = $this->where('user_id', $userId)->first()['balance'];

        // Adicionar o novo saldo ao saldo atual
        $newBalance = $currentBalance + $balance;

        $data = [
            'balance' => $newBalance,
        ];
        return $this->update($userId, $data);
    }
    
    public function insertValue($userId, $value) {
    if (is_numeric($userId) && is_numeric($value)) {
        $data = [
            'user_id' => $userId,
            'value' => $value,
        ];
        return $this->save($data);
    }
    throw new \Exception("O userId e o valor devem ser numéricos.");
}

    public function getPiccoinData($userId) {
    return $this->where('user_id', $userId)->first();
}

}
