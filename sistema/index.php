<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/ruta.controlador.php";

require_once "controladores/usuarios.controlador.php";
require_once "modelos/usuarios.modelo.php";

require_once "controladores/perfiles.controlador.php";
require_once "modelos/perfiles.modelo.php";

require_once "controladores/ciudades.controlador.php";
require_once "modelos/ciudades.modelo.php";

require_once "controladores/grados.controlador.php";
require_once "modelos/grados.modelo.php";

require_once "controladores/materias.controlador.php";
require_once "modelos/materias.modelo.php";



$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();