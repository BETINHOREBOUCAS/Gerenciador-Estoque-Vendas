<?php
namespace src\controllers;

use \core\Controller;
use src\models\ClientesModel;
use src\models\AtividadesModel;

class AtividadesController extends Controller {

    public $loggedUser;
    public $atividade_object;

    public function __construct() {
        $data = new ClientesModel();
        $this->loggedUser = $data->checkinLogin();

        if (empty($this->loggedUser)) {
            $this->redirect('/login');
        } 
    }

    public function index() {        
        $this->render('atividades', ['usuario' => $this->loggedUser['nome']]);
    }

    public function addAtividade() {
        $this->render('atividades_add');
    }

    public function addAtividadeAction() {
        $atividade = ucwords(strtolower(filter_input(INPUT_POST, 'atividade')));
        
        $atividades = new AtividadesModel();
        $atividades->insertAtividade($atividade);
    }

    public function editarAtividade() {
        $atividade_object = new AtividadesModel();
        $dados = $atividade_object->selectAtividades();
        
        $this->render('atividades_editar', ['dados' => $dados]);
    }

    public function editarAtividadeAction() {
        $idAtividade = filter_input(INPUT_POST, 'idAtividade');
        $atividade = ucwords(strtolower(filter_input(INPUT_POST, 'novaAtividade')));
        
        $atividades = new AtividadesModel();
        $atividades->updateAtividade($idAtividade, $atividade);
    }

    public function excluirAtividade() {
        $atividade_object = new AtividadesModel();
        $dados = $atividade_object->selectAtividades();

        $this->render('atividades_excluir', ['dados' => $dados]);
    }

    public function excluirAtividadeAction() {
        $idAtividade = filter_input(INPUT_POST, 'idAtividade');
        
        $atividades = new AtividadesModel();
        $atividades->deleteAtividade($idAtividade);
    }

}