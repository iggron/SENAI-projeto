<?php
$conexao = new mysqli("localhost", "root", "Home@spSENAI2025!", "critrview");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado - Avaliação</title>
    <link rel="stylesheet" href="estilo_avaliacoes.css">
</head>
<body>
<?php
if ($conexao->connect_error) {
    die("<h2>Erro na conexão</h2><p>" . $conexao->connect_error . "</p>");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_jogo      = $_POST['id_jogo'];
    $nome_usuario = $_POST['nome_usuario'];
    $nota         = $_POST['nota'];
    $comentario   = $_POST['comentario'];

    $verifica = $conexao->query("SELECT id_jogo FROM jogos WHERE id_jogo = '$id_jogo'");
    
    if ($verifica->num_rows == 0) {
        echo "<h2>Erro</h2>";
        echo "<p>O ID do jogo ($id_jogo) não existe. Cadastre o jogo primeiro!</p>";
    } else {
        $sql = "INSERT INTO avaliacoes (id_jogo, nome_usuario, nota, comentario)
                VALUES ('$id_jogo', '$nome_usuario', '$nota', '$comentario')";

        if ($conexao->query($sql) === TRUE) {
            echo "<h2>Avaliação cadastrada com sucesso!</h2>";
            echo "<p><a href='cadastro_avaliacao.html'>Fazer outra avaliação</a></p>";
        } else {
            echo "<h2>Erro</h2><p>" . $conexao->error . "</p>";
        }
    }
}
$conexao->close();
?>
</body>
</html>