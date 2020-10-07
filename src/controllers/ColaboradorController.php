<?php
namespace src\controllers;

use \core\Controller;
use src\models\AtividadesModel;
use src\models\ClientesModel;
use src\models\ColaboradorModel;

class ColaboradorController extends Controller {

    public $loggedUser;

    public function __construct() {
        $data = new ClientesModel();
        $this->loggedUser = $data->checkinLogin();

        if (empty($this->loggedUser)) {
            $this->redirect('/login');
        } 
    }

    public function index() {
        $this->render('colaborador', ['usuario' => $this->loggedUser['nome']]);
    }

    public function indexAction () {
        $busca = filter_input(INPUT_POST, 'busca');

        $buscar = new ColaboradorModel();
        $colaboradores = $buscar->getColaboradores($busca);
        
        $this->render('colaborador', ['colaboradores' => $colaboradores, 'usuario' => $this->loggedUser['nome']]);
    }

    public function addColaborador() {
        $flash = '';
        if (!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $object = new AtividadesModel();
        $atividades = $object->getAtividades();
        $this->render('colaborador_add', ['atividades' => $atividades, 'flash' => $flash, 'usuario' => $this->loggedUser['nome']]);
    }

    public function addColaboradorAction() {
        $nome = ucwords(strtolower(filter_input(INPUT_POST, 'nome')));
        $endereco = ucwords(strtolower(filter_input(INPUT_POST, 'endereco')));
        $funcao = ucwords(strtolower(filter_input(INPUT_POST, 'funcao')));
        $preco = ucwords(strtolower(filter_input(INPUT_POST, 'preco')));
        $tel1 = ucwords(strtolower(filter_input(INPUT_POST, 'tel1')));
        $tel2 = ucwords(strtolower(filter_input(INPUT_POST, 'tel2')));

        $colaborador = new ColaboradorModel();
        $colaborador->insertColaborador($nome, $endereco, $funcao, $preco, $tel1, $tel2);

        $_SESSION['flash'] = "Colaborador cadastrado com sucesso!";

        $this->redirect('/colaborador/addcolaborador');
    }

}