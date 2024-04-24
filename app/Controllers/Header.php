<?php

namespace App\Controllers;

class Header extends App_Controller {
    function __construct() {
        parent::__construct();
    }

    function index() {
        return $this->template->view("header/index");
    }

}