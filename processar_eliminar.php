<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Alterar Utilizadores</title>
    <link rel="stylesheet" type="text/css" href="style-2.css">
</head>

<body>
    <div id="menu">
        <?php include('menu.php'); ?>
    </div>
    <div id="conteudo">
        <?php
        include("proteger.php"); // Bloqueia acesso sem login
        include('conexao.php');

        $id = $_GET['id_utilizador'];
        $sql = "DELETE FROM utilizadores WHERE id_utilizador=$id";
        if (mysqli_query($ligacao, $sql)) {
            echo "Utilizador eliminado com sucesso.";
        } else {
            echo "Erro ao eliminar utilizador.";
        }
        ?>
    </div>
</body>

</html>