<?php

$basedados = 'if0_37895536_gestao_utilizadores';
$utilizador = 'if0_37895536';
$password = 'kLwM0rYyEFt2UZA';
$host = 'sql302.infinityfree.com';
$port = 3306;

// Conexão com mysqli
$ligacao = mysqli_connect($host, $utilizador, $password, $basedados, $port);

// Verificar a conexão
if (!$ligacao) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}
?>