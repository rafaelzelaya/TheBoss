<?php
include "../Modelos/Reporte.php";
header('content-type: application/json; charset=utf-8');
$datosJson = array();
$funcion = "";
if (isset($_POST["funcion"])) {
  $funcion = $_POST["funcion"];
}
else{
  $datosJson['mensaje'] = "No encuentra la variable funcion";
  echo json_encode($datosJson);
  exit();
}
$reporte = new Reporte();
switch ($funcion) {
  case 'ServiciosPorBarbero':
    $datosJson['mensaje'] = "Servicios por barbero";
    $fechaInicio = $_POST["fechaInicio"];
    $fechaFinal = $_POST["fechaFinal"];
    $datosJson['ServiciosPorBarbero']
      = $reporte->ServiciosPorBarbero($fechaInicio,$fechaFinal);
    break;
  default:
    $datosJson['mensaje'] = "Funcion no encontrada";
    break;
}
echo json_encode($datosJson);
exit();
?>
