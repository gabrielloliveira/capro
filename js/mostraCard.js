$(function() {
  $('.ativarSanfona').click(function(){
    var cardAtivado = $(this).parent().find('.cardAtivado');

    if (!cardAtivado.hasClass('selecionado')) {
      $('.card').find('.selecionado').slideUp('fast', function(){
        $(this).addClass('none').removeClass('selecionado');
      });
      cardAtivado.slideDown('fast', function(){
        $(this).addClass('selecionado').removeClass('none');
      });
    }else{
      $('.card').find('.selecionado').slideUp('fast', function(){
        $(this).addClass('none').removeClass('selecionado');
      });
    }
  });
});