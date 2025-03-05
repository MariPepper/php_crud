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
        include('conexao.php');

        if (!empty($_POST['nome']) && !empty($_POST['password']) && !empty($_POST['email'])) {
            $username = $_POST['nome'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $sql = "INSERT INTO utilizadores (nome_utilizador, palavra_passe, email) VALUES ('$username', '$password', '$email')";
            if (mysqli_query($ligacao, $sql)) {
                echo "O registo foi efetuado com sucesso!";
            } else {
                echo "Erro ao registar utilizador.";
            }
        } else {
            header("Location: registar_utilizador.php");
            exit;
        }
        ?>
    </div>
</body>

</html>