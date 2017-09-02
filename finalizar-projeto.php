<?php
  @session_start();
  if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit(0);
  }
  if ($_POST) {
    $id = $_POST['finalizar'];
    require_once 'conexao.php';
    $sql = "UPDATE projetos SET finalizado=1 WHERE id=$id";
    $execucao = mysqli_query($conexao, $sql);
    if ($execucao) {
      $_SESSION['resposta'] = 'finalizado';
    }else{
      $_SESSION['resposta'] = 'naofinalizado';
    }
    header("Location: projetos.php");
    exit(0);
  }
  header("Location: projetos.php");
  exit(0);
?>