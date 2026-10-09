<?php
$conexao = new mysqli("localhost", "root", "Home@spSENAI2025!", "critrview");
$nome_busca = $_REQUEST['nome_usuario'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir Avaliação - CritRview</title>
    <link rel="stylesheet" href="estilo_avaliacoes.css">
</head>
<body>
    <h2>Excluir Avaliação</h2>

<?php if (empty($nome_busca)): ?>
    <form method="GET" action="form_excluir_avaliacao.php">
        <label>Digite o Nome do Usuário (completo):</label>
        <input type="text" name="nome_usuario" required placeholder="Ex: Iggron">
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

        // Se tiver mais de uma avaliação do mesmo usuário
        if ($resultado->num_rows > 1) {
            echo '<div class="resultado-box">';
            echo '<p><strong>Várias avaliações encontradas. Escolha uma para excluir:</strong></p>';
            echo '<table>';
            echo '<tr><th>ID</th><th>Usuário</th><th>Jogo</th><th>Nota</th><th>Ação</th></tr>';
            while ($linha = $resultado->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $linha['id_avaliacao'] . '</td>';
                echo '<td>' . $linha['nome_usuario'] . '</td>';
                echo '<td>' . $linha['nome_jogo'] . '</td>';
                echo '<td>' . $linha['nota'] . '/10</td>';
                echo '<td><a href="form_excluir_avaliacao.php?nome_usuario=' . urlencode($linha['nome_usuario']) . '&id=' . $linha['id_avaliacao'] . '">Selecionar</a></td>';
                echo '</tr>';
            }
            echo '</table></div>';
        } else {
            $avaliacao = $resultado->fetch_assoc();

            // Se veio com id específico
            if (isset($_GET['id'])) {
                $sql2 = "SELECT a.*, j.nome AS nome_jogo 
                         FROM avaliacoes a 
                         INNER JOIN jogos j ON a.id_jogo = j.id_jogo
                         WHERE a.id_avaliacao = '" . $_GET['id'] . "'";
                $avaliacao = $conexao->query($sql2)->fetch_assoc();
            }
    ?>
        <div class="resultado-box">
            <p><strong>ID:</strong> <?php echo $avaliacao['id_avaliacao']; ?></p>
            <p><strong>Usuário:</strong> <?php echo $avaliacao['nome_usuario']; ?></p>
            <p><strong>Jogo:</strong> <?php echo $avaliacao['nome_jogo']; ?></p>
            <p><strong>Nota:</strong> <?php echo $avaliacao['nota']; ?>/10</p>
            <p><strong>Comentário:</strong> <?php echo $avaliacao['comentario']; ?></p>
            <br>
            <p style="color:#c62828; font-weight:bold;">Tem certeza que deseja excluir esta avaliação?</p>
        </div>

        <form action="excluir_avaliacao.php" method="POST" style="margin-top:15px;">
            <input type="hidden" name="id" value="<?php echo $avaliacao['id_avaliacao']; ?>">
            <input type="hidden" name="nome_usuario" value="<?php echo $avaliacao['nome_usuario']; ?>">
            <button type="submit" style="background-color:#c62828;">Confirmar Exclusão</button>
        </form>
        <br>
        <p><a href="form_excluir_avaliacao.php">Cancelar</a></p>
    <?php
        }
    } else {
        echo '<div class="resultado-box"><p>Nenhuma avaliação encontrada com esse nome de usuário.</p>';
        echo '<p><a href="form_excluir_avaliacao.php">Tentar novamente</a></p></div>';
    }
    ?>
<?php endif; ?>
</body>
</html>
<?php $conexao->close(); ?>