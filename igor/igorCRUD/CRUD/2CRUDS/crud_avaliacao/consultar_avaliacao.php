<?php
$conexao = new mysqli("localhost", "root", "Home@spSENAI2025!", "critrview");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consultar Avaliações</title>
    <link rel="stylesheet" href="estilo_avaliacoes.css">
</head>
<body>
    <h2>Consultar Avaliações</h2>
    <form method="GET" action="consultar_avaliacao.php">
        <label>Nome do Usuário (completo):</label>
        <input type="text" name="nome_usuario" placeholder="Digite o nome completo...">
        <button type="submit">Buscar</button>
    </form>

<?php
if (isset($_GET['nome_usuario']) && !empty($_GET['nome_usuario'])) {
    $busca = trim($_GET['nome_usuario']);
    
    // Busca EXATA pelo nome do usuário
    $sql = "SELECT a.*, j.nome AS nome_jogo 
            FROM avaliacoes a
            INNER JOIN jogos j ON a.id_jogo = j.id_jogo
            WHERE a.nome_usuario = '$busca'";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        echo '<div class="resultado-box">';
        echo '<table>';
        echo '<tr><th>ID</th><th>Usuário</th><th>Jogo</th><th>Nota</th><th>Comentário</th></tr>';
        while ($linha = $resultado->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $linha['id_avaliacao'] . '</td>';
            echo '<td>' . $linha['nome_usuario'] . '</td>';
            echo '<td>' . $linha['nome_jogo'] . '</td>';
            echo '<td>' . $linha['nota'] . '/10</td>';
            echo '<td>' . $linha['comentario'] . '</td>';
            echo '</tr>';
        }
        echo '</table></div>';
    } else {
        echo '<div class="resultado-box"><p>Nenhuma avaliação encontrada com esse nome de usuário.</p></div>';
    }
}
$conexao->close();
?>
</body>
</html>