<?php
require_once('./MODELO/TipoEntrada.php');

class TipoEntradaControlador {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    
    public function listar() {
        mostrar("--- Listado de Tipos de Entradas ---");
        $tiposEntradas = $this->db->getTiposEntradas();
        if (empty($tiposEntradas)) {
            mostrar("No hay tipos de entradas registrados.");
        } else {
            foreach ($tiposEntradas as $tipo) {
                echo $tipo . "\n";
            }
        }
        leer("\nPresione ENTER para continuar ...");
    }

    public function agregar() {
        mostrar("--- Agregar Tipo de Entrada ---");
        $nombre = leer("Nombre del tipo de entrada (ej. Menores de 2 años, CUD, etc.): ");
        $tipoEntrada = new TipoEntrada($nombre);
        $this->db->agregarTipoEntrada($tipoEntrada);
        mostrar("Se agregó un nuevo tipo de entrada.");
        leer("\nPresione ENTER para continuar ...");
    }

    public function modificar() {
        mostrar("--- Modificar Tipo de Entrada ---");
        $nombreBusqueda = leer("Ingrese el nombre del tipo de entrada a modificar: ");
        $tipoEntrada = $this->db->buscarTipoEntradaPorNombre($nombreBusqueda);
        if ($tipoEntrada) {
            mostrar("Tipo de Entrada encontrado: " . $tipoEntrada);
            $tipoEntrada->setNombre(leer("Nuevo Nombre ({$tipoEntrada->getNombre()}): ", $tipoEntrada->getNombre()));
            mostrar("Tipo de entrada modificado exitosamente.");
        } else {
            mostrar("No se encontró el tipo de entrada con el nombre: " . $nombreBusqueda);
        }
        leer("\nPresione ENTER para continuar ...");
    }

    public function borrar() {
        mostrar("--- Borrar Tipo de Entrada ---");
        $nombre = leer("Ingrese el nombre del tipo de entrada a borrar: ");
        if ($this->db->borrarTipoEntradaPorNombre($nombre)) {
            mostrar("Se borró el tipo de entrada.");
        } else {
            mostrar("No se encontró el tipo de entrada.");
        }
        leer("\nPresione ENTER para continuar ...");
    }
    
    public function gestionar() {
        $menu = Menu::getMenuTiposEntradas();
        $menu->opciones[1]->setFuncion([$this, 'listar']);
        $menu->opciones[2]->setFuncion([$this, 'agregar']);
        $menu->opciones[3]->setFuncion([$this, 'modificar']);
        $menu->opciones[4]->setFuncion([$this, 'borrar']);

        $opcion = $menu->elegir();
        while ($opcion->getNombre() != 'Volver') {
            call_user_func($opcion->getFuncion());
            $opcion = $menu->elegir();
        }
    }
}