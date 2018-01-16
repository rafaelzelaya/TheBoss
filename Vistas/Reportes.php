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
 <?php include "../footer.php"?>
 </body>
</html>
