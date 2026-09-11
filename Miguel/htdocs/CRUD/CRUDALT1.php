<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Consulta de Funcionários</title>
</head>
<body>
    <button class="btn-tema" onclick="alternarTema()">🌙 Alternar Tema</button>

    <div class="container-principal">
        <h2>Consultar Clientes</h2>
        <form method="GET" action="CRUDFETCH.php">
            <label>Digite o Nome:</label> 
            <input type="text" name="nome" value=""> 
            <button type="submit">Buscar</button>
        </form>
        
        <hr>
        
        <?php
        if (isset($_GET['nome'])) {
            $busca = $_GET['nome'];
            $conexao = new mysqli('localhost', 'root', '', 'empresa');
            $sql = "SELECT * FROM funcionarios WHERE nome LIKE '%$busca%'";
            $resultado = $conexao->query($sql);
            
            echo "<h3>Resultados Encontrados:</h3>";
            
            if ($resultado->num_rows > 0) {
                while ($linha = $resultado->fetch_assoc()) {
                    echo "<p>ID: " . $linha['idFunc'] . " - Nome: " . $linha['nome'] . " - CPF: " . $linha['cpf'] . "</p>";
                }
            } else {
                echo "<p>Nenhum funcionário encontrado.</p>";
            }
            $conexao->close();
        }
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