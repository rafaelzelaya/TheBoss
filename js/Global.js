/*funciones globales de todo el sistema*/
function ConfigurarModal(titulo,txtBoton,funcionAceptar,sufijo){
    $("#TituloModal_"+sufijo).html(titulo);
    $("#Boton1Modal_"+sufijo).html(txtBoton);
    $("#Boton1Modal_"+sufijo).off();
    $("#Boton1Modal_"+sufijo).click(funcionAceptar);
}
