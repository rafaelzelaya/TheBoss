/*funciones globales de todo el sistema*/
function ObtenerTodosBarbero(){
  $.post("../Controladores/BarberoController.php",{
      funcion: "ObtenerTodosBarbero",
  },function(data){
    var todos = data.todos;
    var grid = "<table class='highlight striped flow-text' >";
    grid+="<thead><tr>"
      +"<th>Nombres</th>"
      +"<th>Apellidos</th>"
      +"<th>Dui</th>"
      +"<th></th>"
      +"<th></th>"
      +"</tr></thead>"
      +"<tbody>";

    for(var i = 0;i < todos.length;i++){
      grid+="<tr>";
        grid += "<td>"+ todos[i].Nombres + "</td>"
              + "<td>"+ todos[i].Apellidos + "</td>"
              + "<td>"+ todos[i].Dui+ "</td>"
              + "<td style='width:auto'>"
              + "<a class='btn btn-floating btn-large cyan'"
              + " onclick='AbrirModal(\"EliminarBarbero\",\""
              +todos[i].Id+"\",\""
              +todos[i].Nombres+"\",\""
              +todos[i].Apellidos+"\",\""
              +todos[i].Dui+"\")'>"
              + "<i class='material-icons'>delete</i></a></td>"
              + "<td><a class='btn btn-floating btn-large cyan'"
              + "onclick='AbrirModal(\"EditarBarbero\",\""
              +todos[i].Id+"\",\""
              +todos[i].Nombres+"\",\""
              +todos[i].Apellidos+"\",\""
              +todos[i].Dui+"\")'>"
              + "<i class='material-icons'>edit</i></a></td>";
      grid+="</tr>";
    }
    grid+="</tbody></table>";
    $("#Resultado").html('');
    $("#Resultado").html(grid);
    $("#Resultado").removeClass('scale-out');
  });
}
