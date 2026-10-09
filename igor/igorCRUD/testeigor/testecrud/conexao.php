<?php
$host = "localhost";
$usuario = "root";
$senha = "Home@spSENAI2025!";
$banco = "locadora";

$conexao = mysqli_connect($host, $usuario, $senha, $banco);

if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}
?>