<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/menu.controlador.php";
require_once "controladores/pedidos.controlador.php";



require_once "modelos/menu.modelo.php";
require_once "modelos/pedidos.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();