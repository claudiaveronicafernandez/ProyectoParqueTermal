<?php

class ParqueTermal
{
    static $ultimoId = 0;

    private $id;
    private $nombre;
    private $ubicacion;
    private $localidad;
    private $numero;
    private $mail;
    private $capacidad;

    function __construct($nombre, $ubicacion, $localidad, $numero, $mail, $capacidad)
    {
        ParqueTermal::$ultimoId++;
        $this->id = ParqueTermal::$ultimoId;
        $this->nombre = $nombre;
        $this->ubicacion = $ubicacion;
        $this->localidad = $localidad;
        $this->numero = $numero;
$this->mail = $mail;
        $this->capacidad = $capacidad;
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

    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;
        return $this;
    }

    public function getLocalidad()
    {
        return $this->localidad;
    }

    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;
        return $this;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
        return $this;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
        return $this;
    }

    public function getCapacidad()
    {
        return $this->capacidad;
    }

    public function setCapacidad($capacidad)
    {
        $this->capacidad = $capacidad;
        return $this;
    }

    public function __toString()
    {
        $salida = "Id: " . $this->getId() .
" | Nombre: " . $this->getNombre() .
            " | Ubicación: " . $this->getUbicacion() .
" | Localidad: " . $this->getLocalidad() .
            " | Teléfono: " . $this->getNumero() .
            " | Email: " . $this->getMail() .
            " | Capacidad: " . $this->getCapacidad();
        return $salida;
    }
}


