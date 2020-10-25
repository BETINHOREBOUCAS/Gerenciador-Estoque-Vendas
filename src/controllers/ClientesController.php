<?php
namespace src\controllers;

use \core\Controller;
use src\models\ClientesModel;
use src\models\OrdensModel;

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

    public function editarCliente($attr) {
        $cliente = new ClientesModel();
        $resp = $cliente->getClient($attr['id']);
        $this->render('cliente_editar', ['cliente' => $resp, 'usuario' => $this->loggedUser['nome']]);
    }

    public function editarClienteAction($attr) {
        $id = $attr['id'];
        $nome = ucwords(strtolower(filter_input(INPUT_POST, 'nome')));
        $endereco = ucwords(strtolower(filter_input(INPUT_POST, 'endereco')));
        $estado = ucwords(strtolower(filter_input(INPUT_POST, 'estado')));
        $cidade = ucwords(strtolower(filter_input(INPUT_POST, 'cidade')));
        $tel1 = filter_input(INPUT_POST, 'tel1');
        $tel2 = filter_input(INPUT_POST, 'tel2');

        if (!empty($nome)) {
            
            $add = new ClientesModel();
            $add->updateClient($id, $nome, $endereco, $estado, $cidade, $tel1, $tel2); 
            $_SESSION['flash'] = "Sucesso! Cliente $nome foi atualizado com sucesso!";
            $this->redirect("/clientes?busca=$nome");
        } else {
            $_SESSION['flash'] ='Erro! O campo nome é obrigatorio!';
            $this->redirect("/clientes?busca=$nome");
        }
    }

    public function excluirCliente ($attr) {
        $this->render('cliente_excluir_modal', ['ordem' => $attr['id']]);
    }

    public function excluirClienteAction ($attr) {
        $cadastro = new ClientesModel();
        $cadastro->deleteClient($attr['id']);
    }

    public function buscarCliente() {
        $flash = '';
        if (!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $pesquisa = '';
        $busca = filter_input(INPUT_GET, 'busca');
        if (isset($busca)) {
            $pesquisa = new ClientesModel();
            $pesquisa = $pesquisa->getClients($busca);
        }
        
                
        $this->render('clientes', ['data' => $pesquisa, 'usuario' => $this->loggedUser['nome'], 'flash' => $flash]);
    }

    public function infoCliente($attr) {
        $ordenar = '';
        $idCliente = $attr['id'];
        $order = new OrdensModel();
        $clientes = new ClientesModel();
        if (isset($_GET['ordenar'])) {
           $ordenar = $_GET['ordenar']; 
        }
        
        if (empty($ordenar) && isset($_GET['ordenar'])) {
            $ordenar = 'desc';
        }
        $ordens = $order->orderClient($idCliente, $ordenar);
        $cliente = $clientes->getClient($idCliente);
        $this->render('cliente_consulta', ['ordens' => $ordens, 'usuario' => $this->loggedUser['nome'], 'cliente' => $cliente]);
    }

}