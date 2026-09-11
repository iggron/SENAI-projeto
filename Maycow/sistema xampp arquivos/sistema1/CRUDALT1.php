<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Alterar Dados</title>
</head>
<body>
    <button class="btn-tema" onclick="alternarTema()">🌙 Alternar Tema</button>

    <div class="container-principal">
        <?php
        $conexao = new mysqli('localhost', 'root', 'Home@spSENAI2025!', 'empresa');
        $cpf = $_POST['cpf'];

        $sql = "SELECT * FROM funcionarios WHERE cpf = '$cpf'"; 
        $resultado = $conexao->query($sql);

        if ($resultado->num_rows > 0) {
            $cliente = $resultado->fetch_assoc();
        ?>
        <h2>Modificar Informações</h2>
        <form action="CRUDALT2.php" method="POST">
            <input type="hidden" name="cpf" value="<?php echo $cliente['cpf']; ?>">

            <label>Nome Atual:</label>
            <input type="text" name="nome" value="<?php echo $cliente['nome']; ?>" required>

            <label>E-matricula Atual:</label>
            <input type="text" name="matricula" value="<?php echo $cliente['matricula']; ?>" required>

            <button type="submit">Gravar Alterações</button>
        </form> 
        <?php 
        } else { 
            echo "<p>Funcionário não localizado.</p>"; 
        } 
        $conexao->close();
        ?> 
        <button class="botao-destaque" onclick="window.location.href='CRUDALT0.php'">Voltar</button>
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