<?php
include "../Conexion.php";
  class Reporte{
    function ServiciosPorBarbero($fechaInicio,$fechaFinal){
        $mysqli = AbrirConexion();
        $sql = 'select barberos.Nombres as barbero, barberos.Id as idBarbero,
        tbl_serviciosproductos.nombre as servicio,
        count(detalle_factura.id_servicio) as cantidad
        from detalle_factura
        inner join barberos on barberos.Id = detalle_factura.id_barbero
        inner join tbl_serviciosproductos on
        tbl_serviciosproductos.id = detalle_factura.id_servicio
        inner join factura on factura.id = detalle_factura.id_factura
        where factura.fecha BETWEEN
        STR_TO_DATE(\''.$fechaInicio.'\',\'%d/%m/%Y\') and
        STR_TO_DATE(\''.$fechaFinal.'\',\'%d/%m/%Y\')
        group by
        tbl_serviciosproductos.nombre,tbl_serviciosproductos.id,barberos.Nombres
        order by barberos.Nombres';

        $resultado = $mysqli->query($sql) or die($mysqli->error);
        $listaServiciosPorBarberos = array();
        while ($fila = $resultado->fetch_assoc()) {
          $servicioPorBarbero = new Reporte();
          $servicioPorBarbero -> Barbero = $fila["barbero"];
          $servicioPorBarbero -> IdBarbero = $fila["idBarbero"];
          $servicioPorBarbero -> Servicio = $fila["servicio"];
          $servicioPorBarbero -> Cantidad = $fila["cantidad"];
          $listaServiciosPorBarberos[] = $servicioPorBarbero;
        }
        $resultado->close();
        CerrarConexion($mysqli);
        return $listaServiciosPorBarberos;
    }
    public $Barbero = "";
    public $Servicio = "";
    public $Cantidad = "";
    public $IdBarbero = "";
  }
?>
