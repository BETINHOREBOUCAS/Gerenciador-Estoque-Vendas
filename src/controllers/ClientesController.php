<?php
namespace src\controllers;

use \core\Controller;
use src\models\ClientesModel;

class ClientesController extends Controller {

    public $loggedUser;

    public function __construct() {
        $data = new ClientesModel();
        $this->loggedUser = $data->checkinLogin();

        if (empty($this->loggedUser)) {
            $this->redirect('/login');
        } 
    }

    public function index($attr) {
        $flash = '';
        if (!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('clientes', [
            'flash' => $flash,
            'usuario' => $this->loggedUser['nome']
        ]);

    }

    public function addCliente() {
        $flash = '';
        if (!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('cliente_add', [
            'flash' => $flash,
            'usuario' => $this->loggedUser['nome']
        ]);
    }

    public function addClienteAction() {
        $nome = ucwords(strtolower(filter_input(INPUT_POST, 'nome')));
        $endereco = ucwords(strtolower(filter_input(INPUT_POST, 'endereco')));
        $estado = ucwords(strtolower(filter_input(INPUT_POST, 'estado')));
        $cidade = ucwords(strtolower(filter_input(INPUT_POST, 'cidade')));
        $tel1 = filter_input(INPUT_POST, 'tel1');
        $tel2 = filter_input(INPUT_POST, 'tel2');

        if (!empty($nome)) {
            $add = new ClientesModel();
            $add->insertClient($nome, $endereco, $estado, $cidade, $tel1, $tel2); 
            $_SESSION = ['flash' => "Sucesso! Cliente $nome foi adicionado com sucesso!"];
            $this->redirect('/clientes');
        } else {
            $_SESSION = ['flash' => 'Erro! O campo nome é obrigatorio!'];
            $this->redirect('/addCliente');
        }      

    }

    public function buscarCliente() {
        $busca = filter_input(INPUT_POST, 'busca');
        $pesquisa = new ClientesModel();
        $pesquisa = $pesquisa->getClients($busca);
                
        $this->render('clientes', ['data' => $pesquisa, 'usuario' => $this->loggedUser['nome']]);
    }

    public function consultaCliente($attr) {
        
        $this->render('cliente_consulta', ['data' => $attr, 'usuario' => $this->loggedUser['nome']]);
    }

}