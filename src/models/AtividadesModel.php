<?php
namespace src\models;

use core\Model;
use PDO;

class AtividadesModel extends Model {

    public function selectAtividades() {
        $sql = $this->pdo->query("SELECT * FROM atividades");
        $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $sql;
    }

    public function insertAtividade($atividade) {
        $this->pdo->query("INSERT INTO atividades (atividade) VALUES ('$atividade')");
    }

    public function updateAtividade($idAtividade, $atividade) {
        $sql = $this->pdo->prepare("UPDATE atividades SET atividade = :atividade WHERE id = :id");
        $sql->bindValue(":atividade", "$atividade");
        $sql->bindValue(":id", $idAtividade);
        $sql->execute();
    }

    public function deleteAtividade($id) {
        $this->pdo->query("DELETE FROM atividades WHERE id = $id");
    }
}