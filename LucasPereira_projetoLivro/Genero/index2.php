<!DOCTYPE html>
<html>
<head>
    <title>CRUD do Gênero</title>
    <!-- Adicionando Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">CRUD do Gênero</h1>
        <br>
        <a href="cadastro2.php" class="btn btn-primary">Adicionar Gênero</a>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Gênero</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('conn2.php');
                $stmt = $pdo->query('SELECT * FROM tbGenero');
                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>{$row['codGenero']}</td>";
                    echo "<td>{$row['nomeGenero']}</td>";
                    echo "<td>
                            <a href='editar2.php?id={$row['codGenero']}' class='btn btn-info btn-sm'>Editar</a>
                            <a href='excluir2.php?id={$row['codGenero']}' class='btn btn-danger btn-sm'>Excluir</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="../IndexG.php" class="btn btn-secondary">Voltar</a>
        <br><br><br>
    </div>
</body>
</html>
