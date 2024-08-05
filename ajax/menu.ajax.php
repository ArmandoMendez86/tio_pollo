<?php

require_once "../controladores/menu.controlador.php";
require_once "../modelos/menu.modelo.php";

class AjaxMenu
{

    public $idProducto;
    public $items;


    public function traerProducto()
    {
        $item = "id";
        $valor = $this->idProducto;
        $respuesta = ControladorMenu::ctrMostrarMenu($item, $valor);
        echo json_encode($respuesta);
    }
    public function traerProductos()
    {
        $item = null;
        $valor = null;
        $respuesta = ControladorMenu::ctrMostrarEspecialidades($item, $valor);
        echo json_encode($respuesta);
    }
    public function crearVenta()
    {
        $tabla = "venta";
        $datos = json_decode($this->items,true);
        $respuesta = ControladorMenu::ctrCrearVenta($tabla, $datos);
        echo json_encode($respuesta);
    }
}


/*=============================================
	TRAER PRODUCTO
	=============================================*/
if (isset($_POST["idProducto"])) {
    $traerProducto = new AjaxMenu();
    $traerProducto->idProducto = $_POST["idProducto"];
    $traerProducto->traerProducto();
}
/*=============================================
	TRAER PRODUCTOS
	=============================================*/
if (isset($_POST["especialidades"])) {
    $traerEspecialidad = new AjaxMenu();
    $traerEspecialidad->traerProductos();
}
/*=============================================
	CREAR VENTA
	=============================================*/
if (isset($_POST["items"])) {
    $crearVenta = new AjaxMenu();
    $crearVenta->items = $_POST["items"];
    $crearVenta->crearVenta();
}
