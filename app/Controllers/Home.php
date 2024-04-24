<?php

namespace App\Controllers;

use App\Models\Admin_model;

class Home extends App_Controller {
    function __construct() {
        parent::__construct();
      
    }

    function index() {
        $model = new Admin_model();
        $data['admin'] = $model->getAdminSettings();
        $admin = $model->getAdminSettings();
   
         return view('home/index',$data);
    }

}

/* End of file Home.php */
/* Location: ./app/controllers/Home.php */