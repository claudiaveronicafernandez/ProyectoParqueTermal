<?php
require_once('./MODELO/ParqueTermal.php');

class ParqueControlador {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function listar() {
        mostrar("--- Listado de Parques Termales ---");
        $parques = $this->db->getParquesTermales();
        if (empty($parques)) {
            mostrar("No hay parques termales registrados.");
        } else {
            foreach ($parques as $parque) {
                echo $parque . "\n";
            }
        }
        leer("\nPresione ENTER para continuar ...");
    }

    public function agregar() {
        mostrar("--- Agregar Parque Termal ---");
        $nombre = leer("Nombre: ");
        $ubicacion = leer("Ubicación: ");
        $localidad = leer("Localidad: ");
        $numero = leer("Número de teléfono: ");
        $mail = leer("Email: ");
        $capacidad = (int) leer("Capacidad máxima: ");
        $parque = new ParqueTermal($nombre, $ubicacion, $localidad, $numero, $mail, $capacidad);
        $this->db->agregarParqueTermal($parque);
        mostrar("Se agregó un nuevo parque termal.");
        leer("\nPresione ENTER para continuar ...");
    }

    public function modificar() {
        mostrar("--- Modificar Parque Termal ---");
        $nombreBusqueda = leer("Ingrese el nombre del parque termal a modificar: ");
        $parque = $this->db->buscarParqueTermalPorNombre($nombreBusqueda);
        if ($parque) {
            mostrar("Parque Termal encontrado: " . $parque);
            $parque->setNombre(leer("Nuevo Nombre ({$parque->getNombre()}): ", $parque->getNombre()));
            $parque->setUbicacion(leer("Nueva Ubicación ({$parque->getUbicacion()}): ", $parque->getUbicacion()));
            $parque->setLocalidad(leer("Nueva Localidad ({$parque->getLocalidad()}): ", $parque->getLocalidad()));
            $parque->setNumero(leer("Nuevo Número de teléfono ({$parque->getNumero()}): ", $parque->getNumero()));
            $parque->setMail(leer("Nuevo Email ({$parque->getMail()}): ", $parque->getMail()));
            $parque->setCapacidad((int) leer("Nueva Capacidad ({$parque->getCapacidad()}): ", (string)$parque->getCapacidad()));
            mostrar("Parque termal modificado exitosamente.");
        } else {
            mostrar("No se encontró el parque termal con el nombre: " . $nombreBusqueda);
        }
        leer("\nPresione ENTER para continuar ...");
    }

    public function borrar() {
        mostrar("--- Borrar Parque Termal ---");
        $nombre = leer("Ingrese el nombre del parque termal a borrar: ");
        if ($this->db->borrarParqueTermalPorNombre($nombre)) {
            mostrar("Se borró el parque termal.");
        } else {
            mostrar("No se encontró el parque termal.");
        }
        leer("\nPresione ENTER para continuar ...");
    }

    public function gestionar() {
        $menu = Menu::getMenuParquesTermales();
        // Renombramos las funciones para que coincidan con los métodos de esta clase
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
