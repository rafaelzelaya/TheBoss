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

     <div class="row">
       <div class="input-field col s6">
         <input id = "fechaInicio" type="text" class="datepicker">
         <label for="fechaInicio">Fecha inicial</label>
       </div>
       <div class="input-field col s6">
         <input id = "fechaFinal" type="text" class="datepicker">
         <label for="fechaFinal">Fecha final</label>
       </div>
     </div>

     <a class="waves-effect waves-light btn"
         onclick="ReporteBarberosPorServicios();">Mostrar Reporte</a>
         <br/><br/><br/>
     <div class="row" id = "collectionId">No existen reportes disponibles</div>
   </div>
 </div>
 <?php include "../footer.php"?>
 <script src="../js/Reportes.js"></script>
 </body>
</html>
