<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 01-02-18
 * Time: 04:29 PM
 */
include "../Conexion.php";
class Factura
{
    public $Fecha="";
    public $Total="";
    public $cancelado="1";
    public $idfactura="";
    public $idservicio="";
    public $cantidad="";
    public $precio="";
    public $idbarbero="";
    public function GuardarFactura(){
      //return $this->Fecha;
        $mysql=AbrirConexion();
        $sql="INSERT INTO factura( total, esta_cancelado) VALUES".
          "('".$this->Total."','".$this->cancelado."')";

        if (mysqli_query($mysql, $sql)) {
            return $mysql->insert_id;
        } else {
            return "Error: " . $sql . "<br>" . mysqli_error($mysql);
        }
        CerrarConexion($mysql);
    }
public function GuardarDetalle(){
    $mysql=AbrirConexion();
    $sql1 = "SELECT MAX(id) AS id FROM factura";
    $resultado = mysqli_query($mysql,$sql1);
    $this->idfactura=$resultado["id"];
    $sql='INSERT INTO `detalle_factura`( `id_factura`, `id_servicio`, ".
      "`precio`, `id_barbero`)"."
      VALUES ("'.$this->idfactura.'","'
      .$this->idservicio.'","'.$this->cantidad.'","'.$this->precio
      .'","'.$this->idbarbero.'")';

    if (mysqli_query($mysql, $sql)) {
        return "Registro actualizado con exito";
    } else {
        return "Error: " . $sql . "<br>" . mysqli_error($mysql);
    }
    CerrarConexion($mysql);
    $this->idfactura="";
    $this->idservicio="";
    $this->cantidad="";
    $this->precio="";
    $this->idbarbero="";
  }
}
