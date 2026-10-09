<?php
$conexao = new mysqli("localhost", "root", "Home@spSENAI2025!", "critrview");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado - Exclusão</title>
    <link rel="stylesheet" href="estilo_avaliacoes.css">
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id           = $_POST['id'];
    $nome_usuario = $_POST['nome_usuario'];

    $sql = "DELETE FROM avaliacoes WHERE id_avaliacao = '$id'";

    if ($conexao->query($sql) === TRUE) {
        echo '<h2>Avaliação excluída com sucesso!</h2>';
        echo '<div class="resultado-box">';
        echo '<p><strong>ID:</strong> ' . $id . '</p>';
        echo '<p><strong>Usuário:</strong> ' . $nome_usuario . '</p>';
        echo '<p>A avaliação foi removida do sistema.</p>';
        echo '</div>';
        echo '<p><a href="form_excluir_avaliacao.php">Excluir outra avaliação</a></p>';
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