<?php
// Configurações de acesso ao banco de dados
$servidor = 'localhost';
$usuario  = 'root';
$senha    = 'Home@spSENAI2025!';
$banco    = 'sistema_db';

// Conexão com o MySQL
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verifica se ocorreu erro na conexão
if ($conexao->connect_error) {
    die('Falha na conexão: ' . $conexao->connect_error);
}

// Verifica se os dados foram enviados pelo formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome     = $_POST['nome'];
    $idade    = $_POST['idade'];
    $cpf      = $_POST['cpf'];
    $endereco = $_POST['endereco'];

    // Prepara a instrução SQL para inserção segura (Prepared Statement)
    $stmt = $conexao->prepare("INSERT INTO clientes (nome, idade, cpf, endereco) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $nome, $idade, $cpf, $endereco);

    // Executa e verifica se foi cadastrado com sucesso
    if ($stmt->execute()) {
        echo "<h2>Cliente cadastrado com sucesso!</h2>";
        echo "<p>Dados registrados:</p>";
        echo "Nome: " . htmlspecialchars($nome) . "<br>";
        echo "Idade: " . htmlspecialchars($idade) . " anos<br>";
        echo "CPF: " . htmlspecialchars($cpf) . "<br>";
        echo "Endereço: " . htmlspecialchars($endereco) . "<br>";
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
}

$conexao->close();
?>