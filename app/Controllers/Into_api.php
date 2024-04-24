<?php namespace App\Controllers;

use App\Models\Admin_model;
use CodeIgniter\Controller;

class Into_api extends Security_Controller
{
        function __construct() {
        parent::__construct();
    }
   
    public function index()
    {
         $data['role_id'] = $this->login_user->role_id;
          $data['is_admin'] = $this->login_user->is_admin;
        return $this->template->rander('into_api/index',$data);
    }
}
