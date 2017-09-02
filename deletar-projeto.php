<?php
  @session_start();
  if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit(0);
  }
  if ($_POST) {
    $idProjeto = $_POST['deletar'];
    require_once 'conexao.php';
    $usuario = $_SESSION["usuario"];
    $trazIdUsuario = mysqli_query($conexao, "SELECT * FROM usuarios WHERE username='$usuario' LIMIT 1");
    $usuarioAchado = mysqli_fetch_assoc($trazIdUsuario);
    $idUsuario = $usuarioAchado['id'];
    $apagaProjetosComUsuario = mysqli_query($conexao, "DELETE FROM usuariosComProjetos WHERE idUsuario=$idUsuario AND idProjeto=$idProjeto");
    if ($apagaProjetosComUsuario) {
      $apagaProjeto = mysqli_query($conexao, "DELETE FROM projetos WHERE id=$idProjeto");
      if ($apagaProjeto) {
        $_SESSION['resposta'] = "projetoapagado";
      }else{
        $_SESSION['resposta'] = "projetonaoapagado";
      }
      header("Location: projetos.php");
      exit(0);
    }
    header("Location: projetos.php");
    exit(0);
  }
  header("Location: projetos.php");
  exit(0);
?>