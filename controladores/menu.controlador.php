<?php

class ControladorMenu
{

    /*=============================================
	MOSTRAR MENU
	=============================================*/
    static public function ctrMostrarMenu($item, $valor)
    {
        $tabla = "productos";
        $respuesta = ModeloMenu::mdlMostrarMenu($tabla, $item, $valor);
        return $respuesta;
    }
    /*=============================================
	MOSTRAR ESPECIALIDADES
	=============================================*/
    static public function ctrMostrarEspecialidades($item, $valor)
    {
        $tabla = "especialidades";
        $respuesta = ModeloMenu::mdlMostrarMenu($tabla, $item, $valor);
        return $respuesta;
    }
    /*=============================================
	CREAR VENTA
	=============================================*/
    static public function ctrCrearVenta($tabla, $datos)
    {
        $respuesta = ModeloMenu::mdlCrearVenta($tabla, $datos);
        return $respuesta;
    }
}
