<?php
include "../Modelos/Barbero.php";
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
$barbero = new Barbero();
switch ($funcion) {
  case 'EsDuiNuevo':
    $datosJson['mensaje'] = $barbero->EsDuiNuevo('025349704');
    break;
  case 'GuardarBarbero':
    $datosJson['mensaje'] = "GuardarBarbero ok";
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $dui = $_POST["dui"];
    $barbero -> Nombres = $nombres;
    $barbero -> Apellidos = $apellidos;
    $barbero -> Dui = $dui;
    $datosJson["mensaje"] = $barbero -> Guardar();
    break;
  case 'EliminarBarbero':
    $barbero -> Id = $_POST["id"];
    $datosJson["mensaje"] = $barbero->Eliminar();
    //$datosJson["mensaje"] = $barbero->IdExiste(23);
    break;
  case 'ObtenerBarbero':
      $datosJson['mensaje'] = "ObtenerBarbero ok";
      break;
  case 'ObtenerTodosBarbero':
    $datosJson['mensaje'] = "ObtenerTodosBarberos ok";
    $datosJson['todos'] = $barbero->ObtenerTodos();
    break;
  case 'EditarBarbero':
    $barbero -> Nombres = $_POST["nombres"];
    $barbero -> Apellidos = $_POST["apellidos"];
    $barbero -> Dui = $_POST["dui"];
    $barbero -> Id = $_POST["id"];
    $datosJson["mensaje"] = $barbero -> Editar();
    break;

  default:
    $datosJson['mensaje'] = "Funcion no encontrada";
    break;
}
echo json_encode($datosJson);
exit();
?>
