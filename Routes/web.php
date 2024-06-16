<?php

use Illuminate\Support\Facades\Route;
use App\Controllers\ClienteController;
use App\Controllers\ProdutoController;
use App\Controllers\PedidoController;
use App\Controllers\EntregaController;
use App\Controllers\CarrinhoController;

Route::get('/clientes', [ClienteController::class, 'listarClientes']);
Route::post('/clientes', [ClienteController::class, 'criarCliente']);
Route::put('/clientes/{id}', [ClienteController::class, 'atualizarCliente']);
Route::delete('/clientes/{id}', [ClienteController::class, 'deletarCliente']);


// Rotas para produtos
Route::get('/produtos', [ProdutoController::class, 'index']);
Route::get('/produtos/{id}', [ProdutoController::class, 'show']);
Route::post('/produtos', [ProdutoController::class, 'store']);
Route::put('/produtos/{id}', [ProdutoController::class, 'update']);
Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy']);


// Rotas para pedidos
Route::get('/pedidos', [PedidoController::class, 'index']);
Route::get('/pedidos/{id}', [PedidoController::class, 'show']);
Route::post('/pedidos', [PedidoController::class, 'store']);
Route::put('/pedidos/{id}', [PedidoController::class, 'update']);
Route::delete('/pedidos/{id}', [PedidoController::class, 'destroy']);


// Rotas para entregas
Route::get('/entregas', [EntregaController::class, 'index']);
Route::get('/entregas/{id}', [EntregaController::class, 'show']);
Route::post('/entregas', [EntregaController::class, 'store']);
Route::put('/entregas/{id}', [EntregaController::class, 'update']);
Route::delete('/entregas/{id}', [EntregaController::class, 'destroy']);


// Rotas para o carrinho de compras
Route::get('/carrinho', [CarrinhoController::class, 'index']);
Route::post('/carrinho/adicionar', [CarrinhoController::class, 'add']);
Route::put('/carrinho/atualizar/{id}', [CarrinhoController::class, 'update']);
Route::delete('/carrinho/remover/{id}', [CarrinhoController::class, 'remove']);

// Outras rotas conforme necessário...

