<!DOCTYPE html>
<html lang="en">
<?php include '../Session.php';?>
<?php if(!AbrirSession())echo RegresarInicio();?>
<?php include '../Cabecera.php'; ?>
<link href="../css/PuntoVenta.css" type="text/css" rel="stylesheet"/>
<body>
 <?php include "../Menu.php";?>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <h1 class="header center black-text">Punto de Venta</h1>
      <h3>Servicios</h3>
      <div class="row" id = "collectionId">No existen servicios registrados</div>
    </div>
  </div>
  <!--Crear modal para venta de productos
  agregar siempre a la variable Factura los resultados(codigo,cantidad)-->
  <!-- Modal. Formulario para guardar editar barberos -->
  <div id="modal_BarberoServicio" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 id="TituloModal_BarberoServicio">Modal Header</h4>
      <div id = "ModalresultadoBarberos">Contenido del modal va aquí</div>
      <input type="hidden" value="" id="modalIdCodigoServicio" />
      <input type="hidden" value="" id="modalNombreServicio" />
      <input type="hidden" value="" id="modalPrecioServicio" />
    </div>
    <div class="modal-footer">
      <a href="#!"
        class="modal-action modal-close waves-effect waves-green btn-flat "
        id = "Boton1Modal_BarberoServicio">Boton1</a>
        <a href="#!"
          class="modal-action modal-close waves-effect waves-green btn-flat "
          id = "Boton2Modal">Cancelar</a>
    </div>
  </div>


<div class="row center">
<div class="col s8 offset-s2">
  <!--div id="verFactura">Ingresa un pedido!</div-->
  <a class="waves-effect waves-light btn" onclick="VerFactura()">
    <i class="material-icons left">check</i>Ver Factura</a>
</div>
</div>
  <?php include "../footer.php"?>
  <script src="../js/PuntoVenta.js"></script>
  </body>
</html>
