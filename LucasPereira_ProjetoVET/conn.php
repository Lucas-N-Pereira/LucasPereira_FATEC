<?php
$servername = "localhost";  
$username = "root";  // O nome de usuário do MySQL
$password = "";    // A senha do usuário do MySQL
$dbname = "bdveterinaria";      // O nome do banco de dados

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
