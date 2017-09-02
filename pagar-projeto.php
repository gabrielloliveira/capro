<?php
  @session_start();
  if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit(0);
  }
  if ($_POST) {
    $idProjeto = $_POST['pagar'];
    require_once 'conexao.php';
    $usuario = $_SESSION["usuario"];
    $trazIdUsuario = mysqli_query($conexao, "SELECT * FROM usuarios WHERE username='$usuario' LIMIT 1");
    $usuarioAchado = mysqli_fetch_assoc($trazIdUsuario);
    $idUsuario = $usuarioAchado['id'];
    $pagouProjeto = mysqli_query($conexao, "UPDATE projetos SET pago=1 WHERE id=$idProjeto");
    if ($pagouProjeto) {
      $_SESSION['resposta'] = "projetopago";
    }else{
      $_SESSION['resposta'] = "projetonaopago";
    }
    header("Location: financas.php");
    exit(0);
    header("Location: financas.php");
    exit(0);
  }
  header("Location: financas.php");
  exit(0);
?>