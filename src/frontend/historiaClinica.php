<?php

include("../conexionBD/conexion.php");


$pac_id = $_GET['id'];
$sqlPaciente = "SELECT p.pac_documento, p.pac_nombre, p.pac_apellido, p.pac_telefono, g.gen_nombre, e.estr_nombre FROM paciente p
    JOIN generos g ON p.gen_id = g.gen_id
    JOIN estratos e ON p.estr_id = e.estr_id where pac_id =$pac_id";
$consultaPaciente = mysqli_query($conectar, $sqlPaciente);
$fila = mysqli_fetch_array($consultaPaciente);
include("pagPrincipal.php")
?>


<div class="container mt-3 justify-content-center text-center">
    <h1>Historia Clinica</h1>
    <div class="mb-3 row">
        <div class="mb-3 col-4 row">
            <span class="fw-bold">Documento</span>
            <span><?php echo $fila['pac_documento']; ?></span>
        </div>
        <div class="mb-3 col-4 row">
            <span class="fw-bold">Nombre</span>
            <span><?php echo $fila['pac_nombre']; ?></span>
        </div>
        <div class="mb-3 col-4 row">
            <span class="fw-bold">Apellido</span>
            <span><?php echo $fila['pac_apellido']; ?></span>
        </div>
        <div class="mb-3 col-4 row">
            <span class="fw-bold">Telefono</span>
            <span><?php echo $fila['pac_telefono']; ?></span>
        </div>
        <div class="mb-3 col-4 row">
            <span class="fw-bold">Genero</span>
            <span><?php echo $fila['gen_nombre']; ?></span>
        </div>
        <div class="mb-3 col-4 row">
            <span class="fw-bold">Estrato</span>
            <span><?php echo $fila['estr_nombre']; ?></span>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="mb-3 text-start">
            <label for="exampleFormControlTextarea1" class="form-label">Motivo de la Visita</label>
            <textarea class="form-control" id="" rows="3"></textarea>
        </div>
    </div>
</div>