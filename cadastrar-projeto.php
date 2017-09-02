<?php
  @session_start();
  if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit(0);
  }
  if ($_POST) {
    $nomeProjeto = $_POST["nome-projeto"];
    $dataInicio = $_POST["data-inicio"];
    $dataEntrega = $_POST["data-entrega"];
    $valorProjeto = $_POST["valor-projeto"];
    $nomeCliente = $_POST["nome-cliente"];
    $emailCliente = $_POST["email-cliente"];
    $foneCliente = $_POST["fone-cliente"];
    $descricaoProjeto = $_POST["descricao-projeto"];
    if ($dataEntrega == '') {
      $sql = "INSERT INTO projetos (nomeProjeto, descricao, dataInicio, dataEntrega, nomeCliente, emailCliente, foneCliente, valor) VALUES ('$nomeProjeto', '$descricaoProjeto', '$dataInicio', null, '$nomeCliente', '$emailCliente', '$foneCliente', '$valorProjeto')";
    }else{
      $sql = "INSERT INTO projetos (nomeProjeto, descricao, dataInicio, dataEntrega, nomeCliente, emailCliente, foneCliente, valor) VALUES ('$nomeProjeto', '$descricaoProjeto', '$dataInicio', '$dataEntrega', '$nomeCliente', '$emailCliente', '$foneCliente', '$valorProjeto')";
    }

    require_once 'conexao.php';
    $execucao = mysqli_query($conexao, $sql);
    $idProjeto = mysqli_insert_id($conexao);
    if ($execucao) {
      $usuario = $_SESSION["usuario"];
      $trazIdUsuario = mysqli_query($conexao, "SELECT * FROM usuarios WHERE username='$usuario' LIMIT 1");
      $usuarioAchado = mysqli_fetch_assoc($trazIdUsuario);
      $id = $usuarioAchado['id'];
      $sql = "INSERT INTO usuariosComProjetos VALUES ($id, $idProjeto)";
      echo "$sql";
      $execucao = mysqli_query($conexao, $sql);
      if ($execucao) {
        $_SESSION['resposta'] = 'cadastrado';
      }
    }else{
      $_SESSION['resposta'] = 'naocadastrado';
    }
    header("Location: projetos.php");
    exit(0);
  }
  header("Location: projetos.php");
  exit(0);
?>