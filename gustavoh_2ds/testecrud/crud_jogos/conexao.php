<?php
mysqli_report(MYSQLI_REPORT_OFF);

$host = "localhost";
$usuario = "root";
$senha = "Home@spSENAI2025!";
$banco = "telefilms";

$conn = @new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("<link rel='stylesheet' href='estilo_filmes.css'>
         <div class='container' style='margin-top:50px;'>
            <div class='alert-message alert-error'>
                <strong>Erro de Conexão:</strong> " . $conn->connect_error . "<br>
                Verifique se o MySQL está ativo e se a base 'telefilms' foi criada.
            </div>
         </div>");
}

$conn->set_charset("utf8mb4");
?>