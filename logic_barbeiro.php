<?php
// Configurações do banco de dados
$dbhost = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'horarios';

// Criação da conexão com o banco de dados
$conexao = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);

// Verificação de erro na conexão
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

?>
