<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/bulma.css">
  <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
</head>
<body>
  <div class="columns fundo-menu">
    <div class="column is-2">
      <a href="home.php" class="nav-item logo">
        <h1><strong>CAPRO</strong></h1>
      </a>
    </div>
    <div class="column">
      <p class="control">
        <form action="sair.php" method="post" class="sair">
            <input type="hidden" name="sair">
            <button class="button is-danger">
              <span>Sair</span>
            </button>
        </form>      
      </p>
    </div>
  </div>
  <div class="columns">
    <div class="column is-2 fundo-menu-esquerdo">
      <aside class="menu">
        <p class="menu-label">
          Geral
        </p>
        <ul class="menu-list">
          <li><a href="projetos.php">Projetos</a></li>
          <li><a href="financas.php">Finanças</a></li>
        </ul>
      </aside>
    </div>
      