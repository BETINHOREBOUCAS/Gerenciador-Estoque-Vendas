<?php
namespace src\models;

use core\Model;
use PDO;

class ColaboradorModel extends Model {

    public function getColaboradores($value) {
        if (!empty($value)) {
            $sql = $this->pdo->prepare("SELECT * FROM colaboradores WHERE nome like :busca ORDER BY nome");
            $sql->bindValue(":busca", "%$value%");
            $sql->execute();
            $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $sql;
        } else {
            $sql = $this->pdo->query("SELECT * FROM colaboradores ORDER BY nome");
            $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $sql;
        }
    }

    public function insertColaborador($nome, $endereco, $funcao, $preco, $tel1, $tel2) {
        $this->pdo->query("INSERT INTO colaboradores (nome, endereco, funcao, preco, status, telefone1, telefone2) VALUES ('$nome', '$endereco', '$funcao', '$preco', 'Ativo', '$tel1', '$tel2')");
    }
}