<!DOCTYPE html>
<html>
<head>
    <title>Pesquisa de Livros</title>
    <!-- Adicionando Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h1 class="mt-4">Pesquisa de Livros</h1>

    <form action="" method="GET" class="mt-4 mb-4">
        <div class="form-group">
            <label for="termo_busca">Código do Livro:</label>
            <input type="text" id="termo_busca" name="termo_busca" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    <?php
    // Verifica se o formulário foi submetido e se o termo de busca está definido
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['termo_busca'])) {
        // Conectar ao banco de dados (substitua as informações de conexão conforme necessário)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bd2504204";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar a conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Limpar e escapar o termo de busca
        $termo_busca = mysqli_real_escape_string($conn, $_GET['termo_busca']);

        // Construir a consulta SQL
        $sql = "SELECT * FROM tblivro WHERE codLivro = '$termo_busca'";

        // Executar a consulta SQL
        $result = $conn->query($sql);

        // Exibir os resultados da busca
        if ($result->num_rows > 0) {
            echo "<h2>Resultados da Busca:</h2>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card mt-4'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>Código do Livro: " . $row["codLivro"] . "</h5>";
                echo "<p class='card-text'>Nome do Livro: " . $row["nomeLivro"] . "</p>";
                echo "<p class='card-text'>Ano de Lançamento: " . $row["anoLancamento"] . "</p>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<div class='alert alert-warning' role='alert'>Nenhum resultado encontrado para o código '$termo_busca'.</div>";
        }

        // Fechar a conexão com o banco de dados
        $conn->close();
    } elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
        echo "<div class='alert alert-info' role='alert'>Por favor, digite o código do livro.</div>";
    }
    ?>
    <a href="../IndexG.php" class="btn btn-secondary mt-4">Voltar</a>
</div>

</body>
</html>
