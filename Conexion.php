<?php
function AbrirConexion(){
  $Mysqli = new mysqli("localhost", "root", "", "Barberia");
  if ($Mysqli->connect_errno) {
      echo "Fallo al conectar a MySQL: (" . $Mysqli->connect_errno . ") "
      . $Mysqli->connect_error;
  }
  else{
    return $Mysqli;
  }
  //echo $mysqli->host_info . "\n";
  /*$mysqli = new mysqli("127.0.0.1", "root", "", "Barberia", 3306);
  if ($mysqli->connect_errno) {
      echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") "
      . $mysqli->connect_error;
  }*/
}
function CerrarConexion($mysqli){
  return mysqli_close($mysqli);
}
//echo $mysqli->host_info . "\n";
?>
