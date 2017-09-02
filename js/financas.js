function linkAtivo(link){
  if (link==1) {
    resetarLinksAtivos();
    resetarDivAtivas();
    var linkPendentes = document.getElementById('link-projetos-pendentes');
    var divPendentes = document.getElementById('projetos-pendentes');
    var divApresentacao = document.getElementById('apresentacao');
    divApresentacao.setAttribute('style', 'display: none');
    linkPendentes.setAttribute('class', 'is-active');
    divPendentes.setAttribute('style', 'display:block');
    window.scrollTo(0,0);

  }else if (link==2) {
    resetarLinksAtivos();
    resetarDivAtivas();
    var linkPagos = document.getElementById('link-projetos-pagos');
    var divApresentacao = document.getElementById('apresentacao');
    divApresentacao.setAttribute('style', 'display: none');
    var divPagos = document.getElementById('projetos-pagos');
    linkPagos.setAttribute('class', 'is-active');
    divPagos.setAttribute('style', 'display:block');
    window.scrollTo(0,0);

  }
}

function resetarLinksAtivos(){
  var linkPendentes = document.getElementById('link-projetos-pendentes');
  var linkPagos = document.getElementById('link-projetos-pagos');
  linkPendentes.setAttribute('class', '');
  linkPagos.setAttribute('class', '');
  
}

function resetarDivAtivas(){
  var divPendentes = document.getElementById('projetos-pendentes');
  var divPagos = document.getElementById('projetos-pagos');
  divPendentes.setAttribute('style', 'display:none');
  divPagos.setAttribute('style', 'display:none');
}
