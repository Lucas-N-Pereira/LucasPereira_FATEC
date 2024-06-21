<?php
include('conn1.php');

$id = $_GET['id'];
$stmt = $pdo->prepare('DELETE FROM tblivro WHERE codLivro = ?');
$stmt->execute([$id]);

header('Location: index1.php');
?>
