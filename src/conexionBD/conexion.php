<?php
//Parametros de conexion a la bd
$server = "localhost";
$user = "root";
$password = "";
$bd = "historia_clinica";

$conectar = mysqli_connect($server, $user, $password, $bd);

if ($conectar) {
    /* echo "Conectado a la base de datos"; */
} else {
    echo "No conectado";
}
