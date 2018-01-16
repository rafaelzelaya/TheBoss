<?php
include "../Modelos/Factura.php";
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
$fac=new Factura();
switch ($funcion) {
  case 'Guardar':
    $factura = $_POST["Factura"];
    $total = $factura["Total"];
    //$FechaCreacion = date("y/m/d");
    $detallesFactura = $factura["DetalleFactura"];
      //$fac->Fecha=$FechaCreacion;
      $fac->Total=$total;
      $idInsertado = $fac->GuardarFactura();
      $datosJson['mensaje'] = "Factura creada con exito!";
      $datosJson['mensaje'].="---FIN ERROR FACTURA---";
   for($i = 0;$i<count($detallesFactura);$i++){
     $detalle = $detallesFactura[$i];
      $fac->idbarbero= $detalle["IdBarbero"];
      //$fac->cantidad=$detalle["Cantidad"];
      $fac->precio= $detalle["PrecioServicio"];
      $fac->idservicio= $detalle["CodigoServicio"];
      $datosJson['mensaje'] .= $fac->GuardarDetalle();
   }

    break;
  default:
      $datosJson['mensaje'] = "Funcion no encontrada";
      break;
}
echo json_encode($datosJson);
exit();
?>
