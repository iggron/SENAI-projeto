<?php
include("conexao.php");

$nome = $_POST['nome'];
$genero = $_POST['genero'];
$data_lancamento = $_POST['data_lancamento'];
$diretor = $_POST['diretor'];

$sql = "INSERT INTO filmes (nome, genero, data_lancamento, diretor) VALUES ('$nome', '$genero', '$data_lancamento', '$diretor')";

if (mysqli_query($conexao, $sql)) {
    echo "<script>alert('Filme cadastrado com sucesso!'); window.location.href='consultar.php';</script>";
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>