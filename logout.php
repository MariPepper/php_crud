<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Autenticação de utilizadores</title>
    <link rel="stylesheet" type="text/css" href="style-2.css">
</head>

<body>
    <div id="menu">
        <?php include('menu.php'); ?>
    </div>
    <div id="conteudo">
        <?php
        session_start();
        session_destroy();
        header('Location: login.php');
        ?>
    </div>
</body>

</html>