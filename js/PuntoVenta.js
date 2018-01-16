//Almacena toda la información del detalle de Factura
//cada vez que se aumenta o disminuye en 1 los servicios o productos.
var Factura = [];
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
                 + " $" + todos[i].Precio+"</span>";
      collection += "<div href='#!' class='secondary-content tamaño_texto'>";
      collection += "<a href='#' onclick=\"AbrirSeleccionBarbero('"
                 + todos[i].Id+"','"
                 + todos[i].Nombre+"','"+todos[i].Precio+"')\">";
      collection += "<i class='small material-icons'>add_circle_outline</i>";
      collection += "</a>";
      collection += "Cantidad: <span id='cantidad_"+todos[i].Id+"'>0</span>";
      collection += "</div>";
      collection += "</li>";

    }
    collection +="</ul>";
    $("#collectionId").html(collection);
  });
}
/*Esta funcion se dispara cuando se seleccionar aumentar a la cantidad
de un servicio en la vista principal*/
function AbrirSeleccionBarbero(IdCodigoServicio,nombreServicio,precio){
  ConfigurarModal("Agregar Servicio "+nombreServicio,"Aceptar",null,"BarberoServicio");
  $("#Boton1Modal_BarberoServicio").hide();
  //ocultar el codigo del servicio y otros datos dentro del modal
  $("#modalIdCodigoServicio").val(IdCodigoServicio);
  $("#modalNombreServicio").val(nombreServicio);
  $("#modalPrecioServicio").val(precio);
  //Cargar la lista de barberos
  ObtenerTodosBarbero("ModalresultadoBarberos");
  //Abrir modal
  $('#modal_BarberoServicio').modal('open');
}

/*Esta funcion se dispara cuando se selecciona un barbero en el modal
deben estar las llamadas a funciones precargadas con el id de cada barbero*/
function BarberoSeleccionado(idBarbero,nombres,apellidos){
  Materialize.toast("Barbero seleccionado:"+nombres,4000);
  //debe estar oculta la información de codigo del servicio
  //obtener el codigo del servicio

  var IdCodigoServicio = $("#modalIdCodigoServicio").val();
  var nombreServicio = $("#modalNombreServicio").val();
  var precioServicio = $("#modalPrecioServicio").val();
  //Cerrar el modal
  $('#modal_BarberoServicio').modal('close');
  //llamar AumentarCantidadServicio(codigoServicio,idBarbero);
  AumentarCantidadServicio(
      IdCodigoServicio,
      nombreServicio,
      precioServicio,
      idBarbero,
      nombres,
      apellidos);
}
function AumentarCantidadServicio(
    idCodigoServicio,
    nombreServicio,
    precioServicio,
    idBarbero,
    nombresBarbero,
    apellidosBarbero){
//Cambio intencional
  var cantidad = parseInt($("#cantidad_"+idCodigoServicio).html(),10);
  cantidad++;
  $("#cantidad_"+idCodigoServicio).html(cantidad);
  if(Factura[idCodigoServicio] == undefined){
    Factura[idCodigoServicio] = [];
  }

  Factura[idCodigoServicio][Factura[idCodigoServicio].length] = {
    IdBarbero: idBarbero,
    NombresBarbero: nombresBarbero,
    ApellidosBarbero: apellidosBarbero,
    IdCodigoServicio: idCodigoServicio,
    NombreServicio: nombreServicio,
    PrecioServicio: precioServicio
  };
}

function VerFactura(){
  ConfigurarModal("Detalle Factura","Gravar",
    GuardarEImprimirFactura,
    "BarberoServicio");

  CrearTablaFactura();
  $("#Boton1Modal_BarberoServicio").show();
  $('#modal_BarberoServicio').modal('open');
}
function GuardarEImprimirFactura(){
  //Materialize.toast(Factura.length);
  //Factura
  $.post("../Controladores/FacturaController.php",{
      funcion: "Guardar",
      Factura: PresentacionDatosFactura()
  },function(data){
    Materialize.toast(data.mensaje,4000);
  });
  //

}

