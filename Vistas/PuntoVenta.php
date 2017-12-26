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
      <div class="row">
        <ul class="collection">
          <li class="collection-item avatar valign-wrapper ">
              <span class="title tamaño_texto">Corte de cabello $5.00</span>
              <a onclick="AumentarCantidadServicio('codigo1')">
                <i class="medium material-icons">add_circle_outline</i>
              </a>
              <a onclick="ReducirCantidadServicio('codigo1')">
                <i class="medium material-icons icon_red">remove_circle_outline</i>
              </a>
            <a href="#!" class="secondary-content tamaño_texto">
                Cantidad: <span id="cantidad_codigo1">0</span>
            </a>
          </li>
          <li class="collection-item avatar">
            <img src="../img/CorteBarba.png" alt="" class="circle">
            <span class="title">Corte de barba</span>
            <p>$5.00</p>
            <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
          </li>
          <li class="collection-item avatar">
            <img src="../img/PerfiladoBarba.png" alt="" class="circle">
            <span class="title">Perfilado de barba</span>
            <p>$5.00</p>
            <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
          </li>
          <li class="collection-item avatar">
            <img src="../img/PerfiladoCeja.png" alt="" class="circle">
            <span class="title">Perfilado de cejas</span>
            <p>$5.00</p>
            <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
          </li>
          <li class="collection-item avatar">
            <img src="../img/facial.png" alt="" class="circle">
            <span class="title">Facial</span>
            <p>$5.00</p>
            <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
          </li>
</ul>
      </div>
    </div>
  </div>

  <?php include "../footer.php"?>
  <script src="../js/PuntoVenta.js"></script>
  </body>
</html>
