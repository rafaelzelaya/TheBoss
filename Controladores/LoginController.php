<?php
include "../Modelos/Login.php";
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
$login = new Login();
switch ($funcion) {
  case 'Login':
    $login->Usuario = $_POST["usuario"];
    $login->Clave = $_POST["clave"];

    if($login->Verificar()){
        $datosJson["ok"] = true;
        session_start();
        $_SESSION["session"] = true;
        $_SESSION["usuario"] = $login->Usuario;
    }
    else{
      $datosJson["mensaje"] = "Usuario o contraseña incorrectos!";
    }
    break;

  default:
    $datosJson["mensaje"] = "Funcion no encontrada";
    break;
}

echo json_encode($datosJson);
exit();
?>
