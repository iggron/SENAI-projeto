<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexao = new mysqli("localhost", "root", "Home@spSENAI2025!", "empresa");

    if ($conexao->connect_error) {
        die("Erro na conexão de banco de dados: " . $conexao->connect_error);
    }

    $nome = $_POST['nome']; 
    $matricula = $_POST['matricula'];
    $funcao = $_POST['funcao'];
    $departamento = $_POST['departamento'];
    $idade = $_POST['idade'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $salario = $_POST['salario'];
    $endereco = $_POST['endereco'];
    $uf = $_POST['uf'];
    $pais = $_POST['pais']; 

$sql = "INSERT INTO funcionario (nome, matricula, funcao, departamento, idade, cpf, rg, salario, endereco, uf, pais) 
VALUES ('$nome', '$matricula', '$funcao', '$departamento', '$idade', '$cpf', '$rg', '$salario', '$endereco', '$uf', '$pais')";

    if ($conexao->query($sql) == TRUE) {

    echo "Funcionario cadastrado com sucesso.";    
    } else {
    echo "Erro ao cadastrar funcionario.";
    }

  $conexao->close();
}
?>