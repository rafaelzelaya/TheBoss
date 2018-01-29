<?php
include "../Conexion.php";
  class Reporte{
    function ServiciosPorBarbero(){
        $mysqli = AbrirConexion();
        $sql = 'select barberos.Nombres as barbero,
        tbl_serviciosproductos.nombre as servicio,
        count(detalle_factura.id_servicio) as cantidad,
        from detalle_factura
        inner join barberos on barberos.Id = detalle_factura.id_barbero
        inner join tbl_serviciosproductos on
        tbl_serviciosproductos.id = detalle_factura.id_servicio
        inner join factura on factura.id = detalle_factura.id_factura
        where factura.fecha BETWEEN \'2018-01-16\' and \'2018-01-30\'
        group by
        tbl_serviciosproductos.nombre,tbl_serviciosproductos.id,barberos.Nombres';
        $resultado = $mysqli->query($sql);
        $listaServiciosPorBarberos = array();
        while ($fila = $resultado->fetch_assoc()) {
          $servicioPorBarbero = new Barbero();
          $servicioPorBarbero -> Barbero = $fila["barbero"];
          $servicioPorBarbero -> Servicio = $fila["servicio"];
          $servicioPorBarbero -> Cantidad = $fila["Cantidad"];
          $listaServiciosPorBarberos[] = $servicioPorBarbero;
        }
        $resultado->close();
        CerrarConexion($mysqli);
        return $listaServiciosPorBarberos;
    }
  }
?>
