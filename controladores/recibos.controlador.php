<?php

class ControladorRecibos
{

    /*=============================================
	MOSTRAR DETALLES DE VENTAS
	=============================================*/
    static public function ctrMostrarRecibos($item, $valor)
    {
        $tabla = "detalles_venta";
        $respuesta = ModeloRecibos::mdlMostrarRecibos($tabla, $item, $valor);
        return $respuesta;
    }
   
}