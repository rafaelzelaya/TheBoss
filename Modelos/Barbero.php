<?php
include "../Conexion.php";
  class Barbero{
    public $Nombres="";
    public $Apellidos="";
    public $Dui="";
    public $Id="";
    function Guardar(){
        if(!$this->EsDuiNuevo($this->Dui)){
          return "Dui ya existe en otro registro";
        }
        $mysqli = AbrirConexion();
        $sql = 'INSERT INTO barberos(Nombres, Apellidos, Dui)
          VALUES ("'.$this->Nombres.'","'.$this->Apellidos.'","'.$this->Dui.'")';

          if (mysqli_query($mysqli, $sql)) {
            return "Nuevo registro ingresado con exito";
          } else {
            return "Error: " . $sql . "<br>" . mysqli_error($mysqli);
          }
        CerrarConexion($mysqli);
    }
    function Editar(){
        if(!$this->IdExiste($this->Id)){
          return "Registro inexistente";
        }
        $mysqli = AbrirConexion();
        $sql = 'UPDATE barberos
          SET Nombres = "'.$this->Nombres.'",
          Apellidos = "'.$this->Apellidos.'",
          Dui = "'.$this->Dui.'"
          WHERE Id = '.$this->Id;

          if (mysqli_query($mysqli, $sql)) {
            return "Registro actualizado con exito";
          } else {
            return "Error: " . $sql . "<br>" . mysqli_error($mysqli);
          }
        CerrarConexion($mysqli);
    }
    function Eliminar(){
      if(!$this->IdExiste($this->Id)){
        return "No existe en los registros";
      }
      $mysqli = AbrirConexion();
      $sql = "DELETE FROM barberos WHERE id = '".$this->Id."'";

        if (mysqli_query($mysqli, $sql)) {
          return "Registro eliminado con exito";
        } else {
          return "Error: " . $sql . "<br>" . mysqli_error($mysqli);
        }
      CerrarConexion($mysqli);
    }
    /**
     * Encuentra si un dui ya existe en la tabla barberos (posee llave unica)
     * true si no existe
     * false si existe
     */
     function IdExiste($id){
         $mysqli = AbrirConexion();
         $sql = "select count(*) from barberos where id = '".$id."'";
         $resultado = $mysqli->query($sql);
         $fila = $resultado->fetch_row();
         $resultado->close();
         CerrarConexion($mysqli);
         if($fila[0]==1)return true;
         else return false;
     }
    function EsDuiNuevo($dui){
        $mysqli = AbrirConexion();
        $sql = "select count(*) from barberos where dui = '".$dui."'";
        $resultado = $mysqli->query($sql);
        $fila = $resultado->fetch_row();
        $resultado->close();
        CerrarConexion($mysqli);
        if($fila[0]==1)return false;
        else return true;
    }
    function ObtenerTodos(){
      $mysqli = AbrirConexion();
      $sql = "select Id,Nombres,Apellidos,Dui from barberos";
      $resultado = $mysqli->query($sql);
      $listaBarberos = array();
      while ($fila = $resultado->fetch_assoc()) {
        $barberoFila = new Barbero();
        $barberoFila -> Id = $fila["Id"];
        $barberoFila -> Nombres = $fila["Nombres"];
        $barberoFila -> Apellidos = $fila["Apellidos"];
        $barberoFila -> Dui = $fila["Dui"];
        $listaBarberos[] = $barberoFila;
      }
      $resultado->close();
      CerrarConexion($mysqli);
      return $listaBarberos;
    }
  }
?>
