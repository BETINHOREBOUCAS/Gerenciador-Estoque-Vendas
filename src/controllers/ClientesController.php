<?php
namespace src\controllers;

use \core\Controller;

class ClientesController extends Controller {

    public function index() {
        $this->render('clientes', ['nome' => 'Bonieky']);
    }

}