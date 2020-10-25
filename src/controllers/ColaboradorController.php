<?php
namespace src\controllers;

use \core\Controller;
use src\models\ProducaoModel;
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
        $busca = filter_input(INPUT_GET, 'busca');
        $exibir = filter_input(INPUT_GET, 'exibir');

        $buscar = new ColaboradorModel();
        $colaboradores = $buscar->getColaboradores($busca, $exibir);
        
        $this->render('colaborador', ['colaboradores' => $colaboradores, 'usuario' => $this->loggedUser['nome']]);
    }

    public function addColaborador() {
        $flash = '';
        if (!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $object = new ProducaoModel();
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

    public function editarColaborador($attr) {
        $flash = '';
        if (!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $colaboradorObject = new ColaboradorModel();
        $produtoObject = new ProducaoModel();
        $colaborador = $colaboradorObject->getColaborador($attr['id']);
        $atividades = $produtoObject->getAtividades();
        $this->render('colaborador_editar', [
            'atividades' => $atividades,
            'flash' => $flash,
            'usuario' => $this->loggedUser['nome'],
            'colaborador' => $colaborador
        ]);
    }

    public function editarColaboradorAction($attr) {
       echo $nome = ucwords(strtolower(filter_input(INPUT_POST, 'nome')));
        $endereco = ucwords(strtolower(filter_input(INPUT_POST, 'endereco')));
        $funcao = ucwords(strtolower(filter_input(INPUT_POST, 'funcao')));
        $preco = ucwords(strtolower(filter_input(INPUT_POST, 'preco')));
        $tel1 = ucwords(strtolower(filter_input(INPUT_POST, 'tel1')));
        $tel2 = ucwords(strtolower(filter_input(INPUT_POST, 'tel2')));
        $status = ucwords(strtolower(filter_input(INPUT_POST, 'status')));

        $colaborador = new ColaboradorModel();
        $colaborador->updateColaborador($attr['id'], $nome, $endereco, $funcao, $preco, $tel1, $tel2, $status);

        $_SESSION['flash'] = "Colaborador editado com sucesso!";

        $this->redirect('/colaborador/editarColaborador/'.$attr['id']);
    }

}