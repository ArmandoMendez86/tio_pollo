<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/menu.controlador.php";


require_once "modelos/menu.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();