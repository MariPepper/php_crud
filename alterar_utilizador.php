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
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        include("proteger.php");
        include("conexao.php");

        if (!$ligacao) {
            die("Erro de conexão: " . mysqli_connect_error());
        }

        // Se nenhum ID de utilizador foi enviado, mostrar o formulário de seleção
        if (!isset($_GET['id_utilizador']) || empty($_GET['id_utilizador'])) {
            $sql = "SELECT id_utilizador, nome_utilizador FROM utilizadores ORDER BY nome_utilizador ASC";
            $consulta = mysqli_query($ligacao, $sql);

            if (!$consulta) {
                die("Erro na consulta: " . mysqli_error($ligacao));
            }

        ?>
            <!-- Formulário de seleção -->
            <table class="user-table">
                <tr>
                    <th>Selecionar Usuário</th>
                    <th>Ação</th>
                </tr>
                <tr>
                    <form method="GET" action="alterar_utilizador.php">
                        <td>
                            <label for="id_utilizador">Selecione o usuário:</label>
                            <select name="id_utilizador" id="id_utilizador">
                                <?php
                                while ($row = mysqli_fetch_assoc($consulta)) {
                                    echo "<option value='{$row['id_utilizador']}'>{$row['nome_utilizador']}</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <input type="submit" value="Selecionar">
                        </td>
                    </form>
                </tr>
            </table>
        <?php
        } else {
            // Caso contrário, mostrar o formulário de alteração
            $id = intval($_GET['id_utilizador']);
            $sql = "SELECT * FROM utilizadores WHERE id_utilizador=$id";
            $consulta = mysqli_query($ligacao, $sql);

            if (!$consulta) {
                die("Erro na consulta: " . mysqli_error($ligacao));
            }

            $usuario = mysqli_fetch_assoc($consulta);

            if ($usuario) {
                echo '<table class="user-table">
                <tr>
                    <th>Nome de Utilizador</th>
                    <th>Email</th>
                    <th>Ação</th>
                </tr>
                <tr>
                    <form method="POST" action="processar_alterar.php">
                        <td>
                            <input type="hidden" name="id_utilizador" value="' . $usuario['id_utilizador'] . '">
                            <input type="text" name="nome" value="' . $usuario['nome_utilizador'] . '">
                        </td>
                        <td>
                            <input type="text" name="email" value="' . $usuario['email'] . '">
                        </td>
                        <td>
                            <input type="submit" name="alterar" value="Alterar">
                        </td>
                    </form>
                </tr>
            </table>';
            } else {
                echo "Usuário não encontrado.";
            }
        }
        ?>

    </div>
</body>

</html>