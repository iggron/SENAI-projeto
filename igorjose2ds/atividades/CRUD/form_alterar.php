
<link rel="stylesheet" href="empresa.css">
<?php
$conexao = new mysqli('localhost', 'root', 'Home@spSENAI2025!', 'empresa');
 

$cpf = $_REQUEST['cpf'] ?? '';

if (!empty($cpf)) {
    $sql = "SELECT * FROM funcionario WHERE cpf = '$cpf'";
    $resultado = $conexao->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        $funcionario = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Funcionário</title>
</head>
<body>
    <h2>Alterar Cadastro de Funcionário</h2>
    <form action="salvar_alteracao.php" method="POST">
        <input type="hidden" name="cpf" value="<?php echo $funcionario['cpf']; ?>">

        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?php echo $funcionario['nome']; ?>" required><br><br>

        <label>Função:</label><br>
        <input type="text" name="funcao" value="<?php echo $funcionario['funcao']; ?>" required><br><br>

        <label>Departamento:</label><br>
        <input type="text" name="departamento" value="<?php echo $funcionario['departamento']; ?>" required><br><br>

        <label>Salário:</label><br>
        <input type="number" step="0.01" name="salario" value="<?php echo $funcionario['salario']; ?>" required><br><br>

        <button type="submit">Gravar Alterações</button>
    </form>
</body>
</html>
<?php
    } else {
        echo "Funcionário não encontrado.";
    }
} else {
    echo "Informe um CPF válido para realizar a alteração.";
}
$conexao->close();
?>