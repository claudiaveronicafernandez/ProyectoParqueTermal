<?php
require_once('./ParqueTermal.php');
require_once('./Usuario.php');
require_once('./TipoEntrada.php');

class DB
{
    private $parquesTermales = [];
    private $usuarios = [];
    private $tiposEntradas = [];

    // --- Métodos para Parque Termal ---
    function agregarParqueTermal($parque)
    {
        $this->parquesTermales[] = $parque;
    }

    function getParquesTermales()
    {
        return $this->parquesTermales;
    }

    function buscarParqueTermalPorNombre($nombre)
    {
        foreach ($this->parquesTermales as $parque) {
            if (mb_strtolower($parque->getNombre()) == mb_strtolower($nombre)) {
                return $parque;
            }
        }
        return null;
    }

    function buscarIndiceParqueTermalPorNombre($nombre)
{
        $indice = 0;
        foreach ($this->parquesTermales as $parque) {
            if (mb_strtolower($parque->getNombre()) == mb_strtolower($nombre)) {
                return $indice;
}
            $indice++;
        }
        return null;
    }

    function borrarParqueTermalPorNombre($nombre)
    {
        $indice = $this->buscarIndiceParqueTermalPorNombre($nombre);
        if ($indice !== null) {
array_splice($this->parquesTermales, $indice, 1);
            return true;
        } else {
            return false;
}
    }

    // --- Métodos para Usuarios ---
    function agregarUsuario($usuario)
    {
        $this->usuarios[] = $usuario;
    }

    function getUsuarios()
{
        return $this->usuarios;
    }

    function buscarUsuarioPorDNI($dni)
    {
        foreach ($this->usuarios as $usuario) {
            if ($usuario->getDni() == $dni) {
                return $usuario;
            }
        }
        return null;
    }

    function buscarIndiceUsuarioPorDNI($dni)
    {
        $indice = 0;
        foreach ($this->usuarios as $usuario) {
            if ($usuario->getDni() == $dni) {
                return $indice;
            }
            $indice++;
        }
        return null;
    }

    function borrarUsuarioPorDNI($dni)
    {
        $indice = $this->buscarIndiceUsuarioPorDNI($dni);
        if ($indice !== null) {
            array_splice($this->usuarios, $indice, 1);
            return true;
        } else {
            return false;
}
    }

    // --- Métodos para Tipos de Entradas ---
    function agregarTipoEntrada($tipoEntrada)
    {
        $this->tiposEntradas[] = $tipoEntrada;
}

    function getTiposEntradas()
    {
        return $this->tiposEntradas;
}

    function buscarTipoEntradaPorNombre($nombre)
    {
        foreach ($this->tiposEntradas as $tipoEntrada) {
if (mb_strtolower($tipoEntrada->getNombre()) == mb_strtolower($nombre)) {
                return $tipoEntrada;
            }
        }
        return null;
}

    function buscarIndiceTipoEntradaPorNombre($nombre)
    {
        $indice = 0;
        foreach ($this->tiposEntradas as $tipoEntrada) {
if (mb_strtolower($tipoEntrada->getNombre()) == mb_strtolower($nombre)) {
                return $indice;
}
            $indice++;
        }
        return null;
    }

    function borrarTipoEntradaPorNombre($nombre)
    {
        $indice = $this->buscarIndiceTipoEntradaPorNombre($nombre);
        if ($indice !== null) {
array_splice($this->tiposEntradas, $indice, 1);
            return true;
        } else {
            return false;
        }
    }
}


