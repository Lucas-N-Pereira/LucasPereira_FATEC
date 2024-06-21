<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nomeAutor = $_POST['nomeAutor'];

    $stmt = $pdo->prepare('UPDATE tbautor SET nomeAutor = ?  WHERE codAutor = ?'); 
    $stmt->execute([$nomeAutor, $id]);

    header('Location: index.php'); 

	}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM tbautor WHERE codAutor = ?');
$stmt->execute([$id]);
$autor = $stmt->fetch();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar Autor</title>
</head>
<body>

    <h2>Editar Autor</h2>
    <form method="POST">
    
       <input type="hidden" name="id" value="<?php echo $autor['codAutor']; ?>">
       <label for="nomeAutor"> Nome do Autor:</label>
       <input type="text" name="nomeAutor" value="<?php echo $autor['nomeAutor']; ?>" required><br>

       <input type="submit" value="Editar">

   </form>
</body>
</html>