<!DOCTYPE html>
<html lang="en">
<?php include '../Session.php';?>
<?php if(!AbrirSession())echo RegresarInicio();?>
<?php include '../Cabecera.php'; ?>
<body>
 <?php include "../Menu.php";?>
 <div class="section no-pad-bot" id="index-banner">
   <div class="container">
     <h1 class="header center black-text">Reportes</h1>
     <h3>Reportes</h3>
     <div class="row" id = "collectionId">No existen reportes disponibles</div>
   </div>
 </div>
select barberos.Nombres as barbero, tbl_serviciosproductos.nombre as servicio,
count(detalle_factura.id_servicio) as cantidad, detalle_factura.id_factura,
detalle_factura.id_servicio,factura.Fecha from detalle_factura
inner join barberos on barberos.Id = detalle_factura.id_barbero
inner join tbl_serviciosproductos on tbl_serviciosproductos.id =
detalle_factura.id_servicio
inner join factura on factura.id = detalle_factura.id_factura
where factura.fecha BETWEEN '2018-01-16' and '2018-01-17'
group by tbl_serviciosproductos.nombre,tbl_serviciosproductos.id,barberos.Nombres
 <?php include "../footer.php"?>
 </body>
</html>
