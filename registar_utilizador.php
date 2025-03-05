<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registo de utilizador</title>
    <link rel="stylesheet" type="text/css" href="style-2.css">
</head>

<body>
    <div id="menu">
        <?php include('menu.php'); ?>
    </div>
    <div id="conteudo">
        <form id="form_registo" name="form_registo" method="POST" action="processar_registo.php">
            <table class="login-table" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="left" valign="top">
                        <font face="Arial" size="3">Registo de utilizadores:</font>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top" width="200">
                        <font face="Arial" size="2">Nome:</font>
                    </td>
                    <td><input type="text" name="nome" id="nome" required /></td>
                </tr>
                <tr>
                    <td align="left" valign="top" width="200">
                        <font face="Arial" size="2">Palavra-passe:</font>
                    </td>
                    <td><input type="password" name="password" id="password" required /></td>
                </tr>
                <tr>
                    <td align="left" valign="top" width="200">
                        <font face="Arial" size="2">Endereço de e-mail:</font>
                    </td>
                    <td><input type="email" name="email" id="email" required /></td>
                </tr>
                <tr>
                    <td><input type="submit" name="enviar" id="enviar" value="Registar" />
                        <input type="reset" name="apagar" id="apagar" value="Apagar" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>