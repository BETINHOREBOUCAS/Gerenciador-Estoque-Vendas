<?php
namespace src\models;

use core\Model;
use PDO;

class ProdutosModel extends Model {

    public function getProdutos($busca) {
        if (!empty($busca)) {
            $sql = $this->pdo->prepare("SELECT * FROM produtos WHERE nome like :nome ORDER BY nome");
            $sql->bindValue(":nome", "%$busca%");
            $sql->execute();
            $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $sql;
        } else {
            $sql = $this->pdo->query("SELECT * FROM produtos ORDER BY nome");
            $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $sql;  
        }        
    }

    public function getProduto($id_produto) {
        $sql = $this->pdo->query("SELECT * FROM produtos WHERE id = $id_produto");
        $sql = $sql->fetch(PDO::FETCH_ASSOC);
        return $sql;
    }

    public function verifyCarrinho($id_cliente) {
        $sql = $this->pdo->query("SELECT sum(quantidade) from carrinho where id_cliente = $id_cliente");
        $sql = $sql->fetch();
        return $sql;
    }

    public function getCarrinho($id_cliente) {
        $sql = $this->pdo->query("SELECT * FROM carrinho where id_cliente = $id_cliente");
        $sql = $sql->fetchAll();
        $array['produtos'] = $sql;
        
        $sql = $this->pdo->query("SELECT * FROM clientes WHERE id = $id_cliente");
        $sql = $sql->fetch(PDO::FETCH_ASSOC);
        $array['cliente'] = $sql;
        return $array;
    }

    public function insertCarrinho($id_cliente, $id_produto, $qtd) {
        if (empty($qtd)) {
            $qtd = 1;
        }
        $sql = $this->pdo->query("INSERT INTO carrinho (id_produto, id_cliente, quantidade) VALUES ($id_produto, $id_cliente, $qtd)");
        if ($sql->rowCount() == 1) {
            $_SESSION['flash'] = "Produto adicionado ao carrinho com sucesso!";
        }
    }

    public function deleteCarrinho($id) {
        $this->pdo->query("DELETE FROM carrinho WHERE id = $id");
    }

    public function fecharCompra($ordem, $idCarrinho, $idProduto, $quantidade, $preco, $id_cliente) {
       $this->pdo->query("INSERT INTO vendas (ordem, preco_un, quantidade, total, data_venda, id_produto, id_cliente) VALUES ()");
    }

    public function getMax() {
        $sql = $this->pdo->query("select max(ordem) from ordens");
        $sql = $sql->fetch();
        return $sql[0];
    }
}