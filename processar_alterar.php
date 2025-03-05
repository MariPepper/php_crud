<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Alterar Utilizadores</title>
    <link rel="stylesheet" type="text/css" href="style-2.css">
</head>
<body>
    <div id="menu">
        <?php include ('menu.php'); ?>
    </div>
    <div id="conteudo">
        <?php
        include("proteger.php"); // Bloqueia acesso sem login
        include('conexao.php');

        $id = $_POST['id_utilizador'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $sql = "UPDATE utilizadores SET nome_utilizador='$nome', email='$email' WHERE id_utilizador=$id";
        if (mysqli_query($ligacao, $sql)) {
            echo "Alteração bem-sucedida.";
        } else {
            echo "Erro na alteração: " . mysqli_error($ligacao); // Adiciona mysqli_error para depuração
        }
        ?>
    </div>
</body>
</html>
