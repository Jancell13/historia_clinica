<<<<<<< HEAD
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

$sqlPac = "SELECT pac_id FROM paciente WHERE pac_documento = $documento";
$consultaPac = mysqli_query($conectar, $sqlPac);
$id = mysqli_fetch_array($consultaPac);

$id = $id["pac_id"];

$sqlUpdate = "UPDATE paciente SET pac_nombre = '$nombre', pac_apellido = '$apellido', pac_direccion = '$direccion', pac_telefono = $telefono, pac_email = '$correo', gen_id = $genero, estr_id = $estrato WHERE pac_id = $id";
mysqli_query($conectar, $sqlUpdate);

$sqlDel = "DELETE FROM paciente_hobbies WHERE pac_id = $id";
mysqli_query($conectar, $sqlDel);

foreach ($hobbies as $hob_id) {
    $sqlHob = "INSERT INTO paciente_hobbies (pac_id, hob_id) VALUES ($id, $hob_id)";
    mysqli_query($conectar, $sqlHob);
}
echo "<script>
    alert('Paciente actualizado exitosamente.');
    window.location.href = '../frontend/pagPrincipal.php';
</script>";
=======
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

$sqlPac = "SELECT pac_id FROM paciente WHERE pac_documento = $documento";
$consultaPac = mysqli_query($conectar, $sqlPac);
$id = mysqli_fetch_array($consultaPac);

$id = $id["pac_id"];

$sqlUpdate = "UPDATE paciente SET pac_nombre = '$nombre', pac_apellido = '$apellido', pac_direccion = '$direccion', pac_telefono = $telefono, pac_email = '$correo', gen_id = $genero, estr_id = $estrato WHERE pac_id = $id";
mysqli_query($conectar, $sqlUpdate);

$sqlDel = "DELETE FROM paciente_hobbies WHERE pac_id = $id";
mysqli_query($conectar, $sqlDel);

foreach ($hobbies as $hob_id) {
    $sqlHob = "INSERT INTO paciente_hobbies (pac_id, hob_id) VALUES ($id, $hob_id)";
    mysqli_query($conectar, $sqlHob);
}
echo "<script>
    alert('Paciente actualizado exitosamente.');
    window.location.href = '../frontend/pagPrincipal.php';
</script>";
>>>>>>> 27205a8 (crear historia)
