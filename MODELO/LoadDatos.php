<?php
require_once('./db/DB.php');
require_once('./ParqueTermal.php');
require_once('./Usuario.php');
require_once('./TipoEntrada.php');

$db = new DB();

// Datos de ejemplo para Parque Termal
$db->agregarParqueTermal(new ParqueTermal('Termas de Cacheuta', 'Ruta Provincial 82 Km 38', 'Luján de Cuyo', '261-490-1234', 'info@termascacheuta.com.ar', 500));
$db->agregarParqueTermal(new ParqueTermal('Termas de Reyes', 'Ruta 9 Km 23', 'Reyes', '388-426-5678', 'contacto@termasreyes.com', 300));

// Datos de ejemplo para Usuarios
$db->agregarUsuario(new Usuario("Pérez", "Juan", "12345678", 30, "1994-05-10", "Mendoza"));
$db->agregarUsuario(new Usuario("González", "Ana", "87654321", 25, "1999-01-15", "Salta"));
$db->agregarUsuario(new Usuario("Rodríguez", "Carlos", "98765432", 65, "1959-11-20", "Jujuy"));
$db->agregarUsuario(new Usuario("López", "María", "11223344", 8, "2016-03-01", "Mendoza"));
$db->agregarUsuario(new Usuario("Fernández", "Laura", "55667788", 1, "2024-02-28", "Salta")); // Menor de 2 años
$db->agregarUsuario(new Usuario("Díaz", "Pedro", "99001122", 40, "1984-07-07", "Jujuy"));
$db->agregarUsuario(new Usuario("Gómez", "Lucía", "33445566", 20, "2004-09-12", "Mendoza"));
$db->agregarUsuario(new Usuario("Martínez", "Sofía", "77889900", 12, "2012-04-25", "Salta")); // Menor de 3 a 17 años
$db->agregarUsuario(new Usuario("Sánchez", "Diego", "44556677", 70, "1954-06-18", "Jujuy")); // Adulto mayor

// Datos de ejemplo para Tipos de Entradas
$db->agregarTipoEntrada(new TipoEntrada('Menores de 2 años'));
$db->agregarTipoEntrada(new TipoEntrada('CUD (Certificado Único de Discapacidad)'));
$db->agregarTipoEntrada(new TipoEntrada('Menores de 3 a 17 años'));
$db->agregarTipoEntrada(new TipoEntrada('Adultos de 18 a 59 años'));
$db->agregarTipoEntrada(new TipoEntrada('Adultos Mayores de 60 años o más'));

?>

