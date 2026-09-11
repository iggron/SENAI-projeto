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
            $conexao = new mysqli("localhost", "root", "Home@spSENAI2025!", "empresa");

            if ($conexao->connect_error) {
                die("<p>Erro na conexão com o cadastro: " . $conexao->connect_error . "</p>");
            }

            $nome = $_POST["nome"];
            $matricula = $_POST["matricula"];
            $funcao = $_POST["funcao"];
            $departamento    = $_POST["departamento"];
            $idade    = $_POST["idade"];
            $cpf    = $_POST["cpf"];
            $rg    = $_POST["rg"];
            $salario     = $_POST["salario"];
            $endereco    = $_POST["endereco"];
            $uf     = $_POST["uf"];
            $pais    = $_POST["pais"];

            $sql = "INSERT INTO funcionarios (nome, matricula, funcao, departamento, idade, cpf, rg, salario, endereco, uf, pais)
             VALUES ('$nome', '$matricula', '$funcao', '$departamento', '$idade', '$cpf', '$rg', '$salario', '$endereco', '$uf', '$pais')";

            if ($conexao->query($sql) === TRUE) {
                echo "<p>Usuário cadastrado com sucesso!</p>";
            } else {
                echo "<p>Erro ao cadastrar: " . $conexao->error . "</p>";
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