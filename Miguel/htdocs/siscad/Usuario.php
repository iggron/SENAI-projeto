<?php

$idUsuario = $_POST['idUsuario'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$avatar = $_POST['avatar'];
$bio = $_POST['bio'];
$idTipo_usuario = $_POST['idTipo_usuario'];

$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'Usuario';


$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die('Falha na conexão: ' . $conexao->connect_error);
}


$sql = "INSERT INTO usuarios (idUsuario, email, senha, avatar, bio, idTipo_usuario) 
VALUES ('$idUsuario', '$email', '$senha', '$avatar', '$bio', '$idTipo_usuario')";


if ($conexao->query($sql) === TRUE) {

    echo "<h2>Avaliacao cadastrado com sucesso!</h2>";
    echo "<p>Dados registrados:</p>";
    echo "idUsuario: " . $idUsuario . "<br>";
    echo "email: " . $email . "<br>";
    echo "senha: " . $senha . "<br>";
    echo "avatar: " . $avatar . "<br>";
    echo "bio: " . $bio . "<br>";
    echo "idTipo_usuario: " . $idTipo_usuario . "<br>";
    

} else {
    echo "Erro ao salvar: " . $conexao->error;
}


$conexao->close();
?>