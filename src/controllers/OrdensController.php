<?php
namespace src\controllers;

use \core\Controller;
use src\models\ClientesModel;
use src\models\OrdensModel;

class OrdensController extends Controller {

    public $loggedUser;

    public function __construct() {
        $data = new ClientesModel();
        $this->loggedUser = $data->checkinLogin();

        if (empty($this->loggedUser)) {
            $this->redirect('/login');
        } 
    }

    public function index() {
        $this->render('ordens', ['usuario' => $this->loggedUser['nome']]);
    }

    public function consultaOrdemAction() {
        $busca = filter_input(INPUT_POST, 'busca');
        $pesquisa = new OrdensModel();
        $pesquisa = $pesquisa->getOrdem($busca);
        
        $this->render('ordens', ['data' => $pesquisa, 'usuario' => $this->loggedUser['nome']]);
    }

}