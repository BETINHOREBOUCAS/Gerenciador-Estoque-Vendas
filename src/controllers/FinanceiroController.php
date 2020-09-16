<?php
namespace src\controllers;

use \core\Controller;

class FinanceiroController extends Controller {

    public function index() {
        $this->render('financeiro', ['nome' => 'Bonieky']);
    }

}