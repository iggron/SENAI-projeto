<?php

$jogo = $_POST['jogo'];
$acao = $_POST['acao'];
$aventura = $_POST['aventura'];
$rpg = $_POST['RPG'];
$estrategia = $_POST['estrategia'];
$simulacao = $_POST['simulacao'];
$esporte = $_POST['esporte'];
$quebra_cabeca = $_POST['quebra_cabeca'];

$servidor = "localhost";
$usuario = "root";
$senha = "opsENA12025!";
$banco = "sistema_db";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

$sql = "INSERT INTO tipo_de_jogo
(jogo, acao, aventura, RPG, estrategia, simulacao, esporte, quebra_cabeca)
VALUES
('$jogo', '$acao', '$aventura', '$rpg', '$estrategia', '$simulacao', '$esporte', '$quebra_cabeca')";

if ($conexao->query($sql) === TRUE) {

    echo "<h2>Jogo cadastrado com sucesso!</h2>";
    echo "<p>Dados cadastrados:</p>";

    echo "Jogo: " . $jogo . "<br>";
    echo "Ação: " . $acao . "<br>";
    echo "Aventura: " . $aventura . "<br>";
    echo "RPG: " . $rpg . "<br>";
    echo "Estratégia: " . $estrategia . "<br>";
    echo "Simulação: " . $simulacao . "<br>";
    echo "Esporte: " . $esporte . "<br>";
    echo "Quebra-Cabeça: " . $quebra_cabeca . "<br>";

} else {

    echo "Erro ao cadastrar: " . $conexao->error;

}

$conexao->close();

?>