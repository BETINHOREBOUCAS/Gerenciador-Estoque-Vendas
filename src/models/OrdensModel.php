<?php
namespace src\models;

use core\Model;
use PDO;

class OrdensModel extends Model {

    public function getOrdem($value) {
        if (!empty($value)) {
            if (is_numeric($value)) {
                $sql = $this->pdo->prepare("SELECT * FROM ordens WHERE ordem = :busca");
                $sql->bindValue(":busca", $value);
                $sql->execute();
                $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
                
                foreach ($sql as $ordem) {
                    $idCliente = $ordem['id_cliente'];
                    $cliente = $this->pdo->query("SELECT * FROM clientes WHERE id = $idCliente");
                    $cliente = $cliente->fetch(PDO::FETCH_ASSOC);
                    
                    if (!empty($ordem)) {
                        $dados[] = ['nome' => $cliente['nome'], 'dados' => $ordem]; 
                    }      
                } 
                return $dados;
            }else {
                $sql = $this->pdo->prepare("SELECT * FROM clientes WHERE nome like :busca");
                $sql->bindValue(":busca", "%$value%");
                $sql->execute();
                $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        
                foreach ($sql as $cliente) {
                    $idCliente = $cliente['id'];
                    $ordem = $this->pdo->query("SELECT * FROM ordens WHERE id_cliente = $idCliente");
                    $ordem = $ordem->fetch(PDO::FETCH_ASSOC);
                    if (!empty($ordem)) {
                        $dados[] = ['nome' => $cliente['nome'], 'dados' => $ordem]; 
                    }                    
                }               
                
                return $dados; 
            }
            
        } else {
            //Erro neste codigo fazer ajustes
            
            $sql = $this->pdo->query("SELECT * FROM ordens ORDER BY ordem");
            $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($sql as $ordem) {
                $idCliente = $ordem['id_cliente'];
                $cliente = $this->pdo->query("SELECT * FROM clientes WHERE id = $idCliente");
                $cliente = $cliente->fetch(PDO::FETCH_ASSOC);
                
                if (!empty($ordem)) {
                    $dados[] = ['nome' => $cliente['nome'], 'dados' => $ordem]; 
                }      
            } 
            return $dados;
        }
    }

    public function orderClient($idCliente, $ordenar) {
        $sql = $this->pdo->query("SELECT * FROM ordens WHERE id_cliente = $idCliente ORDER BY data_ordem $ordenar");
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function getProdutoOrdem($ordem) {
        $sql = $this->pdo->query("SELECT * FROM vendas WHERE ordem = $ordem");
        $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $sql;       
    }
}