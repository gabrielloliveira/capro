function linkAtivo(link){
  if (link==1) {
    resetarLinksAtivos();
    resetarDivAtivas();
    var linkCadastro = document.getElementById('link-cadastro-projeto');
    var divCadastro = document.getElementById('cadastro-projeto');
    var divApresentacao = document.getElementById('apresentacao');
    divApresentacao.setAttribute('style', 'display: none');
    linkCadastro.setAttribute('class', 'is-active');
    divCadastro.setAttribute('style', 'display:block');
    window.scrollTo(0,0);

  }else if (link==2) {
    resetarLinksAtivos();
    resetarDivAtivas();
    var linkProFin = document.getElementById('link-projetos-fin');
    var divApresentacao = document.getElementById('apresentacao');
    divApresentacao.setAttribute('style', 'display: none');
    var divProFin = document.getElementById('projetos-fin');
    linkProFin.setAttribute('class', 'is-active');
    divProFin.setAttribute('style', 'display:block');
    window.scrollTo(0,0);

  }else if (link==3) {
    resetarLinksAtivos();
    resetarDivAtivas();
    var linkProNaoFin = document.getElementById('link-projetos-nao-fin');
    var divApresentacao = document.getElementById('apresentacao');
    divApresentacao.setAttribute('style', 'display: none');
    var divProNaoFin = document.getElementById('projetos-nao-fin');
    linkProNaoFin.setAttribute('class', 'is-active');
    divProNaoFin.setAttribute('style', 'display:block');
    window.scrollTo(0,0);
  }
}

function resetarLinksAtivos(){
  var linkCadastro = document.getElementById('link-cadastro-projeto');
  var linkProNaoFin = document.getElementById('link-projetos-nao-fin');
  var linkProFin = document.getElementById('link-projetos-fin');
  linkCadastro.setAttribute('class', '');
  linkProNaoFin.setAttribute('class', '');
  linkProFin.setAttribute('class', '');
}

function resetarDivAtivas(){
  var divCadastro = document.getElementById('cadastro-projeto');
  var divProNaoFin = document.getElementById('projetos-nao-fin');
  var divProFin = document.getElementById('projetos-fin');
  divCadastro.setAttribute('style', 'display:none');
  divProFin.setAttribute('style', 'display:none');
  divProNaoFin.setAttribute('style', 'display:none');
}
