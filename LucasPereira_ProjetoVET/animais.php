<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeAnimal = $_POST['nomeAnimal'];
    $fotoAnimal = $_POST['fotoAnimal'];
    $codTipoAnimal = $_POST['codTipoAnimal'];
    $codCliente = $_POST['codCliente'];

    $sql = "INSERT INTO tbAnimal (nomeAnimal, fotoAnimal, codTipoAnimal, codCliente) VALUES ('$nomeAnimal', '$fotoAnimal', '$codTipoAnimal', '$codCliente')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo animal cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

// Obter tipos de animais e clientes para o formulário
$tiposAnimais = $conn->query("SELECT * FROM tbTipoAnimal");
$clientes = $conn->query("SELECT * FROM tbCliente");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Animais</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Cadastro de Animais</h1>
        <form method="POST" action="animais.php">
            <div class="form-group">
                <label for="nomeAnimal">Nome do Animal</label>
                <input type="text" class="form-control" id="nomeAnimal" name="nomeAnimal" required>
            </div>
            <div class="form-group">
                <label for="fotoAnimal">Foto do Animal</label>
                <input type="text" class="form-control" id="fotoAnimal" name="fotoAnimal" required>
            </div>
            <div class="form-group">
                <label for="codTipoAnimal">Tipo de Animal</label>
                <select class="form-control" id="codTipoAnimal" name="codTipoAnimal" required>
                    <?php while ($row = $tiposAnimais->fetch_assoc()) { ?>
                        <option value="<?php echo $row['codTipoAnimal']; ?>"><?php echo $row['tipoAnimal']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="codCliente">Cliente</label>
                <select class="form-control" id="codCliente" name="codCliente" required>
                    <?php while ($row = $clientes->fetch_assoc()) { ?>
                        <option value="<?php echo $row['codCliente']; ?>"><?php echo $row['nomeCliente']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
       <div class="mt-3 text-center">
            <a href="index.php" class="btn btn-secondary">Voltar </a>
        </div>
    </div>
</body>
</html>
