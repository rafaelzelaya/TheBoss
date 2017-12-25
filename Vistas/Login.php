<!DOCTYPE html>
<html lang="en">
<?php include '../Session.php'; ?>
<?php include '../Cabecera.php'; ?>
<body>
  <?php echo CerrarSession();?>
 <?//php include "../Menu.php";?>
   <div class="black lighten-2 nav-wrapper center">
     <a href="#" class="brand-logo center">
       <img src = "../img/bannerNegro.jpg"  class="responsive-img logo"/>
     </a>
   </div>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <h1 class="titulo center black-text">Iniciar Sesión</h1>
      <div class="row center">

      </div>
      <div class="row center">
        <div class="row">
          <div class="input-field col s12">
            <input id="txtUsuario" type="text" class="validate">
            <label for="txtUsuario">Usuario</label>
          </div>
          <div class="input-field col s12">
            <input id="txtContraseña" type="password" class="validate">
            <label for="txtContraseña">Clave</label>
          </div>
        </div>
        <a id="BtnAceptar"
        class="btn-large waves-effect waves-light black"
        onclick="Login()">Ingresar<i class="material-icons right">send</i></a>
      </div>
      <br><br>
    </div>
  </div>

  <?php include "../footer.php"?>
  <script src="../js/Login.js"></script>
  </body>
</html>
