<?php
include("conexao.php");

$busca = isset($_GET['busca']) ? $_GET['busca'] : '';

$sql = "SELECT * FROM filmes WHERE nome LIKE '%$busca%' OR genero LIKE '%$busca%' OR diretor LIKE '%$busca%' ORDER BY idfilme DESC";
$resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consultar Filmes</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="container">
        <h1>Catálogo de Filmes</h1>
        
        <form action="consultar.php" method="GET">
            <input type="text" name="busca" placeholder="Buscar por nome, gênero ou diretor..." value="<?php echo htmlspecialchars($busca); ?>">
            <button type="submit" class="btn">Buscar</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Gênero</th>
                    <th>Lançamento</th>
                    <th>Diretor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($resultado) > 0): ?>
                    <?php while ($filme = mysqli_fetch_assoc($resultado)): ?>
                        <tr>
                            <td><?php echo $filme['idfilme']; ?></td>
                            <td><?php echo htmlspecialchars($filme['nome']); ?></td>
                            <td><?php echo htmlspecialchars($filme['genero']); ?></td>
                            <td><?php echo date('d/m/Y', strtotime($filme['data_lancamento'])); ?></td>
                            <td><?php echo htmlspecialchars($filme['diretor']); ?></td>
                            <td class="actions">
                                <a href="form_alterar.php?idfilme=<?php echo $filme['idfilme']; ?>" class="btn">Alterar</a>
                                <a href="excluir.php?idfilme=<?php echo $filme['idfilme']; ?>" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir este filme?');">Excluir</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align: center;">Nenhum filme encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="nav-links">
            <a href="index.html" class="btn">Cadastrar Novo Filme</a>
        </div>
    </div>
</body>
</html>
<?php mysqli_close($conexao); ?>