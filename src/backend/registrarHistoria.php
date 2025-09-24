<?php
include("../conexionBD/conexion.php");

$pac_id = $_GET['id'];

$motivo = $_POST['motivoVisita'];

$esferaOD = $_POST['esferaOD'];
$cilindroOD = $_POST['cilindroOD'];
$ejeOD = $_POST['ejeOD'];
$diagnosticoOD = $_POST['diagnosticoOD'];

$esferaOI = $_POST['esferaOI'];
$cilindroOI = $_POST['cilindroOI'];
$ejeOI = $_POST['ejeOI'];
$diagnosticoOI = $_POST['diagnosticoOI'];

$recomendaciones = $_POST['recomendaciones'];

$sql = "insert into historias (hist_motv, hist_esfod, hist_cilod, hist_ejeod, hist_esfoi, hist_ciloi, hist_ejeoi, hist_diaod, hist_diaoi, hist_recom, pac_id) values ('$motivo', '$esferaOD', '$cilindroOD', '$ejeOD', '$esferaOI', '$cilindroOI', '$ejeOI', '$diagnosticoOD', '$diagnosticoOI', '$recomendaciones', $pac_id);";

$consulta = mysqli_query($conectar, $sql);

if ($consulta) {
    echo "<script>
            alert('Historia registrada exitosamente.');
            window.location.href = '../frontend/pagPrincipal.php';
        </script>";
} else {
    echo "<script>
            alert('Error al registrar la historia.');
            window.location.href = '../frontend/.php';
        </script>";
}
