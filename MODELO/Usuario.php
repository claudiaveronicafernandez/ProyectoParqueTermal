<?php

class Usuario
{
    static $ultimoId = 0;

    private $id;
private $apellido;
    private $nombre;
    private $dni;
    private $edad;
    private $nacimiento; // Fecha de nacimiento (ej. YYYY-MM-DD)
    private $localidad;

    function __construct($apellido, $nombre, $dni, $edad, $nacimiento, $localidad)
    {
        Usuario::$ultimoId++;
        $this->id = Usuario::$ultimoId;
        $this->apellido = $apellido;
        $this->nombre = $nombre;
$this->dni = $dni;
        $this->edad = $edad;
$this->nacimiento = $nacimiento;
        $this->localidad = $localidad;
}

    public function getId()
    {
        return $this->id;
    }

    public function getApellido()
    {
        return $this->apellido;
}

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
return $this;
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

    public function getDni()
    {
        return $this->dni;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;
        return $this;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
        return $this;
    }

    public function getNacimiento()
    {
        return $this->nacimiento;
}

    public function setNacimiento($nacimiento)
    {
        $this->nacimiento = $nacimiento;
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

    public function __toString()
    {
        $salida = "Id: " . $this->getId() .
" | Apellido: " . $this->getApellido() .
            " | Nombre: " . $this->getNombre() .
" | DNI: " . $this->getDni() .
            " | Edad: " . $this->getEdad() .
" | Nacimiento: " . $this->getNacimiento() .
            " | Localidad: " . $this->getLocalidad();
        return $salida;
    }
}


