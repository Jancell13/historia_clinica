<<<<<<< HEAD
<?php
include("../conexionBD/conexion.php");
include("bootstrap.php");

$sql = "select * from roles";
$consultar = mysqli_query($conectar, $sql);
?>

<link rel="stylesheet" href="../css/style.css">

<body class="bg-body-secondary">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="form-container">
            <h3>Inicio de Sesión</h3>
            <form class="mb-0" action="../backend/validarLogin.php" method="POST">
                <div class="mb-3">
                    <input class="form-control" type="number" name="documento" placeholder="Documento" required>
                </div>

                <div class="mb-3">
                    <input class="form-control" type="password" name="clave" placeholder="Password" required>
                </div>


                <div class="mb-3">
                    <label for="rol">Rol de trabajo</label>
                    <select name="rol" class="form-select" required>
                        <option selected>-- Seleccione --</option>
                        <?php
                        while ($dato = mysqli_fetch_array($consultar)) {
                        ?>
                            <option value=<?php echo $dato["rol_id"] ?>> <?php echo $dato["rol_nombre"] ?> </option>

                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="text-center">
                    <input class="btn custom-bg" type="submit" value="Loguearse">
                </div>
            </form>

        </div>
    </div>
=======
<?php
include("../conexionBD/conexion.php");
include("bootstrap.php");

$sql = "select * from roles";
$consultar = mysqli_query($conectar, $sql);
?>

<link rel="stylesheet" href="../css/style.css">

<body class="bg-body-secondary">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="form-container">
            <h3>Inicio de Sesión</h3>
            <form class="mb-0" action="../backend/validarLogin.php" method="POST">
                <div class="mb-3">
                    <input class="form-control" type="number" name="documento" placeholder="Documento" required>
                </div>

                <div class="mb-3">
                    <input class="form-control" type="password" name="clave" placeholder="Password" required>
                </div>


                <div class="mb-3">
                    <label for="rol">Rol de trabajo</label>
                    <select name="rol" class="form-select" required>
                        <option selected>-- Seleccione --</option>
                        <?php
                        while ($dato = mysqli_fetch_array($consultar)) {
                        ?>
                            <option value=<?php echo $dato["rol_id"] ?>> <?php echo $dato["rol_nombre"] ?> </option>

                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="text-center">
                    <input class="btn custom-bg" type="submit" value="Loguearse">
                </div>
            </form>

        </div>
    </div>
>>>>>>> 27205a8 (crear historia)
</body>