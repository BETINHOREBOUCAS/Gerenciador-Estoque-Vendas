<?php
namespace src\models;

use core\Model;
use PDO;

class AtividadesModel extends Model {

    public function getAtividades() {
        $sql = $this->pdo->query("SELECT * FROM atividades ORDER BY atividade");
        $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $sql;
    } 
}