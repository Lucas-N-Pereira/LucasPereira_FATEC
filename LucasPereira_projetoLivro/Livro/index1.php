<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Livros</title>
    <!-- Adicionando Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">CRUD de Livros</h1>
        <br>
        <a href="cadastro1.php" class="btn btn-primary">Adicionar Livro</a>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Ano de lançamento</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('conn1.php');
                $stmt = $pdo->query('SELECT * FROM tbLivro');
                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>{$row['codLivro']}</td>";
                    echo "<td>{$row['nomeLivro']}</td>";
                    echo "<td>{$row['anoLancamento']}</td>";
                    echo "<td>
                            <a href='editar1.php?id={$row['codLivro']}' class='btn btn-info btn-sm'>Editar</a>
                            <a href='excluir1.php?id={$row['codLivro']}' class='btn btn-danger btn-sm'>Excluir</a>
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
