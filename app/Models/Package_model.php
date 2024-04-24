<?php
namespace App\Models;

use CodeIgniter\Model;

class Package_model extends Model
{
    protected $table = 'rise_packages';
    protected $primaryKey = 'package_id';
    protected $allowedFields = ['user_id', 'coins_quantity','package_value'];

    public function insertPackage($userId, $coins_quantity,$package_value)
    {
        $data = [
            'user_id' => $userId,
            'coins_quantity' => $coins_quantity,
            'package_value' => $package_value
        ];
        $this->insert($data);
    }
    
     public function getUserPackages($userId) {
        return $this->where('user_id', $userId)->findAll();
    }
    
    public function deletePackage($packageId)
    {
        return $this->delete($packageId);
    }

}
