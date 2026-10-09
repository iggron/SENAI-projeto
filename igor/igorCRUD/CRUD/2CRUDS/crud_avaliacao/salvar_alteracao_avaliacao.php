<?php
$conexao = new mysqli("localhost", "root", "Home@spSENAI2025!", "critrview");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
    <link rel="stylesheet" href="estilo_avaliacoes.css">
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id         = $_POST['id'];
    $nota       = $_POST['nota'];
    $comentario = $_POST['comentario'];

    $sql = "UPDATE avaliacoes SET nota='$nota', comentario='$comentario' WHERE id_avaliacao='$id'";

    if ($conexao->query($sql) === TRUE) {
        echo '<h2>Avaliação atualizada com sucesso!</h2>';
        echo '<div class="resultado-box">';
        echo '<p><strong>ID da Avaliação:</strong> ' . $id . '</p>';
        echo '<p><strong>Nova Nota:</strong> ' . $nota . '/10</p>';
        echo '<p><strong>Comentário:</strong> ' . $comentario . '</p>';
        echo '</div>';
    } else {
        echo '<h2>Erro ao atualizar</h2>';
        echo '<div class="resultado-box"><p>' . $conexao->error . '</p></div>';
    }
} else {
    echo '<h2>Acesso inválido</h2>';
}
$conexao->close();
?>
</body>
</html>