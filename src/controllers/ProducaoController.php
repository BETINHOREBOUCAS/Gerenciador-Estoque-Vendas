<?php
namespace src\controllers;

use \core\Controller;
use src\models\ProducaoModel;
use src\models\ClientesModel;
use src\models\ColaboradorModel;
use src\models\ProdutosModel;

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
        $producao_object = new ProducaoModel();
        $dados = $producao_object->getProducaoColaboradores();
        $this->render('producao', [
            'usuario' => $this->loggedUser['nome'],
            'dados' => $dados
            ]);
    }

    public function addAtividade() {
        $this->render('producao_atividade');
    }

    public function addAtividadeAction() {
        $atividade = ucwords(strtolower(filter_input(INPUT_POST, 'atividade')));
        
        $atividades = new ProducaoModel();
        $atividades->insertAtividade($atividade);
    }

    public function addProducao($attr) {
        $idColaborador = $attr['id'];
        $atividade_obj = new ProducaoModel();
        $produto_obj = new ProdutosModel();
        $colaborador_obj = new ColaboradorModel();

        $atividades = $atividade_obj->getAtividades();
        $produtos = $produto_obj->getProdutos("");
        $colaborador = $colaborador_obj->getColaborador($idColaborador);

        $this->render('producao_add', [
            'atividades' => $atividades,
            'produtos' => $produtos,
            'colaborador' => $colaborador
        ]);
    }

    public function addProducaoAction() {
        $colaborador = filter_input(INPUT_POST, 'colaborador');
        $produto = filter_input(INPUT_POST, 'produto');
        $qtd = filter_input(INPUT_POST, 'qtd');
        $servico = filter_input(INPUT_POST, 'servico');
        $data = filter_input(INPUT_POST, 'data');

        $adicionar = new ProducaoModel();
        $adicionar->insertProducao($colaborador, $produto, $qtd, $servico, $data);
    }

    public function detalhes($attr) {
        $id = $attr['id'];
        $pagamento = isset($_GET['pagamento'])?filter_input(INPUT_GET, 'pagamento'):'Aguardando';
        $ordenar = isset($_GET['ordenar'])?filter_input(INPUT_GET, 'ordenar'):'desc';
        $getInfo = new ProducaoModel();
        $dados = $getInfo->getProducaoColaborador($id, $pagamento, $ordenar);
        
        $this->render('producao_detalhes', [
            'id_colaborador' => $id,
            'pagamento' => $pagamento,
            'ordenar' => $ordenar,
            'dados' => $dados
            ]);
    }

    public function detalhesAction($attr) {
        $id = $attr['id'];
        $pagamento = filter_input(INPUT_POST, 'sitPag');
        $ordenar = filter_input(INPUT_POST, 'ordenar');

        $idProducao = filter_input(INPUT_POST, 'idProducao');
        $sitAtual = filter_input(INPUT_POST, 'sitAtual');
        if ($sitAtual == 'Aguardando') {
            $sitAtual = 'Pago';
        } else {
            $sitAtual = 'Aguardando';
        }

        $getInfo = new ProducaoModel();

        $getInfo->updatePagamento($sitAtual, $idProducao);

        $dados = $getInfo->getProducaoColaborador($id, $pagamento, $ordenar);
        
        $this->render('producao_detalhes', [
            'id_colaborador' => $id,
            'pagamento' => $pagamento,
            'ordenar' => $ordenar,
            'dados' => $dados
            ]);
    }

    public function addData() {
        $idProducao = filter_input(INPUT_GET, 'idProducao');
        $dt = filter_input(INPUT_GET, 'data');
        $qtdRecolhido = filter_input(INPUT_GET, 'qtdRecolhido');
        $inserir = new ProducaoModel();
        $inserir->insertData($idProducao, $dt, $qtdRecolhido);
        echo $dt;
    }

}