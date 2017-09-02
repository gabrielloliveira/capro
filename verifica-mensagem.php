<?php
  if (isset($_SESSION['resposta'])) {
    if ($_SESSION['resposta']=='cadastrado') {
      ?>
      <h2 class="subtitle sucesso">Projeto cadastrado com sucesso! Veja-o em projetos não finalizados.</h2>
      <?php
    }elseif($_SESSION['resposta']=='naocadastrado'){
      ?>
      <h2 class="subtitle erro">Erro ao cadastrar o projeto!</h2>
      <?php
    }elseif ($_SESSION['resposta']=='finalizado') {
      ?>
      <h2 class="subtitle sucesso">O projeto foi finalizado com sucesso!</h2>
      <?php
    }elseif($_SESSION['resposta']=='naofinalizado'){
      ?>
      <h2 class="subtitle erro">Erro ao finalizar o projeto!</h2>
      <?php
    }elseif ($_SESSION['resposta']=='projetoapagado') {
      ?>
      <h2 class="subtitle sucesso">O projeto foi excluído com sucesso!</h2>
      <?php
    }elseif($_SESSION['resposta']=='projetonaoapagado'){
      ?>
      <h2 class="subtitle erro">Erro ao excluir o projeto!</h2>
      <?php
    }elseif ($_SESSION['resposta']=='editado') {
      ?>
      <h2 class="subtitle sucesso">O projeto foi editado com sucesso!</h2>
      <?php
    }elseif ($_SESSION['resposta']=='naoeditado') {
      ?>
      <h2 class="subtitle erro">Erro ao editar projeto!</h2>
      <?php
    }
    unset($_SESSION['resposta']);
  }else{
    ?>
    <h2 class="subtitle">
    Oi mais uma vez <?=$_SESSION['usuario']?>! <br> Este é o painel dos seus projetos. Escolha a opção que você deseja no <strong>menu acima</strong>.
    </h2>
    <?php
  }
?>