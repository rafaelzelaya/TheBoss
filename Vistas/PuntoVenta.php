<!DOCTYPE html>
<html lang="en">
<?php include '../Session.php';?>
<?php if(!AbrirSession())echo RegresarInicio();?>
<?php include '../Cabecera.php'; ?>
<body>
 <?php include "../Menu.php";?>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <h1 class="header center black-text">Punto de Venta</h1>
      <div class="row center">
          Mostrar aquí los servicios como corte...
      </div>
    </div>
  </div>

  <?php include "../footer.php"?>
  <script src="../js/Login.js"></script>
  </body>
</html>
