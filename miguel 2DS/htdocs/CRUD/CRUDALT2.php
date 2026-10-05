<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Confirmação de Atualização</title>
</head>
<body>
    <button class="btn-tema" onclick="alternarTema()">🌙 Alternar Tema</button>

    <div class="container-principal">
        <?php
        $conexao = new mysqli('localhost', 'root', '', 'empresa');

        $cpf = $_POST['cpf'];
        $novo_nome = $_POST['nome'];
        $novo_matricula = $_POST['matricula'];

        $sql_update = "UPDATE funcionarios SET nome = '$novo_nome', matricula = '$novo_matricula' WHERE cpf = '$cpf'";

        if ($conexao->query($sql_update) === TRUE) {
            echo "<h2>Dados Atualizados com Sucesso!</h2>";
            echo "<p><strong>Cadastro Final no Banco:</strong><br>";
            echo "CPF: " . $cpf . "<br>";
            echo "Nome: " . $novo_nome . "<br>";
            echo "Nova matrícula: " . $novo_matricula . "</p>";
        } else {
            echo "<p>Erro ao atualizar: " . $conexao->error . "</p>";
        }
        $conexao->close();
        ?>
        <button class="botao-destaque" onclick="window.location.href='CRUD.html'">Voltar ao Início</button>
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