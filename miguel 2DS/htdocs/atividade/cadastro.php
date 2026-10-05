<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conexao = new mysqli("localhost", "root", "", "atividade");

    if ($conexao->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
    }

    $nome     = $_POST["nome"] ?? '';
    $endereco = $_POST["endereco"] ?? '';
    $telefone = $_POST["telefone"] ?? '';
    $email    = $_POST["email"] ?? '';

    $sql = "INSERT INTO usuarios (nome, endereco, telefone, email) VALUES ('$nome', '$endereco', '$telefone', '$email')";

    if ($conexao->query($sql) === TRUE) {
        echo "<p style='color: green;'>Usuário cadastrado com sucesso!</p>";
    } else {
        echo "<p style='color: red;'>Erro ao cadastrar: " . $conexao->error . "</p>";
    }

    $conexao->close();
}
?>