<?php

require 'conexion.php';


class ModeloMenu
{

    /*=============================================
	MOSTRAR MENU
	=============================================*/
    static public function mdlMostrarMenu($tabla, $item, $valor)
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

    /*=============================================
	CREAR VENTA
	=============================================*/
    static public function mdlCrearVenta($tabla, $datos)
    {
        // Conectar a la base de datos usando PDO
        $pdo = Conexion::conectar();

        // Obtener las columnas de la primera fila de datos
        $columns = array_keys($datos[0]);
        $columns = implode(', ', $columns);

        // Construir los placeholders para los valores
        $placeholders = [];
        $values = [];
        foreach ($datos as $item) {
            $placeholders[] = '(' . implode(', ', array_fill(0, count($item), '?')) . ')';
            $values = array_merge($values, array_values($item));
        }
        $placeholders = implode(', ', $placeholders);

        // Preparar la consulta SQL
        $sql = "INSERT INTO $tabla ($columns) VALUES $placeholders";
        $stmt = $pdo->prepare($sql);

        // Ejecutar la consulta con los valores
        $stmt->execute($values);

        return 'ok';
    }
    /*=============================================
	CREAR DETALLE VENTA
	=============================================*/
    static public function mdlCrearDetalleVenta($tabla, $n_orden, $datos, $metodo_pago, $cliente, $telefono)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(productos, n_orden, metodo_pago, cliente, telefono) VALUES(:productos, :n_orden, :metodo_pago, :cliente, :telefono)");
        $stmt->bindParam(":productos", $datos, PDO::PARAM_STR);
        $stmt->bindParam(":n_orden", $n_orden, PDO::PARAM_STR);
        $stmt->bindParam(":metodo_pago", $metodo_pago, PDO::PARAM_STR);
        $stmt->bindParam(":cliente", $cliente, PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }
}
