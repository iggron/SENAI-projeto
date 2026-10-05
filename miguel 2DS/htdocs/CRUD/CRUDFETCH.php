<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Buscar Funcionário</title>
</head>
<body>
    <button class="btn-tema" onclick="alternarTema()">🌙 Alternar Tema</button>

    <div class="container-principal">
        <h2>Atualizar Cadastro</h2>
        <form action="CRUDALT1.php" method="POST">
            <label for="cpf">CPF do Funcionário:</label>
            <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" required>
            <button type="submit">Buscar Cadastro</button>
        </form>
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