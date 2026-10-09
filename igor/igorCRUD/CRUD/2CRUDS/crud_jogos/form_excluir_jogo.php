<?php
$conexao = new mysqli("localhost", "root", "Home@spSENAI2025!", "critrview");
$nome_busca = $_REQUEST['nome'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir Jogo - CritRview</title>
    <link rel="stylesheet" href="estilo_jogos.css">
</head>
<body>
    <h2>Excluir Jogo</h2>

<?php if (empty($nome_busca)): ?>
    <form method="GET" action="form_excluir_jogo.php">
        <label>Digite o Nome do Jogo (completo):</label>
        <input type="text" name="nome" required placeholder="Ex: Silksong">
        <button type="submit">Buscar Jogo</button>
    </form>
<?php else: ?>
    <?php
    $sql = "SELECT * FROM jogos WHERE nome = '$nome_busca'";
    $resultado = $conexao->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        $jogo = $resultado->fetch_assoc();
    ?>
        <div class="resultado-box">
            <p><strong>ID:</strong> <?php echo $jogo['id_jogo']; ?></p>
            <p><strong>Nome:</strong> <?php echo $jogo['nome']; ?></p>
            <p><strong>Gênero:</strong> <?php echo $jogo['genero']; ?></p>
            <p><strong>Plataforma:</strong> <?php echo $jogo['plataforma']; ?></p>
            <p><strong>Preço:</strong> R$ <?php echo number_format($jogo['preco'], 2, ',', '.'); ?></p>
            <br>
            <p style="color:#c62828; font-weight:bold;">Tem certeza que deseja excluir este jogo?</p>
            <p style="color:#c62828;">(As avaliações deste jogo também serão apagadas)</p>
        </div>

        <form action="excluir_jogo.php" method="POST" style="margin-top:15px;">
            <input type="hidden" name="id" value="<?php echo $jogo['id_jogo']; ?>">
            <input type="hidden" name="nome" value="<?php echo $jogo['nome']; ?>">
            <button type="submit" style="background-color:#c62828;">Confirmar Exclusão</button>
        </form>
        <br>
        <p><a href="form_excluir_jogo.php">Cancelar</a></p>
    <?php
    } else {
        echo '<div class="resultado-box"><p>Nenhum jogo encontrado com esse nome.</p>';
        echo '<p><a href="form_excluir_jogo.php">Tentar novamente</a></p></div>';
    }
    ?>
<?php endif; ?>
</body>
</html>
<?php $conexao->close(); ?>