<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Processar Login</title>
    <link rel="stylesheet" type="text/css" href="style-2.css">
</head>

<body>
    <div id="menu">
        <?php include('menu.php'); ?>
    </div>
    <div id="conteudo">
        <?php
        session_start();
        include('conexao.php'); // Certifique-se de que este arquivo cria uma conexão MySQLi com a variável $ligacao

        // Dados fornecidos pelo usuário
        $username = $_POST['nome'];
        $password = $_POST['password'];

        // Preparar a consulta com MySQLi
        $sql = "SELECT nome_utilizador FROM utilizadores WHERE nome_utilizador = ? AND palavra_passe = ?";
        $stmt = mysqli_prepare($ligacao, $sql);

        // Vincular os parâmetros à consulta
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);

        // Executar a consulta
        mysqli_stmt_execute($stmt);

        // Obter os resultados
        $resultado = mysqli_stmt_get_result($stmt);

        // Verificar se encontrou resultados
        if (mysqli_num_rows($resultado) == 1) {
            $_SESSION['nome_utilizador'] = $username; // Define a variável de sessão
            header("Location: menu.php");
            exit;
        } else {
            echo "Erro de autenticação! ";
            echo '<a href="login.php">Tente novamente</a>';
        }

        // Fechar a consulta
        mysqli_stmt_close($stmt);
        ?>
    </div>
</body>

</html>
