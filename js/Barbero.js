$( document ).ready(function() {
  $('.modal').modal();
});
function AbrirModal(modalidad,id,nombres,apellidos,dui){
  switch(modalidad){
    case 'GuardarBarbero':
      Materialize.toast('Nuevo Barbero!', 4000);
      ConfigurarModal('Guardar Barbero',"Guardar",GuardarBarbero);
      $('#modal1').modal('open');
      $("#txtNombres").focus();
    break;
    case 'EditarBarbero':
      Materialize.toast("Editar Barbero!", 4000);
      ConfigurarModal('Editar Barbero',"Editar",EditarBarbero);
      $("#txtNombres").val(nombres);
      $("#txtApellidos").val(apellidos);
      $("#txtDui").val(dui);
      $("#idBarbero").val(id);
      $('#modal1').modal('open');
      $("#txtApellidos").focus();
      $("#txtDui").focus();
      $("#txtNombres").focus();
      break;
    case 'EliminarBarbero':
      Materialize.toast('Eliminar Barbero!', 4000);
      $("#idBarberoEliminar").val(id);
      $("#BotonEliminarModal").click(EliminarBarbero);
      $("#DescripcionEliminarBarbero").html("Esta seguro que desea eliminar "
          +"el registro: "+nombres + " " + apellidos + ", " + dui);
      $('#modalConfirmacion').modal('open');
      break;
    default:
      Materialize.toast('Opción incorrecta!', 4000);
  }
}
function ConfigurarModal(titulo,txtBoton,funcionAceptar){
    $("#txtNombres").val("");
    $("#txtApellidos").val("");
    $("#txtDui").val("");
    $("#TituloModal").html(titulo);
    $("#Boton1Modal").html(txtBoton);
    $("#Boton1Modal").off();
    $("#Boton1Modal").click(funcionAceptar);
}
function GuardarBarbero(){
  var nombres = $("#txtNombres").val();
  var apellidos = $("#txtApellidos").val();
  var dui = $("#txtDui").val();
  $.post("../Controladores/BarberoController.php",{
      funcion: "GuardarBarbero",
      nombres: nombres,
      apellidos: apellidos,
      dui: dui
  },function(data){
    Materialize.toast(data.mensaje,4000);
    ObtenerTodosBarbero();
  });
}
function EditarBarbero(){
  var nombres = $("#txtNombres").val();
  var apellidos = $("#txtApellidos").val();
  var dui = $("#txtDui").val();
  var id = $("#idBarbero").val();
  $.post("../Controladores/BarberoController.php",{
      funcion: "EditarBarbero",
      nombres: nombres,
      apellidos: apellidos,
      dui: dui,
      id: id
  },function(data){
    Materialize.toast(data.mensaje,4000);
    ObtenerTodosBarbero();
  });
}
function EliminarBarbero(){
  var id = $("#idBarberoEliminar").val();
  $("#idBarberoEliminar").val("");
  $.post("../Controladores/BarberoController.php",{
      funcion: "EliminarBarbero",
      id: id
  },function(data){
    Materialize.toast(data.mensaje,4000);
    $("#Resultado").addClass('scale-out');
    ObtenerTodosBarbero();
  });
}
function EsDuiNuevo(){
  $.post("../Controladores/BarberoController.php",{
      funcion: "EsDuiNuevo",
  },function(data){
    alert("Es Dui Nuevo:"+data.mensaje);
  });
}
