<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eliminar Utilizadores</title>
    <link rel="stylesheet" type="text/css" href="style-2.css"> 
</head>
<body>
    <div id="menu">
        <?php include('menu.php'); ?>
    </div>
    <div id="conteudo">
        <?php
        include("proteger.php"); // Bloqueia acesso sem login
        include("conexao.php"); // Inclui conexão ao banco de dados

        // Consulta para obter usuários
        $sql = "SELECT * FROM utilizadores ORDER BY nome_utilizador ASC";
        $consulta = mysqli_query($ligacao, $sql);

        // Verificar se há resultados
        if (mysqli_num_rows($consulta) > 0) {
            // Início da tabela
            echo '<table class="user-table">';
            echo '<tr><th>Nome de Utilizador</th><th>Ações</th></tr>';

            // Iterar pelos resultados e montar as linhas da tabela
            while ($row = mysqli_fetch_assoc($consulta)) {
                echo "<tr>";
                echo "<td>{$row['nome_utilizador']}</td>";
                echo "<td><a href='processar_eliminar.php?id_utilizador={$row['id_utilizador']}'>Eliminar</a></td>";
                echo "</tr>";
            }

            // Fechar a tabela
            echo '</table>';
        } else {
            echo "Nenhum utilizador encontrado.";
        }
        ?>
    </div>
</body>
</html>
