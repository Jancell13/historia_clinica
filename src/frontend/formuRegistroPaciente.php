<<<<<<< HEAD
<?php

include("../conexionBD/conexion.php");

$sqlGen = "select gen_id, gen_nombre from generos";
$consultarGen = mysqli_query($conectar, $sqlGen);
$sqlEst = "select estr_id, estr_nombre from estratos";
$consultarEst = mysqli_query($conectar, $sqlEst);
$sqlHob = "select hob_id, hob_nombre from hobbies";
$consultarHob = mysqli_query($conectar, $sqlHob);

?>

<?php
include("pagPrincipal.php");
?>
<div class="container mt-3">
    <h1>Registro de Paciente</h1>
    <form action="../backend/registrarPaciente.php" method="post">
        <div class="row row-cols-2 justify-content-center text-center">
            <div class="mb-3 col-4">
                <label for="documento">Documento</label>
                <input type="text" class="form-control" placeholder="Documento de Identidad" aria-label="documento" name="documento" id="documento">
            </div>
            <div class="mb-3 col-4">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" placeholder="Nombre del Paciente" aria-label="nombre" name="nombre" id="nombre">
            </div>
            <div class="mb-3 col-4">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" placeholder="Apellido del Paciente" aria-label="apellido" name="apellido" id="apellido">
            </div>
            <div class="mb-3 col-4">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" placeholder="Dirección" aria-label="direccion" name="direccion" id="direccion">
            </div>
            <div class="mb-3 col-4">
                <label for="telefono">Telefono</label>
                <input type="tel" class="form-control" placeholder="Telefono" aria-label="telefono" name="telefono" id="telefono" minlength="10" maxlength="12" pattern="\d*">
            </div>
            <div class="mb-3 col-4">
                <label for="correo">Correo</label>
                <input type="email" class="form-control" placeholder="Correo" aria-label="correo" name="correo" id="correo">
            </div>
            <div class="mb-3 col-4">
                Hobbies
                <?php
                while ($dato = mysqli_fetch_array($consultarHob)) {
                ?>
                    <div class="form-check d-flex justify-content-center gap-2">
                        <input class="form-check-input" type="checkbox" id="<?php echo $dato["hob_nombre"] ?>" name="hobbies[]" value="<?php echo $dato["hob_id"] ?>">
                        <label class=" form-check-label" for="<?php echo $dato["hob_nombre"] ?>">
                            <?php echo $dato["hob_nombre"] ?>
                        </label>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="mb-3 col-4">
                <label for="rol">Genero</label>
                <select name="genero" class="form-select">
                    <option selected>-- Seleccione una opción --</option>
                    <?php
                    while ($dato = mysqli_fetch_array($consultarGen)) {
                    ?>
                        <option value=<?php echo $dato["gen_id"] ?>> <?php echo $dato["gen_nombre"] ?> </option>

                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3 col-4">
                Estrato
                <?php
                while ($dato = mysqli_fetch_array($consultarEst)) {
                ?>
                    <div class="form-check d-flex justify-content-center gap-2">
                        <input class="form-check-input" type="radio" id="<?php echo $dato["estr_nombre"] ?>" name="estrato" value="<?php echo $dato["estr_id"] ?>">
                        <label class=" form-check-label" for="<?php echo $dato["estr_nombre"] ?>">
                            <?php echo $dato["estr_nombre"] ?>
                        </label>
                    </div>
                <?php
                }
                ?>

            </div>
            <div class="col-12 justify-content-center text-center">
                <input type="submit" class="btn custom-bg" value="Registrar Paciente">
            </div>
        </div>
    </form>
</div>
<?php
include("../backend/valiDatosPac.php");
=======
<?php

include("../conexionBD/conexion.php");

$sqlGen = "select gen_id, gen_nombre from generos";
$consultarGen = mysqli_query($conectar, $sqlGen);
$sqlEst = "select estr_id, estr_nombre from estratos";
$consultarEst = mysqli_query($conectar, $sqlEst);
$sqlHob = "select hob_id, hob_nombre from hobbies";
$consultarHob = mysqli_query($conectar, $sqlHob);

?>

<?php
include("pagPrincipal.php");
?>
<div class="container mt-3">
    <h1>Registro de Paciente</h1>
    <form action="../backend/registrarPaciente.php" method="post">
        <div class="row row-cols-2 justify-content-center text-center">
            <div class="mb-3 col-4">
                <label for="documento">Documento</label>
                <input type="text" class="form-control" placeholder="Documento de Identidad" aria-label="documento" name="documento" id="documento">
            </div>
            <div class="mb-3 col-4">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" placeholder="Nombre del Paciente" aria-label="nombre" name="nombre" id="nombre">
            </div>
            <div class="mb-3 col-4">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" placeholder="Apellido del Paciente" aria-label="apellido" name="apellido" id="apellido">
            </div>
            <div class="mb-3 col-4">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" placeholder="Dirección" aria-label="direccion" name="direccion" id="direccion">
            </div>
            <div class="mb-3 col-4">
                <label for="telefono">Telefono</label>
                <input type="tel" class="form-control" placeholder="Telefono" aria-label="telefono" name="telefono" id="telefono" minlength="10" maxlength="12" pattern="\d*">
            </div>
            <div class="mb-3 col-4">
                <label for="correo">Correo</label>
                <input type="email" class="form-control" placeholder="Correo" aria-label="correo" name="correo" id="correo">
            </div>
            <div class="mb-3 col-4">
                Hobbies
                <?php
                while ($dato = mysqli_fetch_array($consultarHob)) {
                ?>
                    <div class="form-check d-flex justify-content-center gap-2">
                        <input class="form-check-input" type="checkbox" id="<?php echo $dato["hob_nombre"] ?>" name="hobbies[]" value="<?php echo $dato["hob_id"] ?>">
                        <label class=" form-check-label" for="<?php echo $dato["hob_nombre"] ?>">
                            <?php echo $dato["hob_nombre"] ?>
                        </label>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="mb-3 col-4">
                <label for="rol">Genero</label>
                <select name="genero" class="form-select">
                    <option selected>-- Seleccione una opción --</option>
                    <?php
                    while ($dato = mysqli_fetch_array($consultarGen)) {
                    ?>
                        <option value=<?php echo $dato["gen_id"] ?>> <?php echo $dato["gen_nombre"] ?> </option>

                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3 col-4">
                Estrato
                <?php
                while ($dato = mysqli_fetch_array($consultarEst)) {
                ?>
                    <div class="form-check d-flex justify-content-center gap-2">
                        <input class="form-check-input" type="radio" id="<?php echo $dato["estr_nombre"] ?>" name="estrato" value="<?php echo $dato["estr_id"] ?>">
                        <label class=" form-check-label" for="<?php echo $dato["estr_nombre"] ?>">
                            <?php echo $dato["estr_nombre"] ?>
                        </label>
                    </div>
                <?php
                }
                ?>

            </div>
            <div class="col-12 justify-content-center text-center">
                <input type="submit" class="btn custom-bg" value="Registrar Paciente">
            </div>
        </div>
    </form>
</div>
<?php
include("../backend/valiDatosPac.php");
>>>>>>> 27205a8 (crear historia)
