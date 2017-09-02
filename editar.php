<?php
  @session_start();
  if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit(0);
  }
  if ($_POST) {
    require_once 'conexao.php';
    $usuario = $_SESSION["usuario"];
    $idProjeto = $_POST['editar'];
    $trazIdUsuario = mysqli_query($conexao, "SELECT * FROM usuarios WHERE username='$usuario' LIMIT 1");
    $usuarioAchado = mysqli_fetch_assoc($trazIdUsuario);
    $id = $usuarioAchado['id'];
    $projetoEhDele = mysqli_query($conexao, "SELECT * FROM usuariosComProjetos WHERE idUsuario=$id AND idProjeto=$idProjeto");
    if ($projetoEhDele) {
      $trazProjeto = mysqli_query($conexao, "SELECT * FROM projetos WHERE id=$idProjeto");
    }else{
      header("Location: projetos.php");
      exit(0);
    }
  }else{
    header("Location: projetos.php");
    exit(0);
  }
  require_once 'header.php';
?>
<title>Editar projeto - CAPRO - Sistema Gerenciador de Projetos</title>
<script src="js/mascaras.js"></script>
<script src="js/jquery.js"></script>
<script src="js/mostraCard.js"></script>
<div class="column">
  <div class="container"> 
    <div class="columns">
      <div class="column is-11">
      <?php
        while ($projeto = mysqli_fetch_assoc($trazProjeto)) {
        ?>
        <form method="post" name="form" action="editar-projeto.php">
          <input type="hidden" name="id" value="<?=$projeto['id']?>">
          <div>
            <section class="section">
            <div class="columns">
              <div class="column">
                <p class="control">
                  <label class="label">Nome do projeto : </label>
                  <input type="text" class="input"  name="nome-projeto" placeholder="Blog do Jorge" value="<?=$projeto['nomeProjeto']?>" required>
                </p>
              </div>
              <div class="column">
                <p class="control">
                  <label class="label">Data de início : </label>
                  <input type="date" class="input" value="<?=$projeto['dataInicio']?>" name="data-inicio" required>
                </p>
              </div>
              <div class="column">
                <p class="control">
                  <label class="label">Data de entrega (opcional) : </label>
                  <input type="date" class="input" name="data-entrega" value="<?=$projeto['dataEntrega']?>">
                </p>
              </div>
              <div class="column">
                <p class="control">
                  <label class="label">Valor do projeto : </label>
                  <input type="text" class="input" id="valor" name="valor-projeto" placeholder="12345.67" onkeypress="mascara(this, moeda)" maxlength="8" value="<?=$projeto['valor']?>" required>
                </p>
              </div>
            </div>
            <div class="columns">
              <div class="column">
                <p class="control">
                  <label class="label">Nome do(a) cliente : </label>
                  <input type="text" class="input" placeholder="Jorge Lopes Silva" name="nome-cliente" value="<?=$projeto['nomeCliente']?>" required>
                </p>
              </div>
              <div class="column">
                <p class="control">
                  <label class="label">Email do(a) cliente : </label>
                  <input type="email" class="input" placeholder="exemplo@exemplo.com" name="email-cliente" required value="<?=$projeto['emailCliente']?>">
                </p>
              </div>
              <div class="column">
                <p class="control">
                  <label class="label">Telefone do(a) cliente : </label>
                  <input type="text" class="input" placeholder="(xx)xxxxx-xxxx" name="fone-cliente" id="telefone" maxlength="15" required value="<?=$projeto['foneCliente']?>">
                </p>
              </div>
            </div>
            <div class="columns"> 
              <div class="column">
                <p class="control">
                  <label class="label">Descrição do projeto : </label>
                  <textarea class="textarea" placeholder="Um blog com uma interface geradora de conteúdo, design responsivo e cor preta" maxlength="255" name="descricao-projeto"><?=$projeto['descricao']?></textarea>
                </p>
              </div>
            </div>
            <div class="columns"> 
              <div class="column">
                <p class="control right">
                  <button class="button is-info">Editar projeto</button>
                </p>
              </div>
            </div>
            </section>
          </div>
        </form>
        <?php
        }
      ?>
      </div>
    </div>
  </div>
</div>
</div>
</body>
<?php
  require_once 'footer.php';
?>