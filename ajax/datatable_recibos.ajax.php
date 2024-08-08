<?php

require_once "../controladores/recibos.controlador.php";
require_once "../modelos/recibos.modelo.php";

class TablaAdministrarRecibos
{
    /*=============================================
    MOSTRAR TABLA PRODUCTOS VENTAS
    =============================================*/
    public function mostrarTablaAdministrarRecibos()
    {

        $item = null;
        $valor = null;

        $recibosVenta = ControladorRecibos::ctrMostrarRecibos($item, $valor);

        if (empty($recibosVenta)) {
            $datosJson = '{"data":[]}';
            echo $datosJson;
            return;
        }

        $datosJson = ['data' => []];

        for ($i = 0; $i < count($recibosVenta); $i++) {

            $datosJson['data'][] = [
                "id" => $i + 1,
                "productos" => $recibosVenta[$i]["productos"],
                "n_orden" => $recibosVenta[$i]["n_orden"],
                "fecha" => $recibosVenta[$i]["fecha"],
                "metodo_pago" => $recibosVenta[$i]["metodo_pago"],
                "cliente" => $recibosVenta[$i]["cliente"],
                "telefono" => $recibosVenta[$i]["telefono"],
                "status" => $recibosVenta[$i]["status"]
            ];
        }

        echo json_encode($datosJson, JSON_UNESCAPED_UNICODE);
    }
}

/*=============================================
    ACTIVAR TABLA DETALLES DE VENTA
    =============================================*/
$activarTablaRecibos = new TablaAdministrarRecibos();
$activarTablaRecibos->mostrarTablaAdministrarRecibos();
