
$( document ).ready(function() {
  ReporteBarberosPorServicios();
});

function ReporteBarberosPorServicios(){
  Materialize.toast("Cargando barberos por servicios",4000);
  $.post("../Controladores/ReporteController.php",{
      funcion: "ServiciosPorBarbero",
  },function(data){
    Materialize.toast(data.mensaje,4000);
  });
}
