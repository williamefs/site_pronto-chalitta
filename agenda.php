<?php
include("logic_agenda.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="agenda.css">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
  <title>Agendamento | Barber DZ9</title>
</head>

<body>
  <div class="cabecalho">
    <img src="./img/logo-.png" alt="Logo Barber DZ9" />
    <!--  <h2>BARBER <br />DZ9</h2> -->
  </div>
  <div class="conteudo">
    <section>

      <form action="agenda.php" method="post">
        <h1>Realize o seu <br />Agendamento</h1>

        <h2><label>Nome</label></h2>
        <input type="text" name="nome" placeholder="Digite o nome" required />
        <br />

        <h2><label>Contato</label></h2>
        <input type="number" name="contato" placeholder="Digite um contato" required />
        <br />

        <h2><label>Data</label></h2>
        <input type="date" name="dat" required />
        <br />

        <h2><label>Hora</label></h2>
        <input type="time" name="hora" required />
        <br />
        <?php
        // Exibe a mensagem dentro do formulário
        if ($mensagem) {
          echo $mensagem;
        }
        ?>
        <div class="botao_agendar">
          <a href="">
            <button type="submit" name="submit" class="btn_agendar">Agendar</button>
          </a>
        </div>
      </form>

      <div class="botao_voltar">
        <a href="index.php">
          <button type="submit" class="btn_voltar">Voltar</button>
        </a>
      </div>
    </section>
  </div>
</body>

</html>