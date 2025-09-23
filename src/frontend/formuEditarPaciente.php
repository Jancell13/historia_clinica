<<<<<<< HEAD
<?php

include("../conexionBD/conexion.php");

$sqlGen = "select gen_id, gen_nombre from generos";
$consultarGen = mysqli_query($conectar, $sqlGen);
$sqlEst = "select estr_id, estr_nombre from estratos";
$consultarEst = mysqli_query($conectar, $sqlEst);

$sqlHob = "select hob_id, hob_nombre from hobbies";
$consultarHob = mysqli_query($conectar, $sqlHob);
$pac_id = $_GET['id'];
$sqlPaciente = "SELECT pac_documento, pac_nombre, pac_apellido, pac_direccion, pac_telefono, pac_email, gen_id, estr_id FROM paciente WHERE pac_id = $pac_id;";
$consultaPaciente = mysqli_query($conectar, $sqlPaciente);
$fila = mysqli_fetch_array($consultaPaciente);

$sqlPacHob = "SELECT hob_id, pac_id FROM paciente_hobbies WHERE pac_id = $pac_id;";
$consultaPacHob = mysqli_query($conectar, $sqlPacHob);
$hobbiesPaciente = [];

while ($hob = mysqli_fetch_array($consultaPacHob)) {
    $hobbiesPaciente[] = $hob['hob_id'];
}
?>
<?php
include("pagPrincipal.php");
?>
<div class="container mt-3">
    <h1>Registro de Paciente</h1>
    <form action="../backend/editarPaciente.php" method="post">
        <div class="row row-cols-2 justify-content-center text-center">
            <div class="mb-3 col-4">
                <label for="documento">Documento</label>
                <input type="text" class="form-control" placeholder="Documento de Identidad" aria-label="documento" name="documento" id="documento" value="<?php echo $fila['pac_documento']; ?>" readonly>
            </div>
            <div class="mb-3 col-4">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" placeholder="Nombre del Paciente" aria-label="nombre" name="nombre" id="nombre" value="<?php echo $fila['pac_nombre'] ?>">
            </div>
            <div class="mb-3 col-4">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" placeholder="Apellido del Paciente" aria-label="apellido" name="apellido" id="apellido" value="<?php echo $fila['pac_apellido'] ?>">
            </div>
            <div class="mb-3 col-4">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" placeholder="Dirección" aria-label="direccion" name="direccion" id="direccion" value="<?php echo $fila['pac_direccion'] ?>" readonly>
            </div>
            <div class="mb-3 col-4">
                <label for="telefono">Telefono</label>
                <input type="tel" class="form-control" placeholder="Telefono" aria-label="telefono" name="telefono" id="telefono" minlength="10" maxlength="12" pattern="\d*" value="<?php echo $fila['pac_telefono'] ?>">
            </div>
            <div class="mb-3 col-4">
                <label for="correo">Correo</label>
                <input type="email" class="form-control" placeholder="Correo" aria-label="correo" name="correo" id="correo" value="<?php echo $fila['pac_email'] ?>" readonly>
            </div>
            <div class="mb-3 col-4">
                Hobbies
                <?php
                while ($dato = mysqli_fetch_array($consultarHob)) {
                    $checked = in_array($dato["hob_id"], $hobbiesPaciente) ? "checked" : "";
                ?>
                    <div class="form-check d-flex justify-content-center gap-2">
                        <input class="form-check-input" type="checkbox" id="<?php echo $dato["hob_nombre"] ?>" name="hobbies[]" value="<?php echo $dato["hob_id"] ?>" <?php echo $checked; ?>>
                        <label class="form-check-label" for="<?php echo $dato["hob_nombre"] ?>">
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
                    <option>-- Seleccione una opción --</option>
                    <?php
                    while ($dato = mysqli_fetch_array($consultarGen)) {
                        if ($dato["gen_id"] == $fila['gen_id']) {
                    ?>
                            <option value=<?php echo $dato["gen_id"] ?> selected> <?php echo $dato["gen_nombre"] ?> </option>
                        <?php
                        } else {
                        ?>
                            <option value=<?php echo $dato["gen_id"] ?>> <?php echo $dato["gen_nombre"] ?> </option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3 col-4">
                Estrato
                <?php
                while ($dato = mysqli_fetch_array($consultarEst)) {
                    if ($dato["estr_id"] == $fila['estr_id']) {
                ?>
                        <div class="form-check d-flex justify-content-center gap-2">
                            <input class="form-check-input" type="radio" id="<?php echo $dato["estr_nombre"] ?>" name="estrato" value="<?php echo $dato["estr_id"] ?>" checked>
                            <label class=" form-check-label" for="<?php echo $dato["estr_nombre"] ?>">
                                <?php echo $dato["estr_nombre"] ?>
                            </label>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="form-check d-flex justify-content-center gap-2">
                            <input class="form-check-input" type="radio" id="<?php echo $dato["estr_nombre"] ?>" name="estrato" value="<?php echo $dato["estr_id"] ?>">
                            <label class=" form-check-label" for="<?php echo $dato["estr_nombre"] ?>">
                                <?php echo $dato["estr_nombre"] ?>
                            </label>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <div class="col-12 justify-content-center text-center">
                <input type="submit" class="btn custom-bg" value="Registrar Paciente">
            </div>
        </div>
    </form>
</div>

<script>
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('click', function(event) {
            event.preventDefault();
        });
    });
</script>
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
$pac_id = $_GET['id'];
$sqlPaciente = "SELECT pac_documento, pac_nombre, pac_apellido, pac_direccion, pac_telefono, pac_email, gen_id, estr_id FROM paciente WHERE pac_id = $pac_id;";
$consultaPaciente = mysqli_query($conectar, $sqlPaciente);
$fila = mysqli_fetch_array($consultaPaciente);

$sqlPacHob = "SELECT hob_id, pac_id FROM paciente_hobbies WHERE pac_id = $pac_id;";
$consultaPacHob = mysqli_query($conectar, $sqlPacHob);
$hobbiesPaciente = [];

while ($hob = mysqli_fetch_array($consultaPacHob)) {
    $hobbiesPaciente[] = $hob['hob_id'];
}
?>
<?php
include("pagPrincipal.php");
?>
<div class="container mt-3">
    <h1>Registro de Paciente</h1>
    <form action="../backend/editarPaciente.php" method="post">
        <div class="row row-cols-2 justify-content-center text-center">
            <div class="mb-3 col-4">
                <label for="documento">Documento</label>
                <input type="text" class="form-control" placeholder="Documento de Identidad" aria-label="documento" name="documento" id="documento" value="<?php echo $fila['pac_documento']; ?>" readonly>
            </div>
            <div class="mb-3 col-4">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" placeholder="Nombre del Paciente" aria-label="nombre" name="nombre" id="nombre" value="<?php echo $fila['pac_nombre'] ?>">
            </div>
            <div class="mb-3 col-4">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" placeholder="Apellido del Paciente" aria-label="apellido" name="apellido" id="apellido" value="<?php echo $fila['pac_apellido'] ?>">
            </div>
            <div class="mb-3 col-4">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" placeholder="Dirección" aria-label="direccion" name="direccion" id="direccion" value="<?php echo $fila['pac_direccion'] ?>" readonly>
            </div>
            <div class="mb-3 col-4">
                <label for="telefono">Telefono</label>
                <input type="tel" class="form-control" placeholder="Telefono" aria-label="telefono" name="telefono" id="telefono" minlength="10" maxlength="12" pattern="\d*" value="<?php echo $fila['pac_telefono'] ?>">
            </div>
            <div class="mb-3 col-4">
                <label for="correo">Correo</label>
                <input type="email" class="form-control" placeholder="Correo" aria-label="correo" name="correo" id="correo" value="<?php echo $fila['pac_email'] ?>" readonly>
            </div>
            <div class="mb-3 col-4">
                Hobbies
                <?php
                while ($dato = mysqli_fetch_array($consultarHob)) {
                    $checked = in_array($dato["hob_id"], $hobbiesPaciente) ? "checked" : "";
                ?>
                    <div class="form-check d-flex justify-content-center gap-2">
                        <input class="form-check-input" type="checkbox" id="<?php echo $dato["hob_nombre"] ?>" name="hobbies[]" value="<?php echo $dato["hob_id"] ?>" <?php echo $checked; ?>>
                        <label class="form-check-label" for="<?php echo $dato["hob_nombre"] ?>">
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
                    <option>-- Seleccione una opción --</option>
                    <?php
                    while ($dato = mysqli_fetch_array($consultarGen)) {
                        if ($dato["gen_id"] == $fila['gen_id']) {
                    ?>
                            <option value=<?php echo $dato["gen_id"] ?> selected> <?php echo $dato["gen_nombre"] ?> </option>
                        <?php
                        } else {
                        ?>
                            <option value=<?php echo $dato["gen_id"] ?>> <?php echo $dato["gen_nombre"] ?> </option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3 col-4">
                Estrato
                <?php
                while ($dato = mysqli_fetch_array($consultarEst)) {
                    if ($dato["estr_id"] == $fila['estr_id']) {
                ?>
                        <div class="form-check d-flex justify-content-center gap-2">
                            <input class="form-check-input" type="radio" id="<?php echo $dato["estr_nombre"] ?>" name="estrato" value="<?php echo $dato["estr_id"] ?>" checked>
                            <label class=" form-check-label" for="<?php echo $dato["estr_nombre"] ?>">
                                <?php echo $dato["estr_nombre"] ?>
                            </label>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="form-check d-flex justify-content-center gap-2">
                            <input class="form-check-input" type="radio" id="<?php echo $dato["estr_nombre"] ?>" name="estrato" value="<?php echo $dato["estr_id"] ?>">
                            <label class=" form-check-label" for="<?php echo $dato["estr_nombre"] ?>">
                                <?php echo $dato["estr_nombre"] ?>
                            </label>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <div class="col-12 justify-content-center text-center">
                <input type="submit" class="btn custom-bg" value="Registrar Paciente">
            </div>
        </div>
    </form>
</div>

<script>
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('click', function(event) {
            event.preventDefault();
        });
    });
</script>
<?php
include("../backend/valiDatosPac.php");
>>>>>>> 27205a8 (crear historia)
