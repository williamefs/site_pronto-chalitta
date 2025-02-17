
<?php
// Configurações do banco de dados
$hostname = 'localhost';
$banco_dados = 'formulario_clientes';
$usuario = 'root';
$senha = '';

// Criação da conexão com o banco de dados
$conexao = new mysqli($hostname, $usuario, $senha, $banco_dados);

// Verifica se houve erro na conexão
if ($conexao->connect_error) {
    die('Erro na conexão: ' . $conexao->connect_error);
}

$mensagem = '';

// Verifica se o formulário foi enviado
if (isset($_POST['submit'])) {
    $nome = $_POST['nome'] ?? '';
    $contato = $_POST['contato'] ?? '';
    $dat = $_POST['dado'] ?? '';
    $hora = $_POST['hora'] ?? '';

    // Insere os dados na tabela de agendamentos
    $resultado = mysqli_query($conexao, "INSERT INTO agendamentos(nome, contato, dat, hora) VALUES('$nome', '$contato', '$dat', '$hora')");

    // Define a mensagem de sucesso ou erro
    if ($resultado) {
        $mensagem = '<p style="color: green;">Agendamento realizado com sucesso!</p>';
    } else {
        $mensagem = '<p style="color: red;">Erro ao realizar o agendamento. Tente novamente.</p>';
    }
}



?>