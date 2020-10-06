<?php
namespace src\controllers;

use \core\Controller;
use src\models\AtividadesModel;

class ColaboradorController extends Controller {

    public function index() {
        $this->render('colaborador', ['nome' => 'Bonieky']);
    }

    public function addColaborador() {
        $object = new AtividadesModel();
        $atividades = $object->getAtividades();
        $this->render('colaborador_add', ['atividades' => $atividades]);
    }

}