<?php

namespace App\Controllers;

use CodeIgniter\View\View;
use App\Models\Admin_model;

class Master_payment extends Security_Controller{
   
        
    function index() {
        $model = new Admin_model();
        $data['admin'] = $model->getAdminSettings();
        $admin = $model->getAdminSettings();
        $data['email'] = $this->login_user->email;
        
      return  $this->template->rander("master_payment/index", $data);
    }

    
}

/* End of file About.php */
/* Location: ./app/controllers/About.php */