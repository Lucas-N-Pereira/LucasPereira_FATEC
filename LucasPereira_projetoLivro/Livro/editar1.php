<?php
include('conn1.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nomeLivro = $_POST['nomeLivro'];
    $anoLancamento = $_POST['anoLancamento'];

    $stmt = $pdo->prepare('UPDATE tblivro SET nomeLivro = ?, anoLancamento = ? WHERE codLivro = ?'); 
    $stmt->execute([$nomeLivro, $anoLancamento, $id]);

    header('Location: index1.php'); 

	}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM tblivro WHERE codLivro = ?');
$stmt->execute([$id]);
$livro = $stmt->fetch();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar Livro</title>
</head>
<body>

    <h2>Editar Livro</h2>
    <form method="POST">
    
       <input type="hidden" name="id" value="<?php echo $livro['codLivro']; ?>">
       <label for="nomeCliente"> Nome do Livro:</label>
       <input type="text" name="nomeLivro" value="<?php echo $livro['nomeLivro']; ?>" required><br>

       <label for="anoLancamento"> Ano de LançamentoT:</label>
       <input type="text" name="anoLancamento" value="<?php echo $livro['anoLancamento']; ?>" required><br>

       <input type="submit" value="Editar">

   </form>
</body>
</html>