<?php
  @session_start();
  if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit(0);
  }
  require_once 'header.php';
?>
<title>Home - CAPRO - Sistema Gerenciador de Projetos</title>
      <section class="section altura">
        <div class="container">
          <div class="heading">
            <h1 class="title">Olá <?=$_SESSION['usuario']?>!</h1>
            <h2 class="subtitle">
              Bem vindo ao <strong>CAPRO</strong>, o sistema que gerencia o seus projetos.
            </h2>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>
<?php
  require_once 'footer.php';
?>