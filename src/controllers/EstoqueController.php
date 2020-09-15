<?php
namespace src\controllers;

use \core\Controller;

class EstoqueController extends Controller {

    public function index() {
        $this->render('estoque', ['nome' => 'Bonieky']);
    }

}