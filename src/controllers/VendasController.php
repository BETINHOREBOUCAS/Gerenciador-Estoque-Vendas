<?php
namespace src\controllers;

use \core\Controller;

class VendasController extends Controller {

    public function index() {
        $this->render('vendas', ['nome' => 'Bonieky']);
    }

}