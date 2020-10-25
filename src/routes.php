<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/sair', 'HomeController@sair');

$router->get('/login', 'LoginController@login');
$router->post('/login', 'LoginController@loginAction');

$router->get('/estoque/addProduto', 'EstoqueController@addProduto');
$router->post('/estoque/addProduto', 'EstoqueController@addProdutoAction');
$router->get('/estoque/detalhes/{id}', 'EstoqueController@detalhesProduto');
$router->get('/estoque/editar/{id}', 'EstoqueController@editarProduto');
$router->post('/estoque/editar/{id}', 'EstoqueController@editarProdutoAction');
$router->get('/estoque/excluir/{id}', 'EstoqueController@excluirProduto');
$router->get('/estoque/excluir/action/{id}', 'EstoqueController@excluirProdutoAction');
$router->get('/estoque', 'EstoqueController@index');
$router->get('/estoque', 'EstoqueController@listProduto');


$router->get('/clientes/consulta/{id}', 'ClientesController@infoCliente');
$router->get('/clientes/editar/{id}', 'ClientesController@editarCliente');
$router->post('/clientes/editar/{id}', 'ClientesController@editarClienteAction');
$router->get('/clientes/excluir/{id}', 'ClientesController@excluirCliente');
$router->get('/clientes/excluir/action/{id}', 'ClientesController@excluirClienteAction');
$router->get('/clientes', 'ClientesController@buscarCliente');
$router->get('/addCliente', 'ClientesController@addCliente');
$router->post('/addCliente', 'ClientesController@addClienteAction');

$router->get('/producao/addatividade', 'ProducaoController@addAtividade');
$router->post('/producao/addatividade', 'ProducaoController@addAtividadeAction');
$router->get('/producao/addproducao/{id}', 'ProducaoController@addProducao');
$router->post('/producao/addproducao', 'ProducaoController@addProducaoAction');
$router->get('/producao/detalhes/{id}', 'ProducaoController@detalhes');
$router->post('/producao/detalhes/{id}', 'ProducaoController@detalhesAction');
$router->get('/producao/addData', 'ProducaoController@addData');
$router->get('/producao', 'ProducaoController@index');

$router->post('/addCarrinho/{idcliente}/{idproduto}', 'VendasController@addCarrinhoAction');
$router->get('/carrinho/excluir/{id}/{cliente}', 'VendasController@excluirCarrinho');
$router->get('/addVenda/{id}', 'VendasController@addVenda');
$router->get('/carrinho/{id}', 'VendasController@carrinho');
$router->post('/carrinho/{id}', 'VendasController@carrinhoAction');
$router->post('/addVenda/{id}', 'VendasController@addVendaAction');


$router->get('/ordens/consulta/{id}', 'OrdensController@consultaDetalhada');
$router->get('/ordens/editar/{id}', 'OrdensController@editarOrdem');
$router->get('/ordens/cancelar/{id}', 'OrdensController@cancelarOrdem');
$router->get('/ordem/cancelar/action/{id}', 'OrdensController@cancelarOrdemAction');
$router->get('/ordens', 'OrdensController@index');
$router->post('/ordens', 'OrdensController@consultaOrdemAction');

$router->get('/colaborador/addColaborador', 'ColaboradorController@addColaborador');
$router->post('/colaborador/addColaborador', 'ColaboradorController@addColaboradorAction');
$router->get('/colaborador/editarColaborador/{id}', 'ColaboradorController@editarColaborador');
$router->post('/colaborador/editarColaborador/{id}', 'ColaboradorController@editarColaboradorAction');
$router->get('/colaborador/pesquisa', 'ColaboradorController@indexAction');
$router->get('/colaborador', 'ColaboradorController@index');

$router->get('/financeiro', 'FinanceiroController@index');