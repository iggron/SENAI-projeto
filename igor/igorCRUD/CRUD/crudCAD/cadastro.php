<?php
// Recebe os dados e processa o envio apenas quando o formulário é submetido
$resultado_tabela = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário[cite: 4]
    $nome     = $_POST['nome'];[cite: 4]
    $idade    = $_POST['idade'];[cite: 4]
    $cpf      = $_POST['cpf'];[cite: 4]
    $endereco = $_POST['endereco'];[cite: 4]

    // Dados de conexão[cite: 4]
    $servidor = 'localhost';[cite: 4]
    $usuario  = 'root';[cite: 4]
    $senha    = 'Home@spSENAI2025!';[cite: 4]
    $banco    = 'sistema_db';[cite: 4]

    // Conecta ao banco[cite: 4]
    $conexao = new mysqli($servidor, $usuario, $senha, $banco);[cite: 4]

    // Verifica se a conexão deu certo[cite: 4]
    if ($conexao->connect_error) {[cite: 4]
        die('Falha na conexão: ' . $conexao->connect_error);[cite: 4]
    }

    // Monta o comando INSERT[cite: 4]
    $sql = "INSERT INTO clientes (nome, idade, cpf, endereco) 
            VALUES ('$nome', '$idade', '$cpf', '$endereco')";[cite: 4]

    // Executa o INSERT[cite: 4]
    if ($conexao->query($sql) === TRUE) {[cite: 4]
        // Formatação do resultado numa tabela HTML com colunas[cite: 4]
        $resultado_tabela = "
        <div class='sucesso-area'>
            <h2>Cliente cadastrado com sucesso!</h2>[cite: 4]
            <p>Dados registrados:</p>[cite: 4]
            
            <table class='tabela-dados'>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>CPF</th>
                        <th>Endereço</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>" . htmlspecialchars($nome) . "</td>[cite: 4]
                        <td>" . htmlspecialchars($idade) . " anos</td>[cite: 4]
                        <td>" . htmlspecialchars($cpf) . "</td>[cite: 4]
                        <td>" . htmlspecialchars($endereco) . "</td>[cite: 4]
                    </tr>
                </tbody>
            </table>
            
            <br>
            <a href='#' onclick='window.location.href=window.location.pathname;' class='btn-voltar'>Cadastrar outro cliente</a>[cite: 4]
        </div>";
    } else {
        $resultado_tabela = "<p class='erro'>Erro ao cadastrar: " . $conexao->error . "</p>";[cite: 4]
    }

    // Fecha a conexão[cite: 4]
    $conexao->close();[cite: 4]
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    
    <!-- CSS Integrado -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        h2 {
            margin-top: 0;
            color: #1e293b;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #475569;
            font-size: 14px;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
            transition: border-color 0.2s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="email"]:focus {
            border-color: #2563eb;
            outline: none;
        }

        button, input[type="submit"], .btn-voltar {
            display: block;
            text-align: center;
            text-decoration: none;
            width: 100%;
            padding: 12px;
            background-color: #2563eb;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            box-sizing: border-box;
            transition: background-color 0.2s;
        }

        button:hover, input[type="submit"]:hover, .btn-voltar:hover {
            background-color: #1d4ed8;
        }

        /* Estilização da tabela de colunas do resultado */
        .tabela-dados {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .tabela-dados th, .tabela-dados td {
            border: 1px solid #cbd5e1;
            padding: 10px 12px;
            text-align: left;
            font-size: 14px;
        }

        .tabela-dados th {
            background-color: #f1f5f9;
            color: #1e293b;
            font-weight: bold;
        }

        .tabela-dados td {
            color: #334155;
        }

        .erro {
            color: #dc2626;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <?php if (!empty($resultado_tabela)): ?>
            <!-- Exibe o resultado formatado em tabela após o envio -->
            <?php echo $resultado_tabela; ?>
        <?php else: ?>
            <!-- Formulário de registo -->
            <h2>Cadastrar Cliente</h2>
            
            <form action="" method="POST">
                <div class="form-group">
                    <label for="nome">Nome Completo:</label>
                    <input type="text" id="nome" name="nome" placeholder="Ex: Maria Silva" required>
                </div>

                <div class="form-group">
                    <label for="idade">Idade:</label>
                    <input type="number" id="idade" name="idade" placeholder="Ex: 30" required>
                </div>

                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" required>
                </div>

                <div class="form-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" id="endereco" name="endereco" placeholder="Rua, Número, Bairro" required>
                </div>

                <button type="submit">Cadastrar</button>
            </form>
        <?php endif; ?>
    </div>

</body>
</html>