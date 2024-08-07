<?php

class ControladorPedidos
{

    /*=============================================
	MOSTRAR PRODUCTOS PENDIENTES
	=============================================*/
    static public function ctrMostrarPendientes($item, $valor)
    {
        $tabla = "detalles_venta";
        $respuesta = ModeloPendientes::mdlMostrarPendientes($tabla, $item, $valor);
        return $respuesta;
    }
}
