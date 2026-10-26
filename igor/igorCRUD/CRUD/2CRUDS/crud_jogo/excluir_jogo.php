<?php
$conexao = new mysqli("localhost", "root", "Home@spSENAI2025!", "critrview");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado - Exclusão</title>
    <link rel="stylesheet" href="estilo_jogos.css">
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id   = $_POST['id'];
    $nome = $_POST['nome'];

    $sql = "DELETE FROM jogos WHERE id_jogo = '$id'";

    if ($conexao->query($sql) === TRUE) {
        echo '<h2>Jogo excluído com sucesso!</h2>';
        echo '<div class="resultado-box">';
        echo '<p><strong>ID:</strong> ' . $id . '</p>';
        echo '<p><strong>Nome:</strong> ' . $nome . '</p>';
        echo '<p>O jogo e todas as avaliações relacionadas foram removidos.</p>';
        echo '</div>';
        echo '<p><a href="form_excluir_jogo.php">Excluir outro jogo</a></p>';
    } else {
        echo '<h2>Erro ao excluir</h2>';
        echo '<div class="resultado-box"><p>' . $conexao->error . '</p></div>';
    }
} else {
    echo '<h2>Acesso inválido</h2>';
}
$conexao->close();
?>
</body>
</html>