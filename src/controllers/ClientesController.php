<?php
namespace src\controllers;

use \core\Controller;
use src\models\ClientesModel;

class ClientesController extends Controller {

    public function index($attr) {
        $flash = '';
        if (!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('clientes', [
            'flash' => $flash
        ]);

    }

    public function addCliente() {
        $flash = '';
        if (!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('cliente_add', [
            'flash' => $flash
        ]);
    }

    public function addClienteAction() {
        $nome = filter_input(INPUT_POST, 'nome');
        $endereco = filter_input(INPUT_POST, 'endereco');
        $estado = filter_input(INPUT_POST, 'estado');
        $cidade = filter_input(INPUT_POST, 'cidade');
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
                
        $this->render('clientes', ['data' => $pesquisa]);
    }

    public function consultaCliente($attr) {
        
        $this->render('cliente_consulta', ['data' => $attr]);
    }

}