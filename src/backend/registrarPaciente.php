<?php
include("../conexionBD/conexion.php");

$documento = $_POST['documento'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$hobbies = $_POST['hobbies'];
$genero = $_POST['genero'];
$estrato = $_POST['estrato'];



$sql = "insert into paciente (pac_documento, pac_nombre, pac_apellido , pac_direccion, pac_telefono, pac_email, gen_id,estr_id) values ($documento, '$nombre', '$apellido', '$direccion', $telefono,'$correo', $genero, $estrato);";
$consulta = mysqli_query($conectar, $sql);

$sqlPac = "select pac_id from paciente where pac_documento = $documento";
$consultaPac = mysqli_query($conectar, $sqlPac);
$id = mysqli_fetch_array($consultaPac);

$id = $id["pac_id"];

foreach ($hobbies as $hob_id) {
    $sqlHob = "insert into paciente_hobbies (pac_id, hob_id) values ($id, $hob_id);";
    $consultaHob = mysqli_query($conectar, $sqlHob);
}

if ($consulta && $consultaPac && $consultaHob) {
    echo "<script>
            alert('Paciente registrado exitosamente.');
            window.location.href = '../frontend/pagPrincipal.php';
        </script>";
} else {
    echo "<script>
            alert('Error al registrar el paciente.');
            window.location.href = '../frontend/registrarPaciente.php';
        </script>";
}
