<?php

include("../conexionBD/conexion.php");
// Si recibe AJAX para traer solo 1 historia
if (isset($_POST['hist_id'])) {
    $hist_id = intval($_POST['hist_id']);

    $sql2 = "SELECT h.hist_motv, h.hist_esfod, h.hist_cilod, h.hist_ejeod, h.hist_esfoi, h.hist_ciloi, h.hist_ejeoi, h.hist_diaod, h.hist_diaoi, h.hist_recom, p.pac_nombre, p.pac_apellido, g.gen_nombre FROM historias h JOIN paciente p ON h.pac_id = p.pac_id JOIN generos g ON p.gen_id = g.gen_id WHERE h.hist_id = $hist_id";

    $result = mysqli_query($conectar, $sql2);
    $data = mysqli_fetch_assoc($result);

    if ($data) {
        header('Content-Type: application/json');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    } else {
        echo "No se encontró la historia clínica.";
    }
    exit; // ⚡ Muy importante para no renderizar el resto del HTML
}




$sql = "SELECT h.hist_id, h.hist_motv, h.hist_recom, p.pac_nombre,p.pac_apellido, g.gen_nombre FROM historias h
    JOIN paciente p ON h.pac_id = p.pac_id
    JOIN generos g ON p.gen_id = g.gen_id ORDER BY h.hist_id ASC";
$consultar = mysqli_query($conectar, $sql);

include("pagPrincipal.php");

?>
<div class="container-fluid mt-3">
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th scope="col">No. Historia</th>
                <th scope="col">NOMBRE DE PACIENTE</th>
                <th scope="col">MOTIVO DE VISITA</th>
                <th scope="col">RECOMENDACIONES</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($filas = mysqli_fetch_array($consultar)) {
            ?>
                <tr>
                    <td class="align-middle"><?php echo $filas['hist_id'] ?></td>
                    <td class="align-middle"><?php echo $filas['pac_nombre'] . " " . $filas['pac_apellido'] ?></td>
                    <td class="align-middle"><?php echo $filas['hist_motv'] ?></td>
                    <td class="align-middle"><?php echo $filas['hist_recom'] ?></td>
                    <td class="align-middle">
                        <button type="button"
                            class="btn btn-primary verHistoriaBtn"
                            data-historia="<?php echo $filas["hist_id"] ?>"
                            data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Ver Historia
                        </button>

                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Informacion Historia Clinica</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row mb-3">
                    <div class="col">
                        <strong>No. Historia </strong><span id="histID"></span>
                    </div>
                    <div class="col">
                        <strong>Paciente </strong><span id="nombre"></span>
                    </div>
                    <div class="col">
                        <strong>Genero </strong><span id="genero"></span>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-md-4">
                        <label class="form-label" for="motivoV"><strong>Motivo de Visita</strong></label>
                    </div>
                    <textarea class="form-control" rows="3 " placeholder="Motivo Visita" name="motivoV" id="motivoV" readonly></textarea>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label" for="esferaOD"><strong>Esfera OD</strong></label>
                        <input type="text" class="form-control" placeholder="Esfera ojo derecho" id="esferaOD" name="esferaOD" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="cilindroOD"><strong>Cilindro OD</strong></label>
                        <input type="text" class="form-control" placeholder="Cilindro ojo derecho" id="cilindroOD" name="cilindroOD" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="ejeOD"><strong>Eje OD</strong></label>
                        <input type="text" class="form-control" placeholder="Eje ojo derecho" id="ejeOD" name="ejeOD" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label" for="esferaOI"><strong>Esfera OI</strong></label>
                        <input type="text" class="form-control" placeholder="Esfera ojo izquierdo" id="esferaOI" name="esferaOI" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="cilindroOI"><strong>Cilindro OI</strong></label>
                        <input type="text" class="form-control" placeholder="Cilindro ojo izquierdo" id="cilindroOI" name="cilindroOI" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="ejeOI"><strong>Eje OI</strong></label>
                        <input type="text" class="form-control" placeholder="Eje ojo izquierdo" id="ejeOI" name="ejeOI" readonly>
                    </div>
                </div>


                <div class="row mb-3 justify-content-between">
                    <div class="col-md-4">
                        <label class="form-label" for="diagnosticoOD"><strong>Diagnostico Ojo Derecho</strong></label>
                        <input type="text" class="form-control" placeholder="Ojo derecho" id="diagnosticoOD" name="diagnosticoOD" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="diagnosticoOI"><strong>Diagnostico Ojo Izquierdo</strong></label>
                        <input type="text" class="form-control" placeholder="Ojo izquierdo" id="diagnosticoOI" name="diagnosticoOI" readonly>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="recomendaciones"><strong>Recomendaciones</strong></label>
                    <textarea class="form-control" rows="3" placeholder="Digite las recomendaciones..." id="recomendaciones" name="recomendaciones" readonly></textarea>
                </div>
            </div>
        </div>
    </div>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const botones = document.querySelectorAll(".verHistoriaBtn");

            botones.forEach(boton => {
                boton.addEventListener("click", function() {
                    let hist_id = this.getAttribute("data-historia");

                    let noHistoria = document.getElementById("histID");
                    let nombre = document.getElementById("nombre");
                    let genero = document.getElementById("genero");

                    let motivoVisita = document.getElementById("motivoV");
                    let esferaOD = document.getElementById("esferaOD");
                    let cilindroOD = document.getElementById("cilindroOD");
                    let ejeOD = document.getElementById("ejeOD");
                    let diagnosticoOD = document.getElementById("diagnosticoOD");

                    let esferaOI = document.getElementById("esferaOI");
                    let cilindroOI = document.getElementById("cilindroOI");
                    let ejeOI = document.getElementById("ejeOI");
                    let diagnosticoOI = document.getElementById("diagnosticoOI");
                    let recomendaciones = document.getElementById("recomendaciones");


                    fetch("", { // mismo archivo
                            method: "POST",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded"
                            },
                            body: "hist_id=" + hist_id
                        })
                        .then(response => response.text())
                        .then(data => {
                            let d = JSON.parse(data);
                            noHistoria.textContent = hist_id;
                            nombre.textContent = d.pac_nombre + " " + d.pac_apellido;
                            genero.textContent = d.gen_nombre;
                            motivoVisita.value = d.hist_motv;
                            esferaOD.value = d.hist_esfod;
                            cilindroOD.value = d.hist_cilod;
                            ejeOD.value = d.hist_ejeod;
                            esferaOI.value = d.hist_esfoi;
                            cilindroOI.value = d.hist_ciloi;
                            ejeOI.value = d.hist_ejeoi;
                            diagnosticoOD.value = d.hist_diaod;
                            diagnosticoOI.value = d.hist_diaoi;
                            recomendaciones.value = d.hist_recom;
                        })
                        .catch(error => {
                            document.getElementById("historiaContent").innerHTML = "Error al cargar.";
                            console.error(error);
                        });
                });
            });
        });
    </script>