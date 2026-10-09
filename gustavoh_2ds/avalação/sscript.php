<?php

$nome = $_POST['nome'];
$idade = $_POST['idade'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];


$servidor = 'localhost';
$usuario = 'root';
$senha = 'Home@spSENAI2025!';
$banco = 'sistema_db';


$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die('Falha na conexão: ' . $conexao->connect_error);
}


$sql = "INSERT INTO clientes (nome, idade, cpf, endereco) VALUES ('$nome', $idade, '$cpf', '$endereco')";


if ($conexao->query($sql) === TRUE) {

    echo "<h2>Cliente cadastrado com sucesso!</h2>";
    echo "<p>Dados registrados:</p>";
    echo "Nome: " . $nome . "<br>";
    echo "Idade: " . $idade . " anos<br>";
    echo "CPF: " . $cpf . "<br>";
    echo "Endereço: " . $endereco . "<br>";

} else {
    echo "Erro ao cadastrar: " . $conexao->error;
}


$conexao->close();
?>