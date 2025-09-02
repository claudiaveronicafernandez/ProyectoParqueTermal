<?php

class TipoEntrada
{
    static $ultimoId = 0;

    private $id;
    private $nombre; // Ej. "Menores de 2 años", "CUD", "Adultos de 18 a 59 años"

    function __construct($nombre)
    {
        TipoEntrada::$ultimoId++;
        $this->id = TipoEntrada::$ultimoId;
        $this->nombre = $nombre;
}

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
}

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
return $this;
    }

    public function __toString()
{
        $salida = "Id: " . $this->getId() . " | Tipo: " . $this->getNombre();
        return $salida;
    }
}


