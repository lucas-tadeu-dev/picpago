<?php namespace App\Models;

use CodeIgniter\Model;

class Admin_model extends Model
{
    protected $table = 'rise_admin';
    protected $allowedFields = ['mercadopago', 'stripe', 'pagarme', 'paghiper','pkmercadopago', 'pkstripe', 'pkpagarme', 'pkpaghiper','master_value','ultra_value','six_months_descount','one_year_descount'];

    public function getFirstRow()
    {
        return $this->first();
    }
    
    public function getAdminSettings()
    {
        $row = $this->getFirstRow();
        return $row;
    }
    
   public function updateRow($data)
    {
    // Remove quaisquer chaves com valores vazios do array de dados
    $data = array_filter($data, function($value) {
        return !is_null($value) && $value !== '';
    });

    $row = $this->getFirstRow();
    if($row){
        $this->update([], $data); // Atualiza todos os registros
    } else {
        $this->insert($data);
    }
}

    
}
