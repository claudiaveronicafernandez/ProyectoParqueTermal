<?php

function mostrar($texto)
{
    echo $texto . "\n";
}

function leer($mensaje = "", $defaultValue = "")
{
    echo ($mensaje);
    $x = trim(fgets(STDIN));
return $x === '' ? $defaultValue : $x;
}
?>

