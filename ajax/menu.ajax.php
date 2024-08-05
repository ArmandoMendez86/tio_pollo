<?php

require_once "../controladores/menu.controlador.php";
require_once "../modelos/menu.modelo.php";

class AjaxMenu
{

    public $idProducto;
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