function PresentacionDatosFactura(){
  var detalles = [];
  var total = parseFloat(0);
  for(var idServicio in Factura){
    for(var i in Factura[idServicio]){
      //codigoServicio
      detalles[detalles.length] = {
        IdBarbero : Factura[idServicio][i].IdBarbero,
        NombresBarbero : Factura[idServicio][i].NombresBarbero,
        ApellidosBarbero : Factura[idServicio][i].ApellidosBarbero,
        NombreServicio : Factura[idServicio][i].NombreServicio,
        PrecioServicio : Factura[idServicio][i].PrecioServicio,
        IdServicio : idServicio
      }
      total = parseFloat(total) +
        parseFloat(Factura[idServicio][i].PrecioServicio);
    }
  }
  return {
      Total: total,
      //FechaCreacion: new Date(),
      DetalleFactura: detalles
  }
}
function CrearTablaFactura(){
  var totalDetalle = parseFloat(0);
  var html = "<table class='highlight striped flow-text' >";
  html+="<thead><tr>"
    +"<th>Servicio</th>"
    +"<th>Barbero</th>"
    +"<th>Precio</th>"
    +"<th></th>"
    +"</tr></thead>"
    +"<tbody>";
  for(var IdServicio in Factura){
    for(var i in Factura[IdServicio]){
      //codigoServicio
      var idBarbero = Factura[IdServicio][i].IdBarbero;
      var nombresBarbero = Factura[IdServicio][i].NombresBarbero;
      var apellidosBarbero = Factura[IdServicio][i].ApellidosBarbero;
      var nombreServicio = Factura[IdServicio][i].NombreServicio;
      var precioServicio = Factura[IdServicio][i].PrecioServicio;
      totalDetalle= parseFloat(totalDetalle) + parseFloat(precioServicio);
      html+="<tr>"
          + "<td>" + nombreServicio + "</td>"
          + "<td>" + nombresBarbero + "</td>"
          + "<td>$" + precioServicio + "</td>"
          + "<td><a href='#' onclick=\"ReducirCantidadServicio('"
          + IdServicio+"','"+i+"')\">"
          + "<i class='small material-icons icon_red'>remove_circle_outline</i>";
          + "</a></td>";

          + "</tr>";
    }
  }
  html+="</tbody>";
  //total de la Factura
  html+="<tfoot>"
    +"<tr>"
    +"<td colspan=2>TOTAL</td>"
    +"<td>$"+totalDetalle.toFixed(2)+"</td>"
    +"</tr>"
    +"</tfoot>";
  html+="</table>";
  $("#ModalresultadoBarberos").html(html);
}

function ReducirCantidadServicio(codigo,indiceFactura){
  var entero = parseInt($("#cantidad_"+codigo).html(),10);
  if(entero <= 0){
    entero = 0;
    //Eliminar aquí de factura el servicio agregado ya que es 0
  }
  else{
    entero--;
  }
  $("#cantidad_"+codigo).html(entero);
  Factura[codigo].splice(indiceFactura);
  CrearTablaFactura();
  Materialize.toast("Servicio Eliminado",4000);
  /*Factura[codigo] = {
    Cantidad: cantidad,
    IdBarbero: idBarbero
  };*/
}

function ObtenerTodosBarbero(idImprimirResultado){
  $.post("../Controladores/BarberoController.php",{
      funcion: "ObtenerTodosBarbero",
  },function(data){
    var todos = data.todos;
    var grid = "<table class='highlight striped flow-text' >";
    grid+="<thead><tr>"
      +"<th>Nombres</th>"
      +"<th>Apellidos</th>"
      +"<th>Dui</th>"
      +"</tr></thead>"
      +"<tbody>";

    for(var i = 0;i < todos.length;i++){
      grid+="<tr onclick='BarberoSeleccionado(\""
        +todos[i].Id+"\",\""
        +todos[i].Nombres+"\",\""
        +todos[i].Apellidos+"\")'>";
        grid += "<td>"+ todos[i].Nombres + "</td>"
              + "<td>"+ todos[i].Apellidos + "</td>"
              + "<td>"+ todos[i].Dui+ "</td>";
      grid+="</tr>";
    }
    grid+="</tbody></table>";
    $("#"+idImprimirResultado).html('');
    $("#"+idImprimirResultado).html(grid);
    $("#"+idImprimirResultado).removeClass('scale-out');
  });
}
