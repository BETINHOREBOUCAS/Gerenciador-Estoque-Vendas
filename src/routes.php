<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/sair', 'HomeController@sair');
$router->get('/estoque', 'EstoqueController@index');
$router->get('/clientes', 'ClientesController@index');
$router->get('/producao', 'ProducaoController@index');
$router->get('/vendas', 'VendasController@index');
$router->get('/colaborador', 'ColaboradorController@index');
$router->get('/financeiro', 'FinanceiroController@index');