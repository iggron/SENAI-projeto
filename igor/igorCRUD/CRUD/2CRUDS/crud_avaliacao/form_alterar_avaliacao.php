<?php
$conexao = new mysqli("localhost", "root", "Home@spSENAI2025!", "critrview");
$nome_busca = $_REQUEST['nome_usuario'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Avaliação</title>
    <link rel="stylesheet" href="estilo_avaliacoes.css">
</head>
<body>
    <h2>Alterar Avaliação</h2>

<?php if (empty($nome_busca)): ?>
    <form method="GET" action="form_alterar_avaliacao.php">
        <label>Digite o Nome do Usuário:</label>
        <input type="text" name="nome_usuario" required placeholder="Ex: Gustavo">
        <button type="submit">Buscar Avaliação</button>
    </form>
<?php else: ?>
    <?php
    $sql = "SELECT a.*, j.nome AS nome_jogo 
        FROM avaliacoes a 
        INNER JOIN jogos j ON a.id_jogo = j.id_jogo
        WHERE a.nome_usuario = '$nome_busca'";
    $resultado = $conexao->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        if ($resultado->num_rows > 1) {
            echo '<div class="resultado-box">';
            echo '<p><strong>Várias avaliações encontradas. Escolha uma:</strong></p>';
            echo '<table>';
            echo '<tr><th>ID</th><th>Usuário</th><th>Jogo</th><th>Nota</th><th>Ação</th></tr>';
            while ($linha = $resultado->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $linha['id_avaliacao'] . '</td>';
                echo '<td>' . $linha['nome_usuario'] . '</td>';
                echo '<td>' . $linha['nome_jogo'] . '</td>';
                echo '<td>' . $linha['nota'] . '/10</td>';
                echo '<td><a href="form_alterar_avaliacao.php?nome_usuario=' . urlencode($linha['nome_usuario']) . '&id=' . $linha['id_avaliacao'] . '">Selecionar</a></td>';
                echo '</tr>';
            }
            echo '</table></div>';
        } else {
            $avaliacao = $resultado->fetch_assoc();
            if (isset($_GET['id'])) {
                $sql2 = "SELECT * FROM avaliacoes WHERE id_avaliacao = '" . $_GET['id'] . "'";
                $avaliacao = $conexao->query($sql2)->fetch_assoc();
            }
    ?>
        <form action="salvar_alteracao_avaliacao.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $avaliacao['id_avaliacao']; ?>">

            <label>Nota (1 a 10):</label>
            <input type="number" name="nota" min="1" max="10" value="<?php echo $avaliacao['nota']; ?>" required>

            <label>Comentário:</label>
            <textarea name="comentario" rows="4"><?php echo $avaliacao['comentario']; ?></textarea>

            <button type="submit">Salvar Alterações</button>
        </form>
    <?php
        }
    } else {
        echo '<div class="resultado-box"><p>Nenhuma avaliação encontrada com esse nome de usuário.</p>';
        echo '<p><a href="form_alterar_avaliacao.php">Tentar novamente</a></p></div>';
    }
    ?>
<?php endif; ?>
</body>
</html>
<?php $conexao->close(); ?>