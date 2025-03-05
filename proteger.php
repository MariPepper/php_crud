<?php
session_start();
if (!isset($_SESSION['nome_utilizador'])) {
    header("Location: login.php");
    exit;
}
?>
