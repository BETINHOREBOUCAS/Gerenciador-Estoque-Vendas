<?php
namespace src\models;

use core\Model;
use PDO;

class ProducaoModel extends Model {

    public function getAtividades() {
        $sql = $this->pdo->query("SELECT * FROM atividades");
        $atividades = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $atividades;
    }

    public function getProducaoColaboradores() {
        $dados = [];
        $sql = $this->pdo->query("SELECT * FROM producao ORDER BY data_levada desc");
        $sql = $sql->fetchAll(PDO::FETCH_ASSOC);

        
        foreach ($sql as $value) {
            $colaborador_object = new ColaboradorModel();
            $produto_object = new ProdutosModel();
            $produto = $produto_object->getProduto($value['id_produto']);
            $colaborador = $colaborador_object->getColaborador($value['id_colaborador']);
            $dados[] = ['colaborador' => $colaborador, 'producao' => $value, 'produto' => $produto];
        }

        return $dados;
    }

    public function getProducaoColaborador($id, $pagamento, $ordenar) {
        $dados = [];
        $sql = $this->pdo->prepare("SELECT * FROM producao WHERE id_colaborador = :id AND pagamento = :pagamento ORDER BY data_entrega $ordenar");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":pagamento", $pagamento);
        $sql->execute();
        $infor = $sql->fetchAll(PDO::FETCH_ASSOC);

        $valorProducao = $this->pdo->query("SELECT * FROM colaboradores WHERE id = $id");
        $valorProducao = $valorProducao->fetch(PDO::FETCH_ASSOC);
        
        foreach ($infor as $value) {
            $idProduto = $value['id_produto'];
            $sql = $this->pdo->query("SELECT nome, cor, tamanho FROM produtos WHERE id = $idProduto");
            $produto = $sql->fetch(PDO::FETCH_ASSOC);

            $dados[] = ['produto' => $produto, 'producao' => $value, 'colaborador' => $valorProducao];
            
        }
        
        return $dados;

    } 

    public function insertProducao($colaborador, $produto, $qtd, $servico, $data) {
        $sql = $this->pdo->prepare("INSERT INTO producao (qtd, setor, data_entrega, id_colaborador, id_produto) VALUE (:qtd, :setor, :data_entrega, :id_colaborador, :id_produto)");
        $sql->bindValue(":qtd", $qtd);
        $sql->bindValue(":setor", "$servico");
        $sql->bindValue(":data_entrega", $data);
        $sql->bindValue(":id_colaborador", $colaborador);
        $sql->bindValue(":id_produto", $produto);
        $sql->execute();
    }

    public function updatePagamento($pagamento, $id) {
        $this->pdo->query("UPDATE producao SET pagamento = '$pagamento' WHERE id = $id");
    }

    public function insertData($id, $dt, $qtdrecolhido) {
        $qtdEntrega = $this->pdo->query("SELECT qtd FROM producao WHERE id = $id");
        $qtdEntrega = $qtdEntrega->fetch(PDO::FETCH_ASSOC);

        $producao = $this->pdo->query("SELECT sum(qtd_recolhido) FROM producao_recolhimento WHERE id_producao = $id");
        $producao = $producao->fetchAll();
        $producao = $producao[0][0];

        if ($producao == null) {
            $producao = 0;
        }

        $restante = $qtdEntrega['qtd'] - $producao;
        $totalRecolhido = $producao + $qtdrecolhido;

        $restante2 = ($qtdEntrega['qtd'] - $producao) - $qtdrecolhido;

        if ($restante2 == 0) {
            $this->pdo->query("UPDATE producao SET data_levada = '$dt' WHERE id = $id");
        }

        if ($producao < $qtdEntrega) {
            if ($qtdrecolhido <= $restante) {
              $this->pdo->query("INSERT INTO producao_recolhimento (data_recolhimento, qtd_recolhido, id_producao) VALUES ('$dt', $qtdrecolhido, $id)");

              $this->pdo->query("UPDATE producao SET qtd_recolhido = $totalRecolhido WHERE id = $id");
            }           
        }
        
    }

    public function getDetalhesProducao($idProducao) {
        $sql = $this->pdo->query("SELECT * FROM producao_recolhimento WHERE id_producao = $idProducao ORDER BY data_recolhimento asc");
        $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }
}