<?php

$conexao = new mysqli ('localhost', 'root', 'Home@spSENAI2025!', 'magor');

$nome = $_POST['nome'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';


if ($nome != '') {
$sql = "insert into IM (nome, telefone, email, senha)
values ('$nome', '$telefone', '$email', '$senha')";
echo "gravado com sucesso" . "<br><br>";

$conexao->query($sql);
}
$sql = "SELECT * FROM IM";
$resultado = $conexao->query($sql);

while ($linha = $resultado->fetch_assoc()) {
    if ($linha['nome'] != '') {
        echo "Nome: " . $linha['nome'] . " <br>";
        echo "Telefone: " . $linha['telefone'] . " <br>";
        echo "Email: " . $linha['email'] . " <br>";
        echo "Senha: " . $linha['senha'] . " <br>";
        echo "<hr>";
    }
}
?>