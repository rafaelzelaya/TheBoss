<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12-26-17
 * Time: 06:50 PM
 */
include "../Modelos/ProductoServicio.php";
header('content-type: application/json; charset=utf-8');
$datosJson = array();
$funcion = "";
if (isset($_POST["funcion"])) {
    $funcion = $_POST["funcion"];
}
else{
    $datosJson['mensaje'] = "No encuentra la variable funcion";
    echo json_encode($datosJson);
    exit();
}
$productoservicio = new ProductoServicio();
switch ($funcion) {
    case "ObtenerServicios":
        $datosJson['todos'] = $productoservicio->ObtenerServicios();
        break;
    case"ObtenerProductos":
        $datosJson['todos'] = $productoservicio->ObtenerProductos();
        break;
    case "Ingresar Producto o Servicio":
        $datosJson['mensaje'] = "guardado ok";
        $codigo = $_POST["codigo"];
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $esproducto = $_POST["esproducto"];
        $productoservicio->Codigo=$codigo;
        $productoservicio->Nombre=$nombre;
        $productoservicio->Precio=$precio;
        $productoservicio->EsProducto=$esproducto;
        $datosJson["mensaje"] = $productoservicio ->CrearProductoOservicios() ;
        break;
    case "EiminarProductoOservicio":
        $productoservicio-> Id = $_POST["id"];
        $datosJson["mensaje"] = $productoservicio->Eliminar();
            break;
    default:
        $datosJson['mensaje'] = "Funcion no encontrada";
        break;
}
echo json_encode($datosJson);
exit();
