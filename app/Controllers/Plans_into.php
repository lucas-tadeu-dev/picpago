<?php

namespace App\Controllers;

use App\Models\Admin_model;
use CodeIgniter\View\View;

class Plans_into extends BaseController{
   
        
    function index() {
        
        $model = new Admin_model();
        $data['admin'] = $model->getAdminSettings();
        $admin = $model->getAdminSettings();
   
      return  $this->template->rander("plans_into/index", $data);
    }

    
}

/* End of file About.php */
/* Location: ./app/controllers/About.php */