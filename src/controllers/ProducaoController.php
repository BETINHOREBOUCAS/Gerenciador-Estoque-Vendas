<?php
namespace src\controllers;

use \core\Controller;

class ProducaoController extends Controller {

    public function index() {
        $this->render('producao', ['nome' => 'Bonieky']);
    }

}