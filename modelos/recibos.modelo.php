<?php

require_once 'conexion.php';

class ModeloRecibos
{

    /*=============================================
	MOSTRAR MENU
	=============================================*/
    static public function mdlMostrarRecibos($tabla, $item, $valor)
    {

        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            if (is_int($valor)) {
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
            } else {
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            }

            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }
}
