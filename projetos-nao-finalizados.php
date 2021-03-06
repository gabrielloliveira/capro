<?php
  @session_start();
  if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit(0);
  }
  require_once 'conexao.php';
  $usuario = $_SESSION["usuario"];
  $trazIdUsuario = mysqli_query($conexao, "SELECT * FROM usuarios WHERE username='$usuario' LIMIT 1");
  $usuarioAchado = mysqli_fetch_assoc($trazIdUsuario);
  $id = $usuarioAchado['id'];
  $trazProjetos = mysqli_query($conexao, "SELECT * FROM usuariosComProjetos WHERE idUsuario=$id");
  if ($trazProjetos) {
    ?>
      <div class="columns">
      <div class="column is-11">
    <?php
    while ($idProjeto = mysqli_fetch_assoc($trazProjetos)) {
      $id = $idProjeto['idProjeto'];
      $pegaProjetos = mysqli_query($conexao, "SELECT * FROM projetos where id=$id AND finalizado=0");
      while ($projeto = mysqli_fetch_assoc($pegaProjetos)) {
    ?>
      <div class="column">
          <div class="card">
            <header class="card-header ativarSanfona">
              <p class="card-header-title">
                <?=$projeto['nomeProjeto']?>
              </p>
              <a class="card-header-icon ativarSanfona">
                <span class="icon">
                  <i class="fa fa-angle-down"></i>
                </span>
              </a>
            </header>
            <div class="cardAtivado none">
              <div class="card-content">
                <div class="content">
                  <?=$projeto['descricao']?>
                  <br>
                  <?php
                    if ($projeto['dataEntrega']==null) {
                      $dataInicio = date_format(date_create($projeto['dataInicio']), 'd/m/y');
                      ?>
                      <small>Cliente: <?=$projeto['nomeCliente']?> <br>Contatos: <?=$projeto['emailCliente']?> | <?=$projeto['foneCliente']?><br>Valor do projeto: R$ <?=$projeto['valor']?> <br> Data de início: <?=$dataInicio?> <br> Data de entrega: Não informada</small>
                      <?php
                    }else{
                      $dataInicio = date_format(date_create($projeto['dataInicio']), 'd/m/y');
                      $dataEntrega = date_format(date_create($projeto['dataEntrega']), 'd/m/y');
                      ?>
                      <small>Cliente: <?=$projeto['nomeCliente']?> <br>Contatos: <?=$projeto['emailCliente']?> | <?=$projeto['foneCliente']?><br>Valor do projeto: R$ <?=$projeto['valor']?> <br> Data de início: <?=$dataInicio?> <br> Data de entrega: <?=$dataEntrega?></small>
                      <?php
                    }
                  ?>
                </div>
              </div>
              <footer class="card-footer">
                <form action="finalizar-projeto.php" method="post" class="card-footer-item finalizar-projeto">
                  <input type="hidden" name="finalizar" value="<?=$projeto['id']?>">
                  <button class="card-footer-item">Finalizar</button>
                </form>
                <form action="editar.php" method="post" class="card-footer-item editar-projeto">
                  <input type="hidden" name="editar" value="<?=$projeto['id']?>">
                  <button class="card-footer-item">Editar</button>
                </form>
                <form action="deletar-projeto.php" method="post" class="card-footer-item deletar-projeto">
                  <input type="hidden" name="deletar" value="<?=$projeto['id']?>">
                  <button class="card-footer-item">Deletar</button>
                </form>
              </footer>
            </div>
          </div>  
        </div>
    <?php
      }
    }?>
      </div>
      </div>      
    <?php
  }
?>