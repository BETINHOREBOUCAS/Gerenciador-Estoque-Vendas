<?php
namespace src\controllers;

use \core\Controller;

class ColaboradorController extends Controller {

    public function index() {
        $this->render('colaborador', ['nome' => 'Bonieky']);
    }

}