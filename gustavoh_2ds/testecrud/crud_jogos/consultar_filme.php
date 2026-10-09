<?php
require_once "conexao.php";

$sql = "SELECT * FROM filmes ORDER BY id_filme DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telefilms - Consultar Catálogo</title>
    <link rel="stylesheet" href="estilo_filmes.css">
</head>
<body>
    <div class="container">
        <h1>Catálogo de Filmes</h1>

        <nav class="nav-bar">
            <a href="cadastro_filme.html" class="nav-link">Cadastrar Filme</a>
            <a href="consultar_filme.php" class="nav-link active">Consultar Catálogo</a>
        </nav>

        <?php if ($result && $result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Gênero</th>
                        <th>Diretor</th>
                        <th>Duração</th>
                        <th>Lançamento</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id_filme']; ?></td>
                            <td><strong><?php echo htmlspecialchars($row['titulo']); ?></strong></td>
                            <td><?php echo htmlspecialchars($row['genero']); ?></td>
                            <td><?php echo htmlspecialchars($row['diretor']); ?></td>
                            <td><?php echo $row['duracao_minutos'] ? $row['duracao_minutos'] . ' min' : '-'; ?></td>
                            <td><?php echo $row['data_lancamento'] ? date('d/m/Y', strtotime($row['data_lancamento'])) : '-'; ?></td>
                            <td>
                                <a href="form_alterar_filme.php?id=<?php echo $row['id_filme']; ?>" class="btn-sm btn-edit">Editar</a>
                            </td>
                            <td>
                                <a href="deletar_filme.php?id=<?php echo $row['id_filme']; ?>" class="btn-sm btn-delete" onclick="return confirm('Tem certeza que deseja excluir este filme?')">Excluir</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert-message alert-error">
                Nenhum filme cadastrado até o momento.
            </div>
        <?php endif; ?>

        <?php $conn->close(); ?>
    </div>
</body>
</html>