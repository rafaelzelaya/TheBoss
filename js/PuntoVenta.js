//Almacena toda la información del detalle de Factura
//cada vez que se aumenta o disminuye en 1 los servicios o productos.
var Factura = {};
$( document ).ready(function() {
  $('.modal').modal();
  // Cargar la lista de servicios de theboss
  CargarListaServicio();
});
function CargarListaServicio(){
  Materialize.toast("Cargando lista de servicios",4000);
  $.post("../Controladores/ProductoServicioController.php",{
      funcion: "ObtenerServicios",
  },function(data){
    Materialize.toast(data.mensaje,4000);
    var todos = data.todos;
    var collection = "<ul class='collection'>";
    for(var i = 0;i<todos.length;i++){
      collection += "<li class='collection-item avatar valign-wrapper'>";
      collection += "<span class='title tamaño_texto'>" + todos[i].Nombre
                 +" $" + todos[i].Precio+"</span>";
      collection += "<div href='#!' class='secondary-content tamaño_texto'>";
      collection += "<a onclick=\"AbrirSeleccionBarbero('"+todos[i].Codigo+"','"
                 +todos[i].Nombre+"')\">";
      collection += "<i class='medium material-icons'>add_circle_outline</i>";
      collection += "</a>";
      collection += "<a onclick=\"ReducirCantidadServicio('"+todos[i].Codigo
                 +"','"+todos[i].Nombre+"')\">";
      collection += "<i class='medium material-icons icon_red'>remove_circle_outline</i>";
      collection += "</a>";
      collection += "Cantidad: <span id='cantidad_"+todos[i].Codigo+"'>0</span>";
      collection += "</div>";
      collection += "</li>";
    }
    collection +="</ul>";
    $("#collectionId").html(collection);
  });
}
/*Esta funcion se dispara cuando se seleccionar aumentar a la cantidad
de un servicio en la vista principal*/
function AbrirSeleccionBarbero(codigoServicio,nombreServicio){
  ConfigurarModal("Agregar Servicio "+nombreServicio,"Aceptar",null,"BarberoServicio");
  //ocultar el codigo del servicio y otros datos dentro del modal
  $("#modalIdCodigoServicio").val(codigoServicio);
  //Cargar la lista de barberos
  ObtenerTodosBarbero("ModalresultadoBarberos");
}
/*Carga la lista de barberos para mostrarlos en el modal*/
function CargarListaBarberos(){
//invocar el controler de barberos para esto.
}

/*Esta funcion se dispara cuando se selecciona un barbero en el modal
deben estar las llamadas a funciones precargadas con el id de cada barbero*/
function BarberoSeleccionado(idBarbero){
  //debe estar oculta la información de codigo del servicio
  //obtener el codigo del servicio
  //Cerrar el modal
  //llamar AumentarCantidadServicio(codigoServicio,idBarbero);
}
function AumentarCantidadServicio(codigoServicio,idBarbero){
  var cantidad = parseInt($("#cantidad_"+codigoServicio).html(),10);
  cantidad++;
  $("#cantidad_"+codigoServicio).html(cantidad);
  Factura[codigoServicio] = {
    Cantidad: cantidad,
    IdBarbero: idBarbero
  };
}

/*Esta funcion se dispara cuando se pulsa el menos en un servicio*/
function DeseleccionarBarberos(){
  //Abrir modal si no esta abierto
  //MostrarBarberosEnDeseleccion();
}
/*Muestra los barberos en el modal para ser deseleccionados*/
function MostrarBarberosEnDeseleccion(){
  //Eliminar contenido previo donde se mostrara la lista de barberos
  /*utilizar la variable global Factura para mostrar todos los barberos
  con el respectivo servicio asociado*/
  /*Agrega una funcion al pulsar un barbero con su servicio que elimina
  de la lista glogal factura el barbero con el servicio asociado y recarga
  la lista de factura
  ReducirCantidadServicio(codigo,idBarbero)*/
}
function ReducirCantidadServicio(codigo,idBarbero){
  var entero = parseInt($("#cantidad_"+codigo).html(),10);
  if(entero <= 0){
    entero = 0;
    //Eliminar aquí de factura el servicio agregado ya que es 0
  }
  else{
    entero--;
  }
  $("#cantidad_"+codigo).html(entero);
  Factura[codigo] = {
    Cantidad: cantidad,
    IdBarbero: idBarbero
  };
}
