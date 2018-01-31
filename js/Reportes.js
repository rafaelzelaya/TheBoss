$( document ).ready(function() {
  $('.datepicker').pickadate({
    format: 'dd/mm/yyyy',
     monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
     'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
   selectMonths: true, // Creates a dropdown to control month
   selectYears: 15, // Creates a dropdown of 15 years to control year,
   today: 'Hoy',
   clear: 'Limpiar',
   close: 'Cerrar',
   closeOnSelect: true // Close upon selecting a date,
 });

});
function ReporteBarberosPorServicios(){
  $.post("../Controladores/ReporteController.php",{
      funcion: "ServiciosPorBarbero",
      fechaInicio: $("#fechaInicio").val(),
      fechaFinal: $("#fechaFinal").val()
  },function(data){
    var todos = data.ServiciosPorBarbero;
    Materialize.toast(data.mensaje,4000);
    var grid = "<table class='highlight striped flow-text' >";
    grid+="<thead><tr>"
      +"<th>Barbero</th>"
      +"<th>Servicio</th>"
      +"<th>Cantidad</th>"
      +"</tr></thead>"
      +"<tbody>";

      var idBarbero = (todos==undefined || todos.length>0)?todos[0].IdBarbero:0;
      var totalServiciosBarbero = 0;
      var total = 0;
      for(var i = 0;i<todos.length;i++){
        grid+="<tr>"
               + "<td>"+ todos[i].Barbero + "</td>"
               + "<td>"+ todos[i].Servicio + "</td>"
               + "<td>"+ todos[i].Cantidad + "</td>"
               + "</tr>";
         totalServiciosBarbero += parseInt(todos[i].Cantidad,10);
         if((i+1) < todos.length && idBarbero != todos[i+1].IdBarbero){
           grid+="<tr class = 'red-text center'>"
                  + "<td colspan = '2'>Subtotal</td>"
                  + "<td>"+ totalServiciosBarbero + "</td>"
                  + "</tr>";
           idBarbero = todos[i+1].IdBarbero;
           total+=totalServiciosBarbero;
           totalServiciosBarbero = 0;
         }
         if((i+1)==todos.length){
           grid+="<tr class = 'red-text center'>"
                  + "<td colspan = '2'>Subtotal</td>"
                  + "<td>"+ totalServiciosBarbero + "</td>"
                  + "</tr>";
                  total+=totalServiciosBarbero;
         }
      }
      grid+="<tr class = 'red-text center'>"
             + "<td colspan = '2'>Total</td>"
             + "<td>"+ total + "</td>"
             + "</tr>";
    grid+="</tbody></table>";
    $("#collectionId").html(grid);
  });
}
