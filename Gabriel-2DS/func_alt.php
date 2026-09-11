<link rel="stylesheet" href="style.css">
<?php
$conexao = new mysqli('localhost', 'root', 'Home@spSENAI2025!', 'empresa');
$cpf = $_POST['cpf'];

$sql = "SELECT * FROM funcionario WHERE cpf = '$cpf'";
$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    $funcionario = $resultado->fetch_assoc();
?>

<form action="salvar_alt_func.php" method="POST">
  <input type="hidden" name="cpf" value="<?php echo $funcionario['cpf']; ?>">

  <label>Nome Atual:</label>
  <input type="text" name="nome" value="<?php echo $funcionario['nome']; ?>" required>
  <br>
  <label>Matricula Atual:</label>
  <input type="text" name="matricula" value="<?php echo $funcionario['matricula']; ?>" required>
    <br>
  <button type="submit">Gravar Alterações</button>
</form>
<?php 
} 
else
 { 
    echo "funcionario não localizado."; 
    } 
?>