<?php
namespace src\models;

use core\Model;
use PDO;

class ProdutosModel extends Model {

    //Seção vendas
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

    public function fecharCompra($ordem, $idCarrinho, $idProduto, $quantidade, $preco, $id_cliente, $dataCompra) {
        $total = $quantidade * $preco;
        $this->pdo->query("INSERT INTO vendas (ordem, preco_un, quantidade, total, data_venda, id_produto, id_cliente) VALUES ($ordem, $preco, $quantidade, $total, '$dataCompra', $idProduto, $id_cliente)");

        $this->pdo->query("DELETE FROM carrinho WHERE id = $idCarrinho");

    }

    public function getMax() {
        $sql = $this->pdo->query("select max(ordem) from ordens");
        $sql = $sql->fetch();
        return $sql[0];
    }

    public function criarOrdem($ordem, $total, $tipo, $parcelas, $desconto, $id_cliente, $dataCompra) {
        $this->pdo->query("INSERT INTO ordens (ordem, total, desconto, data_ordem, forma_pagamento, parcelas, id_cliente) VALUES ($ordem, $total, '$desconto', '$dataCompra', '$tipo', '$parcelas', $id_cliente)");
        
    }

    public function updateEstoque($idProduto, $estoque) {
        $this->pdo->query("UPDATE produtos SET quantidade = $estoque WHERE id = $idProduto");
    }

    //Seção Estoque
    public function addProduto ($nome, $cor, $tamanho, $quantidade, $preco, $varanda, $punho, $acabamento, $comprimento, $largura, $peso) {
        $sql = $this->pdo->query("INSERT INTO produtos (nome, cor, tamanho, quantidade, preco, varanda, punho, acabamento, comprimento, largura, peso) VALUES ('$nome', '$cor','$tamanho', $quantidade, '$preco', '$varanda', '$punho', '$acabamento', '$comprimento', '$largura', '$peso')");
        return $sql->rowCount();
    }

    public function updateProduto($id, $nome, $cor, $tamanho, $quantidade, $preco, $varanda, $punho, $acabamento, $comprimento, $largura, $peso) {
        $sql = $this->pdo->prepare("UPDATE produtos SET nome = :nome, cor = :cor, tamanho = :tamanho, quantidade = :quantidade, preco = :preco, varanda = :varanda, punho = :punho, acabamento = :acabamento, comprimento = :comprimento, largura = :largura, peso = :peso WHERE id = $id");

        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":cor", $cor);
        $sql->bindValue(":tamanho", $tamanho);
        $sql->bindValue(":quantidade", $quantidade);
        $sql->bindValue(":preco", $preco);
        $sql->bindValue(":varanda", $varanda);
        $sql->bindValue(":punho", $punho);
        $sql->bindValue(":acabamento", $acabamento);
        $sql->bindValue(":comprimento", $comprimento);
        $sql->bindValue(":largura", $largura);
        $sql->bindValue(":peso", $peso);
        $sql->execute();
    }

    public function deleteProduto($id) {
        $this->pdo->query("UPDATE produtos SET situacao = 'Inativo' WHERE id = $id");
    }
}