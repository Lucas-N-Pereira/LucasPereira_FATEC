<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeCliente = $_POST['nomeCliente'];
    $telefoneCliente = $_POST['telefoneCliente'];
    $EmailCliente = $_POST['EmailCliente'];

    $sql = "INSERT INTO tbCliente (nomeCliente, telefoneCliente, EmailCliente) VALUES ('$nomeCliente', '$telefoneCliente', '$EmailCliente')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo cliente cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Cadastro de Clientes</h1>
        <form method="POST" action="clientes.php">
            <div class="form-group">
                <label for="nomeCliente">Nome do Cliente</label>
                <input type="text" class="form-control" id="nomeCliente" name="nomeCliente" required>
            </div>
            <div class="form-group">
                <label for="telefoneCliente">Telefone do Cliente</label>
                <input type="text" class="form-control" id="telefoneCliente" name="telefoneCliente" required>
            </div>
            <div class="form-group">
                <label for="EmailCliente">Email do Cliente</label>
                <input type="email" class="form-control" id="EmailCliente" name="EmailCliente" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
       <div class="mt-3 text-center">
            <a href="index.php" class="btn btn-secondary">Voltar </a>
        </div>
    </div>
</body>
</html>
