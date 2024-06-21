<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipoAnimal = $_POST['tipoAnimal'];

    $sql = "INSERT INTO tbTipoAnimal (tipoAnimal) VALUES ('$tipoAnimal')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo tipo de animal cadastrado com sucesso!";
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
    <title>Cadastro de Tipos de Animais</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Cadastro de Tipos de Animais</h1>
        <form method="POST" action="tipos_animais.php">
            <div class="form-group">
                <label for="tipoAnimal">Tipo de Animal</label>
                <input type="text" class="form-control" id="tipoAnimal" name="tipoAnimal" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
        <div class="mt-3 text-center">
            <a href="index.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</body>
</html>
