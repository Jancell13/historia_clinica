<<<<<<< HEAD
<?php

include("../conexionBD/conexion.php");
$pac_id = $_GET['id'];
$sql = "UPDATE paciente SET pac_estado = 0 WHERE pac_id = $pac_id;";
$consultar = mysqli_query($conectar, $sql);

header("Location: ../frontend/listarPacientes.php");
=======
<?php

include("../conexionBD/conexion.php");
$pac_id = $_GET['id'];
$sql = "UPDATE paciente SET pac_estado = 0 WHERE pac_id = $pac_id;";
$consultar = mysqli_query($conectar, $sql);

header("Location: ../frontend/listarPacientes.php");
>>>>>>> 27205a8 (crear historia)
