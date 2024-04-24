<?php namespace App\Controllers;

use App\Models\Admin_model;
use CodeIgniter\Controller;

class Admin extends Security_Controller
{
   
    public function index()
    {
        helper(['form', 'url']);
        
        $model = new Admin_model();
        $data['admin'] = $model->getAdminSettings();
        $admin = $model->getAdminSettings();
    
        // Acessando o valor de MercadoPago
        $mercadopago = $admin['mercadopago'];
        $stripe = $admin['stripe'];
        $pagarme = $admin['pagarme'];
        $paghiper = $admin['paghiper'];
        $mercadopago = $admin['pkmercadopago'];
        $stripe = $admin['pkstripe'];
        $pagarme = $admin['pkpagarme'];
        $paghiper = $admin['pkpaghiper'];
        $master_value = $admin['master_value'];
        $ultra_value = $admin['ultra_value'];
        $six_months_descount = $admin['six_months_descount'];
        $one_year_descount = $admin['one_year_descount'];

        return $this->template->rander('admin/index',$data);
    }
    
    

    public function store()
    {
        helper(['form', 'url']);

        $model = new Admin_model();

        $data = [
            'mercadopago' => $this->request->getVar('mercadopago'),
            'stripe'      => $this->request->getVar('stripe'),
            'pagarme'     => $this->request->getVar('pagarme'),
            'paghiper'    => $this->request->getVar('paghiper'),
            'pkmercadopago'=> $this->request->getVar('pkmercadopago'),
            'pkstripe'    => $this->request->getVar('pkstripe'),
            'pkpagarme'    => $this->request->getVar('pkpagarme'),
            'pkpaghiper'    => $this->request->getVar('pkpaghiper'),
            'master_value'    => $this->request->getVar('master_value'),
            'ultra_value'    => $this->request->getVar('ultra_value'),
            'six_months_descount'    => $this->request->getVar('six_months_descount'),
            'one_year_descount'    => $this->request->getVar('one_year_descount'),
            
        ];

        $model->updateRow($data);

        return $this->template->rander('admin/index');
    }
}
