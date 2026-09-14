<?php

$conexao = new mysqli("localhost", "root", "Home@spSENAI2025!", "atividade");

if ($conexao->connect_error) {
    die("Erro na conexao com o banco de dados.");
}

$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$telefone= $_POST ["telefone"];
$email = $_POST["email"];

$sql = "insert into usuarios (nome, endereco, telefone, email)
        values ('$nome', '$endereco', '$telefone', '$email')";

if($conexao->query($sql) ===true) {

echo "Usuario cadastrado com sucesso!";

} else {
    
echo "erro ao cadastrar usuario.";

}

$conexao->close();

?>