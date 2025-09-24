<?php
include("bootstrap.php");

session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit();
}
?>
<link rel="stylesheet" href="../css/style.css">
<nav class="navbar bg-c">
    <div class="container-fluid">
        <span class="navbar-brand fw-medium">Bienvenido a la Óptica Sena</span>
        <div class="align-items-center d-flex gap-3">
            <span class="navbar-text fw-bold">Usuario conectado: <?php echo $_SESSION["nombre"] . " " . $_SESSION["apellido"] . " - Rol: " . $_SESSION["rol"]; ?></span>
            <a class="btn btn-dark" href="cerrarSesion.php">Cerrar Sesión</a>

        </div>
    </div>
</nav>
<div class="container-fluid mt-3 mb-3">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menu Pacientes
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="formuRegistroPaciente.php">Registrar Paciente</a></li>
            <li><a class="dropdown-item" href="listarPacientes.php">Consultar Pacientes</a></li>
            <li><a class="dropdown-item" href="listarHistorias.php">Consultar Historias</a></li>
        </ul>
    </div>
</div>
<hr class="border-secondary my-3">