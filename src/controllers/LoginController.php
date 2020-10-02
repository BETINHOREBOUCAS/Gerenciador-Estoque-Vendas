<?php
namespace src\controllers;

use \core\Controller;
use src\models\ClientesModel;

class LoginController extends Controller {

    public function login() {
        $flash = '';
        if (!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('login', ['flash' => $flash]);
    }

    public function loginAction() {
        $user = filter_input(INPUT_POST, 'usuario');
        $senha = filter_input(INPUT_POST, 'senha');

        $usuario = new ClientesModel();
        $token = $usuario->verifyLogin($user, $senha);
        if ($token) {
            $_SESSION['token'] = $token;
            $this->redirect('/');
        } else {
            $_SESSION['flash'] = "Usuario ou senha invalido";
            $this->redirect('/login');
        }
        
    }

}