<?php
namespace src\controllers;

use \core\Controller;
use src\models\ClientesModel;
use src\models\OrdensModel;
use src\models\ProdutosModel;

class OrdensController extends Controller {

    public $loggedUser;

    public function __construct() {
        $data = new ClientesModel();
        $this->loggedUser = $data->checkinLogin();

        if (empty($this->loggedUser)) {
            $this->redirect('/login');
        } 
    }

    public function index() {
        $this->render('ordens', ['usuario' => $this->loggedUser['nome']]);
    }

    public function consultaOrdemAction() {
        $busca = filter_input(INPUT_POST, 'busca');
        $pesquisa = new OrdensModel();
        $pesquisa = $pesquisa->getOrdem($busca);
        
        $this->render('ordens', ['data' => $pesquisa, 'usuario' => $this->loggedUser['nome']]);
    }

    public function consultaDetalhada($attr) {
        $ordem = $attr['id'];
        $pesquisar = new OrdensModel();
        $pesquisa2 = new ProdutosModel();
        $resp = $pesquisar->getProdutoOrdem($ordem);

        foreach ($resp as $ordem) {
            $idProduto = $ordem['id_produto'];
            $resp2 = $pesquisa2->getProduto($idProduto);
            
            $infoProduto[] = ['ordem' => $ordem, 'produto' => $resp2];
            
        }

        $this->render('ordens_detalhes_modal', ['produtos' => $infoProduto]);
    }

    public function editarOrdem() {
        
    }

    public function cancelarOrdem($attr) {
        $ordem = $attr['id'];
        $getOrdem = new OrdensModel();
        $resp = $getOrdem->getOrdem($ordem);

        $this->render('ordens_cancelar_modal', ['ordens' => $resp]);
    }

    public function cancelarOrdemAction($attr) {
        $ordem = $attr['id'];
        echo $ordem;
    }

}