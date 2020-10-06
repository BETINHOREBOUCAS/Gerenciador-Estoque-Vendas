<?php
namespace src\controllers;

use \core\Controller;
use src\models\OrdensModel;

class OrdensController extends Controller {

    public function index() {
        $this->render('ordens');
    }

    public function consultaOrdemAction() {
        $busca = filter_input(INPUT_POST, 'busca');
        $pesquisa = new OrdensModel();
        $pesquisa = $pesquisa->getOrdem($busca);
        
        $this->render('ordens', ['data' => $pesquisa]);
    }

}