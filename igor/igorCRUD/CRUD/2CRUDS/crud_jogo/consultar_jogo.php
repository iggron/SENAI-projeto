<?php
$conexao = new mysqli("localhost", "root", "Home@spSENAI2025!", "critrview");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consultar Jogos</title>
    <link rel="stylesheet" href="estilo_jogos.css">
</head>
<body>
    <h2>Consultar Jogos</h2>
    <form method="GET" action="consultar_jogo.php">
        <label>Nome do Jogo (completo):</label>
        <input type="text" name="nome" placeholder="Digite o nome completo...">
        <button type="submit">Buscar</button>
    </form>

<?php
if (isset($_GET['nome']) && !empty($_GET['nome'])) {
    $busca = trim($_GET['nome']);
    
    // Busca EXATA (nome completo)
    $sql = "SELECT * FROM jogos WHERE nome = '$busca'";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        echo '<div class="resultado-box">';
        echo '<table>';
        echo '<tr><th>ID</th><th>Nome</th><th>Gênero</th><th>Plataforma</th><th>Preço</th></tr>';
        while ($linha = $resultado->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $linha['id_jogo'] . '</td>';
            echo '<td>' . $linha['nome'] . '</td>';
            echo '<td>' . $linha['genero'] . '</td>';
            echo '<td>' . $linha['plataforma'] . '</td>';
            echo '<td>R$ ' . number_format($linha['preco'], 2, ',', '.') . '</td>';
            echo '</tr>';
        }
        echo '</table></div>';
    } else {
        echo '<div class="resultado-box"><p>Nenhum jogo encontrado com esse nome exato.</p></div>';
    }
}
$conexao->close();
?>
</body>
</html>