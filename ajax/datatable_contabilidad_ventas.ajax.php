<?php

require_once "../controladores/contabilidad.controlador.php";
require_once "../modelos/contabilidad.modelo.php";



class TablaAdministrarVentas
{
    /*=============================================
	MOSTRAR TABLA PRODUCTOS VENTAS
	=============================================*/
    public function mostrarTablaAdministrarVentas()
    {
        $item = null;
        $valor = null;

        $ventas = ControladorContabilidad::ctrMostrarContabilidad();

        if (empty($ventas)) {
            $datosJson = '{"data":[]}';
            echo $datosJson;
            return;
        }

        $datosJson = '{"data":[';

        for ($i = 0; $i < count($ventas); $i++) {

            $datosJson .= '[
                    "' . ($i + 1) . '",
                    "' . $ventas[$i]["producto"] . '",
                    "' . $ventas[$i]["unidad"] . '",
                    "' . $ventas[$i]["sabor"] . '",
                    "' . $ventas[$i]["precio"] . '",
                    "' . $ventas[$i]["cantidad"] . '",
                    "' . $ventas[$i]["descuento"] . '",
                    "' . $ventas[$i]["porcion"] . '",
                    "' . $ventas[$i]["monto"] . '",
                    "' . $ventas[$i]["fecha"] . '",
                    "' . $ventas[$i]["n_orden"] . '",
                    "' . $ventas[$i]["empleado"] . '"
                ],';
        }

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']}';
        echo $datosJson;
    }
}


/*=============================================
	ACTIVAR TABLA PRODUCTOS
	=============================================*/
$activarTablaVentas = new TablaAdministrarVentas();
$activarTablaVentas->mostrarTablaAdministrarVentas();
