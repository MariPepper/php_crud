<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ver Utilizadores</title>
    <link rel="stylesheet" type="text/css" href="style-2.css"> 
</head>
<body>
    <div id="menu">
        <?php include ('menu.php'); ?>
    </div>
    <div id="conteudo">
        <?php
        include("proteger.php"); // Bloqueia acesso sem login
        include("conexao.php"); // Bloqueia acesso sem login

        $sql = "SELECT * FROM utilizadores ORDER BY nome_utilizador ASC";
        $consulta = mysqli_query($ligacao, $sql);
        if (mysqli_num_rows($consulta) > 0) {
            echo '<table class="user-table">';
            echo "<tr><th>Nome de Utilizador</th><th>Email</th></tr>";
            while ($row = mysqli_fetch_assoc($consulta)) {
                echo "<tr><td>{$row['nome_utilizador']}</td><td>{$row['email']}</td></tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum utilizador encontrado.";
        }
        ?>
    </div>
</body>
</html>