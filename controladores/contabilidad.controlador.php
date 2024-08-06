<?php

class ControladorContabilidad
{

    /*=============================================
	MOSTRAR CONTABILIDAD VENTAS
	=============================================*/
    static public function ctrMostrarContabilidad()
    {
        $tabla = "venta";
        $respuesta = ModeloContabilidad::mdlMostrarContabilidad($tabla);
        return $respuesta;
    }
}
