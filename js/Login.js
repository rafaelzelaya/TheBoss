function Login(){
  var user = $("#txtUsuario").val();
  var clave = $("#txtContraseña").val();
  $.post("../Controladores/LoginController.php",{
      funcion: "Login",
      usuario: user,
      clave: clave
  },function(data){
    if(data.mensaje){
      Materialize.toast("Ingreso correcto",4000);
    }
    else {
      Materialize.toast("Usuario o contraseña incorrectos!",4000);
    }
  });
}
