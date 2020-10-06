<?php
namespace src\controllers;

use \core\Controller;
use src\models\ClientesModel;
use src\models\ProdutosModel;

class VendasController extends Controller {

    /*public function index() {
        $this->render('vendas');
    }*/

    public function addVenda($attr) {
        $busca = filter_input(INPUT_POST, 'busca'); 
        $id_cliente = $attr['id'];
        $flash = '';
        $carrinho = 0;

        $cliente = new ClientesModel();
        $produtos = new ProdutosModel();        

        if (!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        
        $carrinho = $produtos->verifyCarrinho($id_cliente);
        $carrinho = $carrinho[0];
        $cliente = $cliente->getClient($attr['id']);
        
        $produtos = $produtos->getProdutos($busca);
        
        $this->render('vendas_add', [ 
            'carrinho' => $carrinho,
            'cliente' => $cliente,
            'produtos' => $produtos,
            'flash' => $flash
            ]);
    }

    public function addVendaAction($attr) {
        $busca = filter_input(INPUT_POST, 'busca'); 
        $id_cliente = $attr['id'];
        $flash = '';
        $carrinho = 0;

        $cliente = new ClientesModel();
        $produtos = new ProdutosModel();        

        if (!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        
        $carrinho = $produtos->verifyCarrinho($id_cliente);
        $carrinho = $carrinho[0];
        $cliente = $cliente->getClient($attr['id']);
        
        $produtos = $produtos->getProdutos($busca);
        
        $this->render('vendas_add', [ 
            'carrinho' => $carrinho,
            'cliente' => $cliente,
            'produtos' => $produtos,
            'flash' => $flash
            ]);
    }

    public function addCarrinhoAction($attr) {
        echo $qtd = filter_input(INPUT_POST, 'qtd', FILTER_VALIDATE_INT);
        echo $id_cliente = $attr['idcliente'];
        echo $id_produto = $attr['idproduto'];

        $adicionar = new ProdutosModel();
        $adicionar->insertCarrinho($id_cliente, $id_produto, $qtd);
        $this->redirect("/addVenda/$id_cliente");
    }

    public function carrinho($attr) {
        $flash = '';
        if (!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $comparar = new ProdutosModel();
        $array = [];
        $array2 = [];
        $a = 0;
        $id_cliente = $attr['id'];
        $info = new ProdutosModel();
        $data = $info->getCarrinho($id_cliente);
        $cliente = $data['cliente'];
        $produtos = $data['produtos'];
        
        //Uni produtos repetidos no carrinho
        foreach ($produtos as $value) {  
            $idCarrinho = $value['id'];
            $idProduto = $value['id_produto'];            
            $teste = $comparar->getProduto($idProduto);
            $nome = $teste['nome'];
            $tamanho = $teste['tamanho'];
            $cor = $teste['cor'];
            $preco = $teste['preco'];
            $quantidade = $value['quantidade'];

            if (!in_array($idProduto, $array)) {
                $array[] = $idProduto;
                $array2[] = [
                    'id_carrinho' => $idCarrinho,
                    'id_produto' => $idProduto,
                    'nome' => $nome,
                    'tamanho' => $tamanho,
                    'cor' => $cor,
                    'preco' => $preco,
                    'quantidade' => $quantidade
                ];
                
            } else {
                for ($i=0; $i < count($array2); $i++) { 
                    if ($array2[$i]['id_produto'] == $idProduto) {
                        $array2[$i]['quantidade'] += $quantidade;
                    }
                }
            }
            
        }
        
        $this->render('vendas_carrinho', [  
            'flash' => $flash,           
            'cliente' => $cliente,
            'produtos' => $array2,            
        ]);
    }

    public function carrinhoAction($attr) {
        //Criação de ordem incompleto
        $totalCompra = 0;

        $dataCompra = filter_input(INPUT_POST, 'datacompra');
        $desconto = filter_input(INPUT_POST, 'desconto');
        $tipoPagamento = filter_input(INPUT_POST, 'pagamento');
        $parcelas = filter_input(INPUT_POST, 'parcelas');
        $id_cliente = $attr['id'];

        if ($tipoPagamento != 'avista') {
            if (empty($parcelas)) {
                $_SESSION['flash'] = "O campo quantidade de parcelas e/ou data não pode ser vazio!";
                $this->redirect("/carrinho/$id_cliente");
            }
        }

        if (empty($dataCompra)) {
            $_SESSION['flash'] = "O campo quantidade de parcelas e/ou data não pode ser vazio!";
            $this->redirect("/carrinho/$id_cliente");
        }

        $comparar = new ProdutosModel();
        $array = [];
        $array2 = [];
        $info = new ProdutosModel();
        $data = $info->getCarrinho($id_cliente);
        $cliente = $data['cliente'];
        $produtos = $data['produtos'];
        
        foreach ($produtos as $value) {  
            $idCarrinho = $value['id'];
            $idProduto = $value['id_produto'];            
            $teste = $comparar->getProduto($idProduto);
            $nome = $teste['nome'];
            $preco = $teste['preco'];
            $quantidade = $value['quantidade'];

            if (!in_array($idProduto, $array)) {
                $array[] = $idProduto;
                $array2[] = [
                    'id_carrinho' => $idCarrinho,
                    'id_produto' => $idProduto,
                    'nome' => $nome,
                    'preco' => $preco,
                    'quantidade' => $quantidade
                ];
                
            } else {
                for ($i=0; $i < count($array2); $i++) { 
                    if ($array2[$i]['id_produto'] == $idProduto) {
                        $array2[$i]['quantidade'] += $quantidade;
                    }
                }
            }
            
        } 

        //Verificar se a quantidade comprada não é maior do que o estoque
        foreach ($array2 as $update) {
            $verificar = new ProdutosModel();
            $getProduto = $verificar->getProduto($update['id_produto']);
            $nomeProduto = $getProduto['nome'];
            $corProduto = $getProduto['cor'];
            $qtdEstoque = $getProduto['quantidade'];
            $qtdCompra = $update['quantidade'];
            
            if ($qtdCompra > $qtdEstoque) {
                $_SESSION['flash'] = "Produto $nomeProduto $corProduto com quantidade maior que o estoque! Quantidade do estoque $qtdEstoque.";
                $this->redirect("/carrinho/$id_cliente");
            }
        }

        $ordem = $verificar->getMax();

        if ($ordem < 100) {
            $ordem = 100;
        }else {
            $ordem = $ordem + 1;
        }

        //Criando venda
        foreach ($array2 as $venda) {
            $idCarrinho = $venda['id_carrinho'];
            $idProduto = $venda['id_produto'];
            $quantidade = $venda['quantidade'];
            $preco = $venda['preco'];

            $calculo = $preco * $quantidade;
            $totalCompra += $calculo;

            $verificar->fecharCompra($ordem, $idCarrinho, $idProduto, $quantidade, $preco, $id_cliente, $dataCompra);

            $estoque = $verificar->getProduto($idProduto);
            $estoque = $estoque['quantidade'] - $quantidade;

            $verificar->updateEstoque($idProduto, $estoque);
        }

        $verificar->criarOrdem($ordem, $totalCompra, $tipoPagamento, $parcelas, $desconto, $id_cliente, $dataCompra);

        $_SESSION['flash'] = "Venda realizada com sucesso!";
        $this->redirect("/addVenda/$id_cliente");
    }

    public function excluirCarrinho($attr) {
        $cliente = $attr['cliente'];
        $data = new ProdutosModel();
        $data->deleteCarrinho($attr['id']);
        $this->redirect("/carrinho/$cliente");
    }
}