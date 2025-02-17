<?php 
include('logic_barbeiro.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="form_barbeiro.css">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <title>BARBEARIA DZ9</title>
</head>

<body>

  <div class="conteudo">
    <section>
      <form action="" method="post">
        <h1>Visualize a sua Agenda </h1>

        <h2><label>Usuario</label></h2>
        <input type="text" name="usuario" />  
        <br />
        <h2><label>Senha</label></h2>
        <input type="password" name="senha" />
        <br />

        <a href="painel_barbeiro.php"> <button class="btn_voltar" type="submit">logar</button>
        </a>
      </form>

      <div class="botao_voltar">
        <a href="index.php"> <button class="btn_voltar">Voltar</button>
        </a>
      </div>
    <?php 
    // Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Valida os campos
  if (empty($_POST['usuario'])) {
      echo "Por favor, preencha o seu usuário.";
  } elseif (empty($_POST['senha'])) {
      echo "Por favor, preencha a sua senha.";
  } else {
      // Prevenção contra SQL Injection usando Prepared Statement
      $usuario = $_POST['usuario'];
      $senha = $_POST['senha'];

      $stmt = $conexao->prepare("SELECT * FROM atendimentos WHERE usuario = ? AND senha = ?");
      $stmt->bind_param("ss", $usuario, $senha);
      $stmt->execute();
      $resultado = $stmt->get_result();

      if ($resultado->num_rows === 1) {
          $usuario_data = $resultado->fetch_assoc();

          // Inicia a sessão de forma segura
          if (session_status() !== PHP_SESSION_ACTIVE) {
              session_start();
          }

          $_SESSION['usuario'] = $usuario_data['usuario'];
          $_SESSION['senha'] = $usuario_data['senha'];

          // Redireciona para o painel
          header("Location: painel_barbeiro.php");
          exit;
      } else {
          echo "Falha ao logar! Usuário ou senha incorretos.";
      }

      $stmt->close();
  }
}

$conexao->close();
?>
    </section>
  </div>
</html>