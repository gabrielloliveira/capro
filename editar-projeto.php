<?php
  @session_start();
  if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit(0);
  }
  if ($_POST) {
    $idProjeto = $_POST['id'];
    require_once 'conexao.php';
    $usuario = $_SESSION["usuario"];
    $trazIdUsuario = mysqli_query($conexao, "SELECT * FROM usuarios WHERE username='$usuario' LIMIT 1");
    $usuarioAchado = mysqli_fetch_assoc($trazIdUsuario);
    $id = $usuarioAchado['id'];
    $projetoEhDele = mysqli_query($conexao, "SELECT * FROM usuariosComProjetos WHERE idUsuario=$id AND idProjeto=$idProjeto");
    if ($projetoEhDele) {
      $nomeProjeto = $_POST["nome-projeto"];
      $dataInicio = $_POST["data-inicio"];
      $dataEntrega = $_POST["data-entrega"];
      $valorProjeto = $_POST["valor-projeto"];
      $nomeCliente = $_POST["nome-cliente"];
      $emailCliente = $_POST["email-cliente"];
      $foneCliente = $_POST["fone-cliente"];
      $descricaoProjeto = $_POST["descricao-projeto"];
      if ($dataEntrega == '') {
        $sql = "UPDATE projetos SET nomeProjeto='$nomeProjeto', descricao='$descricaoProjeto', dataInicio='$dataInicio', dataEntrega=null, nomeCliente='$nomeCliente', emailCliente='$emailCliente', foneCliente='$foneCliente', valor='$valorProjeto' WHERE id=$idProjeto";
      }else{
        $sql = "UPDATE projetos SET nomeProjeto='$nomeProjeto', descricao='$descricaoProjeto', dataInicio='$dataInicio', dataEntrega='$dataEntrega', nomeCliente='$nomeCliente', emailCliente='$emailCliente', foneCliente='$foneCliente', valor='$valorProjeto' WHERE id=$idProjeto";
      }
      $execucao = mysqli_query($conexao, $sql);
      if ($execucao) {
        $_SESSION['resposta'] = 'editado';
      }else{
        $_SESSION['resposta'] = 'naoeditado';
      }
      header("Location: projetos.php");
      exit(0);
    }else{
      header("Location: projetos.php");
      exit(0);
    }
  }
  header("Location: projetos.php");
  exit(0);
?>