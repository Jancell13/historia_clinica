<?php
include("../conexionBD/conexion.php");

$cedula = $_POST['documento'];
$pass = $_POST['clave'];
$rol = $_POST['rol'];

$sql = "SELECT usu_docum, usu_nombre, usu_apellido, usu_clave, roles.rol_id, rol_nombre FROM `usuarios` join roles on usuarios.rol_id = roles.rol_id where usu_docum = $cedula;";

$consulta = mysqli_query($conectar, $sql);
$fila = mysqli_fetch_array($consulta);

if ($fila) {
    if ($fila["usu_clave"] == $pass && $fila["rol_id"] == $rol) {
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['nombre'] = $fila["usu_nombre"];
        $_SESSION['apellido'] = $fila["usu_apellido"];
        $_SESSION['rol'] = $fila["rol_nombre"];
?>
        <script>
            alert("Bienvenido " + "<?php echo $_SESSION["nombre"] . " " . $_SESSION["apellido"]; ?>");
            window.location.href = "../frontend/pagPrincipal.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Credenciales de acceso incorrectas. Intente nuevamente.");
            window.location.href = "../frontend/login.php";
        </script>
    <?php
    }
} else {
    ?>
    <script>
        alert("Usuario no existente en la base de datos.");
        window.location.href = "../frontedn/login.php";
    </script>
<?php
}
