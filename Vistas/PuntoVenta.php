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
      <div class="row" id = "collectionId">Servicios no disponibles por el momento</div>
    </div>
  </div>
  <a onclick="PruebaAbrirModal()">Prueba Abrir Modal</a>
  <!--Crear modal para venta de productos
  agregar siempre a la variable Factura los resultados(codigo,cantidad)-->
  <!-- Modal. Formulario para guardar editar barberos -->
  <div id="modalBarberoServicio" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 id="TituloModalBarberoSerivicio">Modal Header</h4>
      Contenido del modal va aquí
      <input type="hidden" value="" id="modalIdCodigoServicio" />
    </div>
    <div class="modal-footer">
      <a href="#!"
        class="modal-action modal-close waves-effect waves-green btn-flat "
        id = "Boton1ModalBarberoServicio">Boton1</a>
        <a href="#!"
          class="modal-action modal-close waves-effect waves-green btn-flat "
          id = "Boton2Modal">Cancelar</a>
    </div>
  </div>
  <?php include "../footer.php"?>
  <script src="../js/PuntoVenta.js"></script>
  </body>
</html>
