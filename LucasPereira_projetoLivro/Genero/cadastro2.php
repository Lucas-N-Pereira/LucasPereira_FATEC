<?php
include('conn2.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codGenero = $_POST['codGenero'];
    $nomeGenero = $_POST['nomeGenero'];

    $stmt = $pdo->prepare('INSERT INTO tbgenero (codGenero, nomeGenero) VALUES (?, ?)');
    $stmt->execute([$codGenero, $nomeGenero]);

    header('Location: index2.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Gênero</title>
</head>
<body>
    <h2>Adicionar Gênero</h2>
    <form method="POST">
        <label for="codGenero">Codígo do Gênero:</label>
        <input type="text" name="codGenero" required><br>

        <label for="nomeGenero">Nome do Gênero:</label>
        <input type="text" name="nomeGenero" required><br>


        <input type="submit" value="Adicionar">
    </form>
</body>
</html>
