<?php
$conexao = new mysqli('localhost', 'root', 'Home@spSENAI2025!', 'empresa');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cpf'])) {
    $cpf = $_POST['cpf'];
    $novo_nome = $_POST['nome'];
    $nova_funcao = $_POST['funcao']; 


    $sql_update = "UPDATE funcionario SET nome = '$novo_nome', funcao = '$nova_funcao' WHERE cpf = '$cpf'";

    if ($conexao->query($sql_update) === TRUE) {
        echo "<h2 style='color:#16a34a;'>Dados Atualizados com Sucesso!</h2>";
        echo "<p><strong>Cadastro Final no Banco:</strong></p>";
        echo "CPF: " . $cpf . "<br>";
        echo "Nome: " . $novo_nome . "<br>";
        echo "Nova Função: " . $nova_funcao . "<br>";
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
} else {
    echo  "<h1>Acesso Inválido!</h1>";
    echo "<p>Envie os dados prenchidos no formulário de alteração.</p>";
}

$conexao->close();
?>