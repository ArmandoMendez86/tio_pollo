<?php

require_once "conexion.php";

class ModeloContabilidad
{
    /*=============================================
	MOSTRAR CONTABILIDAD VENTAS
	=============================================*/
    static public function mdlMostrarContabilidad($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT venta.id, productos.producto, productos.unidad, especialidades.sabor, productos.precio, venta.cantidad, venta.descuento, (productos.precio * venta.cantidad) * (1 - (venta.descuento / 100)) AS monto,
        venta.fecha, venta.n_orden, venta.id_empleado
                FROM venta
                INNER JOIN productos ON venta.id_producto = productos.id
                INNER JOIN especialidades ON venta.id_especialidad = especialidades.id");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
