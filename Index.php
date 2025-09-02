<?php
// --- Carga de Vistas y Modelos ---
require_once('./VISTA/Menu.php');
require_once('./VISTA/Util.php');
require_once('./MODELO/LoadDatos.php');

// --- Carga de Controladores ---
require_once('./CONTROLADOR/ParqueControlador.php');
require_once('./CONTROLADOR/UsuarioControlador.php');
require_once('./CONTROLADOR/TipoEntradaControlador.php');

global $db; // La variable $db se crea en LoadDatos.php

// --- Instancia de Controladores ---
// Les pasamos la "base de datos" para que puedan trabajar con ella.
$parqueControlador = new ParqueControlador($db);
$usuarioControlador = new UsuarioControlador($db);
$tipoEntradaControlador = new TipoEntradaControlador($db);

// --- Menú Principal ---
mostrar("Sistema de Gestión de Parque Termal");
mostrar("===================================");
mostrar("(C) 2025");

$menu = Menu::getMenuPrincipal();
// Asignamos la función de cada controlador a la opción del menú correspondiente.
$menu->opciones[1]->setFuncion([$parqueControlador, 'gestionar']);
$menu->opciones[2]->setFuncion([$usuarioControlador, 'gestionar']);
$menu->opciones[3]->setFuncion([$tipoEntradaControlador, 'gestionar']);

$opcion = $menu->elegir();
while ($opcion->getNombre() != 'Salir') {
    $funcion = $opcion->getFuncion();
    call_user_func($funcion); // Llama al método del controlador correspondiente
    $opcion = $menu->elegir();
}

mostrar("¡Gracias por usar el sistema!");
public function setFuncion($funcion) {
    $this->funcion = $funcion;
}

?>
