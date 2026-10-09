<?php
$conexao = new mysqli("localhost", "root", "Home@spSENAI2025!", "critrview");
$nome_busca = $_REQUEST['nome'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Jogo</title>
    <link rel="stylesheet" href="estilo_jogos.css">
</head>
<body>
    <h2>Alterar Jogo</h2>

<?php if (empty($nome_busca)): ?>
    <form method="GET" action="form_alterar_jogo.php">
        <label>Digite o Nome do Jogo:</label>
        <input type="text" name="nome" required placeholder="Ex: The Last of Us">
        <button type="submit">Buscar Jogo</button>
    </form>
<?php else: ?>
    <?php
    $sql = "SELECT * FROM jogos WHERE nome = '$nome_busca'";
    $resultado = $conexao->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        // Se encontrar mais de um, mostra lista para escolher
        if ($resultado->num_rows > 1) {
            echo '<div class="resultado-box">';
            echo '<p><strong>Vários jogos encontrados. Escolha um:</strong></p>';
            echo '<table>';
            echo '<tr><th>ID</th><th>Nome</th><th>Ação</th></tr>';
            while ($linha = $resultado->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $linha['id_jogo'] . '</td>';
                echo '<td>' . $linha['nome'] . '</td>';
                echo '<td><a href="form_alterar_jogo.php?nome=' . urlencode($linha['nome']) . '&id=' . $linha['id_jogo'] . '">Selecionar</a></td>';
                echo '</tr>';
            }
            echo '</table></div>';
        } else {
            $jogo = $resultado->fetch_assoc();
            // Se veio com id específico
            if (isset($_GET['id'])) {
                $sql2 = "SELECT * FROM jogos WHERE id_jogo = '" . $_GET['id'] . "'";
                $jogo = $conexao->query($sql2)->fetch_assoc();
            }
    ?>
        <form action="salvar_alteracao_jogo.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $jogo['id_jogo']; ?>">

            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $jogo['nome']; ?>" required>

            <label>Gênero:</label>
            <input type="text" name="genero" value="<?php echo $jogo['genero']; ?>" required>

            <label>Plataforma:</label>
            <input type="text" name="plataforma" value="<?php echo $jogo['plataforma']; ?>" required>

            <label>Desenvolvedora:</label>
            <input type="text" name="desenvolvedora" value="<?php echo $jogo['desenvolvedora']; ?>">

            <label>Data de Lançamento:</label>
            <input type="date" name="data_lancamento" value="<?php echo $jogo['data_lancamento']; ?>">

            <label>Preço (R$):</label>
            <input type="number" step="0.01" name="preco" value="<?php echo $jogo['preco']; ?>">

            <label>Sinopse:</label>
            <textarea name="sinopse" rows="4"><?php echo $jogo['sinopse']; ?></textarea>

            <button type="submit">Salvar Alterações</button>
        </form>
    <?php
        }
    } else {
        echo '<div class="resultado-box"><p>Nenhum jogo encontrado com esse nome.</p>';
        echo '<p><a href="form_alterar_jogo.php">Tentar novamente</a></p></div>';
    }
    ?>
<?php endif; ?>
</body>
</html>
<?php $conexao->close(); ?>