<?php
namespace src\controllers;

use \core\Controller;
use src\models\ClientesModel;

class HomeController extends Controller {

    public $loggedUser;

    public function __construct() {
        $data = new ClientesModel();
        $this->loggedUser = $data->checkinLogin();

        if (empty($this->loggedUser)) {
            $this->redirect('/login');
        } 
    }

    public function index() {
        $info = $this->loggedUser['nome'];
        $this->render('home', ['usuario' => $info]);
    }

    public function sair() {
        session_destroy();
        $this->redirect('/login');
    }

}