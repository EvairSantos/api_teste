<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=restart', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Corrigindo a consulta para usar a função NOW() sem alias
    $stmt = $pdo->query('SELECT NOW()');
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "Conexão com o banco de dados bem-sucedida! Hora atual do servidor: " . $result['NOW()'];
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>
