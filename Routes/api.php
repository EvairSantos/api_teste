<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ██████╗  █████╗ ██╗  ██╗██████╗ ██╗   ██╗██╗██╗
| ██╔══██╗██╔══██╗██║ ██╔╝██╔══██╗██║   ██║██║██║
| ██████╔╝███████║█████╔╝ ██║  ██║██║   ██║██║██║
| ██╔══██╗██╔══██║██╔═██╗ ██║  ██║██║   ██║╚═╝╚═╝
| ██████╔╝██║  ██║██║  ██╗██████╔╝╚██████╔╝██╗██╗
| ╚═════╝ ╚═╝  ╚═╝╚═╝  ╚═╝╚═════╝  ╚═════╝ ╚═╝╚═╝
|--------------------------------------------------------------------------
|
| Aqui é onde você pode registrar as rotas da API para sua aplicação.
| Essas rotas são carregadas pelo RouteServiceProvider dentro de um grupo que
| é atribuído ao grupo de middlewares "api".
|
*/

// Rotas para recursos relacionados a clientes
Route::prefix('clientes')->group(function () {
    Route::get('/', 'App\Controllers\ClienteController@index');        // Listar todos os clientes
    Route::post('/', 'App\Controllers\ClienteController@store');       // Criar um novo cliente
    Route::get('/{id}', 'App\Controllers\ClienteController@show');     // Exibir um cliente específico
    Route::put('/{id}', 'App\Controllers\ClienteController@update');   // Atualizar um cliente específico
    Route::delete('/{id}', 'App\Controllers\ClienteController@destroy');// Excluir um cliente específico
});

// Rotas para recursos relacionados a produtos
Route::prefix('produtos')->group(function () {
    Route::get('/', 'App\Controllers\ProdutoController@index');        // Listar todos os produtos
    Route::post('/', 'App\Controllers\ProdutoController@store');       // Criar um novo produto
    Route::get('/{id}', 'App\Controllers\ProdutoController@show');     // Exibir um produto específico
    Route::put('/{id}', 'App\Controllers\ProdutoController@update');   // Atualizar um produto específico
    Route::delete('/{id}', 'App\Controllers\ProdutoController@destroy');// Excluir um produto específico
});

// Rotas para recursos relacionados a pedidos
Route::prefix('pedidos')->group(function () {
    Route::get('/', 'App\Controllers\PedidoController@index');        // Listar todos os pedidos
    Route::post('/', 'App\Controllers\PedidoController@store');       // Criar um novo pedido
    Route::get('/{id}', 'App\Controllers\PedidoController@show');     // Exibir um pedido específico
    Route::put('/{id}', 'App\Controllers\PedidoController@update');   // Atualizar um pedido específico
    Route::delete('/{id}', 'App\Controllers\PedidoController@destroy');// Excluir um pedido específico
});

// Rotas para recursos relacionados a entregas
Route::prefix('entregas')->group(function () {
    Route::get('/', 'App\Controllers\EntregaController@index');        // Listar todas as entregas
    Route::post('/', 'App\Controllers\EntregaController@store');       // Criar uma nova entrega
    Route::get('/{id}', 'App\Controllers\EntregaController@show');     // Exibir uma entrega específica
    Route::put('/{id}', 'App\Controllers\EntregaController@update');   // Atualizar uma entrega específica
    Route::delete('/{id}', 'App\Controllers\EntregaController@destroy');// Excluir uma entrega específica
});

// Rota para capturar exceções de API
Route::fallback(function () {
    return response()->json(['message' => 'Endpoint não encontrado.'], 404);
});
