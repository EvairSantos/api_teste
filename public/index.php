<?php

// Exibir erros para depuração (remover em produção)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Caminho base da aplicação
$basePath = dirname(__DIR__);

// Carregar autoload do Composer
require $basePath.'/vendor/autoload.php';

// Iniciar aplicação Laravel
$app = require_once $basePath.'/bootstrap/app.php';

// Obter o kernel HTTP
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

try {
    // Tratar a requisição HTTP
    $response = $kernel->handle(
        $request = Illuminate\Http\Request::capture()
    );

    // Enviar a resposta
    $response->send();

} catch (\Exception $e) {
    // Se ocorrer uma exceção, exibir informações de erro
    http_response_code(500);
    echo "<html><head><title>Erro 500 - Internal Server Error</title></head><body>";
    echo "<h1>Erro 500 - Internal Server Error</h1>";
    echo "<p>Ocorreu um erro interno no servidor.</p>";
    echo "<p>Detalhes do erro:</p>";
    echo "<pre>{$e}</pre>";
    echo "</body></html>";
    
} finally {
    // Finalizar o kernel
    $kernel->terminate($request, $response);
}
