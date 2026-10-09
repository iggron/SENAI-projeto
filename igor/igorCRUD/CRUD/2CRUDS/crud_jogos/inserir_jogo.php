<?php
$conexao = new mysqli("localhost", "root", "Home@spSENAI2025!", "critrview");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado - Cadastro</title>
    <link rel="stylesheet" href="estilo_jogos.css">
</head>
<body>
<?php
if ($conexao->connect_error) {
    die("<h2>Erro na conexão</h2><p>" . $conexao->connect_error . "</p>");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome           = $_POST['nome'];
    $genero         = $_POST['genero'];
    $plataforma     = $_POST['plataforma'];
    $desenvolvedora = $_POST['desenvolvedora'];
    $data_lancamento= $_POST['data_lancamento'];
    $preco          = $_POST['preco'];
    $sinopse        = $_POST['sinopse'];

    $sql = "INSERT INTO jogos (nome, genero, plataforma, desenvolvedora, data_lancamento, preco, sinopse)
            VALUES ('$nome', '$genero', '$plataforma', '$desenvolvedora', '$data_lancamento', '$preco', '$sinopse')";

    if ($conexao->query($sql) === TRUE) {
        echo "<h2>Jogo cadastrado com sucesso!</h2>";
        echo "<p>ID gerado: <strong>" . $conexao->insert_id . "</strong></p>";
        echo "<p><a href='cadastro_jogo.html'>Cadastrar outro</a></p>";
    } else {
        echo "<h2>Erro ao cadastrar</h2>";
        echo "<p>" . $conexao->error . "</p>";
    }
}
$conexao->close();
?>
</body>
</html>