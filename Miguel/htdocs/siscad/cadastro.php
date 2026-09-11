<?php

$idUsuario = $_POST['idUsuario'];
$idJogo = $_POST['idJogo'];
$nota = $_POST['nota'];
$titulo_avaliacao = $_POST['titulo_avaliacao'];
$texto_avaliacao = $_POST['texto_avaliacao'];
$recomendado = $_POST['recomendado'];
$data_criacao = $_POST['data_criacao'];
$data_atualizacao = $_POST['data_atualizacao'];
$votos_uteis = $_POST['votos_uteis'];


$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'CritReview';


$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die('Falha na conexão: ' . $conexao->connect_error);
}


$sql = "INSERT INTO avaliacoes (idUsuario, idJogo, nota, titulo_avaliacao,texto_avaliacao, recomendado, data_criacao, data_atualizacao, votos_uteis) 
VALUES ('$idUsuario', '$idJogo', '$nota', '$titulo_avaliacao', '$texto_avaliacao', '$recomendado', '$data_criacao', '$data_atualizacao', '$votos_uteis')";


if ($conexao->query($sql) === TRUE) {

    echo "<h2>Avaliacao cadastrado com sucesso!</h2>";
    echo "<p>Dados registrados:</p>";
    echo "idUsuario: " . $idUsuario . "<br>";
    echo "idJogo: " . $idJogo . "<br>";
    echo "nota: " . $nota . "<br>";
    echo "titulo_avaliacao: " . $titulo_avaliacao . "<br>";
    echo "texto_avaliacao: " . $texto_avaliacao . "<br>";
    echo "idJogo: " . $recomendado . "<br>";
    echo "data_criacao: " . $data_criacao . "<br>";
    echo "data_atualizacao: " . $data_atualizacao . "<br>";
    echo "votos_uteis: " . $votos_uteis . "<br>";
    
    

} else {
    echo "Erro ao cadastrar: " . $conexao->error;
}


$conexao->close();
?>