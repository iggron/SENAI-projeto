<?php
mysqli_report(MYSQLI_REPORT_OFF);

$host = 'localhost';
$user = 'root';

// Lista de palavras-passe habitualmente usadas no SENAI e no XAMPP
$senhas_para_testar = [
    '',                     // Sem palavra-passe (padrão XAMPP)
    'Home@spSENAI225!',     // SENAI padrão
    'senha123',             // Código base
    'senai',                // SENAI alternativo 1
    'senai123',             // SENAI alternativo 2
    'Senai@123',            // SENAI alternativo 3
    'root',                 // Padrão Linux/MySQL
    '123456',               // Padrão simples
    'aluno'                 // Utilizador aluno
];

$conexao = null;

// Testa cada palavra-passe até encontrar a correta
foreach ($senhas_para_testar as $senha_teste) {
    $teste = new mysqli($host, $user, $senha_teste);
    if (!$teste->connect_error) {
        $conexao = $teste;
        break;
    }
}

// Se nenhuma palavra-passe funcionar
if (!$conexao) {
    die("<h3>Erro de Autenticação no MySQL</h3>" .
        "Nenhuma das palavras-passe padrão funcionou.<br>" .
        "Verifique a palavra-passe configurada em: <code>C:\\xampp\\phpMyAdmin\\config.inc.php</code>");
}

// 1. Cria a base de dados se não existir
$conexao->query("CREATE DATABASE IF NOT EXISTS sistema_db");

// 2. Seleciona a base de dados
$conexao->select_db('sistema_db');

// 3. Cria a tabela se não existir
$sql_tabela = "CREATE TABLE IF NOT EXISTS avaliacoes_carros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(100) NOT NULL,
    marca VARCHAR(100) NOT NULL,
    nota INT NOT NULL,
    comentario TEXT NOT NULL
)";
$conexao->query($sql_tabela);
?>