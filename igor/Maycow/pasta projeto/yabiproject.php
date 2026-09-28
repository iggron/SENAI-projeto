<?php

$conexao = new mysqli ('localhost', 'root', 'Home@spSENAI2025!', 'yabi');

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "insert into mi (nome, telefone, email, senha)
values ('$nome', '$telefone', '$email', '$senha')";

$conexao->query($sql);
echo "gravado com sucesso";
