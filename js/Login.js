function Login(){
  var user = $("#txtUsuario").val();
  var clave = $("#txtContraseña").val();
  $.post("../Controladores/LoginController.php",{
      funcion: "Login",
      usuario: user,
      clave: clave
  },function(data){
    if(data.ok){
      Materialize.toast("Ingreso correcto",4000);
      location.href = "../Vistas/PuntoVenta.php";
    }
    else {
      Materialize.toast(data.mensaje,4000);
    }
  });
}
