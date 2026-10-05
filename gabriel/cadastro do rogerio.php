<?php

$conexao = new mysqli("localhost", "root", "Home@spSENAI2025!", "empresa");

if ($conexao->connect_error) {
    die("Erro na conexao com o banco de dados.");
}

$nome = $_POST["nome"];
$matricula = $_POST["matricula"];
$funcao  = $_POST["funcao"];
$departamento = $_POST["departamento"];
$idade = $_POST["idade"];
$cpf = $_POST["cpf"];
$rg = $_POST["rg"];
$salario = $_POST["salario"];
$endereco = $_POST["endereco"];
$uf= $_POST ["uf"];
$pais = $_POST["pais"];

$sql = "insert into funcionario (nome, matricula, funcao, departamento, idade, cpf, rg, salario, endereco, uf, pais)
        values ('$nome', '$matricula', '$funcao', '$departamento', '$idade', '$cpf', '$rg','$salario', '$endereco', '$uf', '$pais')";

if($conexao->query($sql) ===true) {

echo "Funcionario cadastrado com sucesso!";

} else {
    
echo "erro ao cadastrar funcionario.";

}

$conexao->close();

?>