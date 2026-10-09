<?php
include("conexao.php");

$idfilme = $_POST['idfilme'];
$nome = $_POST['nome'];
$genero = $_POST['genero'];
$data_lancamento = $_POST['data_lancamento'];
$diretor = $_POST['diretor'];

$sql = "UPDATE filmes SET nome = '$nome', genero = '$genero', data_lancamento = '$data_lancamento', diretor = '$diretor' WHERE idfilme = $idfilme";

if (mysqli_query($conexao, $sql)) {
    echo "<script>alert('Filme atualizado com sucesso!'); window.location.href='consultar.php';</script>";
} else {
    echo "Erro ao atualizar: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>