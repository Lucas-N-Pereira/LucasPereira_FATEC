<?php
include('conn2.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nomeGenero = $_POST['nomeGenero'];

    $stmt = $pdo->prepare('UPDATE tbgenero SET nomeGenero = ?  WHERE codGenero = ?'); 
    $stmt->execute([$nomeGenero, $id]);

    header('Location: index2.php'); 

	}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM tbgenero WHERE codGenero = ?');
$stmt->execute([$id]);
$genero = $stmt->fetch();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar Gênero</title>
</head>
<body>

    <h2>Editar Gênero</h2>
    <form method="POST">
    
       <input type="hidden" name="id" value="<?php echo $genero['codGenero']; ?>">
       <label for="nomeGenero"> Gênero:</label>
       <input type="text" name="nomeGenero" value="<?php echo $genero['nomeGenero']; ?>" required><br>


       <input type="submit" value="Editar">

   </form>
</body>
</html>