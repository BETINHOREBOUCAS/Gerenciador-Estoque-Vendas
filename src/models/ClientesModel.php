<?php
namespace src\models;

use core\Model;
use PDO;

class ClientesModel extends Model {

    public function verifyLogin($nome, $senha) {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE nome = :nome");
        $sql->bindValue(':nome', $nome);
        $sql->execute();
        if ($sql->rowCount() > 0) {
           $user = $sql->fetch(PDO::FETCH_ASSOC);
           $id = $user['id'];
           if (password_verify($senha, $user['senha'])) {
               $token = md5(time() . rand(0, 9999) . time());
               $this->pdo->query("UPDATE usuarios SET token = '$token' WHERE id = $id");
               return $token;
           }
        } else {
            return '';
        }
    }

    public function checkinLogin() {
        if (!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];
            $sql = $this->pdo->query("SELECT * FROM usuarios WHERE token = '$token'");
            $sql = $sql->fetch(PDO::FETCH_ASSOC);
            return $sql;
        }
    }

    public function getClients($value) {
        if (!empty($value)) {
            $sql = $this->pdo->prepare("SELECT * FROM clientes WHERE nome like :busca OR cidade like :busca OR telefone1 like :busca OR telefone2 like :busca ORDER BY nome");
            $sql->bindValue(":busca", "%$value%");
            $sql->execute();
            $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $sql;
        } else {
            $sql = $this->pdo->query("SELECT * FROM clientes ORDER BY nome");
            $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $sql;
        }
    }

    public function getClient($value) {
        $sql = $this->pdo->prepare("SELECT * FROM clientes WHERE id = :id");
        $sql->bindValue(':id', $value);
        $sql->execute();
        $sql = $sql->fetch(PDO::FETCH_ASSOC);
        return $sql;
    }

    public function insertClient($nome, $endereco = [], $estado = [], $cidade = [], $tel1 = [], $tel2 = []) {

        $sql = $this->pdo->prepare("INSERT INTO clientes (nome, endereco, estado, cidade, telefone1, telefone2) VALUES (:nome, :endereco, :estado, :cidade, :tel1, :tel2)");
        $sql->bindValue(':nome', strtoupper($nome));
        $sql->bindValue(':endereco', strtoupper($endereco));
        $sql->bindValue(':estado', strtoupper($estado));
        $sql->bindValue(':cidade', strtoupper($cidade));
        $sql->bindValue(':tel1', strtoupper($tel1));
        $sql->bindValue('tel2', strtoupper($tel2));
        $sql->execute();

    }    
}