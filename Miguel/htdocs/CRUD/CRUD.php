<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Status do Cadastro</title>
</head>
<body>
    <button class="btn-tema" onclick="alternarTema()">🌙 Alternar Tema</button>

    <div class="container-principal">
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $conexao = new mysqli("localhost", "root", "", "empresa");

            if ($conexao->connect_error) {
                die("<p>Erro na conexão com o cadastro: " . $conexao->connect_error . "</p>");
            }

            // Sanitizar e validar dados
            $nome = isset($_POST["nome"]) ? trim($_POST["nome"]) : "";
            $matricula = isset($_POST["matricula"]) ? trim($_POST["matricula"]) : "";
            $funcao = isset($_POST["funcao"]) ? trim($_POST["funcao"]) : "";
            $departamento = isset($_POST["departamento"]) ? trim($_POST["departamento"]) : "";
            $idade = isset($_POST["idade"]) ? intval($_POST["idade"]) : 0;
            $cpf = isset($_POST["cpf"]) ? trim($_POST["cpf"]) : "";
            $rg = isset($_POST["rg"]) ? trim($_POST["rg"]) : "";
            $salario = isset($_POST["salario"]) ? floatval($_POST["salario"]) : 0;
            $endereco = isset($_POST["endereco"]) ? trim($_POST["endereco"]) : "";
            $uf = isset($_POST["uf"]) ? trim(strtoupper($_POST["uf"])) : "";
            $pais = isset($_POST["pais"]) ? trim($_POST["pais"]) : "";

            // Validar campos obrigatórios
            if (empty($nome) || empty($matricula) || empty($cpf)) {
                echo "<p style='color: red;'>Erro: Nome, Matrícula e CPF são obrigatórios!</p>";
            } else if ($idade < 18 || $idade > 100) {
                echo "<p style='color: red;'>Erro: Idade deve estar entre 18 e 100!</p>";
            } else {
                // Usar prepared statements para evitar SQL Injection
                $sql = "INSERT INTO funcionarios (nome, matricula, funcao, departamento, idade, cpf, rg, salario, endereco, uf, pais)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                
                $stmt = $conexao->prepare($sql);
                $stmt->bind_param("ssssissssss", $nome, $matricula, $funcao, $departamento, $idade, $cpf, $rg, $salario, $endereco, $uf, $pais);
                
                if ($stmt->execute()) {
                    echo "<p style='color: green;'>✓ Usuário cadastrado com sucesso!</p>";
                } else {
                    echo "<p style='color: red;'>Erro ao cadastrar: " . $stmt->error . "</p>";
                }
                $stmt->close();
            }

            $conexao->close();
        }
        ?>
        <button onclick="window.location.href='CRUD.html'">Voltar ao Início</button>
    </div>

    <script>
        if (localStorage.getItem('tema') === 'escuro') {
            document.body.classList.add('tema-escuro');
            document.querySelector('.btn-tema').innerHTML = '☀️ Alternar Tema';
        }

        function alternarTema() {
            document.body.classList.toggle('tema-escuro');
            const btn = document.querySelector('.btn-tema');
            if (document.body.classList.contains('tema-escuro')) {
                localStorage.setItem('tema', 'escuro'); 
                btn.innerHTML = '☀️ Alternar Tema';
            } else {
                localStorage.removeItem('tema');
                btn.innerHTML = '🌙 Alternar Tema';
            }
        }
    </script>
</body>
</html>