function Login(){
    console.log("entra");
  var user = $("#txtUsuario").val();
  var clave = $("#txtContraseña").val();
  $.post("../Controladores/LoginController.php",{
      funcion: "Login",
      usuario: user,
      clave: clave
  },function(data){
      console.log("funciondata");
    if(data.ok){
        console.log("entra aqui y revisa");
      Materialize.toast("Ingreso correcto",4000);
      location.href = "../Vistas/PuntoVenta.php";
    }
    else {
        console.log("no devuelve nada");
      Materialize.toast(data.mensaje,4000);
    }
  });
}
function Enter(e){
  if (e.keyCode == 13) {
        Login();
        return false;
    }
}
