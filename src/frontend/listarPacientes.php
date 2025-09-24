<?php
include("../conexionBD/conexion.php");
$sql = "SELECT p.pac_id, p.pac_documento, p.pac_nombre, p.pac_apellido, p.pac_telefono, g.gen_nombre, e.estr_nombre FROM paciente p
    JOIN generos g ON p.gen_id = g.gen_id
    JOIN estratos e ON p.estr_id = e.estr_id where pac_estado =1";
$consultar = mysqli_query($conectar, $sql);

include("pagPrincipal.php");
?>
<div class="container-fluid mt-3">
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th scope="col">Documento</th>
                <th scope="col">Nombre Paciente</th>
                <th scope="col">Telefono</th>
                <th scope="col">Genero</th>
                <th scope="col">Estrato</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($filas = mysqli_fetch_array($consultar)) {
            ?>
                <tr>
                    <td class="align-middle"><?php echo $filas['pac_documento'] ?></td>
                    <td class="align-middle"><?php echo $filas['pac_nombre'] . " " . $filas['pac_apellido'] ?></td>
                    <td class="align-middle"><?php echo $filas['pac_telefono'] ?></td>
                    <td class="align-middle"><?php echo $filas['gen_nombre'] ?></td>
                    <td class="align-middle"><?php echo $filas['estr_nombre'] ?></td>
                    <td class="align-middle">
                        <a class="btn btn-info " href="historiaClinica.php?id=<?php echo $filas["pac_id"] ?>">Crear Historia</a>
                        <a class="btn btn-warning edit mx-4" href="formuEditarPaciente.php?id=<?php echo $filas["pac_id"] ?>">Editar</a>
                        <a class="btn btn-danger" href="anularPaciente.php?id=<?php echo $filas["pac_id"] ?>">Anular</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</div>
<script>
    document.addEventListener("click", function(e) {
        if (e.target.tagName === "A" && e.target.textContent.trim() === "Anular") {
            e.preventDefault();
            let userConfirmation = confirm("Realmente desea anular al paciente. Esta acción no se puede deshacer...");
            if (userConfirmation) {
                window.location.href = e.target.href;
            } else {
                console.log("User canceled the action.");
            }
        }
    });
</script>