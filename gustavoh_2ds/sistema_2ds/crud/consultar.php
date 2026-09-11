<?php
echo "<h2>Consultar Clientes</h2>";
echo "<form method='GET' action='consultar.php'>";
echo "  <label>Digite o Nome:</label> ";
echo "  <input type='text' name='nome' value=''> ";
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
            echo "ID: " . $linha['idfunc'] . " - Nome: " . $linha['nome'] . " - CPF: " . $linha['cpf'] . "<br>";
        }
    } else {
        echo "Nenhum cliente encontrado.";

    }
}