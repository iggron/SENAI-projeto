<?php

// conecta ao banco de dados
$conexao = new mysqli("localhost", "root", "Home@spSENAI2025!", "atividade");

//verifica se houver erro na conexão 
if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados");
}

// recebe os dados enviados pelo formulário
$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];

// Insere os dados na tabela
$sql = "INSERT INTO usuarios_atividade (nome, endereco, telefone, email)
        VALUES ('$nome', '$endereco', '$telefone', '$email')";

        if ($conexao->query($sql) == TRUE) {

    echo "Usuario cadastrado com sucesso.";    
    } else {

    echo "Erro ao cadastrar usuário.";
    
    }
    
// Fecha a conexão
$conexao->close();

?>