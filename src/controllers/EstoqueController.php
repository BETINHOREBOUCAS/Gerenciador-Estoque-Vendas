<?php
namespace src\controllers;

use \core\Controller;
use src\models\ClientesModel;
use src\models\ProdutosModel;

class EstoqueController extends Controller {

    public $loggedUser;

    public function __construct() {
        $data = new ClientesModel();
        $this->loggedUser = $data->checkinLogin();

        if (empty($this->loggedUser)) {
            $this->redirect('/login');
        } 
    }

    public function index() {
        $this->render('estoque', ['usuario' => $this->loggedUser['nome']]);
    }

    public function addProduto() {
        $flash = '';
        if (!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $this->render('estoque_add', ['flash' => $flash, 'usuario' => $this->loggedUser['nome']]);
    }

    public function addProdutoAction() {
        $nome = ucwords(strtolower(filter_input(INPUT_POST, 'nome')));
        $cor = ucwords(strtolower(filter_input(INPUT_POST, 'cor')), "/");
        $tamanho = filter_input(INPUT_POST, 'tamanho');
        $quantidade = filter_input(INPUT_POST, 'quantidade');
        $preco = filter_input(INPUT_POST, 'preco');
        $varanda = filter_input(INPUT_POST, 'varanda');
        $punho = filter_input(INPUT_POST, 'punho');
        $acabamento = filter_input(INPUT_POST, 'acabamento');
        $comprimento = filter_input(INPUT_POST, 'comprimento');
        $largura = filter_input(INPUT_POST, 'largura');
        $peso = filter_input(INPUT_POST, 'peso');

        if (!empty($nome) && !empty($cor)) {
            $inserir = new ProdutosModel();
            $retorno = $inserir->addProduto($nome, $cor, $tamanho, $quantidade, $preco, $varanda, $punho, $acabamento, $comprimento, $largura, $peso);
            if ($retorno == 1) {
                $_SESSION['flash'] = "Produto adicionado com sucesso!";
            }else {
                $_SESSION['flash'] = "Erro ao adicionar o produto!";
            }
        }else {
            $_SESSION['flash'] = "Os campos nome e cor são obrigatórios!";
        }
        $this->redirect('/estoque/addProduto');
    }

    public function detalhesProduto($attr) {
        $produtos = new ProdutosModel();
        $produtos = $produtos->getProduto($attr['id']);
        
        $this->render('estoque_detalhes', ['usuario' => $this->loggedUser['nome'], 'produtos' => $produtos]);
    }

    public function editarProduto($attr) {
        $produtos = new ProdutosModel();
        $produtos = $produtos->getProduto($attr['id']);
        $this->render('estoque_editar', ['usuario' => $this->loggedUser['nome'], 'produtos' => $produtos]);
    }

    public function editarProdutoAction($attr) {
        $id = $attr['id'];
        $nome = ucwords(strtolower(filter_input(INPUT_POST, 'nome')));
        $cor = ucwords(strtolower(filter_input(INPUT_POST, 'cor')), "/");
        $tamanho = filter_input(INPUT_POST, 'tamanho');
        $quantidade = filter_input(INPUT_POST, 'quantidade');
        $preco = filter_input(INPUT_POST, 'preco');
        $varanda = filter_input(INPUT_POST, 'varanda');
        $punho = filter_input(INPUT_POST, 'punho');
        $acabamento = filter_input(INPUT_POST, 'acabamento');
        $comprimento = filter_input(INPUT_POST, 'comprimento');
        $largura = filter_input(INPUT_POST, 'largura');
        $peso = filter_input(INPUT_POST, 'peso');

        $atualizar = new ProdutosModel();
        $atualizar->updateProduto($id, $nome, $cor, $tamanho, $quantidade, $preco, $varanda, $punho, $acabamento, $comprimento, $largura, $peso);
        $this->redirect('/estoque?busca=');
    }

    public function excluirProduto($attr) {
        $id = $attr['id'];
        $this->render('estoque_excluir', ['ordem' => $id]);
    }

    public function excluirProdutoAction($attr) {
        $id = $attr['id'];
        $deletar = new ProdutosModel();
        $deletar->deleteProduto($id);
    }

    public function listProduto() {
        $produtos = '';
        $busca = filter_input(INPUT_GET, 'busca');
        if (isset($busca)) {
            $infoProduto = new ProdutosModel();
            $produtos = $infoProduto->getProdutos($busca);
        }
        

        $this->render('estoque', ['produtos' => $produtos, 'usuario' => $this->loggedUser['nome']]);
    }

}