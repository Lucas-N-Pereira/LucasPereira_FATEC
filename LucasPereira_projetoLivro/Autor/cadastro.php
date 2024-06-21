<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codAutor = $_POST['codAutor'];
    $nomeAutor = $_POST['nomeAutor'];

    $stmt = $pdo->prepare('INSERT INTO tbautor(codAutor, nomeAutor ) VALUES (?, ?)');
    $stmt->execute([$codAutor, $nomeAutor]);
    
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Autor</title>
</head>
<body>
    <h2>Adicionar Autor</h2>
    <form method="POST">
        <label for="codAutor">Codígo do Autor:</label>
        <input type="text" name="codAutor" required><br>

        <label for="nomeAutor">Nome do Autor:</label>
        <input type="text" name="nomeAutor" required><br>

        <input type="submit" value="Adicionar">
    </form>
</body>
</html>
