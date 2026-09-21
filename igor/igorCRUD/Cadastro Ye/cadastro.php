<?php

$conexao = new mysqli('localhost', 'root', 'Home@spSENAI2025!', 'cadastro');

if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Formulário não enviado.");
}

$nome = $_POST['nome'] ?? '';
$endereco = $_POST['endereco'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$email = $_POST['email'] ?? '';

if ($nome === '' || $endereco === '' || $telefone === '' || $email === '') {
    die("Preencha todos os campos.");
}

$sql = "INSERT INTO usuarios (nome, endereco, telefone, email)
        VALUES ('$nome', '$endereco', '$telefone', '$email')";

if ($conexao->query($sql) === TRUE) {
    echo "Usuário cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar usuário: " . $conexao->error;
}

$conexao->close();
?>