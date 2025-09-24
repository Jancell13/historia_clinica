<?php

include("../conexionBD/conexion.php");


$pac_id = $_GET['id'];
$sqlPaciente = "SELECT p.pac_documento, p.pac_nombre, p.pac_apellido,p.pac_direccion, p.pac_telefono, g.gen_nombre, e.estr_nombre FROM paciente p
    JOIN generos g ON p.gen_id = g.gen_id
    JOIN estratos e ON p.estr_id = e.estr_id where pac_id =$pac_id";
$consultaPaciente = mysqli_query($conectar, $sqlPaciente);
$fila = mysqli_fetch_array($consultaPaciente);
include("pagPrincipal.php")
?>

<div class="container mt-3 d-flex justify-content-center">

    <div class="d-block justify-content-center text-center">

        <h3 class="mb-4">Historia Clinica</h3>

        <!-- Datos del paciente -->

        <div class="row mb-3">
            <div class="col-md-4"><strong>Documento</strong><br><?php echo $fila['pac_documento']; ?></div>
            <div class="col-md-4"><strong>Nombre</strong><br><?php echo $fila['pac_nombre'] . " " . $fila['pac_apellido'];  ?></div>
            <div class="col-md-4"><strong>Direccion</strong><br><?php echo $fila['pac_direccion']; ?></div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4"><strong>Telefono</strong><br><?php echo $fila['pac_telefono']; ?></div>
            <div class="col-md-4"><strong>Genero</strong><br><?php echo $fila['gen_nombre']; ?></div>
            <div class="col-md-4"><strong>Estrato</strong><br><?php echo $fila['estr_nombre']; ?></div>
        </div>


        <hr>

        <!-- Formulario -->
        <form action="../backend/registrarHistoria.php?id=<?php echo $pac_id ?>" method="POST">
            <!-- Motivo visita -->
            <div class="mb-3">
                <div class="col-md-4">
                    <label class="form-label" for="motivoVisita"><strong>Motivo de Visita</strong></label>
                </div>
                <textarea class="form-control" rows="3" placeholder="Motivo Visita" name="motivoVisita" maxlength="500"></textarea>
            </div>

            <!-- Ojo derecho -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label" for="esferaOD"><strong>Esfera OD</strong></label>
                    <input type="text" class="form-control" placeholder="Esfera ojo derecho" name="esferaOD">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="cilindroOD"><strong>Cilindro OD</strong></label>
                    <input type="text" class="form-control" placeholder="Cilindro ojo derecho" name="cilindroOD">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="ejeOD"><strong>Eje OD</strong></label>
                    <input type="text" class="form-control" placeholder="Eje ojo derecho" name="ejeOD">
                </div>
            </div>

            <!-- Ojo izquierdo -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label" for="esferaOI"><strong>Esfera OI</strong></label>
                    <input type="text" class="form-control" placeholder="Esfera ojo izquierdo" name="esferaOI">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="cilindroOI"><strong>Cilindro OI</strong></label>
                    <input type="text" class="form-control" placeholder="Cilindro ojo izquierdo" name="cilindroOI">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="ejeOI"><strong>Eje OI</strong></label>
                    <input type="text" class="form-control" placeholder="Eje ojo izquierdo" name="ejeOI">
                </div>
            </div>


            <!-- Diagnósticos -->
            <div class="row mb-3 justify-content-between">
                <div class="col-md-4">
                    <label class="form-label"><strong>Diagnostico Ojo Derecho</strong></label>
                    <input type="text" class="form-control" placeholder="Ojo derecho" name="diagnosticoOD">
                </div>
                <div class="col-md-4">
                    <label class="form-label"><strong>Diagnostico Ojo Izquierdo</strong></label>
                    <input type="text" class="form-control" placeholder="Ojo izquierdo" name="diagnosticoOI">
                </div>
            </div>

            <!-- Recomendaciones -->
            <div class="mb-3">
                <label class="form-label"><strong>Recomendaciones</strong></label>
                <textarea class="form-control" rows="3" placeholder="Digite las recomendaciones..." name="recomendaciones" maxlength="500"></textarea>
            </div>

            <!-- Botón -->
            <div class="col-md-4 text-center mx-auto">
                <button type="submit" class="btn custom-bg fw-bold">
                    Registrar Historia Clinica
                </button>
            </div>
        </form>

    </div>
</div>