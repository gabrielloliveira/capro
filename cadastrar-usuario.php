<?php
  @session_start();
  if ($_POST) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
    require_once 'conexao.php';
    $execucao = mysqli_query($conexao, "INSERT INTO usuarios (username, email, senha) VALUES ('$username', '$email', '$senhaCriptografada')");
    if ($execucao) {
      $_SESSION['resposta'] = 1;
    }
    else{
      $_SESSION['resposta'] = 0;
    }
    header("Location: cadastro.php");
    exit(0);
  }
  header("Location: index.php");
  exit(0);
?>