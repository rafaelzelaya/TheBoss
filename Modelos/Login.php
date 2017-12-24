<?php
  include "../Conexion.php";
  class Login{
    public $Usuario = "";
    public $Clave = "";
    function Verificar(){
      $mysqli = AbrirConexion();
      $sql = "SELECT count(*) FROM Login WHERE Usuario = '"
        .$this->Usuario."' AND Clave = '".$this->Clave."'";
        $resultado = $mysqli->query($sql);
        $fila = $resultado->fetch_row();
        $resultado->close();
        CerrarConexion($mysqli);
        return ($fila[0]==1);
    }
  }
?>
