<?php

namespace App\Controllers;

use CodeIgniter\View\View;
use App\Models\Admin_model;

class Ultra_payment extends Security_Controller{
   
        
    function index() {
        $model = new Admin_model();
        $data['admin'] = $model->getAdminSettings();
        $admin = $model->getAdminSettings();
        $data['email'] = $this->login_user->email;
        
      return  $this->template->rander("ultra_payment/index", $data);
    }

    
}

/* End of file About.php */
/* Location: ./app/controllers/About.php */