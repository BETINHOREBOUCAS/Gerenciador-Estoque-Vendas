<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/sair', 'HomeController@sair');

$router->get('/login', 'LoginController@login');
$router->post('/login', 'LoginController@loginAction');

$router->get('/estoque', 'EstoqueController@index');

$router->get('/clientes/consulta/{id}', 'ClientesController@consultaCliente');
$router->get('/clientes/editar/{id}', 'ClientesController@index');
$router->get('/clientes/excluir/{id}', 'ClientesController@index');
$router->get('/clientes', 'ClientesController@index');
$router->post('/clientes', 'ClientesController@buscarCliente');
$router->get('/addCliente', 'ClientesController@addCliente');
$router->post('/addCliente', 'ClientesController@addClienteAction');


$router->get('/producao', 'ProducaoController@index');

$router->post('/addCarrinho/{idcliente}/{idproduto}', 'VendasController@addCarrinhoAction');
$router->get('/carrinho/excluir/{id}/{cliente}', 'VendasController@excluirCarrinho');
$router->get('/addVenda/{id}', 'VendasController@addVenda');
$router->get('/carrinho/{id}', 'VendasController@carrinho');
$router->post('/carrinho/{id}', 'VendasController@carrinhoAction');
$router->post('/addVenda/{id}', 'VendasController@addVendaAction');
//$router->get('/fecharVenda', 'VendasController@fecharVenda');
$router->get('/vendas', 'VendasController@index');

$router->get('/colaborador', 'ColaboradorController@index');

$router->get('/financeiro', 'FinanceiroController@index');