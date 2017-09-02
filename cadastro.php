<?php
  @session_start();
  if (isset($_SESSION['usuario']) && $_SESSION['usuario']==true) {
    header("Location: home.php");
    exit(0);
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/bulma.css">
  <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
  <title>Cadastrar - CAPRO - Sistema Gerenciador de Projetos</title>
</head>
<body>
  <section class="hero is-fullheight logo-inicial">
    <div class="hero-body">
      <div class="container">
        <form action="cadastrar-usuario.php" method="post" class="box column is-5 formCenter">
          <section class="section">
            <h1 class="title logo has-text-centered">CAPRO</h1>
            <p class="control center">
            <?php
              if (isset($_SESSION['resposta'])) {
                if ($_SESSION['resposta']==1) {
                  echo "Cadastro realizado com sucesso! <a href='index.php'>Faça login</a>";
                }else{
                  echo "Erro ao cadastrar usuário!";
                }
              }
              unset($_SESSION['resposta']);
            ?>
            </p>
            <p class="control">
              <label for="username" class="label">Nome de usuário: </label>
              <input type="text" class="input" placeholder="Digite o seu nome de usuário" id="username" name="username" required>
            </p>
            <p class="control">
              <label for="email" class="label">Email: </label>
              <input type="email" class="input" placeholder="exemplo@gmail.com" id="email" name="email" required>
            </p>
            <p class="control">
              <label for="senha" class="label">Senha: </label>
              <input type="password" class="input" placeholder="Digite sua senha" id="senha" name="senha" required>
            </p>
            <p class="control align-right">
              <button class="button is-info">Cadastrar</button>
            </p>
            <p class="control center margin">
              Já possui uma conta ? <a href="index.php">Fazer login !</a>
            </p>
          </section>
        </form>
      </div>
    </div>
  </section>
</body>
</html>