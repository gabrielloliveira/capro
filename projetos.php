<?php
  @session_start();
  if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit(0);
  }
  require_once 'header.php';
?>
<title>Projetos - CAPRO - Sistema Gerenciador de Projetos</title>
<script src="js/projetos.js"></script>
<script src="js/mascaras.js"></script>
<script src="js/jquery.js"></script>
<script src="js/mostraCard.js"></script>
<div class="column">
  <div class="container">
    <div class="tabs is-medium">
      <ul>
        <li id="link-cadastro-projeto"><a onclick="linkAtivo(1);">Cadastrar projetos</a></li>
        <li id="link-projetos-nao-fin"><a onclick="linkAtivo(3);">Projetos não finalizados</a></li>
        <li id="link-projetos-fin"><a onclick="linkAtivo(2);">Projetos finalizados</a></li>
      </ul>
    </div>    
    <div class="columns" id="apresentacao">
      <div class="column is-11">
        <section class="section">
          <div class="container">
            <div class="heading">
            <?php
              require_once 'verifica-mensagem.php';
            ?>
            </div>
          </div>
        </section>
      </div>
    </div>
    <div class="columns">
      <div class="column is-11">
        <form method="post" name="form" action="cadastrar-projeto.php">
          <div id="cadastro-projeto">
            <section class="section">
            <div class="columns">
              <div class="column">
                <p class="control">
                  <label class="label">Nome do projeto : </label>
                  <input type="text" class="input"  name="nome-projeto" placeholder="Blog do Jorge" required>
                </p>
              </div>
              <div class="column">
                <p class="control">
                  <label class="label">Data de início : </label>
                  <input type="date" class="input" name="data-inicio" required>
                </p>
              </div>
              <div class="column">
                <p class="control">
                  <label class="label">Data de entrega (opcional) : </label>
                  <input type="date" class="input" name="data-entrega">
                </p>
              </div>
              <div class="column">
                <p class="control">
                  <label class="label">Valor do projeto : </label>
                  <input type="text" class="input" id="valor" name="valor-projeto" placeholder="12345.67" onkeypress="mascara(this, moeda)" maxlength="8" required>
                </p>
              </div>
            </div>
            <div class="columns">
              <div class="column">
                <p class="control">
                  <label class="label">Nome do(a) cliente : </label>
                  <input type="text" class="input" placeholder="Jorge Lopes Silva" name="nome-cliente" required>
                </p>
              </div>
              <div class="column">
                <p class="control">
                  <label class="label">Email do(a) cliente : </label>
                  <input type="email" class="input" placeholder="exemplo@exemplo.com" name="email-cliente" required>
                </p>
              </div>
              <div class="column">
                <p class="control">
                  <label class="label">Telefone do(a) cliente : </label>
                  <input type="text" class="input" placeholder="(xx)xxxxx-xxxx" name="fone-cliente" id="telefone" maxlength="15" required>
                </p>
              </div>
            </div>
            <div class="columns"> 
              <div class="column">
                <p class="control">
                  <label class="label">Descrição do projeto : </label>
                  <textarea class="textarea" placeholder="Um blog com uma interface geradora de conteúdo, design responsivo e cor preta" maxlength="255" name="descricao-projeto"></textarea>
                </p>
              </div>
            </div>
            <div class="columns"> 
              <div class="column">
                <p class="control right">
                  <button class="button is-info">Cadastrar projeto</button>
                </p>
              </div>
            </div>
            </section>
          </div>
        </form>
      </div>
    </div>
    <div id="projetos-nao-fin">
      <?php require_once 'projetos-nao-finalizados.php'; ?>
    </div>  
    <div id="projetos-fin">
      <?php require_once 'projetos-finalizados.php'; ?>
    </div>
  </div>
</div>
</div>
</body>
<?php
  require_once 'footer.php';
?>