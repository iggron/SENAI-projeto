<?php
$conexao = new mysqli("localhost", "root", "Home@spSENAI2025!", "critrview");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
    <link rel="stylesheet" href="estilo_jogos.css">
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id             = $_POST['id'];
    $nome           = $_POST['nome'];
    $genero         = $_POST['genero'];
    $plataforma     = $_POST['plataforma'];
    $desenvolvedora = $_POST['desenvolvedora'];
    $data_lancamento= $_POST['data_lancamento'];
    $preco          = $_POST['preco'];
    $sinopse        = $_POST['sinopse'];

    $sql = "UPDATE jogos SET 
                nome='$nome', genero='$genero', plataforma='$plataforma',
                desenvolvedora='$desenvolvedora', data_lancamento='$data_lancamento',
                preco='$preco', sinopse='$sinopse'
            WHERE id_jogo='$id'";

    if ($conexao->query($sql) === TRUE) {
        echo '<h2>Jogo atualizado com sucesso!</h2>';
        echo '<div class="resultado-box">';
        echo '<p><strong>ID:</strong> ' . $id . '</p>';
        echo '<p><strong>Nome:</strong> ' . $nome . '</p>';
        echo '<p><strong>Gênero:</strong> ' . $genero . '</p>';
        echo '<p><strong>Plataforma:</strong> ' . $plataforma . '</p>';
        echo '<p><strong>Desenvolvedora:</strong> ' . $desenvolvedora . '</p>';
        echo '<p><strong>Preço:</strong> R$ ' . number_format($preco, 2, ',', '.') . '</p>';
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