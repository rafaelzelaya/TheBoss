function AumentarCantidadServicio(codigo){
  var entero = parseInt($("#cantidad_"+codigo).html(),10);
  entero++;
  $("#cantidad_"+codigo).html(entero);
}
function ReducirCantidadServicio(codigo){
  var entero = parseInt($("#cantidad_"+codigo).html(),10);
  if(entero <= 0){
    entero = 0;
  }
  else{
    entero--;
  }
  $("#cantidad_"+codigo).html(entero);
}
