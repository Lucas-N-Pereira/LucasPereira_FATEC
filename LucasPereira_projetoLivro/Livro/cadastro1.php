<?php
include('conn1.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codLivro = $_POST['codLivro'];
    $nomeLivro = $_POST['nomeLivro'];
    $anoLancamento = $_POST['anoLancamento'];

    $stmt = $pdo->prepare('INSERT INTO tblivro(codLivro, nomeLivro, anoLancamento ) VALUES (?, ?, ?)');
    $stmt->execute([$codLivro, $nomeLivro, $anoLancamento]);

    header('Location: index1.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Livro</title>
</head>
<body>
    <h2>Adicionar Livro</h2>
    <form method="POST">
        <label for="codLivro">Codígo do Livro:</label>
        <input type="text" name="codLivro" required><br>

        <label for="nomeLivro">Nome do Livro:</label>
        <input type="text" name="nomeLivro" required><br>

        <label for="anoLancamento">Ano de Lançamento:</label>
        <input type="text" name="anoLancamento" required><br>


        <input type="submit" value="Adicionar">
    </form>
</body>
</html>
