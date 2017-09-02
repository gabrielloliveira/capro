<?php
  @session_start();
  if (isset($_SESSION['usuario']) && $_SESSION['usuario']==true) {
    header("Location: home.php");
    exit(0);
  }
  if ($_POST) {
    $username = $_POST['username'];
    $senha = $_POST['senha'];
    require_once 'conexao.php';
    $execucao = mysqli_query($conexao, "SELECT * FROM usuarios WHERE username='$username'");
    if ($execucao) {
      $usuarioEncontrado = mysqli_fetch_assoc($execucao);
      $senhaCriptografada = $usuarioEncontrado["senha"];
      if ($username && password_verify($senha, $senhaCriptografada)) {
        $_SESSION['usuario'] = $username;
        header("Location: home.php");
        exit(0);
      }
    }
    $mensagem = "Erro ao fazer login!";
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
  <title>Login - CAPRO - Sistema Gerenciador de Projetos</title>
</head>
<body>
  <section class="hero is-fullheight logo-inicial">
    <div class="hero-body">
      <div class="container">
        <form action="" method="post" class="box column is-5 formCenter">
          <section class="section">
            <h1 class="title logo has-text-centered">CAPRO</h1>
            <p class="control center">
            <?php
              if (isset($mensagem)) {
                echo $mensagem;
              }
            ?>
            </p>
            <p class="control">
              <label for="username" class="label">Nome de usuário: </label>
              <input type="text" class="input" placeholder="Digite o seu nome de usuário" id="username" name="username" required>
            </p>
            <p class="control">
              <label for="senha" class="label">Senha: </label>
              <input type="password" class="input" placeholder="Digite sua senha" id="senha" name="senha" required>
            </p>
            <p class="control align-right">
              <button class="button is-info">Entrar</button>
            </p>
            <p class="control center margin">
              Não possui uma conta ? <a href="cadastro.php">Cadastre grátis !</a>
            </p>
          </section>
        </form>
      </div>
    </div>
  </section>
</body>
</html>