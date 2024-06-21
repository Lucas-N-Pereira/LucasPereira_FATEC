<?php
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

// Verificar se o termo de busca está definido
if (isset($_GET['termo_busca'])) {
    // Limpar e escapar o termo de busca
    $termo_busca = mysqli_real_escape_string($conn, $_GET['termo_busca']);

    // Construir a consulta SQL para buscar os livros pelo nome
    $sql = "SELECT * FROM tblivro WHERE nomeLivro LIKE '%$termo_busca%'";

    // Executar a consulta SQL
    $result = $conn->query($sql);

    // Exibir os resultados da busca
    if ($result->num_rows > 0) {
        echo "<h2>Livros:</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<strong>Código do Livro:</strong> " . $row["codLivro"] . "<br>";
            echo "<strong>Nome do Livro:</strong> " . $row["nomeLivro"] . "<br>";
            echo "<strong>Ano de Lançamento:</strong> " . $row["anoLancamento"] . "<br>";
            echo "</div>";
        }
    } else {
        echo "Nenhum resultado encontrado para o termo '$termo_busca'.";
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
