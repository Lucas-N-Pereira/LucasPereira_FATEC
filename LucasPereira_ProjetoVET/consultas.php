<?php
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Consultas</h1>
        
        <!-- Formulário para consultar Clientes -->
        <h2>Consultar Clientes</h2>
        <form method="POST" action="consultas.php">
            <button type="submit" name="consultarClientes" class="btn btn-primary">Consultar Clientes</button>
        </form>

        <!-- Resultados da consulta Clientes -->
        <?php
        if (isset($_POST['consultarClientes'])) {
            $sql = "SELECT * FROM tbCliente";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                echo "<table class='table mt-3'><thead><tr><th>ID</th><th>Nome</th><th>Telefone</th><th>Email</th></tr></thead><tbody>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["codCliente"] . "</td><td>" . $row["nomeCliente"] . "</td><td>" . $row["telefoneCliente"] . "</td><td>" . $row["EmailCliente"] . "</td></tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "Nenhum cliente encontrado.";
            }
        }
        ?>

        <!-- Formulário para consultar Tipos de Animais -->
        <h2>Consultar Tipos de Animais</h2>
        <form method="POST" action="consultas.php">
            <button type="submit" name="consultarTiposAnimais" class="btn btn-primary">Consultar Tipos de Animais</button>
        </form>

        <!-- Resultados da consulta Tipos de Animais -->
        <?php
        if (isset($_POST['consultarTiposAnimais'])) {
            $sql = "SELECT * FROM tbTipoAnimal";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                echo "<table class='table mt-3'><thead><tr><th>ID</th><th>Tipo</th></tr></thead><tbody>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["codTipoAnimal"] . "</td><td>" . $row["tipoAnimal"] . "</td></tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "Nenhum tipo de animal encontrado.";
            }
        }
        ?>

        <!-- Formulário para consultar Animais -->
        <h2>Consultar Animais</h2>
        <form method="POST" action="consultas.php">
            <button type="submit" name="consultarAnimais" class="btn btn-primary">Consultar Animais</button>
        </form>

        <!-- Resultados da consulta Animais -->
        <?php
        if (isset($_POST['consultarAnimais'])) {
            $sql = "SELECT a.codAnimal, a.nomeAnimal, a.fotoAnimal, t.tipoAnimal, c.nomeCliente 
                    FROM tbAnimal a 
                    JOIN tbTipoAnimal t ON a.codTipoAnimal = t.codTipoAnimal 
                    JOIN tbCliente c ON a.codCliente = c.codCliente";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                echo "<table class='table mt-3'><thead><tr><th>ID</th><th>Nome</th><th>Foto</th><th>Tipo</th><th>Cliente</th></tr></thead><tbody>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["codAnimal"] . "</td><td>" . $row["nomeAnimal"] . "</td><td>" . $row["fotoAnimal"] . "</td><td>" . $row["tipoAnimal"] . "</td><td>" . $row["nomeCliente"] . "</td></tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "Nenhum animal encontrado.";
            }
        }
        ?>

        <!-- Formulário para consultar Veterinários -->
        <h2>Consultar Veterinários</h2>
        <form method="POST" action="consultas.php">
            <button type="submit" name="consultarVeterinarios" class="btn btn-primary">Consultar Veterinários</button>
        </form>

        <!-- Resultados da consulta Veterinários -->
        <?php
        if (isset($_POST['consultarVeterinarios'])) {
            $sql = "SELECT * FROM tbVeterinario";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                echo "<table class='table mt-3'><thead><tr><th>ID</th><th>Nome</th></tr></thead><tbody>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["codVet"] . "</td><td>" . $row["nomeVet"] . "</td></tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "Nenhum veterinário encontrado.";
            }
        }
        ?>

        <!-- Formulário para consultar Atendimentos -->
        <h2>Consultar Atendimentos</h2>
        <form method="POST" action="consultas.php">
            <button type="submit" name="consultarAtendimentos" class="btn btn-primary">Consultar Atendimentos</button>
        </form>

        <!-- Resultados da consulta Atendimentos -->
        <?php
        if (isset($_POST['consultarAtendimentos'])) {
            $sql = "SELECT a.codAtendimento, a.DataAtendimento, a.HoraAtendimento, an.nomeAnimal, v.nomeVet 
                    FROM tbAtendimento a 
                    JOIN tbAnimal an ON a.codAnimal = an.codAnimal 
                    JOIN tbVeterinario v ON a.codVet = v.codVet";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                echo "<table class='table mt-3'><thead><tr><th>ID</th><th>Data</th><th>Hora</th><th>Animal</th><th>Veterinário</th></tr></thead><tbody>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["codAtendimento"] . "</td><td>" . $row["DataAtendimento"] . "</td><td>" . $row["HoraAtendimento"] . "</td><td>" . $row["nomeAnimal"] . "</td><td>" . $row["nomeVet"] . "</td></tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "Nenhum atendimento encontrado.";
            }
        }
        ?>
    </div>
    <div class="mt-3 text-center">
    <a href="index.php" class="btn btn-secondary">Voltar</a>
</div>
    </div>
    
</body>
</html>
