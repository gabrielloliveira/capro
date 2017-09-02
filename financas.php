<?php
  @session_start();
  if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit(0);
  }
  require_once 'header.php';
?>
<title>Projetos - CAPRO - Sistema Gerenciador de Projetos</title>
<script src="js/financas.js"></script>
<script src="js/jquery.js"></script>
<script src="js/mostraCard.js"></script>
<div class="column">
  <div class="container">
    <div class="tabs is-medium">
      <ul>
        <li id="link-projetos-pendentes"><a onclick="linkAtivo(1);">Projetos não pagos</a></li>
        <li id="link-projetos-pagos"><a onclick="linkAtivo(2);">Projetos pagos</a></li>
      </ul>
    </div>    
    <div class="columns" id="apresentacao">
      <div class="column is-11">
        <section class="section">
          <div class="container">
            <div class="heading">
              <?php
                if (isset($_SESSION['resposta'])) {
                  if ($_SESSION['resposta']=='projetopago') {
                    ?>
                    <h2 class="subtitle sucesso">
                    A confirmação de pagamento do projeto foi concluída com sucesso.
                    </h2>
                    <?php
                  }else{
                    ?>
                    <h2 class="subtitle erro">
                    Erro ao confirmar pagamento do projeto.
                    </h2>
                    <?php
                  }
                }else{
                 ?>
                <h2 class="subtitle">
                Veja quais são os projetos pendentes para receber.
                </h2>
                  <?php
                }
                unset($_SESSION['resposta']);
              ?>
            </div>
          </div>
        </section>
      </div>
    </div>
    <div id="projetos-pendentes">
      <?php require_once 'projetos-pendentes.php'; ?>
    </div>  
    <div id="projetos-pagos">
      <?php require_once 'projetos-pagos.php'; ?>
    </div>
  </div>
</div>
</div>
</body>
<?php
  require_once 'footer.php';
?>