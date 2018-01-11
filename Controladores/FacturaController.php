<?php
//include "../Modelos/Factura.php";
//include "../Modelos/DetalleFactura.php";
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
switch ($funcion) {
  case 'Guardar':
    $factura = $_POST["Factura"];
    $total = $factura["Total"];
    $FechaCreacion = $factura["FechaCreacion"];
    $detallesFactura = $factura["DetalleFactura"];
    for($i = 0;$i<count($detallesFactura);$i++){
      $detalle = $detallesFactura[$i];
      echo $detalle["IdBarbero"];
      echo $detalle["NombresBarbero"];
      echo $detalle["ApellidosBarbero"];
      echo $detalle["NombreServicio"];
      echo $detalle["PrecioServicio"];
      echo $detalle["CodigoServicio"];
    }
    $datosJson['mensaje'] = "Factura guardada";
    break;
  default:
      $datosJson['mensaje'] = "Funcion no encontrada";
      break;
}
echo json_encode($datosJson);
exit();
?>
