<?php
namespace src\models;

use core\Model;
use PDO;

class ColaboradorModel extends Model {

    public function getColaboradores($value, $exibir) {
        if (!empty($value)) {
            $sql = $this->pdo->prepare("SELECT * FROM colaboradores WHERE STATUS = :exibir AND nome like :busca ORDER BY nome");
            $sql->bindValue(":exibir", "$exibir");
            $sql->bindValue(":busca", "%$value%");
            $sql->execute();
            $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $sql;
        } else {
            $sql = $this->pdo->query("SELECT * FROM colaboradores WHERE status = '$exibir' ORDER BY nome");
            $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $sql;
        }
    }

    public function getColaborador($id) {
        $colaborador = $this->pdo->query("SELECT * FROM colaboradores WHERE id = $id");
        return $colaborador->fetch(PDO::FETCH_ASSOC);
    }

    public function insertColaborador($nome, $endereco, $funcao, $preco, $tel1, $tel2) {
        $this->pdo->query("INSERT INTO colaboradores (nome, endereco, funcao, preco, status, telefone1, telefone2) VALUES ('$nome', '$endereco', '$funcao', '$preco', 'Ativo', '$tel1', '$tel2')");
    }

    public function updateColaborador($id, $nome, $endereco, $funcao, $preco, $tel1, $tel2, $status) {
        $this->pdo->query("UPDATE colaboradores SET nome = '$nome', endereco = '$endereco', funcao = '$funcao', preco = '$preco', telefone1 = '$tel1', telefone2 = '$tel2', status = '$status' WHERE id = $id");
    }
}