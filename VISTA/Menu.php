<?php
require_once('Opcion.php');
require_once('Util.php');

class Menu
{
    private $titulo;
    private $opciones = [];

    function __construct($titulo)
    {
        $this->titulo = $titulo;
}

    function addOpcion(Opcion $opcion)
    {
        $this->opciones[] = $opcion;
    }

    private function mostrar()
    {
        system('clear');
        mostrar($this->titulo);
        mostrar(str_pad('', strlen($this->titulo), '-'));

        foreach ($this->opciones as $key => $opcion) {
// Muestra el índi22ce de la opción en rojo y el nombre de la opción
mostrar('1' . $key . '1' . "-" . $opcion->getNombre());
        }
    }

    function elegir()
    {
        $this->mostrar();
        do {
            $opcion = trim(fgets(STDIN));
if (trim($opcion) == "") {
                echo "\033[1A"; // Mueve el cursor una línea arriba para re-pedir la entrada
            }
        } while (trim($opcion) == "");

        // Valida si la opción ingresada es numérica y existe en el array de opciones
if (is_numeric($opcion) && isset($this->opciones[$opcion])) {
            $operacion = $this->opciones[$opcion];
            return $operacion;
        } else {
mostrar("\nOpción inválida. Por favor, ingrese un número de opción válido.");
            leer("Presione ENTER para reintentar...");
            return $this->elegir(); // Vuelve a mostrar el menú y pedir la opción
}
    }

    static function getMenuPrincipal()
    {
        $menu = new Menu('Menu Principal');
        $menu->addOpcion(new Opcion('Salir', 'salir'));
        $menu->addOpcion(new Opcion('Gestionar Parques Termales', 'gestionarParquesTermales'));
        $menu->addOpcion(new Opcion('Gestionar Usuarios', 'gestionarUsuarios'));
$menu->addOpcion(new Opcion('Gestionar Tipos de Entradas', 'gestionarTiposEntradas'));
return $menu;
    }

    static function getMenuParquesTermales()
{
        $menu = new Menu('Menu Parques Termales');
        $menu->addOpcion(new Opcion('Volver', '')); // Opción para volver al menú anterior
        $menu->addOpcion(new Opcion('Listar Parques Termales', 'listarParquesTermales'));
        $menu->addOpcion(new Opcion('Agregar Parque Termal', 'agregarParqueTermal'));
        $menu->addOpcion(new Opcion('Modificar Parque Termal', 'modificarParqueTermal'));
        $menu->addOpcion(new Opcion('Borrar Parque Termal', 'borrarParqueTermal'));
return $menu;
    }

    static function getMenuUsuarios()
{
        $menu = new Menu('Menu Usuarios');
        $menu->addOpcion(new Opcion('Volver', ''));
        $menu->addOpcion(new Opcion('Listar Usuarios', 'listarUsuarios'));
        $menu->addOpcion(new Opcion('Agregar Usuario', 'agregarUsuario'));
        $menu->addOpcion(new Opcion('Modificar Usuario', 'modificarUsuario'));
        $menu->addOpcion(new Opcion('Borrar Usuario', 'borrarUsuario'));
return $menu;
    }

    static function getMenuTiposEntradas()
{
        $menu = new Menu('Menu Tipos de Entradas');
        $menu->addOpcion(new Opcion('Volver', ''));
        $menu->addOpcion(new Opcion('Listar Tipos de Entradas', 'listarTiposEntradas'));
        $menu->addOpcion(new Opcion('Agregar Tipo de Entrada', 'agregarTipoEntrada'));
        $menu->addOpcion(new Opcion('Modificar Tipo de Entrada', 'modificarTipoEntrada'));
        $menu->addOpcion(new Opcion('Borrar Tipo de Entrada', 'borrarTipoEntrada'));
        return $menu;
    }
}
?>

