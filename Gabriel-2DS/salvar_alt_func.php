<link rel="stylesheet" href="style.css">
<?php
$conexao = new mysqli('localhost', 'root', 'Home@spSENAI2025!', 'empresa');

$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$matricula = $_POST['matricula'];

$sql_update = "UPDATE funcionario SET nome = '$nome', matricula = 'matricula' WHERE cpf = '$cpf'";

if ($conexao->query($sql_update) === TRUE) {
    echo "<h2 style='color:#16a34a;'>Dados Atualizados com Sucesso!</h2>";
    echo "<p><strong>Cadastro Final no Banco:</strong></p>";
    echo "CPF: " . $cpf . "<br>";
    echo "Nome: " . $nome . "<br>";
    echo "Matricula: " . $matricula . "<br>";
} else {
    echo "Erro ao atualizar: " . $conexao->error;
}
$conexao->close();
?>