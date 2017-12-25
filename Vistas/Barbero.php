  <!DOCTYPE html>
  <html>
  <?php include '../Session.php';?>
  <?php if(!AbrirSession())echo RegresarInicio();?>
    <?php include "../Cabecera.php";?>
    <link href="../css/Barberos.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <body>
      <?php include "../Menu.php";?>

      <h1 class="header center black-text">Barberos</h1>
      <!-- Modal. Formulario para guardar editar barberos -->
      <div id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4 id="TituloModal">Modal Header</h4>
          <div class="row">
            <div class="input-field col s12">
              <input id="txtNombres" type="text" class="validate">
              <label for="txtNombres">Nombres</label>
            </div>
            <div class="input-field col s12">
              <input id="txtApellidos" type="text" class="validate">
              <label for="txtApellidos">Apellidos</label>
            </div>
            <div class="input-field col s12">
              <input id="txtDui" type="text" class="validate">
              <label for="txtDui">Dui</label>
              <input type="hidden" id="idBarbero" value="" />
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a href="#!"
            class="modal-action modal-close waves-effect waves-green btn-flat "
            id = "Boton1Modal">Boton1</a>
            <a href="#!"
              class="modal-action modal-close waves-effect waves-green btn-flat "
              id = "Boton2Modal">Cancelar</a>
        </div>
      </div>

    <!--Inicio de botones-->
  <div class="row center">
    <div class="col s8 offset-s2">

      <a class="waves-effect waves-light btn" onclick="AbrirModal('GuardarBarbero');">Nuevo Barbero</a>
      <a class="waves-effect waves-light btn" onclick="ObtenerTodosBarbero();">Mostrar Barberos</a>
      <!--Tabla respuesta de todos los barberos-->

         <div id="Resultado" class="scale-transition scale-out"></div>
    </div>
  </div>

  <!-- Modal de confirmación para la eliminación de registros de barberos -->
  <div id="modalConfirmacion" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Eliminar Registro</h4>
      <p id="DescripcionEliminarBarbero">Esta seguro que desea eliminar el registro</p>
      <input type="hidden" id="idBarberoEliminar" value="" \>
    </div>
    <div class="modal-footer">
      <a href="#!" id="BotonEliminarModal"
      class="modal-action modal-close waves-effect waves-green btn-flat ">Eliminar</a>
      <a href="#!"
      class="modal-action modal-close waves-effect waves-green btn-flat ">Cancelar</a>
    </div>
  </div>
      <?php include "../footer.php"; ?>
      <script type="text/javascript" src="../js/Barbero.js"></script>
    </body>
  </html>
