<?php

    $conexao = new mysqli ('localhost', 'root', 'Home@spSENAI2025!', 'gustavo');

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "insert into henrique (nome,telefone,email,senha)
    values ('$nome', '$telefone', '$email', '$senha')";

    $conexao->query($sql);
    echo'concluido';

?>