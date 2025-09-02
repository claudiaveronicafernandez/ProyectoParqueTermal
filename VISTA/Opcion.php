<?php
class Opcion
{
    private $nombre;
    private $funcion;

    function __construct($nombre, $funcion)
    {
        $this->nombre = $nombre;
        $this->funcion = $funcion;
}

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getFuncion()
    {
        return $this->funcion;
}
public function setFuncion($funcion) {
    $this->funcion = $funcion;
}
}
?>

