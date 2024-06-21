<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeVet = $_POST['nomeVet'];

    $sql = "INSERT INTO tbVeterinario (nomeVet) VALUES ('$nomeVet')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo veterinário cadastrado com sucesso!";
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
    <title>Cadastro de Veterinários</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Cadastro de Veterinários</h1>
        <form method="POST" action="veterinarios.php">
            <div class="form-group">
                <label for="nomeVet">Nome do Veterinário</label>
                <input type="text" class="form-control" id="nomeVet" name="nomeVet" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
        <div class="mt-3 text-center">
            <a href="index.php" class="btn btn-secondary">Voltar </a>
        </div>
    </div>
</body>
</html>
