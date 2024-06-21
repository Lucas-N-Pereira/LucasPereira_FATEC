<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['cadastrar'])) {
        $DataAtendimento = $_POST['DataAtendimento'];
        $HoraAtendimento = $_POST['HoraAtendimento'];
        $codAnimal = $_POST['codAnimal'];
        $codVet = $_POST['codVet'];

        $sql = "INSERT INTO tbAtendimento (DataAtendimento, HoraAtendimento, codAnimal, codVet) VALUES ('$DataAtendimento', '$HoraAtendimento', '$codAnimal', '$codVet')";

        if ($conn->query($sql) === TRUE) {
            echo "Novo atendimento cadastrado com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['excluir'])) {
        $codAtendimento = $_POST['codAtendimento'];

        $sql = "DELETE FROM tbAtendimento WHERE codAtendimento = '$codAtendimento'";

        if ($conn->query($sql) === TRUE) {
            echo "Atendimento excluído com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Obter animais e veterinários para o formulário
$animais = $conn->query("SELECT * FROM tbAnimal");
$veterinarios = $conn->query("SELECT * FROM tbVeterinario");
$atendimentos = $conn->query("SELECT * FROM tbAtendimento");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Atendimentos</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Cadastro de Atendimentos</h1>
        <form method="POST" action="atendimentos.php">
            <div class="form-group">
                <label for="DataAtendimento">Data do Atendimento</label>
                <input type="date" class="form-control" id="DataAtendimento" name="DataAtendimento" required>
            </div>
            <div class="form-group">
                <label for="HoraAtendimento">Hora do Atendimento</label>
                <input type="time" class="form-control" id="HoraAtendimento" name="HoraAtendimento" required>
            </div>
            <div class="form-group">
                <label for="codAnimal">Animal</label>
                <select class="form-control" id="codAnimal" name="codAnimal" required>
                    <?php while ($row = $animais->fetch_assoc()) { ?>
                        <option value="<?php echo $row['codAnimal']; ?>"><?php echo $row['nomeAnimal']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="codVet">Veterinário</label>
                <select class="form-control" id="codVet" name="codVet" required>
                    <?php while ($row = $veterinarios->fetch_assoc()) { ?>
                        <option value="<?php echo $row['codVet']; ?>"><?php echo $row['nomeVet']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
        </form>

        <h2 class="text-center mt-5">Excluir Atendimento</h2>
        <form method="POST" action="atendimentos.php">
            <div class="form-group">
                <label for="codAtendimento">Selecione o Atendimento</label>
                <select class="form-control" id="codAtendimento" name="codAtendimento" required>
                    <?php while ($row = $atendimentos->fetch_assoc()) { ?>
                        <option value="<?php echo $row['codAtendimento']; ?>"><?php echo $row['codAtendimento'] . ' - ' . $row['DataAtendimento'] . ' ' . $row['HoraAtendimento']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
        </form>

        <div class="mt-3 text-center">
            <a href="index.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</body>
</html>
