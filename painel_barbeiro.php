<?php
//inclui  a logica_agenda.php para que eu consiga puxar os resultados do banco de dados que esta config naquela pagina
include('logic_agenda.php');
// se nao houver sessao  impede de alguem sem permissão de acessar o painel_barbeiro.php  verificando o paramentro usuario para fazer a validação//
if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['usuario'])) {
  die("voce não tem permissão para acessar esta pagina!!! Por favor logue com seu usuario e senha para ter acesso.");
}


// mostrando o resultado da tabela do banco de dados no painel_barbeiro.php 

$sql = "SELECT * FROM agendamentos  ORDER BY id  DESC ";
$resultado = $conexao->query($sql);



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <title>BARBEARIA DZ9</title>
</head>

<body>
<div class="btn">
    <button><a href="index.php">sair</a></button>
  </div>

    <div class="titulo">
      Bem vindo <?php echo $_SESSION['usuario']; ?> Aqui estão os seus agendamentos!!!
  </div>
  <table class="table table-sm table-dark">
  <thead>
  <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Contato</th>
          <th scope="col">data</th>
          <th scope="col">Horario </th>

        </tr>
  </thead>
  <tbody>
  <?php
        while ($user_data = mysqli_fetch_assoc($resultado)) {
          echo "<tr>";
          echo "<td>" . $user_data['id'] . "</td>";
          echo "<td>" . $user_data['nome'] . "</td>";
          echo "<td>" . $user_data['contato'] . "</td>";
          echo "<td>" . $user_data['dat'] . "</td>";
          echo "<td>" . $user_data['hora'] . "</td>";
          echo "</tr>";
        }
        ?>
  </tbody>
</table>
</body>

</html>