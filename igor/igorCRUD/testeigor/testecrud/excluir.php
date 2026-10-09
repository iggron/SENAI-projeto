<?php
include("conexao.php");

$idfilme = $_GET['idfilme'];

$sql = "DELETE FROM filmes WHERE idfilme = $idfilme";

if (mysqli_query($conexao, $sql)) {
    echo "<script>alert('Filme excluído com sucesso!'); window.location.href='consultar.php';</script>";
} else {
    echo "Erro ao excluir: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>