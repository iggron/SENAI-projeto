<?php
// conexao.php - Arquivo responsável por conectar ao banco de dados

$servidor = 'localhost';
$usuario  = 'root';
$senha    = 'Home@spSENAI2025!'; // Coloque a senha do seu banco
$banco    = 'sistema_db';

// Cria a conexão
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verifica se houve falha na conexão
if ($conexao->connect_error) {
    die('Falha na conexão: ' . $conexao->connect_error);
}

// Configura a acentuação correta (opcional, mas recomendado)
$conexao->set_charset("utf8mb4");
?>