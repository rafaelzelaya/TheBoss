<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12-26-17
 * Time: 05:35 PM
 */
include "../Conexion.php";
class ProductoServicio
{
   public $Id="";
   public $Codigo="";
   public $Nombre="";
   public $EsProducto="";
   public $Precio="";

 public function ObtenerServicios(){
     $mysqli = AbrirConexion();
     $sql = "SELECT * FROM `tbl_serviciosproductos` WHERE esproducto='0'";
     $resultado = $mysqli->query($sql);
     $listaServicios = array();
     while ($fila = $resultado->fetch_assoc()) {
         $ProductoServicio = new Barbero();
         $ProductoServicio-> Id = $fila["id"];
         $ProductoServicio->Codigo = $fila["codigo"];
         $ProductoServicio->Nombre = $fila["nombre"];
         $ProductoServicio->Precio = $fila["precio"];
         $listaServicios[] = $ProductoServicio;
     }
     $resultado->close();
     CerrarConexion($mysqli);
     return $listaServicios;
 }

 public function ObtenerProductos(){
     $mysqli= AbrirConexion();
     $sql = "SELECT * FROM `tbl_serviciosproductos` WHERE esproducto='1'";
     $resultado = $mysqli->query($sql);
     $listaServicios = array();
     while ($fila = $resultado->fetch_assoc()) {
         $ProductoServicio = new Barbero();
         $ProductoServicio-> Id = $fila["id"];
         $ProductoServicio->Codigo = $fila["codigo"];
         $ProductoServicio->Nombre = $fila["nombre"];
         $ProductoServicio->Precio = $fila["precio"];
         $listaServicios[] = $ProductoServicio;
     }
     $resultado->close();
     CerrarConexion($mysqli);
     return $listaServicios;

 }
  function Editar(){
     if(!$this->IdExiste($this->Id)){
         return "Registro inexistente";
     }
     $mysqli = AbrirConexion();
     $sql = 'UPDATE tbl_serviciosproductos
          SET codigo = "'.$this->Codigo.'",
          nombre = "'.$this->Nombre.'",
          precio = "'.$this->Precio.'",
          esproducto = "'.$this->EsProducto.'"
          WHERE Id = '.$this->Id;

     if (mysqli_query($mysqli, $sql)) {
         return "Registro actualizado con exito";
     } else {
         return "Error: " . $sql . "<br>" . mysqli_error($mysqli);
     }
     CerrarConexion($mysqli);

 }

 function IdExiste($id){
     $mysqli = AbrirConexion();
     $sql = "select count(*) from tbl_serviciosproductos where id = '".$id."'";
     $resultado = $mysqli->query($sql);
     $fila = $resultado->fetch_row();
     $resultado->close();
     CerrarConexion($mysqli);
     if($fila[0]==1)return true;
     else return false;
 }

 function CrearProductoOservicios(){
     $mysqli = AbrirConexion();
     $ProductoOprecio=$this->CodigoOservicio($this->EsProducto);
     $sql='INSERT INTO tbl_serviciosproductos(codigo,nombre,precio,esproducto)
          VALUES ("'.$this->Codigo.'","'.$this->Nombre.'","'.$this->Precio.'","$ProductoOprecio")';

     if (mysqli_query($mysqli, $sql)) {
         return "Nuevo registro ingresado con exito";
     } else {
         return "Error: " . $sql . "<br>" . mysqli_error($mysqli);
     }
     CerrarConexion($mysqli);
 }

 function CodigoOservicio($EsProducto){
     $var="";
     if($EsProducto=="Producto"){
         $var="1";

     }else {
         $var="0";
     }
     return $var;
 }

 function Eliminar(){
     if(!$this->IdExiste($this->Id)){
         return "No existe en los registros";
     }
     $mysqli = AbrirConexion();
     $sql = "DELETE FROM tbl_productososervicios WHERE id = '".$this->Id."'";

     if (mysqli_query($mysqli, $sql)) {
         return "Registro eliminado con exito";
     } else {
         return "Error: " . $sql . "<br>" . mysqli_error($mysqli);
     }
     CerrarConexion($mysqli);
        }


    function generarCodigos($cantidad, $longitud, $incluyeNum=true){
        $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        if($incluyeNum)
            $caracteres .= "1234567890";

        $arrPassResult=array();
        $index=0;
        while($index<$cantidad){
            $tmp="";
            for($i=0;$i<$longitud;$i++){
                $tmp.=$caracteres[rand(0,strlen($caracteres)-1)];
            }
            if(!in_array($tmp, $arrPassResult)){
                $arrPassResult[]=$tmp;
                $index++;
            }
        }
        return $arrPassResult;
    }

 function VerificarSiCodigoExiste($codigo){


 }

}