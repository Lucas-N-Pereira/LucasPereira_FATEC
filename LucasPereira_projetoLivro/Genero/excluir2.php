<?php
include('conn2.php');

$id = $_GET['id'];
$stmt = $pdo->prepare('DELETE FROM tbgenero WHERE codGenero = ?');
$stmt->execute([$id]);

header('Location: index2.php');
?>
