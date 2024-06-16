<?php

return [

    'default' => $_ENV['DB_CONNECTION'] ?? 'mysql',

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => $_ENV['DATABASE_URL'] ?? null,
            'database' => $_ENV['DB_DATABASE'] ?? __DIR__ . '/../../database/database.sqlite',
            'prefix' => '',
            'foreign_key_constraints' => filter_var($_ENV['DB_FOREIGN_KEYS'] ?? true, FILTER_VALIDATE_BOOLEAN),
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => $_ENV['DATABASE_URL'] ?? null,
            'host' => $_ENV['DB_HOST'] ?? 'localhost',
            'port' => $_ENV['DB_PORT'] ?? '3306',
            'database' => $_ENV['DB_DATABASE'] ?? 'forge',
            'username' => $_ENV['DB_USERNAME'] ?? 'root',
            'password' => $_ENV['DB_PASSWORD'] ?? '',
            'unix_socket' => $_ENV['DB_SOCKET'] ?? '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => $_ENV['MYSQL_ATTR_SSL_CA'] ?? null,
            ]) : [],
        ],

        // Adicione outros drivers de banco de dados conforme necessário

    ],

    'migrations' => 'migrations',

];
