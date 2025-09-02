<?php
require_once('./MODELO/Usuario.php');

class UsuarioControlador {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function listar() {
        mostrar("--- Listado de Usuarios ---");
        $usuarios = $this->db->getUsuarios();
        if (empty($usuarios)) {
            mostrar("No hay usuarios registrados.");
        } else {
            foreach ($usuarios as $usuario) {
                echo $usuario . "\n";
            }
        }
        leer("\nPresione ENTER para continuar ...");
    }
    
    public function agregar() {
        mostrar("--- Agregar Usuario ---");
        $apellido = leer("Apellido: ");
        $nombre = leer("Nombre: ");
        $dni = leer("DNI: ");
        $edad = (int) leer("Edad: ");
        $nacimiento = leer("Fecha de Nacimiento (YYYY-MM-DD): ");
        $localidad = leer("Localidad: ");
        $usuario = new Usuario($apellido, $nombre, $dni, $edad, $nacimiento, $localidad);
        $this->db->agregarUsuario($usuario);
        mostrar("Se agregó un nuevo usuario.");
        leer("\nPresione ENTER para continuar ...");
    }

    public function modificar() {
        mostrar("--- Modificar Usuario ---");
        $dniBusqueda = leer("Ingrese el DNI del usuario a modificar: ");
        $usuario = $this->db->buscarUsuarioPorDNI($dniBusqueda);
        if ($usuario) {
            mostrar("Usuario encontrado: " . $usuario);
            $usuario->setApellido(leer("Nuevo Apellido ({$usuario->getApellido()}): ", $usuario->getApellido()));
            $usuario->setNombre(leer("Nuevo Nombre ({$usuario->getNombre()}): ", $usuario->getNombre()));
            $usuario->setEdad((int) leer("Nueva Edad ({$usuario->getEdad()}): ", (string)$usuario->getEdad()));
            $usuario->setNacimiento(leer("Nueva Fecha de Nacimiento ({$usuario->getNacimiento()}): ", $usuario->getNacimiento()));
            $usuario->setLocalidad(leer("Nueva Localidad ({$usuario->getLocalidad()}): ", $usuario->getLocalidad()));
            mostrar("Usuario modificado exitosamente.");
        } else {
            mostrar("No se encontró el usuario con el DNI: " . $dniBusqueda);
        }
        leer("\nPresione ENTER para continuar ...");
    }

    public function borrar() {
        mostrar("--- Borrar Usuario ---");
        $dni = leer("Ingrese el DNI del usuario a borrar: ");
        if ($this->db->borrarUsuarioPorDNI($dni)) {
            mostrar("Se borró el usuario.");
        } else {
            mostrar("No se encontró el usuario.");
        }
        leer("\nPresione ENTER para continuar ...");
    }

    public function gestionar() {
        $menu = Menu::getMenuUsuarios();
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