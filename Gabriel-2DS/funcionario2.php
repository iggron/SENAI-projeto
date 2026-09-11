<link rel="stylesheet" href="style.css">
<?php
echo "<h2>Consultar funcionario</h2>";
echo "<form method='GET' action='funcionario2.php'>";
echo "  <label>Digite o Nome:</label> ";
echo "  <input type='text' name='nome' value='funcionario'> ";
echo "  <input type='submit' value='Buscar'>";
echo "</form><hr>";
if (isset($_GET['nome'])) {
    $busca = $_GET['nome'];
    $conexao = new mysqli('localhost', 'root', 'Home@spSENAI2025!', 'empresa');
    $sql = "SELECT * FROM funcionario WHERE nome LIKE '%$busca%'";
    $resultado = $conexao->query($sql);
    echo "<h3>Resultados Encontrados:</h3>";
    if ($resultado->num_rows > 0) {
        while ($linha = $resultado->fetch_assoc()) {
            echo "idFunc: " . $linha['idFunc'] . " - Nome: " . $linha['nome'] .  " - matricula: " . $linha['matricula'] . " - funcao: " . $linha['funcao'] . " - departamento: " . $linha['departamento'] .  " - idade: " . $linha['idade'] . " - cpf: " . $linha['cpf'] . " - rg: " . $linha['rg'] . " - salario: " . $linha['salario'] . " - endereco: " . $linha['endereco'] . " - uf: " . $linha['uf'] . " - pais: " . $linha['pais'] ."<br>";
        }
    } else {
        echo "Nenhum funcionario encontrado.";
    }
    $conexao->close();
}
?>