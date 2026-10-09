<?php
require_once "conexao.php";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_filme = (int)$_GET['id'];

    $sql = "DELETE FROM filmes WHERE id_filme = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id_filme);
        $stmt->execute();
        $stmt->close();
    }
    $conn->close();
}

header("Location: consultar_filme.php");
exit();
?>