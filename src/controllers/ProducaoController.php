<?php
namespace src\controllers;

use \core\Controller;
use src\models\ClientesModel;

class ProducaoController extends Controller {

    public $loggedUser;

    public function __construct() {
        $data = new ClientesModel();
        $this->loggedUser = $data->checkinLogin();

        if (empty($this->loggedUser)) {
            $this->redirect('/login');
        } 
    }

    public function index() {
        $this->render('producao', ['usuario' => $this->loggedUser['nome']]);
    }

}