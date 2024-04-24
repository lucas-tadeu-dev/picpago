<?php

namespace App\Controllers;

use CodeIgniter\View\View;

class Teste extends Security_Controller{
     private $user_id_to_show = 61;
    
        
    function index() {

       return view("teste/index");

    }
   public function show_hierarchy() {
        $hierarchy = $this->get_hierarchy($this->user_id_to_show);
        return view('teste/index', ['hierarchy' => $hierarchy]);
    }

    private function get_hierarchy($user_id, &$hierarchy = array()) {
        $user = $this->Users_model->get_details(array("id" => $user_id))->getRow();
        if($user) {
            $hierarchy[] = $user;
            if($user->created_by) {
                $this->get_hierarchy($user->created_by, $hierarchy);
            }
        }
        return $hierarchy;
    }

}

/* End of file About.php */
/* Location: ./app/controllers/About.php */