function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,"");
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2");
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");
    return v;
}
function id( el ){
  return document.getElementById( el );
}
function id2( el ){
  return document.getElementById( el );
}
window.onload = function(){
  id('telefone').onkeypress = function(){
    mascara( this, mtel );
  }
}
function leech(v){
v=v.replace(/o/gi,"0")
v=v.replace(/i/gi,"1")
v=v.replace(/z/gi,"2")
v=v.replace(/e/gi,"3")
v=v.replace(/a/gi,"4")
v=v.replace(/s/gi,"5")
v=v.replace(/t/gi,"7")
return v
}
function moeda(v){ 
v=v.replace(/\D/g,"") // permite digitar apenas numero 
v=v.replace(/(\d{1})(\d{17})$/,"$1.$2") // coloca ponto antes dos ultimos digitos 
v=v.replace(/(\d{1})(\d{1,2})$/,"$1.$2") // coloca virgula antes dos ultimos 4 digitos 
return v;
}