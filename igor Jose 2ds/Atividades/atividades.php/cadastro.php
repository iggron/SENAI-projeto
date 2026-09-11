<?php

$conexao = new mysqli("localhost", "root", "Home@spSENAI2025!", "cadastro");

if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados");
}

$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];


$sql = "INSERT INTO usuarios_atividade (nome, endereco, telefone, email)
        VALUES ('$nome', '$endereco', '$telefone', '$email')";

        if ($conexao->query($sql) == TRUE) {

    echo "Usuario cadastrado com sucesso.";    
    } else {
    echo "Erro ao cadastrar usuário.";
    }

$conexao->close();

?>