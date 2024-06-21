<!DOCTYPE html>
<html>
<head>
    <title>CRUD do Autor</title>
    <!-- Adicionando Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">CRUD do Autor</h1>
        <br>
        <a href="cadastro.php" class="btn btn-primary">Adicionar Autor</a>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('conn.php');
                $stmt = $pdo->query('SELECT * FROM tbautor');
                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>{$row['codAutor']}</td>";
                    echo "<td>{$row['nomeAutor']}</td>";
                    echo "<td>
                            <a href='editar.php?id={$row['codAutor']}' class='btn btn-info btn-sm'>Editar</a>
                            <a href='excluir.php?id={$row['codAutor']}' class='btn btn-danger btn-sm'>Excluir</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="../IndexG.php" class="btn btn-secondary">Voltar</a>
        <br><br>
    </div>
</body>
</html>
